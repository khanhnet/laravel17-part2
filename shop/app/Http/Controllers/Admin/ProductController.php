<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Datatables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Product;
use App\Category;
use App\User;
use App\Image;

class ProductController extends Controller
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
		if (Gate::allows('permission','list-product')) {
			return view('admin.products.index');
		}else{
			return redirect()->route('404');
		}
	}

	 /**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	 public function getData()
	 {
		if (Gate::allows('permission','list-product')) {
			$products=Product::get();
			return datatables()->of($products)
			->addIndexColumn()
			->editColumn('category', function ($product) {
				return $product->category->name;

			})
			->editColumn('user', function ($product) {
				return $product->user->name;

			})
			->addColumn("action", function($product) {
				$action="";
				if (Gate::allows('permission','detail-product')) {
					$action.='<a class="mx-1 my-1 btn btn-success" id="detail" style="width: 40px" data-id="'.$product->id.'"><i class="fa fa-eye text-white"></i></a>';
				}
				if (Gate::allows('permission','update-product')&&Gate::allows('permission','detail-product')){
					$action.='<a class="mx-1 my-1 btn btn-warning btn-edit" id="edit" style="width: 40px" data-id="'.$product->id.'"><i class="fa fa-edit text-white"></i></a>';
				}
				if (Gate::allows('permission','delete-product')){
					$action.='<a class="mx-1 my-1 btn btn-danger btn-delete" id="delete" style="width: 40px" data-id="'.$product->id.'"><i class="fa fa-trash text-white"></i></a>';
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
	 * @param  \Illuminate\Http\ProductRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(ProductRequest $request)
	{
		if (Gate::allows('permission','add-product')){
			$user=Auth::user();
			$code='SP'.time();
			$product= new Product();
			$product->code=$code;
			$product->name=$request->name;
			$product->slug=$request->slug;
			$product->description=$request->description;
			$product->amount=$request->amount;
			$product->price=$request->price;
			$product->category_id=$request->category_id;
			$product->note=$request->note;
			$product->status=$request->status;
			$product->user_id=$user->id;
			$product->save();

			$product_id=Product::where('code',$code)->first();
			$image= new Image();
			$image->product_id=$product_id->id;
			$image->path=$request->image;
			$image->save();
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
		if (Gate::allows('permission','detail-product')){
			$product=Product::find($id);
			return response()->json(['product' => $product]);
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
	public function update(ProductRequest $request, $id)
	{
	 if (Gate::allows('permission','update-product')){
		$user=Auth::user();
		$product=Product::find($id);

		$product->name=$request->name;
		$product->slug=$request->slug;
		$product->description=$request->description;
		$product->amount=$request->amount;
		$product->price=$request->price;
		$product->category_id=$request->category_id;
		$product->note=$request->note;
		$product->status=$request->status;
		$product->user_id=$user->id;
		$product->save();

		if(!empty($request->image)){
		 $image= Image::where('product_id',$product->id)->first();
		 $image->product_id=$product->id;
		 $image->path=$request->image;
		 $image->save();
		}
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
		if (Gate::allows('permission','delete-product')){
			Product::find($id)->delete();

			return response()->json(['message'=>'true']);
		}else{
			return redirect()->route('404');
		}
	}
}
