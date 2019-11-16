@extends('user.layouts.master')




@section('content')
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <form method="post" action="{{ route('confirm') }}">
                @csrf
                <div class="col-md-7">
                    <!-- Billing Details -->
                    <div class="billing-details">
                        <div class="section-title">
                            <h3 class="title">Thông tin đơn hàng</h3>
                        </div>
                        <label>Họ và tên</label>
                        <div class="form-group">
                            <input class="input" type="text" name="name" placeholder="Họ và tên">
                        </div>
                        <label>Địa chỉ</label>
                        <div class="form-group">
                            <input class="input" type="text" name="address" placeholder="Địa chỉ">
                        </div>
                        <label>Số điện thoại</label>
                        <div class="form-group">
                            <input class="input" type="tel" name="mobile" placeholder="Số điện thoại">
                        </div>

                    </div>
                    <!-- /Billing Details -->

                    <!-- Order notes -->
                    <label>Ghi chú</label>
                    <div class="order-notes">
                        <textarea class="input" name="note" placeholder="Ghi chú"></textarea>
                    </div>
                    <!-- /Order notes -->
                </div>

                <!-- Order Details -->
                <div class="col-md-5 order-details">
                    <div class="section-title text-center">
                        <h3 class="title">Đơn hàng của bạn</h3>
                    </div>
                    <div class="order-summary">
                        <div class="order-col">
                            <div><strong>Sản phẩm</strong></div>
                            <div><strong>Tổng</strong></div>
                        </div>
                        <div class="order-products">
                            @foreach(Cart::content() as $product)
                            <div class="order-col">
                                <div>{{ $product->qty }}x {{ $product->name }}</div>
                                <div>{{ number_format($product->price) }}</div>
                            </div>
                            @endforeach

                        </div>
                        <div class="order-col">
                            <div>Vận chuyển</div>
                            <div><strong>FREE</strong></div>
                        </div>
                        <div class="order-col">
                            <div><strong>Tổng</strong></div>
                            <div><strong class="order-total">{{ Cart::total() }}VNĐ</strong></div>
                        </div>
                    </div>
                    <div class="input-checkbox">
                        <input type="checkbox" id="terms" name="terms">
                        <label for="terms">
                            <span></span>
                            Tôi đồng ý với các <a href="javascrip:;">điều khoản & chính sách</a>
                        </label>
                    </div>
                    <button type="submit" class="primary-btn order-submit">Xác nhận</button>
                </div>
                <!-- /Order Details -->
            </form>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
@endsection