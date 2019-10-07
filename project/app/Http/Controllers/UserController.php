<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list=User::get();
    return view('User.index')->with('list',$list);
    }

   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Nhận dữ liệu từ $request
        $name = $request->get('name');
        $email = $request->get('email');
        $password=Hash::make('12345678');//tạo mật khẩu giả
        // Lưu dữ liệu vào đối tượng $user
        $user = new user();
        $user->name = $name;
        $user->email = $email;
        $user->password = $password;
        $user->save();
        // Chuyển hướng về trang danh sách
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=user::find($id);
        return view('user.show')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         
        // Tìm user tương ứng với id
        $user = user::find($id);
        return view('user.edit')->with('item',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Nhận dữ liệu từ $request
         $name = $request->get('name');
        $email = $request->get('email');
        
        // Tìm user tương ứng với id
        $user = user::find($id);
        //Cập nhật dữ liệu mới
        $user->name = $name;
        $user->email = $email;
        // Lưu dữ liệu
        $user->save();
        //Chuyển hướng đến trang danh sách
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        user::destroy($id);
       return redirect()->route('users.index');
    }
}
