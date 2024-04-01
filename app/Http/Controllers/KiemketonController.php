<?php

namespace App\Http\Controllers;

use App\Models\kiemketon;
use App\Models\nguoidung;
use App\Models\sanpham;
use Illuminate\Http\Request;

class KiemketonController extends Controller
{
    public function getDanhSach()
    {
        $kiemketon = kiemketon::paginate(25);
        return view('kiemketon.danhsach', compact('kiemketon'));
    }
    public function getThem()
    {        
        $nguoidung = nguoidung::all();     
        $sanpham = sanpham::all();
        return view('kiemketon.them', compact('nguoidung', 'sanpham'));
    }
    public function postThem(Request $request)
    {
        $this->validate($request, [
            'nguoikiemke_id' => ['required'],
            'sanphamkiemke_id' => ['required'],
            'soluongtonkho' => ['required', 'numeric'],
            'soluongthucte' => ['required', 'numeric'],
            'chenhlech' => ['required', 'numeric'],        
            
            'mota' => ['required', 'string', 'max:191'],  
        
            ]);
            
        $orm = new kiemketon();
        $orm->nguoikiemke_id = $request->nguoikiemke_id; 
        $orm->sanphamkiemke_id = $request->sanphamkiemke_id;          
        $orm->soluongtonkho = $request->soluongtonkho;
        $orm->soluongthucte = $request->soluongthucte;
        $orm->chenhlech = $request->chenhlech;
       
        $orm->mota = $request->mota;
       
        $orm->save();
        return redirect()->route('kiemketon');
    }
    public function getSua($id)
    {
        $kiemketon = kiemketon::find($id);
        $nguoidung = nguoidung::all();     
        $sanpham = sanpham::all();
        return view('kiemketon.sua', compact('kiemketon','nguoidung','sanpham'));       
    }
    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
            'nguoikiemke_id' => ['required'],
            'sanphamkiemke_id' => ['required'],
            'soluongtonkho' => ['required', 'numeric'],
            'soluongthucte' => ['required', 'numeric'],
            'chenhlech' => ['required', 'numeric'],        
               
            'mota' => ['required', 'string', 'max:191'],  
        
            ]);
        $orm = kiemketon::find($id);
        $orm->nguoikiemke_id = $request->nguoikiemke_id; 
        $orm->sanphamkiemke_id = $request->sanphamkiemke_id;          
        $orm->soluongtonkho = $request->soluongtonkho;
        $orm->soluongthucte = $request->soluongthucte;
        $orm->chenhlech = $request->chenhlech;
        $orm->mota = $request->mota;
       
        $orm->save();
        return redirect()->route('kiemketon');
    }
    public function getXoa($id)
    {
        $orm = kiemketon::find($id);
        $orm->delete();
       
        return redirect()->route('kiemketon');    
    }
}
