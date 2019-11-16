<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bill;
use App\User;
use App\Customer;
use App\Product;
use App\BillDetail;
use Auth;
use Cart;
use Mail;
use Illuminate\Support\Facades\Gate;

class BillController extends Controller
{
    public function index()
    {
        if (Gate::allows('permission','list-bill')) {
            return view('admin.bills.index');
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
        if (Gate::allows('permission','list-bill')) {
            $bills=Bill::get();
            return datatables()->of($bills)
            ->addIndexColumn()
            ->editColumn('customer_id', function ($bill) {
                $customer=Customer::find($bill->customer_id);
                return $customer->email;
            })
            ->editColumn('user_id', function ($bill) {
                if(isset($bill->user_id)){
                    $user=Customer::find($bill->user_id);
                    return $customer->email;
                }else{

                    return 'Chưa xác nhận';
                }
            })
            ->editColumn('status', function ($bill) {
                if($bill->status==4){
                    return 'Đã hủy';
                }else if($bill->status==3){
                    return 'Đã Thanh toán';
                }else if($bill->status==2){
                    return 'Đang giao hàng';
                }else if($bill->status==1){
                    return 'Đã Xác nhận';
                }else{
                    return 'Chưa Xác nhận';
                }
            })
            ->addColumn("action", function($bill) {
                $action="";
                if (Gate::allows('permission','confirm-bill')){
                    $action.='<a class="mx-1 my-1 btn btn-edit btn-success" id="edit" data-id="'.$bill->id.'" data-toggle="tooltip" data-placement="bottom" style="width: 40px" title="Xem hoặc xác nhận"><i class="fa fa-edit text-white"></i></a>';
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDetail($id)
    {
        if (Gate::allows('permission','confirm-bill')){
            $bill=Bill::find($id);
            $bill_details=BillDetail::where('bill_code',$bill->code)->get();
            return response()->json(['bill' => $bill,'bill_details' => $bill_details]);
        }else{
            return redirect()->route('404');
        }
    }

    public function confirmBill (Request $request)
    {
        if (Gate::allows('permission','confirm-bill')){
            $bill=Bill::where('code',$request->code)->first();
            if($request->status==2){
                $bill->status=$request->status;
                $bill->time_ship=$request->time_ship;
                $bill->save();
            }else{
                $bill->status=$request->status;
                $bill->save();
            }

            return response()->json(['message' => true]);
        }else{
            return redirect()->route('404');
        }

    }


    public function confirm (Request $request)
    {
      if(!Auth::guard('customer')->check()){
        return view('user.auth.login');//return ra trang login để đăng nhập
    }else {
    	
    	$customer=Auth::guard('customer')->user();
    	//dd($customer->email);
    	$code='HD_'.$customer->id.'_'.time();
    	$bill= new Bill();
    	$bill->to_name=$request->name;
    	$bill->to_address=$request->address;
    	$bill->to_mobile=$request->mobile;
    	$bill->note=$request->note;
    	$bill->customer_id=$customer->id;
    	$bill->total=Cart::total(0, 0, 0);
    	$bill->code=$code;
    	$bill->status=0;
    	$bill->save();

    	foreach (Cart::content() as $detail) {
    		$bill_detail= new BillDetail();
    		$bill_detail->bill_code=$code;
    		$bill_detail->product_code=$detail->id;
    		$bill_detail->amount_buy=$detail->qty;
    		$bill_detail->price=$detail->price;
    		$bill_detail->save();
    		
    	}

    	Mail::send('mail.checkout', array('bill_details'=>Cart::content(),'total'=>Cart::total()), function($message){
    		$message->to(Auth::guard('customer')->user()->email, 'customer')->subject('Hóa đơn');
    	});
    	Cart::destroy();
    	return redirect()->route('home');


    }
}
}
