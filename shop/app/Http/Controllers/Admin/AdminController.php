<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Datatables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminCreateRequest;
use App\Http\Requests\AdminEditRequest;
use App\Http\Requests\ChangePasswordRequest;
use Mail;

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
				$user=Auth::user();
				if (Gate::allows('permission','active-admin')&&$user->id!=$admin->id){
					if($admin->is_active==1){
						$action.='<a class="mx-1 my-1 btn btn-danger btn-active" id="active" data-id="'.$admin->id.'" data-toggle="tooltip" data-placement="bottom" style="width: 40px" title="Hủy kích hoat"><i class="fas fa-times text-white"></i></a>';
					}else if($admin->is_active==0){
						$action.='<a class="mx-1 my-1 btn btn-success btn-active" id="active" data-id="'.$admin->id.'" data-toggle="tooltip" data-placement="bottom" style="width: 40px" title="Kích hoat"><i class="far fa-check-circle text-white"></i></a>';
					}else{
						$action.="";
					}
				}
				if (Gate::allows('permission','delete-admin')&&$user->id!=$admin->id){
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
			Mail::send('mail.new_account', array('email'=>$request->email,'password'=>$password), function($message){
				$message->to($request->email, 'Admin')->subject('Tạo tài khoản');
			});
				$admin= new User();
				$admin->code=$code;
				$admin->name=$request->name;
				$admin->email=$request->email;
				$admin->password= Hash::make($password);
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
	public function profile()
	{
		$user=Auth::user();
		return view('admin.admin.profile')->with('user',$user);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request)
	{
		$user=Auth::user();
		$user=User::find($user->id);
		$user->name=$request->name;
		$user->email=$request->email;
		$user->gender=$request->gender;
		$user->mobile=$request->mobile;
		$user->image=$request->image;
		$user->address=$request->address;
		$user->birthday=date('Y/m/d', strtotime($request->birthday));
		$user->save();
		return response()->json(['message' => true]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function changePassword(ChangePasswordRequest $request)
	{
		$user=Auth::user();
		if (Hash::check($request->old_password, $user->password)) {
			$user=User::find($user->id);
			$user->password=Hash::make($request->new_password);
			$user->save();
			Auth::logout();
			return redirect('/login');
		}else{
			return response()->json(['message' => 'Mật khẩu cũ không chính xác']);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		if (Gate::allows('permission','delete-admin')){
			User::find($id)->delete();

			return response()->json(['message'=>'true']);
		}else{
			return redirect()->route('404');
		}
	}
	/**
	 * logout
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function logout()
	{
		Auth::logout();
		return redirect('/login');
	}
}
