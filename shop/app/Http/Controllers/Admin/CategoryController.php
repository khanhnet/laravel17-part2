<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\User;
use Datatables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
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
		if (Gate::allows('permission','list-category')) {
		return view('admin.categories.index');
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
		if (Gate::allows('permission','list-category')) {
		$categories=Category::get();
		return datatables()->of($categories)
		->addIndexColumn()
		->editColumn('image', function ($category) {
			return '<img src="' . $category->image . '" class="img-avatar-list" style="max-width: 100px">';
		})
		->editColumn('parent_id', function ($category) {
			$category_parent=$category->find($category->parent_id);
			return $category_parent['name'];
		})
		->addColumn("action", function($category) {
			$action="";
			if (Gate::allows('permission','update-category')){
					$action.='<a class="mx-1 my-1 btn btn-warning btn-edit" id="edit" data-id="'.$category->id.'" data-toggle="tooltip" data-placement="bottom" style="width: 40px" title="Xem hoặc sửa"><i class="fa fa-edit text-white"></i></a>';
				}
				if (Gate::allows('permission','delete-category')){
					$action.='<a class="mx-1 my-1 btn btn-danger btn-delete" id="delete" data-id="'.$category->id.'" data-toggle="tooltip" data-placement="bottom" style="width: 40px" title="Xóa"><i class="fa fa-trash text-white"></i></a>';
				}
				return $action;
		})
		->rawColumns(['action','image'])
		->make(true);
	}else{
			return redirect()->route('404');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\CategoryRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(CategoryRequest $request)
	{
		if (Gate::allows('permission','add-category')){
		$category= new Category();
		$category->name=$request->name;
		$category->slug=$request->slug;
		$category->description=$request->description;
		$category->parent_id=$request->parent_id;
		$category->image=$request->image;
		$category->save();
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
		if (Gate::allows('permission','update-category')){
		$category=Category::find($id);
		return response()->json(['category' => $category]);
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
	public function update(CategoryRequest $request, $id)
	{
		 if (Gate::allows('permission','update-category')){
			$category=Category::find($id);
			$category->name=$request->name;
			$category->slug=$request->slug;
			$category->description=$request->description;
			$category->parent_id=$request->parent_id;
			$category->image=$request->image;
			$category->save();
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
		if (Gate::allows('permission','delete-category')){
		Category::find($id)->delete();
		return response()->json(['message'=>'true']);
		}else{
			return redirect()->route('404');
		}
	}
}
