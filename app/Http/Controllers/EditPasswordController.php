<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\User;

use App\Http\Requests\EditPasswordRequest;

class EditPasswordController extends Controller{
    
    public function edit(EditPasswordRequest $request){

      //  $request->validated();

        // informations from form

        $given_password = $request->input('old_password');

        $new_password = $request->input('new_password');

        $new_password_confirmation = $request->input('new_password_confirmation');

        // getting the concerned user

        $user_email = $request->input('email');

        $user = User::all()->where('email','=',$user_email);

        //removing the user from the array

        $user = reset($user); $user = reset($user);

        if($user != null){ // the user truly exists

            $current_password = $user->password;

            //create hasher so as to be able to compare the given password to the real one

            $hasher = app('hash');

            $password_matches = $hasher->check($given_password , $current_password );

            if($password_matches && ($new_password == $new_password_confirmation) ){

                $user->password = $new_password;

                $user->password = Hash::make($user->password);

                $user->save();

            }

        }

        return view('home');

    }

    public function form(){

        return view('/users/forms/editPassword');

    }
    
}
