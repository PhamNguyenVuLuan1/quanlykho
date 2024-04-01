<?php

namespace App\Http\Controllers;

use App\Models\yeucau;
use App\Models\sanpham;
use App\Models\khoaphong;
use App\Models\nguoidung;
use Illuminate\Http\Request;

class YeucauController extends Controller
{
    public function getDanhSach()
    {
        $yeucau = yeucau::paginate(25);
        return view('yeucau.danhsach', compact('yeucau'));
    }
    public function getThem()
    {  
        $khoaphong = khoaphong::all();
        $nguoidung = nguoidung::all();     
        $sanpham = sanpham::all();
        return view('yeucau.them', compact('khoaphong','nguoidung', 'sanpham'));
    }
    public function postThem(Request $request)
    {
        $this->validate($request, [
            'nguoiyeucau_id' => ['required'],
            'khoaphongyeucau_id' => ['required'],
            'sanphamyeucau_id' => ['required'],
            'soluongyeucau' => ['required', 'numeric'],
            'tinhtrang' => ['required', 'string', 'max:191'],         
        
            ]);
            
        $orm = new yeucau();
        $orm->nguoiyeucau_id = $request->nguoiyeucau_id;
        $orm->khoaphongyeucau_id = $request->khoaphongyeucau_id; 
        $orm->sanphamyeucau_id = $request->sanphamyeucau_id;          
        $orm->soluongyeucau = $request->soluongyeucau;
        $orm->donvitinh = $request->donvitinh;
        $orm->tinhtrang = $request->tinhtrang;
        
       
        $orm->save();
        return redirect()->route('yeucau');
    }
    public function getSua($id)
    {
        $yeucau = yeucau::find($id);
        $khoaphong = khoaphong::all();
        $nguoidung = nguoidung::all();     
        $sanpham = sanpham::all();
        return view('yeucau.sua', compact('yeucau','khoaphong','nguoidung','sanpham'));       
    }
    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
            'nguoiyeucau_id' => ['required'],
            'khoaphongyeucau_id' => ['required'],
            'sanphamyeucau_id' => ['required'],
            'soluongyeucau' => ['required', 'numeric'],
            'tinhtrang' => ['required', 'string', 'max:191'],
                     
        
            ]);
            
        $orm = yeucau::find($id);
        $orm->nguoiyeucau_id = $request->nguoiyeucau_id;
        $orm->khoaphongyeucau_id = $request->khoaphongyeucau_id; 
        $orm->sanphamyeucau_id = $request->sanphamyeucau_id;          
        $orm->soluongyeucau = $request->soluongyeucau;
        $orm->donvitinh = $request->donvitinh;
        $orm->tinhtrang = $request->tinhtrang;
       
       
       
        $orm->save();
        return redirect()->route('yeucau');
    }
    public function getXoa($id)
    {
        $orm = yeucau::find($id);
        $orm->delete();
       
        return redirect()->route(' yeucau');    
    }
}
