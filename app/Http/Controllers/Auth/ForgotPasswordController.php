<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Hash;
use Mail;
use Illuminate\Support\Str;
class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

 
    public function sendResetLinkEmail(Request $request)
    {
        $email = $request->email;
        $checkUser = User::where("email",$email)->first();
        if(!$checkUser){
            return response()->json(['thongbaoloi'=>"Địa chỉ email không tồn tại"],200);
        }
        $token = Str::random(60).md5(time());
        $checkUser->token = $token;
        $checkUser->time_code= Carbon::now();
        $checkUser->save();
        $toemail = $checkUser->email;
        
    
        $url = route('password.reset',['token'=>$checkUser->token,'email'=>$toemail]);
        $data=[
            'route'=>$url,
            'title'=>"Lấy lại mật khẩu"
        ];


        Mail::send('auth.email_dang_ky',$data,function($message) use ($toemail) {
            $message->to($toemail,'Reset password')->subject('Lấy lại mật khẩu');
        });

        return response()->json([
            'code' => 200,
            'thongbaothanhcong'=>"Thành công ! Vui lòng kiểm tra email để thay đổi mật khẩu"],200);
    }
}
