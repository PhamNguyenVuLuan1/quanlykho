<?php

namespace App\Http\Controllers;

use App\Models\loaisanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LoaisanphamController extends Controller
{
    public function getDanhSach()
    {
        $loaisanpham = loaisanpham::all();
        return view('loaisanpham.danhsach', compact('loaisanpham'));
    }
    public function getThem()
    {
        return view('loaisanpham.them');
    }
    public function postThem(Request $request)
    {
        $request->validate([
            'tenloai' => ['required', 'max:255', 'unique:loaisanpham'],
        ]);

        $orm = new loaisanpham();
        $orm->tenloai = $request->tenloai;
        $orm->tenloai_slug = Str::slug($request->tenloai, '-');       
        $orm->save();

        return redirect()->route('loaisanpham');
    }
    public function getSua($id)
    {
        $loaisanpham = loaisanpham::find($id);
        return view('loaisanpham.sua', compact('loaisanpham'));
    }
    public function postSua(Request $request, $id)
    {
        $request->validate([
            'tenloai' => ['required', 'max:255', 'unique:loaisanpham,tenloai,' .$id],
        ]);
        $orm = loaisanpham::find($id);
        $orm->tenloai = $request->tenloai;
        $orm->tenloai_slug = Str::slug($request->tenloai, '-');
        $orm->save();
        return redirect()->route('loaisanpham');
    }
    public function getXoa($id)
    {
        $orm = loaisanpham::find($id);
        $orm->delete();
        return redirect()->route('loaisanpham');
    }
    
}
