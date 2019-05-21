@extends('layouts.master')
@section('content')
<!-- ================ category section start ================= -->
<section class="section-margin--small mb-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                <div class="sidebar-categories">
                    <div class="head">Nhóm sản phẩm</div>
                    <ul class="main-categories">
                        <li class="common-filter">
                            <form action="#">
                                <ul>
                                    @foreach($nhomsp as $n)
                                    <li class="filter-list"><a href="{{route('xemtheonhom',$n->MaNhom)}}"><label for="men">{{$n->TenNhom}}<span> ({{count($n->loaisanphams)}})</span></label></a></li>
                                    @endforeach
                                </ul>
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="sidebar-filter">
                    <div class="top-filter-head">Product Filters</div>
                    <div class="common-filter">
                        <div class="head">Brands</div>
                        <form action="#">
                            <ul>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="apple" name="brand"><label for="apple">Apple<span>(29)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="asus" name="brand"><label for="asus">Asus<span>(29)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="gionee" name="brand"><label for="gionee">Gionee<span>(19)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="micromax" name="brand"><label for="micromax">Micromax<span>(19)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="samsung" name="brand"><label for="samsung">Samsung<span>(19)</span></label></li>
                            </ul>
                        </form>
                    </div>
                    <div class="common-filter">
                        <div class="head">Color</div>
                        <form action="#">
                            <ul>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="black" name="color"><label for="black">Black<span>(29)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="balckleather" name="color"><label for="balckleather">Black
                                        Leather<span>(29)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="blackred" name="color"><label for="blackred">Black
                                        with red<span>(19)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="gold" name="color"><label for="gold">Gold<span>(19)</span></label></li>
                                <li class="filter-list"><input class="pixel-radio" type="radio" id="spacegrey" name="color"><label for="spacegrey">Spacegrey<span>(19)</span></label></li>
                            </ul>
                        </form>
                    </div>
                    <div class="common-filter">
                        <div class="head">Price</div>
                        <div class="price-range-area">
                            <div id="price-range"></div>
                            <div class="value-wrapper d-flex">
                                <div class="price">Price:</div>
                                <span>$</span>
                                <div id="lower-value"></div>
                                <div class="to">to</div>
                                <span>$</span>
                                <div id="upper-value"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <!-- Start Filter Bar -->
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div>
                        @if(isset($loai))
                        <form action="{{route('timkiemsanphamtheoloai',$loai->MaLoai)}}" method="post">
                            @csrf
                            <div class="input-group filter-bar-search">
                                <input type="text" name="key" id="search" placeholder="Tìm trong {{$loai->TenLoai}}">
                                <input type="hidden" name="MaLoai" value="{{$loai->MaLoai}}">
                                <div class="input-group-append">
                                    <button type="submit"><i class="ti-search"></i></button>
                                </div>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
                <!-- End Filter Bar -->
                <!-- Start Best Seller -->
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row">
                        @if(isset($sanphamss))
                            @foreach($sanphamss as $sanphams)
                            @foreach($sanphams as $sp)
                            <div class="col-md-6 col-lg-4" id="demo">
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
                            @endforeach
                        @else
                            @foreach($sanphams as $sp)
                                <div class="col-md-6 col-lg-4" id="demo">
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
                        @endif
                    </div>
                    {{$sanphams->links()}}
                </section>
                <!-- End Best Seller -->
            </div>
        </div>
    </div>
</section>
<!-- ================ category section end ================= -->



@endsection