@extends('admin.layout')
@section('content')

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Admin</a>
            </li>
            <li class="breadcrumb-item active">Đơn đặt hàng</li>
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
                Danh sách đơn đặt hàng
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Mã DDH</th>
                            <th>Tên người nhận</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Ngày đặt</th>
                            <th>Ngày giao</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($dondathang as $ddh)
                            <tr>
                                <td>{{$ddh->MaDDH}}</td>
                                <td>{{$ddh->TenNN}}</td>
                                <td>{{$ddh->DiaChiNN}}</td>
                                <td>{{$ddh->SDTNN}}</td>
                                <td>{{$ddh->NgayDat}}</td>
                                <td>{{$ddh->NgayGiao}}</td>
                                <td>
                                    @if($ddh->TrangThai == \App\Dondathang::CHUAXULY)
                                        Chưa xử lý
                                    @elseif($ddh->TrangThai == \App\Dondathang::DAXULY)
                                        Đã xử lý
                                    @elseif($ddh->TrangThai == \App\Dondathang::HOANLAI)
                                        Hoàn lại
                                    @elseif($ddh->TrangThai == \App\Dondathang::HOANTHANH)
                                        Hoàn thành
                                    @elseif($ddh->TrangThai == \App\Dondathang::HUYBO)
                                        Hủy bỏ
                                    @elseif($ddh->TrangThai == \App\Dondathang::VANCHUYEN)
                                        Vận chuyển
                                    @endif
                                </td>
                                <td>
                                    <form action="{{route('dondathang.xuatdondathang',$ddh->MaDDH)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-outline-primary">Xuất đơn</button>
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