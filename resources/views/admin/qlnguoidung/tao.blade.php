@extends('admin.layout')
@section('content')

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Admin</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('users.index')}}">Người Dùng</a>
            </li>
            <li class="breadcrumb-item active">Thêm Người Dùng</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <h3>THÊM NGƯỜI DÙNG</h3>
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
                <form action="{{route('users.store')}}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <label class="col-sm-2 control-label">Họ Tên:</label>
                            <div class="col-sm-12">
                                <input class="form-control" name="HoTen" type="text" required>
                            </div>
                        </div>
                        <div class="col">
                            <label class="col-sm-2 control-label">Địa Chỉ:</label>
                            <div class="col-sm-12">
                                <input class="form-control" name="DiaChi" type="text" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label class="col-sm-2 control-label">Email:</label>
                            <div class="col-sm-12">
                                <input class="form-control" name="email" type="email" required>
                            </div>
                        </div>
                        <div class="col">
                            <label class="col-sm-3 control-label">Số Điện Thoại:</label>
                            <div class="col-sm-12">
                                <input class="form-control" name="SDT" type="text" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label class="col-sm-4 control-label">Mật Khẩu:</label>
                            <div class="col-sm-12">
                                <input class="form-control" name="password" type="password" required>
                            </div>
                        </div>
                        <div class="col">
                            <label class="col-sm-2 control-label">Quyền:</label>
                            <div class="col-sm-12">
                                <select name="Quyen" id="" class="form-control" required>
                                    <option value="1">Admin</option>
                                    <option value="2">Khách hàng</option>
                                    <option value="3">Kho</option>
                                    <option value="4">quanly</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row justify-content-sm-center" style="margin-top: 1em;">
                        <button type="submit" class="btn btn-primary" >Thêm</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection