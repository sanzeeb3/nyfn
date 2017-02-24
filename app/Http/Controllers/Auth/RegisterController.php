<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Session;
use App\Region;
use App\District;


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
     * Where to redirect users after login / registration.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
        
        $message= "Successfully Registered! Please Pay the registration fee within 7 days of registration, Or your registration will get cancelled automatically thereafter.";

        Session::flash('message', $message); 
        return redirect('/login');
    }

    public function showRegistrationForm()
    {
        $region=Region::all();
        $districts=District::all();
        return view('auth.register')->with(['region'=>$region,'districts'=>$districts]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
        
       

        protected function validator(array $data)
        {
            $messages = [
                'integer' => 'This field must be an integer.',
            ];

            return Validator::make($data, [
                'name' => 'required|max:255',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
                'dob'=>'required|date',
                'refrence'=>'refrence',
                'refrence_number'=>'integer',
                'region'=>'integer',
                'tregion'=>'integer',
                'tdistrict'=>'integer',
                'district'=>'integer',
                'zone'=>'integer',
                'tzone'=>'integer',
                'ward_no'=>'integer',
                'tward_no'=>'integer',
                'vdc_mun'=>'string',
                'tvdc_mun'=>'string',
                'profession'=>'string',
                'gender'=>'string',
                'mobile'=>'max:10',
                'phone'=>'max:10',
                'office_phone'=>'max:10',

                  
            
        ],$messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

         return User::create([
            'name' => $data['name'],
            'dob' => $data['dob'],
            'email'=>$data['email'],
            'password' => bcrypt($data['password']),
            'gender'=>$data['gender'],
            'mobile'=>$data['mobile'],
            'phone'=>$data['phone'],
            'office_phone'=>$data['office_phone'],
            
            'profession'=>$data['profession'],
            'refrence'=>$data['refrence_name'],
            'refrence_no'=>$data['refrence_no'],
            'region_id'=>$data['region'],
            'tregion_id'=>$data['tregion'],
            'zone_id'=>$data['zone'],
            'tzone_id'=>$data['tzone'],
            'district_id'=>$data['district'],
            'tdistrict_id'=>$data['tdistrict'],
            'father_name'=>$data['father_name'],
            'mother_name'=>$data['mother_name'],
            'vdc_mun'=>$data['vdc_mun'],
            'tvdc_mun'=>$data['tvdc_mun'],
            'ward_no'=>$data['ward_no'],
            'tward_no'=>$data['tward_no'],
            'district_involved'=>$data['district_involved'],
            'image'=>$data['uploadedimage'],

            'is_admin'=> 0,
            'is_approved'=>0,
        ]);
    }
}
