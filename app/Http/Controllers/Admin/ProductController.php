<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\orders;
use App\orders_products;
use App\Product;
use App\imagetable;
use App\Attributes;
use App\AttributeValue;
use App\ProductAttribute;
use Illuminate\Http\Request;
use Image;
use File;
use DB;
use Session;
class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

		$logo = imagetable::
					 select('img_path')
					 ->where('table_name','=','logo')
					 ->first();

		$favicon = imagetable::
					 select('img_path')
					 ->where('table_name','=','favicon')
					 ->first();

		View()->share('logo',$logo);
		View()->share('favicon',$favicon);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {

        $model = str_slug('product','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $product = Product::where('products.product_title', 'LIKE', "%$keyword%")
				->leftjoin('categories', 'products.category', '=', 'categories.id')
                ->orWhere('products.description', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $product = Product::paginate($perPage);
            }

            return view('admin.product.index', compact('product'));
        }
        return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        $model = str_slug('product','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {

            $att = Attributes::all();
            $attval = AttributeValue::all();

			// $items = Category::all(['id', 'name']);
			$items = Category::pluck('name', 'id');

            return view('admin.product.create', compact('items', 'att','attval'));
        }
        return response(view('403'), 403);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {


	    //echo "<pre>";
	    //print_r($_FILES);
	    //return;

		//dd($_FIL-ES);
        $model = str_slug('product','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            $this->validate($request, [
			'product_title' => 'required',
			'section_2_h1' => 'required',
			'section_2_p' => 'required',
			'description' => 'required',
			'price' => 'required',
			'discount_price' => 'required',
			'image' => 'required',
			'image_2' => 'required',
			'item_id' => 'required',
			'add_by' => 'required',
		]);

		    //echo implode(",",$_POST['language']);
		    //return;
			$product = new product;

            $product->product_title = $request->input('product_title');
            $product->section_2_h1 = $request->input('section_2_h1');
            $product->section_2_p = $request->input('section_2_p');
			$product->price = $request->input('price');
			$product->discount_price = $request->input('discount_price');
			$product->item_price4 = $request->input('add_by');
            $product->description = $request->input('description');
			$product->category = $request->input('item_id');
            $product->feature_product = $request->input('feature_product');
            $product->add_by = $request->input('add_by');

            //**********==============================image=================================**********//

            $file = $request->file('image');
            //make sure yo have image folder inside your public
            $destination_path = 'uploads/products/';
            $profileImage = date("Ymdhis").".".$file->getClientOriginalExtension();

            Image::make($file)->save(public_path($destination_path) . DIRECTORY_SEPARATOR. $profileImage);

            $product->image = $destination_path.$profileImage;

            //**********==============================image_2=================================**********//

            $image_2 = $request->file('image_2');
            //make sure yo have image folder inside your public

            Image::make($image_2)->save(public_path($destination_path) . DIRECTORY_SEPARATOR. $profileImage);

            $product->image_2 = $destination_path.$profileImage;

            //**********==============================item_1=================================**********//

            $item_1 = $request->file('item_1');
            //make sure yo have image folder inside your public

            Image::make($item_1)->save(public_path($destination_path) . DIRECTORY_SEPARATOR. $profileImage);

            $product->item_1 = $destination_path.$profileImage;

            //**********==============================item_2=================================**********//

            $item_2 = $request->file('item_2');
            //make sure yo have image folder inside your public

            Image::make($item_2)->save(public_path($destination_path) . DIRECTORY_SEPARATOR. $profileImage);

            $product->item_2 = $destination_path.$profileImage;

            //**********==============================item_3=================================**********//

            $item_4 = $request->file('item_3');
            //make sure yo have image folder inside your public

            Image::make($item_4)->save(public_path($destination_path) . DIRECTORY_SEPARATOR. $profileImage);

            $product->item_4 = $destination_path.$profileImage;

            //**********==============================item_4=================================**********//

            $item_4 = $request->file('item_4');
            //make sure yo have image folder inside your public

            Image::make($item_4)->save(public_path($destination_path) . DIRECTORY_SEPARATOR. $profileImage);

            $product->item_4 = $destination_path.$profileImage;

            $product->save();



            if(! is_null(request('images'))) {

                $photos=request()->file('images');
                foreach ($photos as $photo) {
                    $destinationPath = 'uploads/products/';

                    $filename = date("Ymdhis").uniqid().".".$photo->getClientOriginalExtension();
                    //dd($photo,$filename);
                    Image::make($photo)->save(public_path($destinationPath) . DIRECTORY_SEPARATOR. $filename);

                    DB::table('product_imagess')->insert([

                        ['image' => $destination_path.$filename, 'product_id' => $product->id]

                    ]);

                }

            }
             //$photos->save();
            //$requestData = $request->all();
            //Product::create($requestData);

            $attval = $request->attribute;

            for($i = 0; $i < count($attval); $i++)
            {
                $product_attributes = new ProductAttribute;
                $product_attributes->attribute_id = $attval[$i]['attribute_id'];
                $product_attributes->value = $attval[$i]['value'];
                $product_attributes->price = $attval[$i]['v-price'];
                $product_attributes->qty = $attval[$i]['qty'];
                $product_attributes->product_id = $product->id;

                $product_attributes->save();
            }





            return redirect('admin/product')->with('message', 'Product added!');
        }
        return response(view('403'), 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $model = str_slug('product','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $product = Product::findOrFail($id);
            return view('admin.product.show', compact('product'));
        }
        return response(view('403'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {



        $model = str_slug('product','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {

            $att = Attributes::all();
            $product = Product::findOrFail($id);

			$items = Category::pluck('name', 'id');

			$product_images = DB::table('product_imagess')
                          ->where('product_id', $id)
                          ->get();



            return view('admin.product.edit', compact('product','items','product_images','att'));
        }
        return response(view('403'), 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        // return $request;
        $model = str_slug('product','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $this->validate($request, [
			'product_title' => 'required',
			'description' => 'required',
			'item_id' => 'required'
		]);

        $requestData['product_title'] = $request->input('product_title');
        $requestData['section_2_h1'] = $request->input('section_2_h1');
        $requestData['section_2_p'] = $request->input('section_2_p');
        $requestData['item_name1'] = $request->input('item_name1');
        $requestData['item_name2'] = $request->input('item_name2');
        $requestData['item_name3'] = $request->input('item_name3');
        $requestData['item_name4'] = $request->input('item_name4');
        $requestData['description'] = $request->input('description');
		$requestData['sku'] = $request->input('sku');
		$requestData['price'] = $request->input('price');
		$requestData['discount_price'] = $request->input('discount_price');
		$requestData['item_price1'] = $request->input('item_price1');
		$requestData['item_price2'] = $request->input('item_price2');
		$requestData['item_price3'] = $request->input('item_price3');
		$requestData['item_price4'] = $request->input('item_price4');
		$requestData['category'] = $request->input('item_id');
		$requestData['feature_product'] = $request->input('feature_product');


        // dump($request->input());
        // die();
    /*Insert your data*/

    // Detail::insert( [
        // 'images'=>  implode("|",$images),
    // ]);

        if ($request->hasFile('image')) {

			$product = product::where('id', $id)->first();
			$image_path = public_path($product->image);

			if(File::exists($image_path)) {

				File::delete($image_path);
			}

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products/'), $imageName);
            $imagePath = 'uploads/products/' . $imageName;

			$requestData['image'] = $imagePath;
        }



        if ($request->hasFile('image_2')) {

			$product = product::where('id', $id)->first();
			$image_path = public_path($product->image_2);

			if(File::exists($image_path)) {

				File::delete($image_path);
			}

            $image = $request->file('image_2');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products/'), $imageName);
            $imagePath = 'uploads/products/' . $imageName;

			$requestData['image_2'] = $imagePath;
        }

        if ($request->hasFile('item_1')) {

			$product = product::where('id', $id)->first();
			$image_path = public_path($product->item_1);

			if(File::exists($image_path)) {

				File::delete($image_path);
			}

            $image = $request->file('item_1');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products/'), $imageName);
            $imagePath = 'uploads/products/' . $imageName;

			$requestData['item_1'] = $imagePath;
        }
        if ($request->hasFile('item_2')) {

			$product = product::where('id', $id)->first();
			$image_path = public_path($product->item_2);

			if(File::exists($image_path)) {

				File::delete($image_path);
			}

            $image = $request->file('item_2');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products/'), $imageName);
            $imagePath = 'uploads/products/' . $imageName;

			$requestData['item_2'] = $imagePath;
        }
        if ($request->hasFile('item_3')) {

			$product = product::where('id', $id)->first();
			$image_path = public_path($product->item_3);

			if(File::exists($image_path)) {

				File::delete($image_path);
			}

            $image = $request->file('item_3');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products/'), $imageName);
            $imagePath = 'uploads/products/' . $imageName;

			$requestData['item_3'] = $imagePath;
        }
        if ($request->hasFile('item_4')) {

			$product = product::where('id', $id)->first();
			$image_path = public_path($product->item_4);

			if(File::exists($image_path)) {

				File::delete($image_path);
			}

            $image = $request->file('item_4');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products/'), $imageName);
            $imagePath = 'uploads/products/' . $imageName;

			$requestData['item_4'] = $imagePath;
        }

            //make sure yo have image folder inside your publi

            if(! is_null(request('images'))) {

                $photos=request()->file('images');
                foreach ($photos as $photo) {
                    $destinationPath = 'uploads/products/';

                    $filename = date("Ymdhis").uniqid().".".$photo->getClientOriginalExtension();
                    //dd($photo,$filename);
                    $photo->move(public_path($destinationPath), $filename);

                    $product = product::where('id', $id)->first();


                    DB::table('product_imagess')->insert([

                        ['image' => $destinationPath.$filename, 'product_id' => $product->id]

                    ]);

                }

            }

        product::where('id', $id)
                ->update($requestData);


            $attval = $request->attribute;
            $product_attribute_id = $request->product_attribute;
            $oldatt = $request->attribute_id;
            $oldval = $request->value;
            $oldprice = $request->v_price;
            $oldqty = $request->qty;

            for($j = 0; $j < count($oldatt); $j++){
                $product_attribute = ProductAttribute::find($product_attribute_id[$j]);
                $product_attribute->attribute_id = $oldatt[$j];
                $product_attribute->value = $oldval[$j];
                $product_attribute->price = $oldprice[$j];
                $product_attribute->qty = $oldqty[$j];
                $product_attribute->save();
            }

            for($i = 0; $i < count($attval); $i++)
            {
                $product_attributes = new ProductAttribute;
                $product_attributes->attribute_id = $attval[$i]['attribute_id'];
                $product_attributes->value = $attval[$i]['value'];
                $product_attributes->price = $attval[$i]['v-price'];
                $product_attributes->qty = $attval[$i]['qty'];
                $product_attributes->product_id = $id;
                $product_attributes->save();
            }

         /*
        if(! is_null(request('images'))) {


                DB::table('product_imagess')->where('product_id', '=', $id)->delete();

                $photos=request()->file('images');



                foreach ($photos as $photo) {
                    $destinationPath = 'uploads/products/';

                    $fileName = uniqid() . "_" . $file->getClientOriginalName();
                    $file->move(storage_path($destinationPath), $fileName);


                    DB::table('product_imagess')->insert([

                        ['image' => $destinationPath.$filename, 'product_id' => $product->id]

                    ]);

                }

        }
        */


             return redirect('admin/product')->with('message', 'Product updated!');
        }
        return response(view('403'), 403);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $model = str_slug('product','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Product::destroy($id);

            return redirect('admin/product')->with('flash_message', 'Product deleted!');
        }
        return response(view('403'), 403);

    }
	public function orderList() {

		$orders = orders::
				    select('orders.*')
				   ->get();

		return view('admin.ecommerce.order-list', compact('orders'));
	}

	public function orderListDetail($id) {

		$order_id = $id;
		$order = orders::where('id',$order_id)->first();
		$order_products = orders_products::where('orders_id',$order_id)->get();



		return view('admin.ecommerce.order-page')->with('title','Invoice #'.$order_id)->with(compact('order','order_products'))->with('order_id',$order_id);

		// return view('admin.ecommerce.order-page');
	}

	public function updatestatuscompleted($id) {

		$order_id = $id;
		$order = DB::table('orders')
              ->where('id', $id)
              ->update(['order_status' => 'Completed']);


		Session::flash('message', 'Order Status Updated Successfully');
						Session::flash('alert-class', 'alert-success');
						return back();

	}
	public function updatestatusPending($id) {

		$order_id = $id;
		$order = DB::table('orders')
              ->where('id', $id)
              ->update(['order_status' => 'Pending']);


		Session::flash('message', 'Order Status Updated Successfully');
						Session::flash('alert-class', 'alert-success');
						return back();

	}

}
