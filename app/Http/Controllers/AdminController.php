<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registrations;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    //
    public function admin_dashboard()
    {
        return view('admin_dashboard');
    }
    public function admin_edit_profile()
    {
        $email = session()->get('admin_uname');
        $result = Registrations::where('email', $email)->first();
        return view('admin_edit_profile_form', compact('result'));
    }
    public function admin_update_profile(Request $request)
    {
        $email = session()->get('admin_uname');
        $result = Registrations::where('email', $email)->first();
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'mobile_number' => 'required|regex:/^[0-9]{10}$/',
            'hobbies' => 'required|array|min:1',
            'profile_picture' => 'mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'fullname.required' => 'The full name field is required.',
            'fullname.string' => 'The full name must be a string.',
            'fullname.max' => 'The full name may not be greater than 255 characters.',
            'gender.required' => 'The gender field is required.',
            'gender.in' => 'The selected gender is invalid.',
            'mobile_number.required' => 'The mobile number field is required.',
            'mobile_number.string' => 'The mobile number must be a string.',
            'mobile_number.max' => 'The mobile number may not be greater than 20 characters.',
            'hobbies.required' => 'Please select a hobby.',
            'mobile_number.regex' => 'Number must not be greater than 10 digits.',
            'profile_picture.mimes' => 'The profile picture must be a file of type: jpeg, png, jpg, gif.',
            'profile_picture.max' => 'The profile picture may not be greater than 2MB.',
        ]);

        if ($validator->fails()) {
            return redirect('admin_edit_profile')->withErrors($validator)->withInput();
        }

        $hobbies = implode(",", $request->input('hobbies'));
        if ($request->hasFile('profile_picture')) {
            $pic_name = uniqid() . $request->profile_picture->getClientOriginalName();
            $data1 = Registrations::where('email', $email)->update(array('fullname' => $request->fullname, 'gender' => $request->gender, 'mobile' => $request->mobile_number, 'hobbies' => $hobbies, 'profile_picture' => $pic_name));
        } else {
            $data1 = Registrations::where('email', $email)->update(array('fullname' => $request->fullname, 'gender' => $request->gender, 'mobile' => $request->mobile_number, 'hobbies' => $hobbies));
        }
        if ($data1) {
            if ($request->hasfile('profile_picture')) {
                $request->profile_picture->move('uploads/', $pic_name);
                unlink("uploads/" . $result->profile_picture);
            }
            session()->flash('success', 'Profile Updtated Successfully');
        } else {
            session()->flash('error', 'Error in updating profile');
        }
        return redirect('admin_edit_profile');
    }


    public function admin_change_password()
    {
        return view('admin_change_password');
    }
    public function update_admin_password(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$/',
            'password_confirmation' => 'required',

        ], [
            'old_password.required' => 'old Password cannot be Empty',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.confirmed' => 'The password confirmation does not match.',
            'password.regex' => 'The password must contain one small letter on capital ',
            'password_confirmation.required' => 'The password confirmation field cannot be empty',
        ]);

        if ($validated->fails()) {
            return redirect('admin_change_password')->withErrors($validated)->withInput();
        }

        $email = session()->get('admin_uname');
        $result = Registrations::where('email', $email)->first();
        if ($result->password == $request->old_password) {
            $updt_password = Registrations::where('email', $email)->update(array('password' => $request->password));
            if ($updt_password) {
                session()->flash('success', 'Password Updated Successfully');
                return redirect('admin_dashboard');
            } else {
                session()->flash('error', 'Error in updating Password');
                return redirect('admin_change_password');
            }
        } else {
            session()->flash('error', 'Incorrect Old Password');
            return redirect('admin_change_password');
        }
    }
}
