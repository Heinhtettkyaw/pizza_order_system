<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class  AuthController extends Controller
{
    //direct login page
    public function loginPage(){
        return view('login');
    }

    //registerPage
    public function registerPage(){
        return view('register');
    }

    public function dashboard(){
        if(Auth::user()->role=='admin'){
            return redirect()->route('category#list');
        }
        return redirect()->route('user#home');
    }

    //change Password Page
    public function changePasswordPage(){

        return view('Admin.password.change');
    }

    //change Password

    public function changePassword(Request $request){
        /*
        1. All fields must be filled.
        2.Passwords must be greater than 6 and less than 16
        3.New Password must be same with ConfimedPassword
        4.current password must be same with old password
        5.All above conditions are satisfied, then password change.
        */

        Validator::make($request->all(),[
            'currentPassword'=>'required|min:6|max:16',
            'newPassword'=>'required|min:6|max:16',
            'confirmedPassword'=>'required|min:6|max:16|same:newPassword'
        ])->validate();

        $currentUserId= Auth::user()->id;
        $user=User::where('id',$currentUserId)->first();
        $dbPassword= $user->password;
        if (Hash::check($request->currentPassword, $dbPassword))
        {
           User::where('id',$currentUserId)->update([
            'password'=>Hash::make($request->newPassword),
           ]);

           return redirect()->route('admin#changePasswordPage')->with(['passwordSuccess'=>'Changed Password Successfully']);
        }
        else{
            return redirect()->route('admin#changePasswordPage')->with(['passwordFail'=>'You enter the wrong password. Please try again!!']);

        }

    }

}
