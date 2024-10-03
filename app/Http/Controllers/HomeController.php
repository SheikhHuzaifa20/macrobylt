<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\inquiry;
use App\schedule;
use App\newsletter;
use App\post;
use App\banner;
use App\imagetable;
use App\User;
use App\Models\Audio_gallery;
use App\Models\Music_event;
use App\Models\Music_news;
use DB;
use Mail;use View;
use Session;
use App\Http\Helpers\UserSystemInfoHelper;
use App\Http\Traits\HelperTrait;
use Auth;
use App\Profile;
use App\Page;
use Image;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
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
        //$this->middleware('auth');

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


     public function productdetail($id)
     {

         $product = DB::table('products')->where('id', $id)->first();
         $data = DB::table('products')->where('feature_product', 1)
         ->orderBy('id' , 'desc')
         ->limit(4)
         ->get();


        //  dd($data);
         $product_images = DB::table('product_imagess')->where('product_id', $id)->get();
         return view('html.macrorecharge', compact('product', 'product_images' , 'data' ));


     }

    public function index()
    {
       $page = DB::table('pages')->where('id', 1)->first();
       $data = DB::table('products')->where('feature_product', 1)
       ->orderBy('id' , 'desc')
        ->limit(6)
        ->get();
       return view('welcome', compact('page', 'data'));
    }

    public function search(Request $request)
    {
        $query = $request->input('search');

       $page = DB::table('pages')->where('id', 1)->first();

       $audio = Audio_gallery::with('auth')
            ->where('audio_title', 'LIKE', "%{$query}%")
            ->orderBy('id', 'desc')
            ->limit(12)
            ->get();

       $audio_list = Audio_gallery::with('auth')->where('hot_list', 1)->orderBy('id', 'desc')->limit(10)->get();

       $events = Music_event::with('auth')->orderBy('event_date', 'desc')->limit(5)->get();

       $artist = User::with('profile')->where('role', 2)->where('featured', 1)->orderBy('id', 'desc')->limit(5)->get();

       $recent_artist = User::with('profile')->where('role', 2)->orderBy('id', 'desc')->limit(5)->get();

       $news = Music_news::with('auth')->orderBy('id', 'desc')->limit(5)->get();

       return view('welcome', compact('page', 'audio', 'audio_list', 'events', 'artist', 'recent_artist', 'news'));
    }


    public function audioDetail($id)
    {
        $audio = Audio_gallery::with('auth')->find($id);
        return view('audio', compact('audio'));
    }



    public function thebooth()
    {
        $page = DB::table('pages')->where('id', 3)->first();

        $users = User::find(Auth::user()->id);
        $profile = Profile::where('user_id', Auth::user()->id)->first();
        $audio = Audio_gallery::with('auth')->orderBy('id', 'desc')->limit(10)->get();

        $maxStars = Audio_gallery::max('stars');

        $audio_latest_max_stars = Audio_gallery::with('auth')
            ->where('stars', $maxStars)
            ->orderBy('id', 'desc')
            ->first();

        return view('thebooth', compact('page', 'users', 'profile', 'audio', 'audio_latest_max_stars'));
    }


    public function unsignedform()
    {
       $page = DB::table('pages')->where('id', 4)->first();

       return view('unsignedform', compact('page'));
    }


    public function contact()
    {
       $page = DB::table('pages')->where('id', 5)->first();

       return view('contact', compact('page'));
    }


    public function careerSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'phone' => 'required|string',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => $validator->errors(),
                'validation' => true
            ]);
        }


        $validatedData = $validator->validated();
        $inquiry = inquiry::create($validatedData);

        if ($inquiry) {
            Mail::send([], [], function ($message) use ($validatedData) {
                $message->to($validatedData['email'])
                    ->subject('Thank You for Your Inquiry')
                    ->setBody(
                        '<p>Dear ' . $validatedData['fname'] . ',</p>' .
                        '<p>Thank you for contacting us. We have received your inquiry and will get back to you as soon as possible.</p>' .
                        '<p>Best regards,</p>' .
                        '<p>Your Company Name</p>',
                        'text/html'
                    );
            });
        } else {
            return response()->json([
                'message' => 'Failed to submit inquiry. Please try again later.',
                'status' => false
            ]);
        }
    }


    public function newsletterSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'newsletter_email' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => $validator->errors(),
                'validation' => true
            ]);
        }

        $is_email = newsletter::where('newsletter_email',$request->newsletter_email)->count();
        if($is_email == 0) {
            $inquiry = new newsletter;
            $inquiry->newsletter_email = $request->newsletter_email;
            $inquiry->save();
            return response()->json(['message'=>'Thank you for contacting us. We will get back to you asap', 'status' => true]);

        }else{
            return response()->json(['message'=>'Email already exists', 'status' => false]);
        }

    }

    public function updateContent(Request $request){
        $id = $request->input('id');
        $keyword = $request->input('keyword');
        $htmlContent = $request->input('htmlContent');
        if($keyword == 'page'){
            $update = DB::table('pages')
                        ->where('id', $id)
                        ->update(array('content' => $htmlContent));

            if($update){
                return response()->json(['message'=>'Content Updated Successfully', 'status' => true]);
            }else{
                return response()->json(['message'=>'Error Occurred', 'status' => false]);
            }
        }else if($keyword == 'section'){
            $update = DB::table('section')
                        ->where('id', $id)
                        ->update(array('value' => $htmlContent));
            if($update){
                return response()->json(['message'=>'Content Updated Successfully', 'status' => true]);
            }else{
                return response()->json(['message'=>'Error Occurred', 'status' => false]);
            }
        }
    }

}
