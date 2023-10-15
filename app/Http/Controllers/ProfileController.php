<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function viewProfile(Request $request)
    {
        $userObject=User::where('id',Auth::id())->first();
        return view('pages.profile',compact('userObject'));
    }

    /**
     * Update the user's profile information.
     */
    public function updateProfile(Request $request)
    {  
        $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'user_id' => ['required'],
        ],
        [
            'name.required' => 'Please enter name.',
            'email.required' => 'Can not change the email.'
        ]);
        
        User::find(Auth::id())->update([
            'name'=>$request->name,
        ]);
        flash('Profile Updated Successfully!');
        return Redirect::route('profile.view')->with('status', 'profile-updated');
    }


    public function updatePassword(Request $request)
    {     
        $request->validate([
            'new_password' => 'required',
            'password_confirmation' => 'required|same:new_password',
        ],
        [
            'new_password.required' => 'Please enter password.',
            'password_confirmation.required' => 'Please enter confirm password.'
        ]);

        User::find(Auth::id())->update(['password' => Hash::make($request->new_password)]);
        flash('Password Updated Successfully!');
        return Redirect::to('/logout')->with('PassSuccessMsg', 'Password Updated Successfully.');
    }

}
