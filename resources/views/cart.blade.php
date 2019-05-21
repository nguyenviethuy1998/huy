@extends('layouts.master')
@section('content')
<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Tổng tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($cart))
                        @foreach($cart as $item)
                            <?php
                            $sanpham= App\Sanpham::find($item->id);
                            ?>
                    <tr>
                        <td>
                            <div class="media">
                                <div class="d-flex">
                                    <img src="{{asset('storage/'.$sanpham->Anh)}}" style="width: auto; height: 3em" alt="">
                                </div>
                                <div class="media-body">
                                    <p>{{$sanpham->TenSP}}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <h5>{{number_format($sanpham->GiaKM,0,'','.')}}</h5>
                        </td>
                        <td>
                            <div class="cart_quantity">
                                <div class="btn-group">
                                    <a class="cart_quantity_up" href='{{url("cart?product_id=$item->id&increment=1")}}'>
                                        <button type="button" class="btn action">+</button>
                                    </a>

                                    <input class="cart_quantity_input text-center" type="text" name="quantity" value="{{$item->qty}}" autocomplete="off" size="2">

                                    <a class="cart_quantity_down" href='{{url("cart?product_id=$item->id&decrease=1")}}'>
                                        <button type="button" class="btn action">-</button>
                                    </a>

                                </div>
                            </div>
                        </td>
                        <td>
                            <h5>{{ number_format($item->subtotal,0, '', '.')}}₫</h5>
                        </td>
                    </tr>
                            @endforeach
                    @else
                        <tr><td colspan="7">You have no items in the shopping cart</td></tr>
                    @endif


                    <tr class="bottom_button">
                        <td>
                            <a class="button" href="{{route('cart.destroy')}}">Xóa giỏ hàng</a>
                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>
                            <h5>Tổng tiền đơn hàng</h5>
                        </td>
                        <td>
                            <h5>{{Cart::subtotal()}}₫</h5>
                        </td>
                    </tr>
                    
                    <tr class="out_button_area">
                        <td class="d-none-l">

                        </td>
                        <td class="">

                        </td>
                        <td>

                        </td>
                        <td>
                            <div class="checkout_btn_inner d-flex align-items-center">
                                <a class="gray_btn" href="{{route('trangchu')}}">Tiếp tục mua</a>
                                <a class="primary-btn ml-2" href="{{route('cart.order')}}">Tiến hành đặt hàng</a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->
@endsection