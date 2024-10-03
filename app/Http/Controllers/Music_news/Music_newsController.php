<?php

namespace App\Http\Controllers\Music_news;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Music_news;
use Illuminate\Http\Request;
use Image;
use File;

class Music_newsController extends Controller
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
        $model = str_slug('music_news','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $music_news = Music_news::where('title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('date', 'LIKE', "%$keyword%")
                ->orWhere('time', 'LIKE', "%$keyword%")
                ->orWhere('auth_id', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $music_news = Music_news::paginate($perPage);
            }

            return view('music_news.music_news.index', compact('music_news'));
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
        $model = str_slug('music_news','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('music_news.music_news.create');
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
        $model = str_slug('music_news','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            

            $music_news = new Music_news($request->all());

            if ($request->hasFile('image')) {

                $news = $request->file('image');
                $imagename = time() . '_' . $news->getClientOriginalName();
                $path = $news->move(public_path('news_pictures'), $imagename);

                $music_news->image = 'news_pictures/'.$imagename;
            }
            
            $music_news->save();
            return redirect()->back()->with('message', 'Music_news added!');
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
        $model = str_slug('music_news','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $music_news = Music_news::findOrFail($id);
            return view('music_news.music_news.show', compact('music_news'));
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
        $model = str_slug('music_news','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $music_news = Music_news::findOrFail($id);
            return view('music_news.music_news.edit', compact('music_news'));
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
        $model = str_slug('music_news','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            

            if ($request->hasFile('image')) {
                $music_news = Music_news::where('id', $id)->first();
                if (isset($music_news->image) && file_exists(public_path($music_news->image))) {
                    unlink(public_path($music_news->image));
                }
                $news = $request->file('image');
                $imagename = time() . '_' . $news->getClientOriginalName();
                $path = $news->move(public_path('news_pictures'), $imagename);
                $requestData['image'] = 'news_pictures/'.$imagename;

            }else{
                $requestData['image'] = $request->existing_image;
            }


            $music_news = Music_news::findOrFail($id);
            $music_news->update($requestData);
            return redirect()->back()->with('message', 'Music_news updated!');
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
        $model = str_slug('music_news','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Music_news::destroy($id);
            return redirect()->back()->with('message', 'Music_news deleted!');
        }
        return response(view('403'), 403);

    }
}
