<?php

namespace App\Http\Controllers\Gallery_picture;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Gallery_picture;
use Illuminate\Http\Request;
use Image;
use File;

class Gallery_pictureController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $model = str_slug('gallery_picture','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $gallery_picture = Gallery_picture::where('artist_id', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('is_approved', 'LIKE', "%$keyword%")
                ->orWhere('auth_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $gallery_picture = Gallery_picture::paginate($perPage);
            }

            return view('gallery_picture.gallery_picture.index', compact('gallery_picture'));
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
        $model = str_slug('gallery_picture','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('gallery_picture.gallery_picture.create');
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
        $model = str_slug('gallery_picture','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            

            $gallery_picture = new Gallery_picture($request->all());

            if ($request->hasFile('image')) {

                $gallery = $request->file('image');
                $filename = time() . '_' . $gallery->getClientOriginalName();
                $path = $gallery->move(public_path('gallery_pictures'), $filename);

                $gallery_picture->image = 'gallery_pictures/'.$filename;
            }
            
            $gallery_picture->save();
            return redirect()->back()->with('message', 'Gallery_picture added!');
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
        $model = str_slug('gallery_picture','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $gallery_picture = Gallery_picture::findOrFail($id);
            return view('gallery_picture.gallery_picture.show', compact('gallery_picture'));
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
        $model = str_slug('gallery_picture','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $gallery_picture = Gallery_picture::findOrFail($id);
            return view('gallery_picture.gallery_picture.edit', compact('gallery_picture'));
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
        $model = str_slug('gallery_picture','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();

        if ($request->hasFile('image')) {
            $gallery_picture = Gallery_picture::where('id', $id)->first();
			if (isset($gallery_picture->image) && file_exists(public_path($gallery_picture->image))) {
				unlink(public_path($gallery_picture->image));
			}
            $gallery = $request->file('image');
            $filename = time() . '_' . $gallery->getClientOriginalName();
            $path = $gallery->move(public_path('gallery_pictures'), $filename);
			$requestData['image'] = 'gallery_pictures/'.$filename;
			
		}else{
			$requestData['image'] = $request->existing_image;
		}


            $gallery_picture = Gallery_picture::findOrFail($id);
            $gallery_picture->update($requestData);
            return redirect()->back()->with('message', 'Gallery_picture updated!');
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
        $model = str_slug('gallery_picture','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Gallery_picture::destroy($id);
            return redirect()->back()->with('message', 'Gallery_picture deleted!');
        }
        return response(view('403'), 403);

    }
}
