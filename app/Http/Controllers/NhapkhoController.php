<?php

namespace App\Http\Controllers;

use App\Models\sanpham;
use App\Models\loaisanpham;
use App\Models\nhacungcap;
use App\Models\nhapkho;
use App\Models\nguoidung;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;




class NhapkhoController extends Controller
{
    
    public function getDanhSach()
    {
        $nhapkho = nhapkho::paginate(25);
        return view('nhapkho.danhsach', compact('nhapkho'));
    }
    public function getThem()
    {
        $nguoidung = nguoidung::all();
        $sanpham = sanpham::all();
        $loaisanpham = loaisanpham::all();
        $nhacungcap = nhacungcap::all();
        return view('nhapkho.them', compact('nguoidung','sanpham','loaisanpham', 'nhacungcap'));
    }
    public function postThem(Request $request)
    {
        $this->validate($request, [
            'nguoinhap_id' => ['required'],
            'sanphamnhap_id' => ['required'],
            'loaisanphamnhap_id' => ['required'],
            'nhacungcapnhap_id' => ['required'],
            'soluongnhapkho' => ['required', 'numeric'],
            'donvitinh' => ['required', 'string', 'max:191'],
            'gianhap' => ['required', 'numeric'],
            'thanhtien' => ['required', 'numeric'],            
        
            ]);
            
        $orm = new nhapkho();
        $orm->nguoinhap_id = $request->nguoinhap_id;
        $orm->sanphamnhap_id = $request->sanphamnhap_id;
        $orm->loaisanphamnhap_id = $request->loaisanphamnhap_id;
        $orm->nhacungcapnhap_id = $request->nhacungcapnhap_id;      
        $orm->soluongnhapkho = $request->soluongnhapkho;
        $orm->donvitinh = $request->donvitinh;
        $orm->gianhap = $request->gianhap;
        $orm->thanhtien = $request->thanhtien;
       
        $orm->save();
        return redirect()->route('nhapkho');
    }
    public function getSua($id)
    {
        $nhapkho = nhapkho::find($id);
        $nguoidung = nguoidung::all();
        $sanpham = sanpham::all();
        $loaisanpham = loaisanpham::all();
        $nhacungcap = nhacungcap::all();
        return view('nhapkho.sua', compact('nhapkho','nguoidung','sanpham', 'loaisanpham', 'nhacungcap'));
    }
    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
            'nguoinhap_id' => ['required'],
            'sanphamnhap_id' => ['required'],
            'loaisanphamnhap_id' => ['required'],
            'nhacungcapnhap_id' => ['required'],
            'soluongnhapkho' => ['required', 'numeric'],
            'donvitinh' => ['required', 'string', 'max:191'],
            'gianhap' => ['required', 'numeric'],
            'thanhtien' => ['required', 'numeric'],            
        
            ]);
            
        $orm = nhapkho::find($id);
        $orm->nguoinhap_id = $request->nguoinhap_id;
        $orm->sanphamnhap_id = $request->sanphamnhap_id;
        $orm->loaisanphamnhap_id = $request->loaisanphamnhap_id;
        $orm->nhacungcapnhap_id = $request->nhacungcapnhap_id;      
        $orm->soluongnhapkho = $request->soluongnhapkho;
        $orm->donvitinh = $request->donvitinh;
        $orm->gianhap = $request->gianhap;
        $orm->thanhtien = $request->thanhtien;

        $orm->save();
        return redirect()->route('nhapkho');
    }
    public function getXoa($id)
    {
        $orm = nhapkho::find($id);
        $orm->delete();
       
        return redirect()->route('nhapkho');    
    }
}
