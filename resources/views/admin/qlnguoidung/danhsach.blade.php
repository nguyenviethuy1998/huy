@extends('admin.layout')
@section('content')

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Admin</a>
            </li>
            <li class="breadcrumb-item active">  Người Dùng</li>
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
                <a href="{{route('users.create')}}" class="btn btn-outline-primary">Thêm</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Mã Người Dùng</th>
                            <th>Họ Tên</th>
                            <th>Địa Chỉ</th>
                            <th>Email</th>
                            <th>Số Điện Thoại</th>
                            <th>Quyền</th>
                            <th>Thao Tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($nguoidung as $nd)
                        <tr>
                            <td>{{$nd->MaND}}</td>
                            <td>{{$nd->HoTen}}</td>
                            <td>{{$nd->DiaChi}}</td>
                            <td>{{$nd->email}}</td>
                            <td>{{$nd->SDT}}</td>
                            <td>{{$nd->Quyen}}</td>
                            <td>
                                <a href="{{route('users.edit',$nd->MaND)}}" class="btn btn-info">Edit</a>
{{--                                <form action="{{route('users.destroy',$nd->MaND)}}" method="post" style="display: inline">--}}
{{--                                    @csrf--}}
{{--                                    @method('delete')--}}
{{--                                    <button type="submit" class="btn btn-danger">Delete</button>--}}
{{--                                </form>--}}
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