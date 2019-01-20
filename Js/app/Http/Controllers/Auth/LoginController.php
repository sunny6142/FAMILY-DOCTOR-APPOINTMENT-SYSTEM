<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth\JWTAuth;
use Carbon\Carbon;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function StartupLogin(Request $request){
        $validator = Validator::make($request->all(), [
            'users_id' => 'required',
        ]);

        if($validator->fails()){
            return response()->json(array('errors'=> $validator->errors()));
        }

        $user_id =  DB::table('users')
        ->where(['id_number' => $request->users_id])
        ->get(); 

        if($user_id->isEmpty()){
            return response()->json(array('errors'=> "Id number is wrong, please re-enter"));
        }
        $user = User::find($user_id[0]->users_id);
        
        
        if($user)
        {
            Auth::login($user,$request->remember);
             return response()->json(array('errors'=> 0));
          //  protected $redirectTo = '/home';
        }
        else{
            return response()->json(array('errors'=> "Id number is wrong, please re-enter"));
        }
/*
        if(Auth::guard('web')->attempt(['users_id'=> $request->users_id] , $request->remember))
        {
             return response()->json(array('errors'=> 0));
          //  protected $redirectTo = '/home';
        }
        else{
            return response()->json(array('errors'=> "credentials are not correct"));
        } */
    }

}
