<?php

namespace App\Http\Controllers;

use App\Loaisanpham;
use App\Nhacungcap;
use App\Sanpham;
use Illuminate\Http\Request;

class   SanphamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sanpham = Sanpham::get();
        return view('admin.sanpham.danhsach',compact('sanpham'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loais = Loaisanpham::get();
        $nccs = Nhacungcap::get();
        return view('admin.sanpham.tao',compact(['loais','nccs']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'MaLoai' => 'required',
                'MaNCC' => 'required',
                'TenSP' => 'required|max:255|unique:sanpham',
                'Gia' => 'required',
                'GiaKM' => 'required',
                'GhiChu' => 'required|max:255',
                'SoLuongCon' => 'required',
                'KichThuoc' => 'required',
//                'Anh' => 'required',
                'MoTa' => 'required',
            ],

            [
                'required' => ':attribute Không được để trống',
                'max' => ':attribute Không được lớn hơn :max ký tự',
                'unique' => ':attribute không được trùng nhau',
            ],

            [
                'MaLoai' => 'Mã Loại',
                'MaNCC' => 'Mã Nhà Cung Cấp',
                'TenSP' => 'Tên Sản Phẩm',
                'Gia' => 'Giá',
                'GiaKM' => 'Giá Khuyến Mãi',
                'GhiChu' => 'Ghi Chú',
                'SoLuongCon' => 'Số Lượng Còn',
                'KichThuoc' => 'Kích Thước',
//                'Anh' => 'Ảnh',
                'MoTa' => 'Mô Tả',
            ]

        );
        $sanpham = Sanpham::create($request->all());

        if($request->file('HinhAnh')){
                $path=($request->file('HinhAnh'))->store('Anh');
                $sanpham->update(['Anh' =>$path,]);
        }
        return redirect()->route('sanpham.index')->with('success', 'Thêm sản phẩm thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loais = Loaisanpham::get();
        $nccs = Nhacungcap::get();
        $sanpham = Sanpham::find($id);
        return view('admin.sanpham.sua',compact(['loais','nccs','sanpham']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'MaLoai' => 'required',
                'MaNCC' => 'required',
                'TenSP' => 'required|max:255',
                'Gia' => 'required',
                'GiaKM' => 'required',
                'GhiChu' => 'required|max:255',
                'SoLuongCon' => 'required',
                'KichThuoc' => 'required',
//                'Anh' => 'required',
                'MoTa' => 'required',
            ],

            [
                'required' => ':attribute Không được để trống',
                'max' => ':attribute Không được lớn hơn :max ký tự',
            ],

            [
                'MaLoai' => 'Mã Loại',
                'MaNCC' => 'Mã Nhà Cung Cấp',
                'TenSP' => 'Tên Sản Phẩm',
                'Gia' => 'Giá',
                'GiaKM' => 'Giá Khuyến Mãi',
                'GhiChu' => 'Ghi Chú',
                'SoLuongCon' => 'Số Lượng Còn',
                'KichThuoc' => 'Kích Thước',
//                'Anh' => 'Ảnh',
                'MoTa' => 'Mô Tả',
            ]

        );
        $sanpham = Sanpham::find($id);
        $sanpham->update($request->all());

        if($request->file('HinhAnh')){
            $path=($request->file('HinhAnh'))->store('Anh');
            $sanpham->update(['Anh' =>$path,]);
        }
        return redirect()->route('sanpham.index')->with('success', 'Sửa sản phẩm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sanpham = Sanpham::find($id);
        $sanpham->delete();
        return redirect()->route('sanpham.index')->with('success','Xóa sản phẩm thành công');
    }
}
