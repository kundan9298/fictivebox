<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    

    public function signup(){
        // echo "Hello";

        return view('signup');
    }


    public function insert(Request $request){

       $valid = $request->validate([
        'fullname' => 'required | String',
        'email' => 'required|email|unique:users,email',
        'password' => 'required | min:6',
        'phoneno' => 'required| min:10',

       ]);



       $data = new User();

       $data->name = $request->fullname;
       $data->email = $request->email;
       $data->phoneno = $request->phoneno;
       $data->password = Hash::make($request->password);
       $data->save();

       if($data->save()){
        return redirect()->route('login')->with('success', 'Signup Successfull');

       }
       return redirect()->route('signup')->with('success', 'Signup not Successfull');


    }


    public function login(){

       return view('login');
    }


    public function loginuser(Request $request){
        
        $email = $request->email;
        $password = $request->password;


        $checkEmail = User::where('email', $email)->first();

        if($checkEmail){

        // dd($checkEmail->name);

        $userHashPassword =  $checkEmail->password;

        $isPasswordMatch = Hash::check($password, $userHashPassword);

        if ($isPasswordMatch) {

            Session()->put([
                'user_id' => $checkEmail->id,
                'user_email' => $checkEmail->email,
                 'user_name' => $checkEmail->name,
            ]);

            return redirect()->route('home')->with('Success', 'Login Successfull');
        
        } else {


            return redirect()->back()->with('success', 'Password Not Match..');
        }

       
    }else{

        return redirect()->back()->with('success', 'Email Not Ragister..');

    }

}


public function logout()
{

    // dd("Hello");
    
    session()->flush();


    return redirect()->route('login')->with('success', 'Logged out successfully.');
}
}
