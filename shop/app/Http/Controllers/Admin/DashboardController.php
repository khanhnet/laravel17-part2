<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Bill;
use App\Customer;

class DashboardController extends Controller
{
    public function index(){
    	$product=Product::count();
    	$products=Product::orderBy('id', 'desc')
                ->take(5)->get();
    	$category=Category::count();
    	$customer=Customer::count();
    	$bill=Bill::count();
    	return view('admin.dashboard')
    	->with('product',$product)
    	->with('products',$products)
    	->with('category',$category)
    	->with('bill',$bill)
    	->with('customer',$customer)
    	;
    }
}
