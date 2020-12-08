<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Carbon\Carbon;
use Mail;
use Illuminate\Support\Str;
use Hash;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\GiaoVien;
use App\Services\Auth\AuthService;

class AuthController extends Controller
{
    protected $AuthService;

    public function __construct(AuthService $AuthService)
    {
        $this->AuthService = $AuthService;
    }

    public function viewFormRegister()
    {
        return view('auth.register');
    }
    public function register(RegisterRequest $request)
    {
        $request['password'] = bcrypt(md5(time().$request->email));
        $this->AuthService->create($request);
        $url = route('auth.register');
        $data=[
            'route'=>$url,
            'title'=>"Tài khoản được đăng ký thành công"
        ];

        Mail::send('auth.email_dang_ky', $data, function($message){
	        $message->to('phucnvph07307@fpt.edu.vn', 'Visitor')->subject('Visitor Feedback!');
        });
    }

    public function profile()
    {   
        $user=Auth::user()->id;
        $giao_vien=GiaoVien::where('user_id', $user)->first();
        return view('auth.profile',compact('giao_vien','user'));
    }

    public function changePasswordForm() 
    {
        return view('auth.change_password');
    }

    public function changePassword(Request $request)
    {

        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            return redirect()->back()
                ->with("error","Mật khẩu cũ bạn vừa nhập không chính xác!Vui lòng kiểm tra lại."); 
        }

        if(strcmp($request->get('current_password'), $request->get('new_password')) == 0){
            return redirect()->back()
                ->with("error","Mật khẩu mới không được trùng với mật khẩu hiện tại của bạn.Vui lòng chọn một mật khẩu khác.");
        }

        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required','regex:/^[a-z0-9_-]{7,50}$/','min:8'],
            'password_confirmation' => ['same:new_password'],
            ],[
                'current_password.required'=>'Bạn chưa nhập mật khẩu cũ',
                'new_password.required'=>'Bạn chưa nhập mật khẩu mới.',
                'password_confirmation.same'=>'Mật khẩu không khớp.',
                'new_password.regex'=>'Mật khẩu bao gồm các kí tự a-Z, 0-9!'  , 
                'new_password.min'=>'Mật khẩu tối thiểu 8 kí tự! '
            ]
        );
    
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        Auth::logout();
        return redirect()->route('login')->with("success_password","Đăng nhập lại để tiếp tục");
    }
 
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function uploadAvatar(Request $request)
    {
        $user = Auth::user();
        $user->avatar = $request->avatar;
        $user->save();
        return 'upload avatar thành công';
    }
}
