@extends('admin.layout')
@section('content')

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Admin</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('loai.index')}}">Loại</a>
            </li>
            <li class="breadcrumb-item active">Sửa</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <h3>SỬA LOẠI</h3>
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
                <form action="{{route('loai.update',$loai->MaLoai)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tên loại:</label>
                        <div class="col-sm-12">
                            <input class="form-control" name="TenLoai" type="text" value="{{$loai->TenLoai}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tên nhóm:</label>
                        <div class="col-sm-12">
                            <select class="form-control" name="MaNhom" required>
                                @foreach($nhom as $n)
                                    <option value="{{$n->MaNhom}}"
                                            @if(old($n->MaNhom, isset($loai) ? $loai->MaNhom : '') == $n->MaNhom)
                                            selected="selected"
                                            @endif
                                    >{{$n->TenNhom}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row justify-content-sm-center">
                        <button type="submit" class="btn btn-primary" >Sửa</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection