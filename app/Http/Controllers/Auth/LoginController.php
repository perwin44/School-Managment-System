<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\AuthTrait;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;
    use AuthTrait;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginForm($type){

        return view('auth.loginadmin',compact('type'));
    }

    public function login(Request $request){

        if (Auth::guard($this->chekGuard($request))->attempt(['email' => $request->email, 'password' => $request->password])) {
           return $this->redirect($request);
        }
        else{
            return redirect()->back()->with('message', 'يوجد خطا في كلمة المرور او اسم المستخدم');
        }

    }

    public function loginForm1($type){

        return view('auth.loginstudent',compact('type'));
    }

    public function login1(Request $request){

        if (Auth::guard('student')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended(RouteServiceProvider::STUDENT);
        }
        else{
            return redirect()->back()->with('message', 'يوجد خطا في كلمة المرور او اسم المستخدم');
        }
    }

    public function logout(Request $request,$type)
    {
        Auth::guard($type)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function logoutstudent(Request $request,$type)
    {
        Auth::guard('student')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function loginFormteacher($type){

        return view('auth.loginteacher',compact('type'));
    }

    public function loginteacher(Request $request){

        if (Auth::guard('teacher')->attempt(['email' => $request->email, 'password' =>$request->password])) {
            return redirect()->intended(RouteServiceProvider::TEACHER);
        }
        else{
            return redirect()->back()->with('message', 'يوجد خطا في كلمة المرور او اسم المستخدم');
        }
    }

    public function logoutteacher(Request $request,$type)
    {
        Auth::guard('teacher')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function loginFormparent($type){

        return view('auth.loginparent',compact('type'));
    }

    public function loginparent(Request $request){

        if (Auth::guard('parent')->attempt(['email' => $request->email, 'password' =>$request->password])) {
            return redirect()->intended(RouteServiceProvider::PARENT);
        }
        else{
            return redirect()->back()->with('message', 'يوجد خطا في كلمة المرور او اسم المستخدم');
        }
    }

    public function logoutparent(Request $request,$type)
    {
        Auth::guard('parent')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
