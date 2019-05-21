<style>

</style>
<!--================ Start Header Menu Area =================-->
<header class="header">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo_h" href="{{route('trangchu')}}"><img src="{{asset('pages/img/logo.png')}}" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                        <li class="nav-item"><a class="nav-link item" href="{{route('trangchu')}}" style="color: black;margin-right: 2em;">Trang Chủ</a></li>
                        <li class="nav-item "><a class="nav-link item" href="index.html" style="color: black;margin-right: 2em">Giới Thiệu</a></li>
                        <li class="nav-item "><a class="nav-link item" href="index.html" style="color: black;margin-right: 2em">Hướng Dẫn</a></li>
                        <li class="nav-item"><a class="nav-link item" href="contact.html" style="color: black;margin-left: 2em">Liên Hệ</a></li>
                    </ul>

                    <ul class="nav-shop">
                        <li class="nav-item"><button><i class="ti-search"></i></button></li>
                        <li class="nav-item"><a href="{{route('cart.view')}}"><button><i class="ti-shopping-cart"></i><span class="nav-shop__circle">{{Cart::content()->count()}}</span></button> </a></li>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item"><a class="button button-header" href="{{route('login')}}">Đăng nhập</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="button button-header dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->HoTen }}</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item button button-header" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <hr>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                    <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                        @foreach($nhomsp as $n)
                            @if($n->loaisanphams)
                                <li class="nav-item submenu dropdown">
                                    <a href="{{route('xemtheonhom',$n->MaNhom)}}" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                       aria-expanded="false" style="font-size: 18px; color: navy;margin-right: 2em">{{$n->TenNhom}}</a>
                                    <ul class="dropdown-menu">
                                        @foreach($n->loaisanphams as $l)
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('xemtheoloai',$l->MaLoai)}}" style="color: black;font-size: 16px;">{{$l->TenLoai}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================ End Header Menu Area =================-->

<!--================ Hero banner start =================-->
<section class="slide">
    <div class="container">
        <div id="demo" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                @foreach(\App\Slide::get() as $key => $slide)
                    <div class="carousel-item
                    @if($key == 0)
                            active
@endif
                            ">
                        <img src="{{asset('storage/'.$slide->Anh)}}" alt="">
                    </div>
                @endforeach
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>

        </div>
    </div>
</section>
<!--================ Hero banner start =================-->
