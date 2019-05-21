<?php

namespace App\Http\Controllers;

use App\Nhacungcap;
use Illuminate\Http\Request;

class NhacungcapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nccs = Nhacungcap::get();
        return view('admin.nhacungcap.danhsach',compact('nccs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.nhacungcap.tao');
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
                'TenNCC' => 'required|unique:nhacungcap|max:255',
                'DiaChi' => 'required|max:255',
                'SDT' => 'required|max:255',
                'Email' => 'required|max:255',
            ],

            [
                'required' => ':attribute Không được để trống',
                'max' => ':attribute Không được lớn hơn :max ký tự',
                'unique' => ':attribute không được trùng nhau',
            ],

            [
                'TenNCC' => 'Tên nhà cung cấp',
                'DiaChi' => 'Địa chỉ',
                'SDT' => 'Số điện thoại',
                'Email' => 'Email',
            ]

        );
        $ncc = Nhacungcap::create($request->all());
        return redirect()->route('nhacungcap.index')->with('success','Thêm nhà cung cấp thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ncc = Nhacungcap::find($id);
        return view('admin.nhacungcap.sua',compact('ncc'));
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
                'TenNCC' => 'required|unique:nhacungcap|max:255',
                'DiaChi' => 'required|max:255',
                'SDT' => 'required|max:255',
                'Email' => 'required|max:255',
            ],

            [
                'required' => ':attribute Không được để trống',
                'max' => ':attribute Không được lớn hơn :max ký tự',
                'unique' => ':attribute không được trùng nhau',
            ],

            [
                'TenNCC' => 'Tên nhà cung cấp',
                'DiaChi' => 'Địa chỉ',
                'SDT' => 'Số điện thoại',
                'Email' => 'Email',
            ]

        );
        $ncc = Nhacungcap::find($id);
        $ncc->update($request->all());
        return redirect()->route('nhacungcap.index')->with('success','Sửa nhà cung cấp thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ncc = Nhacungcap::find($id);
        $ncc->delete();
        return redirect()->route('nhacungcap.index')->with('success','Xóa nhà cung cấp thành công!');
    }
}
