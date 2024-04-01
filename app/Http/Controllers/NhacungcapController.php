<?php

namespace App\Http\Controllers;


use App\Models\nhacungcap;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NhacungcapController extends Controller
{
    
    public function getDanhSach()
    {
        $nhacungcap = nhacungcap::all();
        return view('nhacungcap.danhsach', compact('nhacungcap'));
    }
    public function getThem()
    {
        return view('nhacungcap.them');
    }
    public function postThem(Request $request)
    {
        $request->validate([
            'tenncc' => ['required', 'string', 'max:191', 'unique:nhacungcap'],
            'sdt' => ['required', 'string', 'max:15'],
            'diachi' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],

        ]);
        
        $orm = new nhacungcap();
        $orm->tenncc = $request->tenncc;
        $orm->tenncc_slug = Str::slug($request->tenncc, '-');
        $orm->sdt = $request->sdt;
        $orm->diachi = $request->diachi;
        $orm->email = $request->email;
        $orm->save();
        return redirect()->route('nhacungcap');
    }
    public function getSua($id)
    {
        $nhacungcap = nhacungcap::find($id);
        return view('nhacungcap.sua', compact('nhacungcap'));
    }
    public function postSua(Request $request, $id)
    {
        $request->validate([
            'tenncc' => ['required', 'string', 'max:191', 'unique:nhacungcap,tenncc,' . $id],
            'sdt' => ['required', 'string', 'max:15'],
            'diachi' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:191', 'unique:nhacungcap'],
        ]);        
        $orm = nhacungcap::find($id);
        $orm->tenncc = $request->tenncc;
        $orm->tenncc_slug = Str::slug($request->tenncc, '-');
        $orm->sdt = $request->sdt;
        $orm->diachi = $request->diachi;
        $orm->email = $request->email;
        $orm->save();
        return redirect()->route('nhacungcap');
        
    
    }
    public function getXoa($id)
    {
        
        $orm = nhacungcap::find($id);
        $orm->delete();
        
        return redirect()->route('nhacungcap');
    }
}
