<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\ResetForm;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function showResetForm(Request $request)
    {
        $token = $request->token;
        $email= $request->email;
      
        $checkUser = User::where([
            "token" => $token,
            "email" => $email
        ])->first();
        if($checkUser){
           return view('auth.passwords.reset',['token'=>$token,'email'=>$email]);
        }else{
            return view('auth.passwords.time_expired_email',['thongbao'=> 'Lỗi xác thực không thành công']);      
        }
    }

    public function reset(ResetForm $request)
    {
        $token = $request->token;
        $email= $request->email;
        $checkUser = User::where([
            "token" => $token,
            "email" => $email
        ])->first();
        $hethan = Carbon::parse($checkUser ? $checkUser->time_code : Carbon::now());
        $hientai = Carbon::now();
        if(!$checkUser || $hientai->diffInMinutes($hethan) >= 1440){
         return redirect()->back()->with('thongbao','Lỗi xác thực không thành công');
        };
        $token = bcrypt(md5(time().$email));
        $checkUser->token = $token;
        $checkUser->password = Hash::make($request->password);
        $checkUser->email_verified_at = Carbon::now();
        $checkUser->save();
        Auth::logout();
        return redirect()->route('login')->with('success_password','Mật khẩu đã được thay đổi thành công, Mời bạn đăng nhập');
    }


     
}
