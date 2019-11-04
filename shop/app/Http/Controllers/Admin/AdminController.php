<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Datatables;
use App\Http\Requests\AdminCreateRequest;
use App\Http\Requests\AdminEditRequest;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		if (Gate::allows('permission','list-admin')) {
		return view('admin.admin.index');
		}else{
			return redirect()->route('404');
		}
	}
	/**
	 * Get a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getData()
	{
		if (Gate::allows('permission','list-admin')) {
		$admins=User::get();
		return datatables()->of($admins)
		->addIndexColumn()
		->editColumn('name', function ($admin) {
			if($admin->status==1){
			return '<h6>'.$admin->name .'<div class="spinner-grow text-success" role="status"></div></h6>';
		}else{
			return '<h6>'.$admin->name .'</h6>';
		}
		})
		->addColumn("action", function($admin) {
			$action="";
			if (Gate::allows('permission','active-admin')){
				if($admin->is_active==1){
					$action.='<a class="mx-1 my-1 btn btn-danger btn-active" id="active" data-id="'.$admin->id.'" data-toggle="tooltip" data-placement="bottom" style="width: 40px" title="Hủy kích hoat"><i class="fas fa-times text-white"></i></a>';
				}else if($admin->is_active==0){
					$action.='<a class="mx-1 my-1 btn btn-success btn-active" id="active" data-id="'.$admin->id.'" data-toggle="tooltip" data-placement="bottom" style="width: 40px" title="Kích hoat"><i class="far fa-check-circle text-white"></i></a>';
				}else{
					$action.="";
				}
				}
				if (Gate::allows('permission','delete-admin')){
					$action.='<a class="mx-1 my-1 btn btn-danger btn-delete" id="delete" data-id="'.$admin->id.'" data-toggle="tooltip" data-placement="bottom" style="width: 40px" title="Xóa"><i class="fa fa-trash text-white"></i></a>';
				}
				return $action;
		})
		->rawColumns(['action','name'])
		->make(true);
	}else{
			return redirect()->route('404');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\AdminCreateRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(AdminCreateRequest $request)
	{
		if (Gate::allows('permission','add-admin')){
		$code='NV'.time();
		$password=rand(100000,999999);
		$admin= new User();
		$admin->code=$code;
		$admin->name=$request->name;
		$admin->email=$request->email;
		$admin->password=$password;
		$admin->status=0;
		$admin->is_active=0;
		$admin->save();
		return response()->json(['message' => true]);
	}else{
			return redirect()->route('404');
		}
	}

	/**
	 * kích hoạt hoặc hủy kích hoạt admin
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function active($id)
	{
		//
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
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
