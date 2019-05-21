<?php

namespace App\Http\Controllers;

use App\Loaisanpham;
use App\Nhomsanpham;
use Illuminate\Http\Request;

class LoaisanphamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loai = Loaisanpham::get();
        return view('admin.loaisanpham.danhsach',compact('loai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nhom = Nhomsanpham::get();
        return view('admin.loaisanpham.tao',compact('nhom'));
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
                'TenLoai' => 'required|unique:loaisanpham|max:255',
                'MaNhom' => 'required',
            ],

            [
                'required' => ':attribute Không được để trống',
                'max' => ':attribute Không được lớn hơn :max ký tự',
                'unique' => ':attribute không được trùng nhau',
            ],

            [
                'TenLoai' => 'Tên nhóm',
                'MaNhom' => 'Mã nhóm',
            ]

        );
        $loai = Loaisanpham::create($request->all());
        return redirect()->route('loai.index')->with('success','Thêm loại sản phẩm thành công!');
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
        $nhom = Nhomsanpham::get();
        $loai = Loaisanpham::find($id);
        return view('admin.loaisanpham.sua',compact(['nhom','loai']));
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
                'TenLoai' => 'required|unique:loaisanpham|max:255',
                'MaNhom' => 'required',
            ],

            [
                'required' => ':attribute Không được để trống',
                'max' => ':attribute Không được lớn hơn :max ký tự',
                'unique' => ':attribute không được trùng nhau',
            ],

            [
                'TenLoai' => 'Tên nhóm',
                'MaNhom' => 'Mã nhóm',
            ]

        );
        $loai = Loaisanpham::find($id);
        $loai->update($request->all());
        return redirect()->route('loai.index')->with('success','Sửa loại sản phẩm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loai = Loaisanpham::find($id);
        $loai->delete();
        return redirect()->route('loai.index')->with('success','Xóa loại sản phẩm thành công!');
    }
}
