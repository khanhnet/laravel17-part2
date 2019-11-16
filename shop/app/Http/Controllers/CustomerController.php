<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use App\Customer;
use Mail;
class CustomerController extends Controller
{
    public function getLogin()
    {
        if(!Auth::guard('customer')->check()){
        return view('user.auth.login');//return ra trang login để đăng nhập
        }else {
            $customer=Auth::guard('customer')->user();
            return view('user.profile')
            ->with('customer',$customer);

        }
    }

    public function postLogin(Request $request)
    {
        if(!Auth::guard('customer')->check()){

            $arr = [
                'email' => $request->email,
                'password' => $request->password,
            ];

            if (Auth::guard('customer')->attempt($arr)) {
                return redirect()->route('home');
            } else {

                return redirect()->back()->with('status', 'Tài khoản hoặc mật khẩu không chính xác!');
            }
        }else {
            dd(Auth::guard('customer')->user());
            return view('user.profile')
            ->with('product_news',$product_news)
            ->with('product_prices',$product_prices);

        }
    }


}
