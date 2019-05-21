<?php

namespace App\Http\Controllers;

use App\Nhomsanpham;
use Illuminate\Http\Request;

class NhomsanphamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nhom = Nhomsanpham::get();
        return view('admin.nhomsanpham.danhsach',compact('nhom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.nhomsanpham.tao');
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
                'TenNhom' => 'required|unique:nhomsanpham|max:255',
            ],

            [
                'required' => ':attribute Không được để trống',
                'max' => ':attribute Không được lớn hơn :max ký tự',
                'unique' => ':attribute không được trùng nhau',
            ],

            [
                'TenNhom' => 'Tên nhóm',
            ]

        );
        $nhom = Nhomsanpham::create($request->all());
        return redirect()->route('nhom.index')->with('success','Thêm sản phẩm thành công!');
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
    public function edit($nhom)
    {
        $nhom = Nhomsanpham::find($nhom);
        return view('admin.nhomsanpham.sua',compact('nhom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nhom)
    {
        $this->validate($request,
            [
                'TenNhom' => 'required|unique:nhomsanpham|max:255',
            ],

            [
                'required' => ':attribute Không được để trống',
                'max' => ':attribute Không được lớn hơn :max ký tự',
                'unique' => ':attribute không được trùng nhau',
            ],

            [
                'TenNhom' => 'Tên nhóm',
            ]

        );
        $nhom = Nhomsanpham::find($nhom);
        $nhom->update($request->all());
        return redirect()->route('nhom.index')->with('success','Sửa sản phẩm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nhom)
    {
        $nhom = Nhomsanpham::find($nhom);
        $nhom->delete();
        return redirect()->route('nhom.index')->with('success','Xóa thành công!');
    }
}
