@extends('admin.layout')
@section('content')

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Admin</a>
            </li>
            <li class="breadcrumb-item active">Loại sản phẩm</li>
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
                <a href="{{route('loai.create')}}" class="btn btn-outline-primary">Thêm</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Mã loại</th>
                            <th>Tên loại</th>
                            <th>Tên nhóm</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($loai as $l)
                        <tr>
                            <td>{{$l->MaLoai}}</td>
                            <td>{{$l->TenLoai}}</td>
                            <td>{{$l->nhomsanpham->TenNhom}}</td>
                            <td>
                                <a href="{{route('loai.edit',$l->MaLoai)}}" class="btn btn-info">Edit</a>
                                <form action="{{route('loai.destroy',$l->MaLoai)}}" method="post" style="display: inline">
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