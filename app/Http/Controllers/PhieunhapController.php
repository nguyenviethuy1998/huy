<?php

namespace App\Http\Controllers;

use App\Phieunhap;
use App\Sanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhieunhapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sanphams = Sanpham::get();
        return view('admin.phieunhap.danhsach',compact('sanphams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
                'soluongnhap' => 'required|min:1',
                'GiaNhap' => 'required|max:'.(int)Sanpham::find($request->MaSP)->GiaKM.'',
            ],

            [
                'required' => ':attribute Không được để trống',
                'max' => ':attribute Không được lớn hơn :max ',
                'min' => ':attribute không được bé hơn :min',
            ],

            [
                'soluongnhap' => 'Số lượng nhập',
                'GiaNhap' => 'Giá nhập',
            ]

        );
        $phieunhap = new Phieunhap();
        $phieunhap->MaSP = $request->MaSP;
        $phieunhap->NgayNhap = date('Y-m-d');
        $phieunhap->SoLuong = $request->soluongnhap;
        $phieunhap->GiaNhap = $request->GiaNhap;
        $phieunhap->ThanhTien = $request->GiaNhap * $request->soluongnhap;
        $phieunhap->MaND = Auth::user()->MaND;
        $phieunhap->save();
        $sanpham = Sanpham::find($phieunhap->MaSP);
        $sanpham->update([
            'SoLuongCon' => $sanpham->SoLuongCon + $phieunhap->SoLuong
        ]);
        return redirect()->route('phieunhap.index')->with('success','Nhập kho thành công sản phẩm '.$sanpham->TenSP.'!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
