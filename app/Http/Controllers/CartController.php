<?php

namespace App\Http\Controllers;

use App\Ctdondathang;
use App\Dondathang;
use App\Nhomsanpham;
use App\Sanpham;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use Cart;
use Auth;
use Illuminate\Support\Facades\View;

class CartController extends Controller
{
    public function __construct()
    {
        View::composer('layouts.menu',function ($view){
            $nhomsp = Nhomsanpham::get();
            return $view->with('nhomsp',$nhomsp);
        });
    }

    public function cart() {
        if (Request::get('product_id') && (Request::get('increment')) == 1) {
            $rows = Cart::search(function($key, $value) {
                return $key->id == Request::get('product_id');
            });
            $item = $rows->first();
            Cart::update($item->rowId, $item->qty + 1);
            return redirect()->back();
        }
        if (Request::get('product_id') && (Request::get('decrease')) == 1) {
            $rows = Cart::search(function($key, $value) {
                return $key->id == Request::get('product_id');
            });
            $item = $rows->first();
            Cart::update($item->rowId, $item->qty - 1);
            return redirect()->back();
        }
        if (Request::isMethod('get')) {
            $MaSP = Request::get('MaSP');
            $SoLuong = Request::get('SoLuong');
            $sanpham = Sanpham::find($MaSP);
            Cart::add(array('id' => $MaSP, 'name' => $sanpham->TenSP, 'qty' => $SoLuong, 'price' => $sanpham->GiaKM));
            return redirect()->back();
        }

    }
    public function view() {
        $cart = Cart::content();
        return view('cart', array('cart' => $cart));
    }
    public function remove() {
        $rows = Cart::search(function($key, $value) {
            return $key->id == Request::get('product_id');
        });
        $item = $rows->first();
        Cart::remove($item->rowId);
        return redirect()->back();
    }
    public function destroy() {
        Cart::destroy();
        return redirect()->back();
    }
    public function order() {
        if (!Auth::check()){
            return redirect()->route('login');
        }
        else{
            $cart = Cart::content();
            return view('order',compact('cart'));
        }
    }
    public function pay() {
        $dondathang = new Dondathang();
        $dondathang->MaND = Auth::user()->MaND;
        $dondathang->NgayDat =  date('Y-m-d');
        $dondathang->TenNN = Request::get('Ho').' '.Request::get('Ten');
        $dondathang->SDTNN = Request::get('SDT');
        $dondathang->DiaChiNN = Request::get('DiaChi');
        $dondathang->TongTien = number_format((Cart::subtotal(0,'','')),0,'','');
        $dondathang->TrangThai = 1;
        $dondathang->save();
        $cart = Cart::content();
        foreach($cart as $item){
            $ctdondathang = new Ctdondathang();
            $ctdondathang->MaDDH = $dondathang->MaDDH;
            $ctdondathang->MaSP = $item->id;
            $ctdondathang->SoLuong = $item->qty;
            $ctdondathang->DonGia = $item->price;
            $ctdondathang->ThanhTien = number_format(($item->price)*($item->qty),0,'','');
            $ctdondathang->save();
            $sanpham = Sanpham::find($item->id);
            if ($sanpham->SoLuongCon < $item->qty) {
                $dondathang->delete();
                return redirect()->back()->with('error', 'Ordering fail. '.$sanpham->name.' not enough quantity' );
            }
        }
        foreach($cart as $item){
            $sanpham = Sanpham::find($item->id);
            $sanpham->SoLuongCon=$sanpham->SoLuongCon-$item->qty;
//            $sanpham->sale=$sanpham->sale+$item->qty;
            $sanpham->save();
        }
        Cart::destroy();

        return redirect()->route('trangchu')->with('success', 'Ordering Successful');
    }
}
