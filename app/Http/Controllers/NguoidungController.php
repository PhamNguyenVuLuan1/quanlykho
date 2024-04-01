<?php

namespace App\Http\Controllers;

use App\Models\nguoidung;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class NguoidungController extends Controller
{
    public function getDanhSach()
    {
        $nguoidung = nguoidung::all();
        return view('nguoidung.danhsach', compact('nguoidung'));

    }
    public function getThem()
    {
        return view('nguoidung.them');
    }
    public function postThem(Request $request)
    {
        $request->validate([
        -    'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:nguoidung'],
            'role' => ['required'],
            'password' => ['required', 'min:4', 'confirmed'],
        ]);
        $orm = new nguoidung();
        $orm->name = $request->name;
        $orm->username = Str::before($request->email, '@');
        $orm->email = $request->email;
        $orm->password = Hash::make($request->password);
        $orm->role = $request->role;
        $orm->save();
        return redirect()->route('nguoidung');
        }
    public function getSua($id)
    {
        $nguoidung = nguoidung::find($id);
        return view('nguoidung.sua', ['nguoidung' => $nguoidung]);
    }
    public function postSua(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:nguoidung,email,' . $request->id],
            'role' => ['required'],
            'password' => ['confirmed'],
        ]);
        $orm = nguoidung::find($request->id);
        $orm->name = $request->name;
        $orm->username = Str::before($request->email, '@');
        $orm->email = $request->email;
        $orm->role = $request->role;
        if(!empty($request->password)) $orm->password = Hash::make($request->password);
        $orm->save();
        return redirect()->route('nguoidung');
    }
    public function getXoa($id)
    {
        $orm = nguoidung::find($id);
        $orm->delete();
        return redirect()->route('nguoidung');
    }
    
}
