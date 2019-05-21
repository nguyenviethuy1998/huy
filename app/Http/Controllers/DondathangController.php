<?php

namespace App\Http\Controllers;

use App\Dondathang;
use Illuminate\Http\Request;

class DondathangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dondathang = Dondathang::get();
        return view('admin.dondathang.danhsach',compact('dondathang'));
    }

    public function getxulydondathang()
    {
        $dondathang = Dondathang::where('TrangThai',1)->get();
        return view('admin.dondathang.xuly',compact('dondathang'));
    }

    public function xulydondathang(Request $request, $dondathang)
    {
        $dondathang = Dondathang::find($dondathang)->update(['TrangThai'=>2]);
        return redirect()->back();
    }

    public function getxuatdondathang()
    {
        $dondathang = Dondathang::where('TrangThai',2)->get();
        return view('admin.dondathang.xuatdon',compact('dondathang'));
    }

    public function xuatdondathang(Request $request, $dondathang)
    {
        $dondathang = Dondathang::find($dondathang)->update(['TrangThai'=>5]);
        return redirect()->back();
    }

    public function getgiaodondathang()
    {
        $dondathang = Dondathang::where('TrangThai',5)->get();
        return view('admin.dondathang.giaodonhang',compact('dondathang'));
    }

    public function giaodondathang(Request $request, $dondathang)
    {
        $dondathang = Dondathang::find($dondathang)->update(['TrangThai'=>6,'NgayGiao'=>date('y-m-d')]);
        return redirect()->back();
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
        //
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
