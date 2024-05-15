<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
//vibhore.mit@gmail.com
//Vibhore@123   //I have taken same password for everyuser to make it easy. 
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
    protected $redirectTo = RouteServiceProvider::HOME;

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
    { // dd($data);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'address' => ['required', 'string', 'max:255'],
            'country' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'pincode' => ['required', 'string', 'max:255'],
            'isd' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:255'],
            
            
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.required' => 'Please enter valid first name.',
            'email.required' => 'Please enter valid email.',
            'address.required' => 'Please enter valid address.',
            'country.required' => 'Please select your country.',
            'state.required' => 'Please select your state.',
            'city.required' => 'Please select your city.',
            'pincode.required' => 'Please enter valid pincode.',
            'isd.required' => 'Please select isd code.',
            'mobile.required' => 'Please enter valid mobile number.',
            'password.required' => 'Password must contain at least one number and one uppercase and one lowercase letter and at least 8 or more characters.',
            // Add custom messages for other fields as needed
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'user_reporter_type' => $data['user_reporter_type'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'last_name' => $data['last_name'],
            'address' => $data['address'],
            'country' => $data['country'],
            'state' => $data['state'],
            'city' => $data['city'],
            'pincode' => $data['pincode'],
            'isd' => $data['isd'],
            'mobile' => $data['mobile'],
            'fax' => $data['fax'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
