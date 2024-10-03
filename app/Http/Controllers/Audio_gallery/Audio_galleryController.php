<?php

namespace App\Http\Controllers\Audio_gallery;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Audio_gallery;
use Illuminate\Http\Request;
use Image;
use File;

class Audio_galleryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function updateHotList(Request $request)
    {
        $userId = $request->input('user_id');
        $hot_list = $request->input('hot_list');

        // Update the hot_list in the database
        $user = Audio_gallery::findOrFail($userId);
        $user->hot_list = $hot_list;
        $user->save();

        return response()->json(['success' => true, 'hot_list' => $user->hot_list]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $model = str_slug('audio_gallery','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $audio_gallery = Audio_gallery::where('category', 'LIKE', "%$keyword%")
                ->orWhere('audio_title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('is_approved', 'LIKE', "%$keyword%")
                ->orWhere('auth_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $audio_gallery = Audio_gallery::paginate($perPage);
            }

            return view('audio_gallery.audio_gallery.index', compact('audio_gallery'));
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
        $model = str_slug('audio_gallery','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('audio_gallery.audio_gallery.create');
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
        $model = str_slug('audio_gallery','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            

            $audio_gallery = new Audio_gallery($request->all());

            if ($request->hasFile('image')) {

                $audio = $request->file('image');
                $imagename = time() . '_' . $audio->getClientOriginalName();
                $path = $audio->move(public_path('audio_pictures'), $imagename);

                $audio_gallery->image = 'audio_pictures/'.$imagename;
            }

            if ($request->hasFile('file')) {

                $audio = $request->file('file');
                $filename = time() . '_' . $audio->getClientOriginalName();
                $path = $audio->move(public_path('audio_file'), $filename);

                $audio_gallery->file = 'audio_file/'.$filename;
            }
            
            $audio_gallery->save();
            return redirect()->back()->with('message', 'Audio_gallery added!');
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
        $model = str_slug('audio_gallery','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $audio_gallery = Audio_gallery::findOrFail($id);
            return view('audio_gallery.audio_gallery.show', compact('audio_gallery'));
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
        $model = str_slug('audio_gallery','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $audio_gallery = Audio_gallery::findOrFail($id);
            return view('audio_gallery.audio_gallery.edit', compact('audio_gallery'));
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
        $model = str_slug('audio_gallery','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            
        
        if ($request->hasFile('image')) {
            $audio_gallery = Audio_gallery::where('id', $id)->first();
            if (isset($audio_gallery->image) && file_exists(public_path($audio_gallery->image))) {
                unlink(public_path($audio_gallery->image));
            }
            $audio = $request->file('image');
            $imagename = time() . '_' . $audio->getClientOriginalName();
            $path = $audio->move(public_path('audio_pictures'), $imagename);
            $requestData['image'] = 'audio_pictures/'.$imagename;

        }else{
            $requestData['image'] = $request->existing_image;
        }

        if ($request->hasFile('file')) {
            $audio_gallery = Audio_gallery::where('id', $id)->first();
			if (isset($audio_gallery->file) && file_exists(public_path($audio_gallery->file))) {
				unlink(public_path($audio_gallery->file));
			}
            $audio = $request->file('file');
            $filename = time() . '_' . $audio->getClientOriginalName();
            $path = $audio->move(public_path('audio_file'), $filename);
			$requestData['file'] = 'audio_file/'.$filename;
			
		}else{
			$requestData['file'] = $request->old_file;
		}


            $audio_gallery = Audio_gallery::findOrFail($id);
            $audio_gallery->update($requestData);
            return redirect()->back()->with('message', 'Audio_gallery updated!');
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
        $model = str_slug('audio_gallery','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Audio_gallery::destroy($id);
            return redirect()->back()->with('message', 'Audio_gallery deleted!');
        }
        return response(view('403'), 403);

    }
}
