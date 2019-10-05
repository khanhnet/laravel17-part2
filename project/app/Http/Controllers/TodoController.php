<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Todo;
class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list=Todo::get();
    return view('todo.index')->with('list',$list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todo.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $random=rand(10,100);
        // Nhận dữ liệu từ $request
        $title = $request->get('title');
        $content = $request->get('content');
        $status = $request->get('status');
        // Lưu dữ liệu vào đối tượng $todo
        $todo = new Todo();
        $todo->title = $title;
        $todo->content = $content;
        $todo->status = $status;
        $todo->user_id = $random;
        $todo->save();
        // Chuyển hướng về trang danh sách
        return redirect()->route('todos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todo=Todo::find($id);
        return view('todo.show')->with('todo',$todo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         
        // Tìm todo tương ứng với id
        $todo = Todo::find($id);
        return view('todo.edit')->with('item',$todo);
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
        $title = $request->get('title');
        $content = $request->get('content');
        $status = $request->get('status');
        
        // Tìm todo tương ứng với id
        $todo = Todo::find($id);
        //Cập nhật dữ liệu mới
        $todo->title = $title;
        $todo->content = $content;
        $todo->status = $status;
        // Lưu dữ liệu
        $todo->save();
        //Chuyển hướng đến trang danh sách
        return redirect()->route('todos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Todo::destroy($id);
       return redirect()->route('todos.index');
    }
}
