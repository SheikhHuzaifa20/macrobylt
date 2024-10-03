<?php

namespace App\Http\Controllers;
use Hash;
use Illuminate\Http\Request;
use App\inquiry;
use App\newsletter;
use App\Program;
use App\imagetable;
use App\Banner;
use App\User;
use App\Profile;
use App\Models\Subscription_plan;
use App\Models\Audio_gallery;
use App\Models\Gallery_picture;
use App\Models\Favorite_dj;
use App\Models\Artist;
use App\Models\Music_event;
use DB;
use View;
use File;
use App\orders_products;
use App\orders;
use App\Product;
use Auth;
use Image;
use Session;
use App\Http\Traits\HelperTrait;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;



class LoggedInController extends Controller
{
	use HelperTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
	 // use Helper;

    public function __construct()
    {

		// $this->middleware('guest');
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
        //View()->share('config',$config);
    }



	public function orders()
    {

		$orders = orders::where('orders.user_id', Auth::user()->id)
			->orderBy('orders.id', 'desc')
			->with('orderProducts.audio')
			->get();
		return view('account.orders',['ORDERS'=>$orders]);

	}

	public function view_product()
    {

		$products = Product::where('add_by', Auth::user()->id)
			->orderBy('id', 'desc')
			->get();
            // dd($product);
		return view('account.view_product', compact('products'));

	}

	public function add_product()
    {

		$products = Product::where('add_by', Auth::user()->id)
			->orderBy('id', 'desc')
			->get();

		return view('account.add_product', compact('products'));

	}
    public function store_product(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'category' => 'required|string',
            'product_title' => 'required|string|max:255',
            'feature_product' => 'required|string',
            // 'price' => 'required|numeric|min:0',
            'total_price' => 'required|numeric|min:0',
            'discount_price' => 'required|numeric|min:0',
            'description' => 'required|string|max:255',
            'image' => 'nullable|mimes:jpeg,png,gif,webp|max:2048',
            'images' => 'required',
            'section_2_h1' => 'required|string|max:255',
            'image_2' => 'required|mimes:jpeg,png,gif,webp|max:2048',
            'section_2_p' => 'required|string|max:255',
            'add_by' => 'required|numeric|min:0',
        ]);



        $product_price = $request->input('total_price');
        $discount_percent = $request->input('discount_price');

        // Calculate the discounted price
        $discounted_amount = $product_price * ($discount_percent / 100);
        $price = $product_price - $discounted_amount;


        // Check if validation fails
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }



        // Store data in the database
        $product = new Product();
        $product->category = $request->input('category');
        $product->product_title = $request->input('product_title');
        $product->feature_product = $request->input('feature_product');
        // $product->price = $request->input('price');
        $product->price = $price;
        $product->total_price = $request->input('total_price');
        $product->discount_price = $request->input('discount_price');
        $product->description = $request->input('description');
         // Store the image path
        // $product->images = $imagePath; // Store the image path
        $product->section_2_h1 = $request->input('section_2_h1');
         // Store the image path
        $product->section_2_p = $request->input('section_2_p');
        $product->add_by = $request->input('add_by');

        $imagePath = null; // Initialize the image path variable

        if ($request->hasFile('image')) {


            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products/'), $imageName);
            $imagePath = 'uploads/products/' . $imageName;

			$product->image = $imagePath;
        }

        $image2Path = null;

        if ($request->hasFile('image_2')) {


            $image = $request->file('image_2');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products_img_2/'), $imageName);
            $image2Path = 'uploads/products_img_2/' . $imageName;

			$product->image_2 = $image2Path;
        }

        $product->save();

        // if(reuest hidden _images){
        //     $product_imagess = DB::table('product_imagess')
        //         ->where('id', $id)
        //         ->first();
        // }

        if(! is_null(request('images'))) {

            $photos=request()->file('images');
            foreach ($photos as $photo) {
                $destinationPath = 'uploads/products/';

                $filename = date("Ymdhis").uniqid().".".$photo->getClientOriginalExtension();
                //dd($photo,$filename);
                Image::make($photo)->save(public_path($destinationPath) . DIRECTORY_SEPARATOR. $filename);

                DB::table('product_imagess')->insert([

                    ['image' => $destinationPath.$filename, 'product_id' => $product->id]

                ]);

            }

        }

        // Redirect or return a response
        return redirect()->route('view_product')->with('success', 'Data has been saved successfully!');
    }



public function product_destroy($id)
{
    $product = Product::findOrFail($id);

    // Optionally, delete associated files if they exist
    if ($product->image && File::exists(public_path($product->image))) {
        File::delete(public_path($product->image));
    }
    if ($product->images && File::exists(public_path($product->images))) {
        File::delete(public_path($product->images));
    }
    if ($product->image_2 && File::exists(public_path($product->image_2))) {
        File::delete(public_path($product->image_2));
    }

    // Delete the product record from the database
    $product->delete();

    // Redirect or return a response
    return redirect()->route('view_product')->with('success');
}

public function edit($id)
{
    $product = Product::findOrFail($id);

// Fetch images associated with the product
$product_imagess = DB::table('product_imagess')
            ->where('product_id', $id)
            ->get();

    return view('account.edit_product', compact('product' , 'product_imagess'));
}


public function destroy($id)
{
    // Find the image by ID
    $product_imagess = DB::table('product_imagess')
        ->where('id', $id)
        ->first();

    if ($product_imagess) {
        // Delete the image file from the storage
        if (file_exists(public_path($product_imagess->image))) {
            unlink(public_path($product_imagess->image));
        }

        // Delete the record from the database
        DB::table('product_imagess')->where('id', $id)->delete();

        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false], 404);
}



public function update(Request $request, $id)
{
    // Validate the incoming request data
    $validator = Validator::make($request->all(), [
        'category' => 'required|string',
        'product_title' => 'required|string|max:255',
        'feature_product' => 'required|string',
        'price' => 'required|numeric|min:0',
        'discount_price' => 'required|numeric|min:0',
        // 'price' => 'required|numeric|min:0',
        'total_price' => 'required|numeric|min:0',
        'description' => 'required|string|max:255',
        'image' => 'nullable|mimes:jpeg,jpg,png,gif,webp|max:2048',
        'images' => 'nullable|required|mimes:jpeg,jpg,png,gif,webp|max:2048',
        'image_2' => 'nullable|mimes:jpeg,jpg,png,gif,webp|max:2048',
        'section_2_h1' => 'required|string|max:255',
        'section_2_p' => 'required|string|max:255',
        'add_by' => 'required|numeric|min:0',
    ]);


    $product_price = $total_price;
    $discount_percent = $discount_price;

    // Calculate the discounted price
    $discounted_amount = ($product_price * ($discount_percent / 100));
    $price = $product_price - $discounted_amount;


    $request->validate([
        'images.*' => 'mimes:jpeg,jpg,png,gif,webp|max:2048', // Max size of 2MB per image
    ]);

    // Find the product to update
    $product = Product::findOrFail($id);

    // Handle file uploads
    if ($request->hasFile('image')) {
        // Delete old image if it exists
        if ($product->image && File::exists(public_path($product->image))) {
            File::delete(public_path($product->image));
        }

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/products/'), $imageName);
        $product->image = 'uploads/products/' . $imageName;
    }



    if ($request->hasFile('image_2')) {
        // Delete old image if it exists
        if ($product->image_2 && File::exists(public_path($product->image_2))) {
            File::delete(public_path($product->image_2));
        }

        $image = $request->file('image_2');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/products/'), $imageName);
        $product->image_2 = 'uploads/products/' . $imageName;
    }


    if(! is_null(request('images'))) {

        $photos=request()->file('images');
        foreach ($photos as $photo) {
            $destinationPath = 'uploads/products/';

            $filename = date("Ymdhis").uniqid().".".$photo->getClientOriginalExtension();
            //dd($photo,$filename);
            Image::make($photo)->save(public_path($destinationPath) . DIRECTORY_SEPARATOR. $filename);

            DB::table('product_imagess')->insert([

                ['image' => $destinationPath.$filename, 'product_id' => $product->id]

            ]);

        }

    }

    // Update product details
    $product->category = $request->input('category');
    $product->product_title = $request->input('product_title');
    $product->feature_product = $request->input('feature_product');
    $product->total_price = $request->input('total_price');
    $product->discount_price = $request->input('discount_price');
    $product->description = $request->input('description');
    $product->section_2_h1 = $request->input('section_2_h1');
    $product->section_2_p = $request->input('section_2_p');
    $product->add_by = $request->input('add_by'); // Not typically updated but included for completeness

    // Save the updated product details
    $product->save();

    // Redirect or return a response
    return redirect()->route('view_product', compact('product', 'images'))->with('success');
}





	public function account()
    {

		$orders = orders::where('orders.user_id', Auth::user()->id)
				->orderBy('orders.id', 'desc')
				->get();
		return view('account.index',['ORDERS'=>$orders]);

	}

	public function profile()
    {
        $page = DB::table('pages')->where('id', 2)->first();
        $users = User::find(Auth::user()->id);
        $profile = Profile::where('user_id', Auth::user()->id)->first();
        $audio = Audio_gallery::where('auth_id', Auth::user()->id)->get();
        $gallery = Gallery_picture::where('auth_id', Auth::user()->id)->get();
        $favorite = Favorite_dj::with('dj','dj_profile','type')->where('auth_id', Auth::user()->id)->get();
        $events = Music_event::with('auth')->where('auth_id', Auth::user()->id)->get();

        return view('profile', compact('page', 'users', 'profile', 'audio', 'gallery', 'favorite', 'events'));
    }


		public function update_profile(Request $request) {

		$user = DB::table('profiles')->where('id', Auth::user()->id)->first();

		$validateArr = array();
		$messageArr = array();
		$insertArr = array();
		$validateArr = [

			'uname' => 'required',
			'email' => array(),

		 ];

		 if($user->email != $_POST['email']) {
			$validateArr['email'] = 'required|unique:users,email,NULL,id';
		 }

		if(trim($_POST['password']) != "") {

			$validateArr['password'] = 'required|min:6|confirmed';
            $validateArr['password_confirmation'] = 'required|min:6';
		}

		$this->validate($request,$validateArr,$messageArr);

		$insertArr['name'] = $_POST['uname'];
		$insertArr['email'] = $_POST['email'];

		if(trim($_POST['password']) != "") {
				$insertArr['password'] = Hash::make($_POST['password']);
		}

		DB::table('users')
		->where('id', Auth::user()->id)
		->update(
					$insertArr
				);


		Session::flash('message', 'Your Profile Settings has been changed');
		Session::flash('alert-class', 'alert-success');
		return back();

	}

    public function uploadPicture(Request $request)
    {
        // Retrieve the profile for the authenticated user
        $profile = Profile::where('user_id', Auth::user()->id)->first();

        // Debugging check (remove or adjust as necessary)
        // dd($profile);  // This should be after profile initialization if you need to check it

        // Check if a file was uploaded
        if ($request->hasFile('pic')) {
            // If there's an existing picture, delete it
            if ($profile && isset($profile->pic) && file_exists(public_path($profile->pic))) {
                unlink(public_path($profile->pic));
            }

            // Get the uploaded file
            $file = $request->file('pic');
            // Generate a unique filename
            $filename = time() . '_' . $file->getClientOriginalName();
            // Define the directory path
            $directoryPath = public_path('users_pictures');

            // Create the directory if it doesn't exist
            if (!file_exists($directoryPath)) {
                mkdir($directoryPath, 0755, true);
            }

            // Move the uploaded file to the directory
            $file->move($directoryPath, $filename);

            // Update the profile picture path in the database
            $profile->pic = 'users_pictures/' . $filename;
            $profile->save();  // Use save() to persist the changes

            return redirect()->back()->with('success', 'Your profile picture has been updated successfully.');
        }

        // If no file was uploaded, return with an error
        return redirect('/')->with('error', 'Failed to update profile picture.');
    }

	public function updateAccount(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $profile = Profile::where('user_id', Auth::user()->id)->first();

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

		if ($validator->fails()) {
			return redirect()->back()->with('error', $validator->errors());
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->has('password')) {
			$user->password = Hash::make($request->input('password'));
        }
        $user->save();

		$profile->bio = $request->input('bio');
		$profile->gender = $request->input('gender');
		$profile->address = $request->input('address');
		$profile->age = $request->input('age');
		$profile->domain = $request->input('domain');
		$profile->save();

        return redirect()->back()->with('success', 'Account details updated successfully!');
    }



	public function accountDetail()
    {
		// $orders = orders::where('orders.user_id', Auth::user()->id)
		// 				->orderBy('orders.id', 'desc')
		// 				->get();
		$profile = Profile::where('user_id', Auth::user()->id)->first();


		return view('account.account', compact('profile'));

	}

	public function invoice($id)
    {
		$order_id = $id;
		$order = orders::where('id',$order_id)->first();
		$order_products = orders_products::where('orders_id',$order_id)->get();

		return view('account.invoice')->with('title','Invoice #'.$order_id)->with(compact('order','order_products'))->with('order_id',$order_id);;
	}


	public function friends()
    {
		return view('account.friends');

	}

	public function upload()
    {
		return view('account.upload');

	}

	public function password()
    {
		return view('account.password');

	}

	public function audio()
    {
		$data = Audio_gallery::where('auth_id', Auth::user()->id)->get();
		return view('account.audio.index', compact('data'));
	}

	public function create_audio()
    {
		return view('account.audio.create');
	}

	public function audio_store(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'audio_title' => 'required',
            'product_price' => 'required',
            'description' => 'required',
            'language' => 'required',
            'genre' => 'required',
            'free_style_name' => 'required',
			'price' => 'required',
            'file' => 'required|mimes:mp3,wav',
            'image' => 'required|mimes:png,jpeg,gif,jpg,jfif,pjpeg,pjp,svg',
        ]);

		if ($validator->fails()) {
			return redirect()->back()->with('error', 'Validation Error!');
		}

		if ($request->hasFile('image')) {
			$audio = $request->file('image');
            $imagename = time() . '_' . $audio->getClientOriginalName();
            $path = $audio->move(public_path('audio_pictures'), $imagename);
		}else{
			$imagename = '';
		}

		if ($request->hasFile('file')) {
            $audio = $request->file('file');
            $filename = time() . '_' . $audio->getClientOriginalName();
            $path = $audio->move(public_path('audio_file'), $filename);


            Audio_gallery::create([
				'audio_title' => $request->audio_title,
				'product_price' => $request->product_price,
				'description' => $request->description,
				'language' => $request->language,
				'genre' => $request->genre,
				'price' => $request->price,
				'free_style_name' => $request->free_style_name,
				'file' => 'audio_file/'.$filename,
				'image' => ($imagename != '') ? 'audio_pictures/'.$imagename : null,
				'auth_id' => Auth::user()->id
			]);

            return redirect()->back()->with('success', 'Audio Uploaded Successfully');
        }else{
			return redirect()->back()->with('error', 'Audio Uploaded Failed!');
		}
	}

	public function audio_update(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'audio_id' => 'required',
            'audio_title' => 'required',
            'product_price' => 'required',
            'description' => 'required',
            'language' => 'required',
			'genre' => 'required',
            'free_style_name' => 'required',
            'price' => 'required',
            'file' => 'nullable|mimes:mp3,wav',
            'image' => 'nullable|mimes:png,jpeg,gif,jpg,jfif,pjpeg,pjp,svg',
        ]);

		if ($validator->fails()) {
			return redirect()->back()->with('error', 'Validation Error!');
		}

		$data = Audio_gallery::find($request->audio_id);

		if (!$data) {
			return redirect()->back()->with('error', 'Audio not found');
		}

		if ($request->hasFile('image')) {
			$audio = $request->file('image');
            $imagename = time() . '_' . $audio->getClientOriginalName();
            $path = $audio->move(public_path('audio_pictures'), $imagename);
			$i_path = 'audio_pictures/'.$imagename;

			if (isset($data->image) && file_exists(public_path($data->image))) {
				unlink(public_path($data->image));
			}
		}else{
			$i_path = $request->old_image;
		}

		if ($request->hasFile('file')) {
            $audio = $request->file('file');
            $filename = time() . '_' . $audio->getClientOriginalName();
            $path = $audio->move(public_path('audio_file'), $filename);
			$f_path = 'audio_file/'.$filename;

			if (isset($data->file) && file_exists(public_path($data->file))) {
				unlink(public_path($data->file));
			}
		}else{
			$f_path = $request->old_file;
		}

		$data->update([
			'audio_title' => $request->audio_title,
			'description' => $request->description,
			'description' => $request->description,
			'language' => $request->language,
			'genre' => $request->genre,
			'price' => $request->price,
			'free_style_name' => $request->free_style_name,
			'file' => $f_path,
			'image' => $i_path,
			'auth_id' => Auth::user()->id
		]);

        return redirect()->back()->with('success', 'Audio Uploaded Successfully');
	}

	public function audio_delete($id)
	{
		$data = Audio_gallery::find($id);

		if (!$data) {
			return redirect()->back()->with('error', 'Audio not found');
		}

		if (isset($data->file) && file_exists(public_path($data->file))) {
			if (unlink(public_path($data->file))) {

				if (isset($data->image) && file_exists(public_path($data->image))) {
					if (unlink(public_path($data->image))) {

						$data->delete();
						return redirect()->back()->with('success', 'Audio and associated image deleted successfully');
					} else {
						return redirect()->back()->with('error', 'Failed to delete associated image file');
					}
				}

				$data->delete();
				return redirect()->back()->with('success', 'Audio deleted successfully');
			} else {
				return redirect()->back()->with('error', 'Failed to delete audio file');
			}
		} else {
			return redirect()->back()->with('error', 'Audio file not found');
		}
	}



	public function gallery()
    {
		$data = Gallery_picture::where('auth_id', Auth::user()->id)->get();
		return view('account.gallery.index', compact('data'));
	}

	public function gallery_store(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'description' => 'required',
            'image' => 'required|mimes:png,jpeg,gif,jpg,jfif,pjpeg,pjp,svg',
        ]);

		if ($validator->fails()) {
			return redirect()->back()->with('error', 'Validation Error!');
		}

		if ($request->hasFile('image')) {
            $gallery = $request->file('image');
            $filename = time() . '_' . $gallery->getClientOriginalName();
            $path = $gallery->move(public_path('gallery_pictures'), $filename);


            Gallery_picture::create([
				'description' => $request->description,
				'image' => 'gallery_pictures/'.$filename,
				'auth_id' => Auth::user()->id
			]);

            return redirect()->back()->with('success', 'Picture Uploaded Successfully');
        }else{
			return redirect()->back()->with('error', 'Picture Uploaded Failed!');
		}
	}

	public function gallery_update(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'gallery_id' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:png,jpeg,gif,jpg,jfif,pjpeg,pjp,svg,avif',
        ]);

		if ($validator->fails()) {
			return redirect()->back()->with('error', 'Validation Error!');
		}

		$data = Gallery_picture::find($request->gallery_id);

		if (!$data) {
			return redirect()->back()->with('error', 'Picture not found');
		}

		if ($request->hasFile('image')) {
			if (isset($data->image) && file_exists(public_path($data->image))) {
				unlink(public_path($data->image));
			}
            $gallery = $request->file('image');
            $filename = time() . '_' . $gallery->getClientOriginalName();
            $path = $gallery->move(public_path('gallery_pictures'), $filename);
			$f_path = 'gallery_pictures/'.$filename;

		}else{
			$f_path = $request->old_image;
		}

		$data->update([
			'description' => $request->description,
			'image' => $f_path,
			'auth_id' => Auth::user()->id
		]);

        return redirect()->back()->with('success', 'Picture Uploaded Successfully');
	}

	public function gallery_delete($id)
	{
		$data = Gallery_picture::find($id);

		if (!$data) {
			return redirect()->back()->with('error', 'Picture not found');
		}

		if (isset($data->image) && file_exists(public_path($data->image))) {
			if (unlink(public_path($data->image))) {
				$data->delete();
				return redirect()->back()->with('success', 'Picture Delete Successfully');
			} else {
				return redirect()->back()->with('error', 'Failed to delete file');
			}
		} else {
			return redirect()->back()->with('error', 'File not found');
		}
	}

	public function get_artist($id)
	{
		$artists = User::where('artist_type', $id)->where('id', '!=', Auth::user()->id)->select('id', 'name')->get();
		return $artists;
	}

	public function favorite()
    {
		$data = Favorite_dj::with('dj','type')->where('auth_id', Auth::user()->id)->get();
		$artist_type = Artist::all();
		$artist = User::where('id', '!=', Auth::user()->id)
			->where('role', 2)
			->whereNotNull('subscription_id')
			->get();
		return view('account.favorite.index', compact('data', 'artist', 'artist_type'));
	}

	public function favorite_store(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'artist' => 'required',
            'artist_type' => 'required',
        ]);

		if ($validator->fails()) {
			return redirect()->back()->with('error', 'Validation Error!');
		}

		Favorite_dj::create([
			'dj_id' => $request->artist,
			'artist_type' => $request->artist_type,
			'auth_id' => Auth::user()->id
		]);

        return redirect()->back()->with('success', 'Add Favourite Successfully');
	}

	public function favorite_delete($id)
	{
		$data = Favorite_dj::find($id);

		if (!$data) {
			return redirect()->back()->with('error', 'Picture not found');
		}

		$data->delete();
		return redirect()->back()->with('success', 'Remove Favourite Successfully');
	}

	public function event()
    {
		$data = Music_event::where('auth_id', Auth::user()->id)->get();
		return view('account.event.index', compact('data'));
	}

	public function event_store(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'event_title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'event_date' => 'required',
            'event_time' => 'required',
            'image' => 'required|mimes:png,jpeg,gif,jpg,jfif,pjpeg,pjp,svg',
        ]);

		if ($validator->fails()) {
			return redirect()->back()->with('error', 'Validation Error!');
		}

		if ($request->hasFile('image')) {
            $event = $request->file('image');
            $filename = time() . '_' . $event->getClientOriginalName();
            $path = $event->move(public_path('event_pictures'), $filename);


            Music_event::create([
				'event_title' => $request->event_title,
				'description' => $request->description,
				'location' => $request->location,
				'event_date' => $request->event_date,
				'event_time' => $request->event_time,
				'image' => 'event_pictures/'.$filename,
				'auth_id' => Auth::user()->id
			]);

            return redirect()->back()->with('success', 'Event Created Successfully');
        }else{
			return redirect()->back()->with('error', 'Event Created Failed!');
		}
	}

	public function event_update(Request $request)
	{
		$validator = Validator::make($request->all(), [
            'event_id' => 'required',
            'description' => 'required',
            'location' => 'required',
            'event_date' => 'required',
            'event_time' => 'required',
            'image' => 'nullable|mimes:png,jpeg,gif,jpg,jfif,pjpeg,pjp,svg',
        ]);

		if ($validator->fails()) {
			return redirect()->back()->with('error', 'Validation Error!');
		}

		$data = Music_event::find($request->event_id);

		if (!$data) {
			return redirect()->back()->with('error', 'Event not found');
		}

		if ($request->hasFile('image')) {
			if (isset($data->image) && file_exists(public_path($data->image))) {
				unlink(public_path($data->image));
			}
            $event = $request->file('image');
            $filename = time() . '_' . $event->getClientOriginalName();
            $path = $event->move(public_path('event_pictures'), $filename);
			$f_path = 'event_pictures/'.$filename;

		}else{
			$f_path = $request->old_image;
		}

		$data->update([
			'event_title' => $request->event_title,
			'description' => $request->description,
			'location' => $request->location,
			'event_date' => $request->event_date,
			'event_time' => $request->event_time,
			'image' => 'event_pictures/'.$filename,
			'auth_id' => Auth::user()->id
		]);

        return redirect()->back()->with('success', 'Event Updated Successfully');
	}

	public function event_delete($id)
	{
		$data = Music_event::find($id);

		if (!$data) {
			return redirect()->back()->with('error', 'Event not found');
		}

		if (isset($data->image) && file_exists(public_path($data->image))) {
			if (unlink(public_path($data->image))) {
				$data->delete();
				return redirect()->back()->with('success', 'Event Delete Successfully');
			} else {
				return redirect()->back()->with('error', 'Failed to delete file');
			}
		} else {
			return redirect()->back()->with('error', 'File not found');
		}
	}
}

