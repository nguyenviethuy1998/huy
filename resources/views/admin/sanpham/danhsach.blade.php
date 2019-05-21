@extends('admin.layout')
@section('content')

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Admin</a>
            </li>
            <li class="breadcrumb-item active"> Sản phẩm</li>
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
                <a href="{{route('sanpham.create')}}" class="btn btn-outline-primary">Thêm</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Mã sản phẩm</th>
                            <th>Ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Loại</th>
                            <th>Nhà cung cấp</th>
                            <th>Giá</th>
                            <th>Giá khuyến mãi</th>
                            <th>Ghi chú</th>
                            <th>Số lượng còn</th>
                            <th>Kích thước</th>
                            <th>Thao tác</th>
                        </thead>
                        <tbody>
                        @foreach($sanpham as $sp)
                        <tr>
                            <td>{{$sp->MaSP}}</td>
                            <td><img src="{{asset('storage/'.$sp->Anh)}}" alt="{{$sp->TenSP}}" width="80"></td>
                            <td>{{$sp->TenSP}}</td>
                            <td>{{$sp->loaisanpham->TenLoai}}</td>
                            <td>{{$sp->nhacungcap->TenNCC}}</td>
                            <td>{{$sp->Gia}}</td>
                            <td>{{$sp->GiaKM}}</td>
                            <td>{{$sp->GhiChu}}</td>
                            <td>{{$sp->SoLuongCon}}</td>
                            <td>{{$sp->KichThuoc}}</td>
                            <td>
                                <a href="{{route('sanpham.edit',$sp->MaSP)}}" class="btn btn-info">Edit</a>
                                <form action="{{route('sanpham.destroy',$sp->MaSP)}}" method="post" style="display: inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
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