<?php

namespace App\Http\Controllers;

use App\Loaisanpham;
use App\Nhomsanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class timkiemController extends Controller
{
    public function __construct()
    {
        View::composer(['layouts.menu','category'],function ($view){
            $nhomsp = Nhomsanpham::get();
            return $view->with('nhomsp',$nhomsp);
        });
        View::composer('layouts.menu',function ($view){
            $loaisp = Loaisanpham::get();
            return $view->with('loaisp',$loaisp);
        });
    }

    public function xemtheoloaisp($id)
    {
        $loai = Loaisanpham::find($id);
        $sanphams = $loai->sanphams()->paginate(12);
        return view('category',compact(['sanphams','loai']));
    }

    public function xemtheonhomsp($id)
    {
        $nhom = Nhomsanpham::find($id);
        $loais = $nhom->loaisanphams()->get();
        $sanphamss = array();
        foreach($loais as $l)
        {
            $sanphamss[] = $l->sanphams()->paginate(2);
        }
        return view('category',compact(['sanphamss','nhom']));
    }

    public function timkiemsanphamtheoloai(Request $request)
    {
        $key = $request->key;
        $loai = Loaisanpham::find($request->MaLoai);
        if($key != ''){
            $sanphams = $loai->sanphams()->where('MaLoai',$request->MaLoai)
                ->Where('TenSP', 'like', '%'.$key.'%')
                ->orWhere('GiaKM', 'like', '%'.$key.'%')->where('MaLoai',$request->MaLoai)
                ->orWhere('Gia', 'like', '%'.$key.'%')->where('MaLoai',$request->MaLoai)
                ->orderBy('MaSP', 'desc')->paginate(12);
//            dd($sanphams);
            return view('category',compact(['sanphams','loai']));
            }
        else{
            $sanphams = $loai->sanphams()->paginate(12);
            return view('category',compact(['sanphams','loai']));
        }
        $sanphams = $loai->sanphams()->paginate(12);
        return view('category',compact(['sanphams','loai']));
    }
}
