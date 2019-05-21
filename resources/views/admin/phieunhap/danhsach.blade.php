@extends('admin.layout')
@section('content')

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Admin</a>
            </li>
            <li class="breadcrumb-item active">  Phiếu nhập</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
            @if(session('success'))
                <div class="alert alert-success">
                    <strong>{{session('success')}}</strong>
                </div>
            @endif
                @if(session('error'))
                    <div class="alert alert-success">
                        <strong>{{session('error')}}</strong>
                    </div>
                @endif
            <div class="card-header">
                <a href="{{route('phieunhap.create')}}" class="btn btn-outline-primary">Thêm</a>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Mã sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Giá khuyến mãi</th>
                            <th>Số lượng còn</th>
                            <th>Số lượng nhập</th>
                            <th>Giá nhập</th>
                            <th>Nhập kho</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sanphams as $sanpham)
                        <tr>
                            <td>{{$sanpham->MaSP}}</td>
                            <td><img src="{{asset('storage/'.$sanpham->Anh)}}" alt="{{$sanpham->TenSP}}" width="80"></td>
                            <td>{{$sanpham->TenSP}}</td>
                            <td>{{$sanpham->Gia}}</td>
                            <td>{{$sanpham->GiaKM}}</td>
                            <td>{{$sanpham->SoLuongCon}}</td>
                            <form action="{{route('phieunhap.store')}}" method="post">
                                <td><input type="number" name="soluongnhap" value="1" class="form-control"></td>
                                <td><input type="number" name="GiaNhap" value=""></td>
                                <td>
                                    @csrf
                                    <input type="hidden" name="MaSP" value="{{$sanpham->MaSP}}">
    {{--                            <input type="hidden" name="NgayNhap" value="">--}}
    {{--                            <input type="hidden" name="ThanhTien" value="">--}}
    {{--                            <input type="hidden" name="MaND" value="">--}}
                                    <button type="submit" class="btn btn-outline-primary">Nhập</button>
                                </td>
                            </form>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

    </div>

@endsection