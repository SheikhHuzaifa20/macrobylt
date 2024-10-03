<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inquiry;

use App\newsletter;
use App\Program;
use App\imagetable;
use App\Product;
use App\Banner;
use App\User;
use App\Models\Artist;
use DB;
use View;
use Session;
use App\Http\Traits\HelperTrait;

use App\orders;
use App\orders_products;
use App\Models\Subscription_plan;
use Illuminate\Support\Facades\Validator;
use Stripe\Stripe;
use Stripe\Charge;

class GuestController extends Controller
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
		 $this->middleware('guest');
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

    public function signin()
  	{
		return view('account.signin');
	}

	public function signup($id = null)
    {
        if($id != null){
            $artist = Artist::all();
            return view('account.signup', compact('id', 'artist'));
        }else{
            return view('account.signup');
        }
	}
    public function register(Request $request)
    {
        // return $request->all();
        // Validate the input
        $validator = Validator::make($request->all(), [
            'fname' => 'required|string',
            'lname' => 'required|string',
            // 'role' => 'required|in:2,3',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',

        ]);

        // If validation fails, redirect back with errors and old input
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        // If validation passes, create the user
        $user = new User();
        // $user->role = $request->role;
        $user->name = $request->fname . ' ' . $request->lname;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        // if ($request->role == 2) {
        //     $user->subscription_id = $request->subscription_id;
        //     $user->save();

        //     return response()->json([
        //         'message' => 'You have successfully submitted!',
        //         'status' => true,
        //         'redirect' => route('subscription.payment', ['id' => $user->id])
        //     ]);
        // } else {
            $user->status = 1;
            $user->save();

            return redirect()->json([
                'message' => 'You have successfully signed up!',
                'status' => true,
                'redirect' => route('signup')
            ]);
        // }
    }

    public function subscription(Request $request)
    {
        $subscription = Subscription_plan::all();
        return view('account.subscription', compact('subscription'));
    }
}
