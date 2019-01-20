<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use Auth;
use Session;
use Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function reg(Request $request) {
     //   dump($request);
    //    Session::put('last_auth_attempt', 'register');
    
        $validator = Validator::make($request->all(), [
                'name' => 'required|max:100',
                'id_number' => 'required|size:18|unique:users',
                'phone' => 'required|numeric',
                'address' => 'required|max:100'
            ],[
                'name.required' => 'The name field is required',  
                'name.max' => 'The name may not be greater than 100 characters.',
               
                'id_number.required' => 'The id number field is required.',
                'id_number.size' => 'The id number must be 18 characters.',
                'id_number.unique' => 'This id number is already taken',

                'phone.required' => 'The cellphone field is required',
                'phone.numeric' => 'numeric value required',

                'address.required' => 'The address field is required',
                'address.max' => 'The address may not be greater than 100 characters.',
            ]
        
        );
        if($validator->fails()){
            return response()->json(array('errors'=> $validator->errors()));
        }
        else{
            
            $user = User::create([
                'name' => $request->name,
                'id_number' => $request->id_number,
                'phone' => $request->phone,
                'address' => $request->address
            ]);
            Auth::login($user,$request->remember);
            return;
        }
        return response()->json(array('errors'=> "validator failed please try again"));
        
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
