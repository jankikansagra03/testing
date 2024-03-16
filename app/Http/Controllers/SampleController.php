<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Registrations;

class SampleController extends Controller
{
    public function index_page()
    {
        return view('index');
    }
    public function login_page()
    {
        return view('login');
    }
    public function about_page()
    {
        return view('about');
    }
    public function contact_page()
    {
        return view('contact');
    }
    public function register_page()
    {
        return view('register');
    }
    public function register_submit(Request $req)
    {
        $validated = Validator::make($req->all(), [
            'fullname' => 'required|regex:/^[A-Za-z ]{2,30}$/',
            'email' => 'required|email|unique:registration',
            'password' => 'required|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$/',
            'gender' => 'required',
            'mobile_number' => 'required|regex:/^[0-9]{10}$/',
            'password_confirmation' => 'required',
            'profile_picture' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
            'hobbies' => 'required',
        ], [
            'fullname.required' => 'The full name field is required.',
            'fullname.regex' => 'The full name must contain only alphabets and length must 2 to 30 charcaters',
            'email.required' => 'The email field is required.',
            'email.email' => 'The email must be a valid email address.',
            // 'email.unique' => 'The email has already been taken.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.confirmed' => 'The password confirmation does not match.',
            'password.regex' => 'The password must contain one small letter on capital letter, number and a special symbol.',
            'gender.required' => 'The gender field is required.',
            'mobile_number.required' => 'The mobile number field is required.',
            'mobile_number.regex' => 'The mobile number field must contain only 10 digits',
            'profile_picture.required' => 'The profile picture field is required.',
            'profile_picture.mimes' => 'The profile picture must be a file of type: jpeg, png, jpg, gif.',
            'profile_picture.max' => 'The profile picture may not be greater than 2MB.',
            'hobbies.required' => 'Select atleast one Hobby.',
        ]);

        if ($validated->fails()) {
            return redirect('register')->withErrors($validated)->withInput();
        }
        $reg = new Registrations();
        $reg->fullname = $req->fullname;
        $reg->email = $req->email;
        $reg->password = $req->password;
        $reg->gender = $req->gender;
        $reg->mobile = $req->mobile_number;
        $hobbies = $req->input('hobbies');
        $reg->hobbies = implode(',', $hobbies);
        $reg->profile_picture = $req->profile_picture->getClientOriginalName();

        if ($reg->save()) {
            $req->profile_picture->move("uploads/", $req->profile_picture->getClientOriginalName());
            session()->flash('success', 'Registration Successfull');
        } else {
            session()->flash('error', 'Registration Failed');
            return redirect('register');
        }
        return redirect('login');
    }
}
