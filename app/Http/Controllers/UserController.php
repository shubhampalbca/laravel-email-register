<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\DemoMail;

class UserController extends Controller
{
    
    public function create()
    {
       return view('student.create');
    }

    public function register(Request $request)
    {   
           $rules = [
                "name" => "required|string|min:2|max:100",
                "email" => "required|string|email|max:100",
                "mobile" => "required|string|max:100|regex:/^[0-9]{10}$/",
                "password" => "required|confirmed|min:1"
               ];


            $request->validate($rules);
            $email = $request->input('email');
            $user = User::where('email', $email)->first();

            if ($user) { 
                
                if ($user->is_verified) { 
                    return response()->json([
                        "status" => "already_registered",
                        "message" => "User already registered and verified.",
                    ]);
                } 
            
                $user->name = $request->input('name');
                $user->mobile = $request->input('mobile');
                $user->password = bcrypt($request->input('password'));
                $user->otp = mt_rand(1000, 9999); 
                $user->otp_expiration = now()->addMinutes(15); 
                $user->save(); 
            } else { 
                $user = new User();
                $user->name = $request->input('name');
                $user->mobile = $request->input('mobile');
                $user->email = $email;
                $user->password = bcrypt($request->input('password'));
                $user->otp = mt_rand(1000, 9999);
                $user->otp_expiration = now()->addMinutes(15); 
                $user->is_verified = 0; 
                $user->save(); 
            }

           
            $request->session()->put('email', $email);

       
            $mailData = [
                'otp' => $user->otp,
                'name' => $request->input('name'),
            ];
            Mail::to($email)->send(new DemoMail($mailData));

          return redirect('/otp'); 
           
    }
      public function verifyOTP(Request $request)
        {
            $validate = Validator::make($request->all(), [
                "otp" => "required|digits:4",
            ]);

            if ($validate->fails()) {
                return response()->json([
                    "status" => "error",
                    "message" => "Validation failed",
                    "errors" => $validate->errors(),
                ]);
            }

            $email = $request->session()->get('email');
            $user = User::where('email', $email)->first();

            if (!$user || !$user->otp || !$user->otp_expiration) {
              

                return redirect('otp')->with('status', 'OTP expired or invalid. Please request a new OTP.');
            }

            // Your code to compare the provided OTP with the stored OTP goes here
            $providedOTP = $request->input('otp');

            if ($providedOTP != $user->otp) {

                return redirect('otp')->with('status', 'Invalid OTP. Please try again.');
            }

            $user->is_verified = 1;
            $user->otp = null;
            $user->otp_expiration = null;
            $user->save();

            return redirect('students')->with('status', 'Student Added Successfully');

        }


        public function otp()
        {
         return view('student.otp');
        }


        
        public function student()
        {
            $students = User::where('is_verified', 1)->get();
            return view('student.index', compact('students'));
        }
        


}
