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
            <li class="breadcrumb-item active">Thêm loại</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <h3>THÊM LOẠI</h3>
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
                <form action="{{route('loai.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tên loai:</label>
                        <div class="col-sm-12">
                            <input class="form-control" name="TenLoai" type="text" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tên nhóm:</label>
                        <div class="col-sm-12">
                            <select class="form-control" name="MaNhom" required>
                                @foreach($nhom as $n)
                                    <option value="{{$n->MaNhom}}">{{$n->TenNhom}}</option>
                                @endforeach
                            </select>
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