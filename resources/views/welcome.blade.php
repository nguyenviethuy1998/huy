@extends('layouts.master')
@section('content')
<main class="site-main">

    <!-- ================ trending product section start ================= -->
    <section class="section-margin calc-60px">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>Mặt hàng phổ biến</p>
                <h2>Xu hướng  <span class="section-intro__style">sản phẩm</span></h2>
            </div>
            <div class="row">
                @foreach($sanpham as $sp)
                    <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card text-center card-product">
                        <div class="card-product__img">
                            <img class="card-img" src="{{asset('storage/'.$sp->Anh)}}" alt="{{$sp->TenSP}}">
                            <ul class="card-product__imgOverlay">
                                <li>
                                    <form action="{{route('productDetail',$sp->MaSP)}}" method="get">
                                        <button><i class="ti-search"></i></button>
                                    </form>
                                </li>
                                <li>
                                    @if($sp->SoLuongCon > 0)
                                        <form method="GET" action="{{route('cart')}}">
                                            <input type="hidden" name="MaSP" value="{{$sp->MaSP}}">
                                            <input type="hidden" name="SoLuong" value="1">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit"><i class="ti-shopping-cart"></i></button>
                                        </form>
                                    @endif

                                </li>
                                <li><button><i class="ti-heart"></i></button></li>
                            </ul>
                        </div>
                        <div class="card-body">
{{--                            <p>Accessories</p>--}}
                            <h4 class="card-product__title"><a href="single-product.html">{{$sp->TenSP}}</a></h4>
                            <p class="card-product__price  pr-1" style="display: inline-table">{{number_format($sp->GiaKM)}} <small>VND</small></p>
                            <del class="card-product__price">{{number_format($sp->Gia)}} <small>VND</small></del>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ================ trending product section end ================= -->


    <!-- ================ offer section start ================= -->
{{--    <section class="offer" id="parallax-1" data-anchor-target="#parallax-1" data-300-top="background-position: 20px 30px" data-top-bottom="background-position: 0 20px">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-xl-5">--}}
{{--                    <div class="offer__content text-center">--}}
{{--                        <h3>Up To 50% Off</h3>--}}
{{--                        <h4>Winter Sale</h4>--}}
{{--                        <p>Him she'd let them sixth saw light</p>--}}
{{--                        <a class="button button--active mt-3 mt-xl-4" href="#">Shop Now</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- ================ offer section end ================= -->

    <!-- ================ Best Selling item  carousel ================= -->
    <section class="section-margin calc-60px">
        <div class="container">
            <div class="section-intro pb-60px">
                <p>Mặt hàng phổ biến</p>
                <h2>Hàng <span class="section-intro__style">Bán Chạy</span></h2>
            </div>
            <div class="owl-carousel owl-theme" id="bestSellerCarousel">
                @foreach($sanpham as $sp)
                <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="img-fluid" src="{{asset('storage/'.$sp->Anh)}}" alt="{{$sp->TenSP}}">
                        <ul class="card-product__imgOverlay">
                            <li>
                                <form action="{{route('productDetail',$sp->MaSP)}}" method="get">
                                    <button><i class="ti-search"></i></button>
                                </form>
                            </li>
                            <li>
                                @if($sp->SoLuongCon > 0)
                                    <form method="GET" action="{{route('cart')}}">
                                        <input type="hidden" name="MaSP" value="{{$sp->MaSP}}">
                                        <input type="hidden" name="SoLuong" value="1">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit"><i class="ti-shopping-cart"></i></button>
                                    </form>
                                @endif

                            </li>
                            <li><button><i class="ti-heart"></i></button></li>
                        </ul>
                    </div>
                    <div class="card-body">
{{--                        <p>Accessories</p>--}}
                        <h4 class="card-product__title"><a href="single-product.html">{{$sp->TenSP}}</a></h4>
                        <p class="card-product__price" style="display: inline-table">{{number_format($sp->GiaKM)}} <small>VND</small></p>
                        <del class="card-product__price pr-1">{{number_format($sp->Gia)}} <small>VND</small></del>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ================ Best Selling item  carousel end ================= -->

    <!-- ================ Subscribe section start ================= -->
{{--    <section class="subscribe-position">--}}
{{--        <div class="container">--}}
{{--            <div class="subscribe text-center">--}}
{{--                <h3 class="subscribe__title">Get Update From Anywhere</h3>--}}
{{--                <p>Bearing Void gathering light light his eavening unto dont afraid</p>--}}
{{--                <div id="mc_embed_signup">--}}
{{--                    <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe-form form-inline mt-5 pt-1">--}}
{{--                        <div class="form-group ml-sm-auto">--}}
{{--                            <input class="form-control mb-1" type="email" name="EMAIL" placeholder="Enter your email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '" >--}}
{{--                            <div class="info"></div>--}}
{{--                        </div>--}}
{{--                        <button class="button button-subscribe mr-auto mb-1" type="submit">Subscribe Now</button>--}}
{{--                        <div style="position: absolute; left: -5000px;">--}}
{{--                            <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">--}}
{{--                        </div>--}}

{{--                    </form>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- ================ Subscribe section end ================= -->



</main>
@endsection