<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Policies\CategoryPolicy;
use App\Category;
use App\User;
use App\Permission;
use Datatables;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Auth;

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
        $per=Permission::find(3);
        $user=Auth::user();
        dd($user->permissions);
        return view('admin.categories.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getData()
    {
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

            return 
            '<a class="btn btn-warning btn-edit" id="edit" data-id="'.$category->id.'" data-toggle="tooltip" data-placement="bottom" title="Xem hoặc sửa"><i class="fa fa-edit text-white"></i></a>
            <a class="btn btn-danger btn-delete" id="delete" data-id="'.$category->id.'" data-toggle="tooltip" data-placement="bottom" title="Xóa"><i class="fa fa-trash text-white"></i></a>';
        })
        ->rawColumns(['action','image'])
        ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category= new Category();
        $category->name=$request->name;
        $category->slug=$request->slug;
        $category->description=$request->description;
        $category->parent_id=$request->parent_id;
        $category->image=$request->image;
        $category->save();
        return response()->json(['message' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDetail($id)
    {
        $category=Category::find($id);
        return response()->json(['category' => $category]);
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
            $category=Category::find($id);
            $category->name=$request->name;
            $category->slug=$request->slug;
            $category->description=$request->description;
            $category->parent_id=$request->parent_id;
            $category->image=$request->image;
            $category->save();
            return response()->json(['message' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();

        return response()->json(['message'=>'true']);
    }
}
