<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Mail\OTPMail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function LoginPage(){
        return view('pages.auth.login-page');
    }
    public function RegisterPage(){
        return view('pages.auth.registration-page');
    }

    public function Dashboard()
    {
        return view('pages.dashboard.dashboard-page');
    }
    public function forgotPassword()
    {
        return view('pages.auth.send-otp-page');
    }
    public function verifyOTPPage()
    {
        return view('pages.auth.verify-otp-page');
    }
    public function resetPasswordPage()
    {
        return view('pages.auth.reset-pass-page');
    }
    public function updateProfilePage()
    {
        return view('pages.dashboard.update-profile-page');
    }
    //Registration Api
    public function UserRegistration(Request $request)
    {

        try{
            User::create([
                'firstName' => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'password' => $request->input('password'),
            ]);
            return response()->json([
                'message' => 'Registration successfully',
                'status' => 'success'
            ],200);
        }catch (Exception $e){
            return response()->json([
                'message' => 'Registration failed',
                'status' => 'failed',
            ],500);
        }

    }
    //User Login
    public function UserLogin(Request $request){
        try{
            $count = User::where('email','=',$request->input('email'))
                ->where('password','=',$request->input('password'))
                ->select('id')->first();
            if($count!==null){
                $token = JWTToken::CreateToken($request->input('email'),$count->id);
                return response()->json([
                    'token' => $token,
                    'status' => 'success',
                    'message' => 'Login successfully'
                ],200)->cookie('token',$token,time()+60*60*24);
            }else{
                return response()->json([
                    'message' => 'Login failed',
                    'status' => 'failed',
                ],500);
            }
        }catch (Exception $e){
            return response()->json([
                'message' => 'Login failed',
                'status' => 'failed',
            ],500);
        }
    }
    public function UserLogout(){
        $token = redirect('/')->cookie('token','',-1);
        return $token;
    }
    public function SendEmailOtp(Request $request){
       try{
           $email = $request->input('email');
           $otp = rand(1000,9999);
           $count = User::where('email','=',$email)->count();
           if($count==1){
               Mail::to($email)->send(new OTPMail($otp));
               User::where('email','=',$email)->update(['otp'=>$otp]);
               return response()->json([
                   'status' => 'success',
                   'message' => 'OTP send successfully'
               ],200);
           }else{
               return response()->json([
                   'status' => 'failed',
                   'message' => 'Email not found'
               ]);
           }
       }catch (Exception $e){
           return response()->json([
               'message' => $e->getMessage(),
               'status' => 'failed'
           ]);
       }
    }
    //Verify OTP
    public function verifyOTP(Request $request){
        $email = $request->input('email');
        $otp = $request->input('otp');
        $count = User::where('email','=',$email)
            ->where('otp','=',$otp)->count();
        if($count==1){
            User::where('email','=',$email)->update(['otp'=>'0']);
            $token = JWTToken::CreateTokenForSetPassword($request->input('email'));
            return response()->json([
                'token' => $token,
                'status' => 'success',
                'message' => 'verify OTP successfully'
            ],200)->cookie('token',$token,60*24*30);
            //->cookie('token',$token,60*24*30)
        }else{
            return response()->json([
                'status' => 'failed',
                'message' => 'Unauthorized'
            ],401);
        }
    }
    //Reset Password
    public function resetPassword(Request $request){
        try{
            $email = $request->header('email');
            $password = $request->input('password');
            User::where('email','=',$email)->update(['password'=>$password]);
            return response()->json([
                'status' => 'success',
                'message' => 'Password reset successfully'
            ],200)->cookie('token','',-1);
        }catch (Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 'failed'
            ],500);
        }
    }
    //User profile get
    public function UserProfile(Request $request){
        try{
            $email = $request->header('email');
           $user =  User::where('email','=',$email)->first();
            return response()->json([
                'status' => 'success',
                'message' => 'User profile successfully',
                'data' => $user
            ],200);
        }catch (Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 'failed'
            ],500);
        }
    }
    //Update Profile
    public function UserUpdateProfile(Request $request){
        try{
            $email = $request->header('email');
            $firstName = $request->input('firstName');
            $lastName = $request->input('lastName');
            $mobile = $request->input('mobile');
            $password = $request->input('password');
            User::where('email','=',$email)->update([
                'firstName'=>$firstName,
                'lastName'=>$lastName,
                'mobile'=>$mobile,
                'password'=>$password,
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'User profile Update successfully',
            ],200);
        }catch (Exception $e){
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 'failed'
            ],500);
        }
    }
}
