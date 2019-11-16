<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Product;
use App\Category;
use App\Option;
use App\Image;
use Auth;
use Cart;


class HomeController extends Controller
{


    public function index()
    {
        $product_news=Product::orderBy('id', 'DESC')->where('status',1)->whereNull('deleted_at')->take(10)->get();
        $product_prices=Product::orderBy('price', 'DESC')->whereNull('deleted_at')->take(10)->get();
        return view('user.index')
        ->with('product_news',$product_news)
        ->with('product_prices',$product_prices);
    }

    public function getProductsCategory($slug)
    {
        $category_products=Category::where('slug',$slug)->first();
        $products=Product::where('category_id',$category_products->id)->where('status',1)->whereNull('deleted_at')->paginate(9);
        return view('user.store')
        ->with('category_products',$category_products)
        ->with('products',$products);
    }
    public function getProduct($slug)
    {
        $product=Product::where('slug',$slug)->where('status',1)->whereNull('deleted_at')->first();
        $product_concern=Product::where('category_id',$product->category_id)->where('status',1)->whereNull('deleted_at')->take(4)->get();
        return view('user.product')
        ->with('product',$product)
        ->with('product_concern',$product_concern);
    }

    public function addToCart($code,$name,$amount,$price)
    {
        Cart::add($code, $name, $amount, $price);
        return redirect()->back();
    }
    public function delToCart($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back();
    }

    public function getCheckout()
    {
        if(Auth::guard('customer')->check()){
            return view('user.checkout');
        }else {
            return redirect()->route('getLoginCustomer')->with('require-login', 'Bạn phải đăng nhập trước !');

        }
        
    }
}
