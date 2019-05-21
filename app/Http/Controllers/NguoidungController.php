<?php

namespace App\Http\Controllers;

use App\Nguoidung;
use App\Nhacungcap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NguoidungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nguoidung = Nguoidung::all();
        return view('admin.qlnguoidung.danhsach',compact('nguoidung'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.qlnguoidung.tao');
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
                'HoTen' => 'required|max:255',
                'DiaChi' => 'required|max:255',
                'email' => 'required|unique:nguoidung|max:255',
                'SDT' => 'required|max:10',
                'password' => 'required|min:8',
                'Quyen' => 'required|max:25',
            ],

            [
                'required' => ':attribute Không được để trống',
                'max' => ':attribute Không được lớn hơn :max ký tự',
                'unique' => ':attribute không được trùng nhau',
            ],

            [
                'HoTen' => 'Họ Tên',
                'DiaChi' => 'Địa chỉ',
                'email' => 'Email',
                'SDT' => 'Số điện thoại',
                'password' => 'Mật khẩu',
                'Quyen' => 'Quyền'

            ]

        );
        $nguoidung = Nguoidung::create($request->all());
        $nguoidung->update(['password'=>Hash::make($request->password)]);
        return redirect()->route('users.index')->with('success','Thêm người dùng thành công!');
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
        $nguoidung = Nguoidung::find($id);
        return view('admin.qlnguoidung.sua',compact('nguoidung'));
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
                'HoTen' => 'required|max:255',
                'DiaChi' => 'required|max:255',
                'email' => 'required|max:255',
                'SDT' => 'required|max:10',
                'password' => 'required|min:8',
                'Quyen' => 'required|max:25',
            ],

            [
                'required' => ':attribute Không được để trống',
                'max' => ':attribute Không được lớn hơn :max ký tự',
                'unique' => ':attribute không được trùng nhau',
            ],

            [
                'HoTen' => 'Họ Tên',
                'DiaChi' => 'Địa chỉ',
                'email' => 'Email',
                'SDT' => 'Số điện thoại',
                'password' => 'Mật khẩu',
                'Quyen' => 'Quyền'

            ]

        );
        $nguoidung = Nguoidung::find($id);
        $nguoidung->update($request->all());
        $nguoidung->update(['password'=>Hash::make($request->password)]);
        return redirect()->route('users.index')->with('success','Sửa người dùng thành công!');
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
