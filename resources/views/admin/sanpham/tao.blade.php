@extends('admin.layout')
@section('content')

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Admin</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('sanpham.index')}}">Sản Phẩm</a>
            </li>
            <li class="breadcrumb-item active">Thêm Sản Phẩm</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <h3>THÊM SẢN PHẨM</h3>
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
                <form action="{{route('sanpham.store')}}" enctype="multipart/form-data"  method="post">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Loại:</label>
                        <div class="col-sm-12">
                            <select name="MaLoai" class="form-control" required>
                                @foreach($loais as $loai)
                                <option value="{{$loai->MaLoai}}">{{$loai->TenLoai}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Nhà Cung Cấp:</label>
                        <div class="col-sm-12">
                            <select name="MaNCC" class="form-control" required>
                                @foreach($nccs as $ncc)
                                    <option value="{{$ncc->MaNCC}}">{{$ncc->TenNCC}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tên Sản Phẩm:</label>
                        <div class="col-sm-12">
                            <input class="form-control" name="TenSP" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Giá:</label>
                        <div class="col-sm-12">
                            <input class="form-control" name="Gia" type="number" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Giá Khuyến Mãi:</label>
                        <div class="col-sm-12">
                            <input class="form-control" name="GiaKM" type="number" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Ghi Chú:</label>
                        <div class="col-sm-12">
                            <input class="form-control" name="GhiChu" type="text" required>
                        </div>
                    </div>

                            <input class="form-control" name="SoLuongCon" value="0" type="hidden" required>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Kích Thước:</label>
                        <div class="col-sm-12">
                            <input class="form-control" name="KichThuoc" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Ảnh:</label>
                        <div class="col-sm-12">
                            <input class="form-control" name="HinhAnh" type="file" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Mô Tả:</label>
                        <div class="col-sm-12">
                            <textarea name="MoTa" class="form-control" cols="30" required rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group row justify-content-sm-center">
                        <button type="submit" class="btn btn-primary" >Thêm</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection