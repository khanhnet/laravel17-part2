<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\User;
use Datatables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Option;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\OptionRequest;

class OptionController extends Controller
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
		if (Gate::allows('permission','list-option')) {
			return view('admin.options.index');
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
		if (Gate::allows('permission','list-option')) {
			$options=Option::get();
			return datatables()->of($options)
			->addIndexColumn()
			->editColumn('parent_id', function ($option) {
				$option_parent=$option->find($option->parent_id);
				return $option_parent['name'];
			})
			->editColumn('category_id', function ($option) {
				$category=Category::find($option->category_id);
				return $category['name'];
			})
			->addColumn("action", function($option) {
				$action="";
				if (Gate::allows('permission','update-option')){
					$action.='<a class="mx-1 my-1 btn btn-warning btn-edit" id="edit" data-id="'.$option->id.'" data-toggle="tooltip" data-placement="bottom" style="width: 40px" title="Sửa"><i class="fa fa-edit text-white"></i></a>';
				}
				if (Gate::allows('permission','delete-option')){
					$action.='<a class="mx-1 my-1 btn btn-danger btn-delete" id="delete" data-id="'.$option->id.'" data-toggle="tooltip" data-placement="bottom" style="width: 40px" title="Xóa"><i class="fa fa-trash text-white"></i></a>';
				}
				return $action;
			})
			->rawColumns(['action'])
			->make(true);
		}else{
			return redirect()->route('404');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\optionRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(OptionRequest $request)
	{
		if (Gate::allows('permission','add-option')){
			$option= new Option();
			$option->name=$request->name;
			$option->category_id=$request->category_id;
			$option->value=$request->value;
			$option->parent_id=$request->parent_id;
			$option->save();
			return response()->json(['message' => true]);
		}else{
			return redirect()->route('404');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function getDetail($id)
	{
		if (Gate::allows('permission','update-option')){
			$option=Option::find($id);
			return response()->json(['option' => $option]);
		}else{
			return redirect()->route('404');
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(OptionRequest $request, $id)
	{
		if (Gate::allows('permission','update-option')){
			$option=option::find($id);
			$option->name=$request->name;
			$option->category_id=$request->category_id;
			$option->value=$request->value;
			$option->parent_id=$request->parent_id;
			$option->save();
			return response()->json(['message' => true]);
		}else{
			return redirect()->route('404');
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
		if (Gate::allows('permission','delete-option')){
			Option::find($id)->delete();
			return response()->json(['message'=>'true']);
		}else{
			return redirect()->route('404');
		}
	}
}
