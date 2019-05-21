@extends('admin.layout')
@section('content')

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Admin</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('nhom.index')}}">Nhóm</a>
            </li>
            <li class="breadcrumb-item active">Thêm nhóm</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <h3>THÊM NHÓM</h3>
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
                <form action="{{route('nhom.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tên nhóm:</label>
                        <div class="col-sm-12">
                            <input class="form-control" name="TenNhom" type="text" required>
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