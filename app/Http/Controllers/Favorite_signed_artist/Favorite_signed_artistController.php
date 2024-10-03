<?php

namespace App\Http\Controllers\Favorite_signed_artist;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Favorite_signed_artist;
use App\Models\Favorite_dj;
use Illuminate\Http\Request;
use Image;
use File;

class Favorite_signed_artistController extends Controller
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
        $model = str_slug('favorite_signed_artist','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $favorite_signed_artist = Favorite_dj::with('dj','type', 'auth')->where('artist_type', 2)->where('dj_id', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('is_approved', 'LIKE', "%$keyword%")
                ->orWhere('auth_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $favorite_signed_artist = Favorite_dj::with('dj','type', 'auth')->where('artist_type', 1)->paginate($perPage);
            }

            return view('favorite_signed_artist.favorite_signed_artist.index', compact('favorite_signed_artist'));
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
        $model = str_slug('favorite_signed_artist','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('favorite_signed_artist.favorite_signed_artist.create');
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
        $model = str_slug('favorite_signed_artist','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            

            $favorite_signed_artist = new Favorite_signed_artist($request->all());

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                
                //make sure yo have image folder inside your public
                $favorite_signed_artist_path = 'uploads/favorite_signed_artists/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($favorite_signed_artist_path) . DIRECTORY_SEPARATOR. $profileImage);

                $favorite_signed_artist->image = $favorite_signed_artist_path.$profileImage;
            }
            
            $favorite_signed_artist->save();
            return redirect()->back()->with('message', 'Favorite_signed_artist added!');
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
        $model = str_slug('favorite_signed_artist','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $favorite_signed_artist = Favorite_signed_artist::findOrFail($id);
            return view('favorite_signed_artist.favorite_signed_artist.show', compact('favorite_signed_artist'));
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
        $model = str_slug('favorite_signed_artist','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $favorite_signed_artist = Favorite_signed_artist::findOrFail($id);
            return view('favorite_signed_artist.favorite_signed_artist.edit', compact('favorite_signed_artist'));
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
        $model = str_slug('favorite_signed_artist','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            

        if ($request->hasFile('image')) {
            
            $favorite_signed_artist = Favorite_signed_artist::where('id', $id)->first();
            $image_path = public_path($favorite_signed_artist->image); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/favorite_signed_artists/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/favorite_signed_artists/'.$fileNameToStore;               
        }


            $favorite_signed_artist = Favorite_signed_artist::findOrFail($id);
            $favorite_signed_artist->update($requestData);
            return redirect()->back()->with('message', 'Favorite_signed_artist updated!');
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
        $model = str_slug('favorite_signed_artist','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Favorite_signed_artist::destroy($id);
            return redirect()->back()->with('message', 'Favorite_signed_artist deleted!');
        }
        return response(view('403'), 403);

    }
}
