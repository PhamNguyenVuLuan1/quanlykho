<?php

namespace App\Http\Controllers;

use App\Models\khoaphong;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KhoaphongController extends Controller
{
    public function getDanhSach()
    {
        $khoaphong = khoaphong::all();
        return view('khoaphong.danhsach', compact('khoaphong'));
    }
    public function getThem()
    {
        return view('khoaphong.them');
    }
    public function postThem(Request $request)
    {
        // kiểm tra
        $request->validate([
            'tenkhoaphong' => ['required', 'string', 'max:191', 'unique:khoaphong'],
            'loaikhoaphong' => ['required', 'string', 'max:191'],          
            'trangthai' => ['required', 'string', 'max:191'],         

        ]);
        
        $orm = new khoaphong();
        $orm->tenkhoaphong = $request->tenkhoaphong;
        $orm->tenkhoaphong_slug = Str::slug($request->tenkhoaphong, '-');
        $orm->loaikhoaphong = $request->loaikhoaphong;
        $orm->trangthai = $request->trangthai;

        $orm->save();
        // chuyển về trang danh sách
        return redirect()->route('khoaphong');
    }
    public function getSua($id)
    {
        $khoaphong = khoaphong::find($id);
        return view('khoaphong.sua', compact('khoaphong'));
    }
    public function postSua(Request $request, $id)
    {
        $request->validate([
            'tenkhoaphong' => ['required', 'string', 'max:191', 'unique:khoaphong,tenkhoaphong,' . $id],
            'loaikhoaphong' => ['required', 'string', 'max:191'],          
            'trangthai' => ['required', 'string', 'max:191'],
        ]);        
        $orm = khoaphong::find($id);
        $orm->tenkhoaphong = $request->tenkhoaphong;
        $orm->tenkhoaphong_slug = Str::slug($request->tenkhoaphong, '-');
        $orm->loaikhoaphong = $request->loaikhoaphong;
        $orm->trangthai = $request->trangthai;
        $orm->save();
        return redirect()->route('khoaphong');
        
    
    }
    public function getXoa($id)
    {
        
        $orm = khoaphong::find($id);
        $orm->delete();        
        return redirect()->route('khoaphong');
    }
}
