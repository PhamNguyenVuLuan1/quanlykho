<?php

namespace App\Http\Controllers;
use App\Models\sanpham;
use App\Models\khoaphong;
use App\Models\xuatkho;
use App\Models\nguoidung;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class XuatkhoController extends Controller
{
    public function getDanhSach()
    {
        $xuatkho = xuatkho::paginate(25);
        return view('xuatkho.danhsach', compact('xuatkho'));
    }
    public function getThem()
    {  
        $khoaphong = khoaphong::all();
        $nguoidung = nguoidung::all();     
        $sanpham = sanpham::all();
        return view('xuatkho.them', compact('khoaphong','nguoidung', 'sanpham'));
    }
    public function postThem(Request $request)
    {
        $this->validate($request, [
            'khoaphongxuat_id' => ['required'],
            'nguoixuat_id' => ['required'],
            'sanphamxuat_id' => ['required'],
            'soluongxuat' => ['required', 'numeric'],
            'donvitinh' => ['required', 'string', 'max:191'],
            'giaxuat' => ['required', 'numeric'],
            'thanhtien' => ['required', 'numeric'],            
        
            ]);
            
        $orm = new xuatkho();
        $orm->khoaphongxuat_id = $request->khoaphongxuat_id;
        $orm->nguoixuat_id = $request->nguoixuat_id;
        $orm->sanphamxuat_id = $request->sanphamxuat_id;          
        $orm->soluongxuat = $request->soluongxuat;
        $orm->donvitinh = $request->donvitinh;
        $orm->giaxuat = $request->gianhap;
        $orm->thanhtien = $request->thanhtien;
       
        $orm->save();
        return redirect()->route('xuatkho');
    }
    public function getSua($id)
    {
        $xuatkho = xuatkho::find($id);
        $khoaphong = khoaphong::all();
        $nguoidung = nguoidung::all();     
        $sanpham = sanpham::all();
        return view('xuatkho.sua', compact('xuatkho','khoaphong','nguoidung','sanpham'));       
    }
    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
            'khoaphongxuat_id' => ['required'],
            'nguoixuat_id' => ['required'],
            'sanphamxuat_id' => ['required'],
            'soluongxuat' => ['required', 'numeric'],
            'donvitinh' => ['required', 'string', 'max:191'],
            'giaxuat' => ['required', 'numeric'],
            'thanhtien' => ['required', 'numeric'],                            
        
            ]);
            
        $orm = xuatkho::find($id);
        $orm->khoaphongxuat_id = $request->khoaphongxuat_id;
        $orm->nguoixuat_id = $request->nguoixuat_id;
        $orm->sanphamxuat_id = $request->sanphamxuat_id;          
        $orm->soluongxuat = $request->soluongxuat;
        $orm->donvitinh = $request->donvitinh;
        $orm->giaxuat = $request->gianhap;
        $orm->thanhtien = $request->thanhtien;
       
        $orm->save();
        return redirect()->route('xuatkho');
    }
    public function getXoa($id)
    {
        $orm = xuatkho::find($id);
        $orm->delete();
       
        return redirect()->route('xuatkho');    
    }
}
