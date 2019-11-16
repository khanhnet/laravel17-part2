<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use App\Customer;
use Mail;
use Cart;
use App\Http\Requests\CustomerRequest;
class CustomerController extends Controller
{
    public function getLogin()
    {
        //Auth::guard('customer')->logout();
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
            if(strlen($request->password)<6){

                return redirect()->back()->with('status', 'Mật khẩu phải lớn hơn 6 kí tụ!');
            }else{

                return redirect()->back()->with('status', 'Tài khoản hoặc mật khẩu không chính xác!');
            }

        }
    }else {
        $customer=Auth::guard('customer')->user();
        return view('user.profile')
        ->with('customer',$customer);

    }
}

public function store(CustomerRequest $request)
{
    if(!Auth::guard('customer')->check()){
        if($request->password==$request->repassword){
            $code='KH'.time();
            $customer=new Customer;
            $customer->code=$code;
            $customer->email=$request->email;
            $customer->password=Hash::make($request->password);
            $customer->status=1;
            $customer->is_active=1;
            $customer->save();

            Mail::send('mail.new_account', array('email'=>$request->email,'password'=>$request->password), function($message) use($request){
                $message->to($request->email, 'Customer')->subject('Tạo tài khoản');
            });
        }else{
            return redirect()->back()->with('repassword', 'Mật khẩu phải trùng nhau!');
        }
    }
    return redirect()->route('getLoginCustomer');
    
}

public function getForgot()
{
    if(!Auth::guard('customer')->check()){
        return view('user.auth.forgot');
    }else{
        return redirect()->route('getLoginCustomer');
    }
    
}
public function forgot(Request $request)
{
    if(!Auth::guard('customer')->check()){
        $customer=Customer::where('email',$request->email)->first();
        if(isset($customer)){
            $password=rand(100000,999999);
            $customer->password=Hash::make($password);
            $customer->save();
            Mail::send('mail.new_account', array('email'=>$request->email,'password'=>$password), function($message) use($request){
                $message->to($request->email, 'Customer')->subject('Quên mật khẩu');
            });
            return redirect()->route('getLoginCustomer');
        }else {
            return redirect()->back()->with('check_email', 'Email không tồn tại');
        }
    }else{
        return redirect()->route('getLoginCustomer');
    }

}
public function logout()
{
    if(Auth::guard('customer')->check()){
        Cart::destroy();
        Auth::guard('customer')->logout();
    }
        return redirect()->route('home');

}

public function profile(Request $request)
{
    if(Auth::guard('customer')->check()){
        $customer=Customer::find(Auth::guard('customer')->user()->id);
        $customer->name=$request->name;
        $customer->address=$request->address;
        $customer->birthday=$request->birthday;
        $customer->mobile=$request->mobile;
        $customer->gender=$request->gender;
        $customer->save();
       return redirect()->back()->with('status', 'Sửa thành công!');

    }
    return redirect()->route('getLoginCustomer');
    
}

public function changePassword(Request $request)
{
    if(Hash::check($request->old_password, Auth::guard('customer')->user()->password)){
        $customer=Customer::find(Auth::guard('customer')->user()->id);
        $customer->password=Hash::make($request->new_password);
        $customer->save();
       return redirect()->back()->with('status', 'Sửa thành công!');

    }
       return redirect()->back()->with('old_password', 'Mật khẩu cũ không chính xác !');
    
}

}
