@extends('layouts.master')
@section('content')
<!--================Checkout Area =================-->
<section class="checkout_area section-margin--small">
    <div class="container">
        <div class="billing_details">
            <form action="{{route('cart.pay')}}" method="post">
                @csrf

                <div class="row">
                    <div class="col-lg-8">
                        <h3>Thông tin thanh toán</h3>
                        <form class="row contact_form" action="#" method="post" novalidate="novalidate">
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" placeholder="Họ người nhận" id="first" name="Ho">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" placeholder="Tên người nhận" id="last" name="Ten">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" placeholder="Địa chỉ người nhận" id="company" name="DiaChi">
                            </div>
    {{--                        <div class="col-md-6 form-group p_star">--}}
    {{--                            <input type="text" class="form-control" id="number" name="number">--}}
    {{--                            <span class="placeholder" data-placeholder="Phone number"></span>--}}
    {{--                        </div>--}}
    {{--                        <div class="col-md-6 form-group p_star">--}}
    {{--                            <input type="text" class="form-control" id="email" name="compemailany">--}}
    {{--                            <span class="placeholder" data-placeholder="Email Address"></span>--}}
    {{--                        </div>--}}
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" placeholder="Số điện thoại người nhận" id="add1" name="SDT">
                            </div>
    {{--                        <div class="col-md-12 form-group">--}}
    {{--                            <div class="creat_account">--}}
    {{--                                <input type="checkbox" id="f-option2" name="selector">--}}
    {{--                                <label for="f-option2">Create an account?</label>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
                            <div class="col-md-12 form-group mb-0">
                                <div class="creat_account">
                                    <h3>Thông tin giao hàng</h3>
                                    <input type="checkbox" id="f-option3" name="selector">
                                    <label for="f-option3">Ship to a different address?</label>
                                </div>
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Đơn Hàng</h2>
                            <ul class="list">
                                <li><a href="#"><h4>Sản phẩm <span>Tổng tiền</span></h4></a></li>
                                @if(count($cart))
                                    @foreach($cart as $item)
                                        <?php
                                        $sanpham= App\Sanpham::find($item->id);
                                        ?>
                                <li><a href="#">{{$sanpham->TenSP}} <span class="middle">x {{$item->qty}}</span> <span class="last">{{ number_format($item->subtotal,0, '', '.')}}₫</span></a></li>
                                    @endforeach
                                @else
                                    <p>You have no items in the shopping cart</p>
                                @endif
                            </ul>
                            <ul class="list list_2">
                                <li><a href="#">Tổng tiền đơn hàng <span>{{Cart::subtotal()}}₫</span></a></li>
                                <li><a href="#">Shipping <span>Flat rate: $50.00</span></a></li>
                                <li><a href="#">Tổng tiền phải trả <span>{{Cart::subtotal()}}₫</span></a></li>
                            </ul>
                            <div class="payment_item">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option5" name="selector">
                                    <label for="f-option5">Thanh toán trực tiếp</label>
                                    <div class="check"></div>
                                </div>
                                <p>Thanh toán sau khi giao hàng.</p>
                            </div>
                            <div class="payment_item active">
                                <div class="radion_btn">
                                    <input type="radio" id="f-option6" name="selector">
                                    <label for="f-option6">Paypal </label>
                                    <img src="img/product/card.jpg" alt="">
                                    <div class="check"></div>
                                </div>
                                <p>Thanh toán qua PayPal; bạn có thể thanh toán bằng thẻ tín dụng nếu bạn không có tài khoản PayPal.</p>
                            </div>
                            <div class="creat_account">
                                <input type="checkbox" id="f-option4" name="selector">
                                <label for="f-option4">Tôi đã đọc và chấp nhận </label>
                                <a href="#">Điều khoản và điều kiện*</a>
                            </div>
                            <div class="text-center">
                                <button class="button button-paypal">Đặt mua</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!--================End Checkout Area =================-->
@endsection