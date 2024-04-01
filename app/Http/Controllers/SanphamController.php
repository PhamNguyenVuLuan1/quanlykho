<?php

namespace App\Http\Controllers;

use App\Models\sanpham;
use App\Models\loaisanpham;
use App\Models\nhacungcap;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SanphamController extends Controller
{
    public function getDanhSach()
    {
        $sanpham = sanpham::paginate(25);
        return view('sanpham.danhsach', compact('sanpham'));
    }
    public function getThem()
    {
        $loaisanpham = loaisanpham::all();
        $nhacungcap = nhacungcap::all();
        return view('sanpham.them', compact('loaisanpham', 'nhacungcap'));
    }
    public function postThem(Request $request)
    {
        $this->validate($request, [
            'loaisanpham_id' => ['required'],
            'nhacungcap_id' => ['required'],
            'tensanpham' => ['required', 'string', 'max:191', 'unique:sanpham'],
            'soluong' => ['required', 'numeric'],
            'donvitinh' => ['required', 'string', 'max:191'],
            'dongia' => ['required', 'numeric'],
            'hinhanh' => ['nullable', 'image', 'max:2048'],

            ]);
            // Upload hình ảnh
            $path = '';
            if($request->hasFile('hinhanh'))
            {
                // Tạo thư mục nếu chưa có
                $lsp = loaisanpham::find($request->loaisanpham_id);
                File::isDirectory($lsp->tenloai_slug) or Storage::makeDirectory($lsp->tenloai_slug, 0775);// Xác định tên tập tin
                $extension = $request->file('hinhanh')->extension();
                $filename = Str::slug($request->tensanpham, '-') . '.' . $extension;
                // Upload vào thư mục và trả về đường dẫn
                $path = Storage::putFileAs($lsp->tenloai_slug, $request->file('hinhanh'), $filename);
            }
        $orm = new sanpham();
        $orm->loaisanpham_id = $request->loaisanpham_id;
        $orm->nhacungcap_id = $request->nhacungcap_id;
        $orm->tensanpham = $request->tensanpham;
        $orm->tensanpham_slug = Str::slug($request->tensanpham, '-');
        $orm->soluong = $request->soluong;
        $orm->donvitinh = $request->donvitinh;
        $orm->dongia = $request->dongia;
        if(!empty($path)) $orm->hinhanh = $path;
        $orm->motasanpham = $request->motasanpham;

        $orm->save();
        return redirect()->route('sanpham');
    }
    public function getSua($id)
    {
        $sanpham = sanpham::find($id);
        $loaisanpham = loaisanpham::all();
        $nhacungcap = nhacungcap::all();
        return view('sanpham.sua', compact('sanpham', 'loaisanpham', 'nhacungcap'));
    }
    public function postSua(Request $request, $id)
    {
        $this->validate($request, [
            'loaisanpham_id' => ['required'],
            'nhacungcap_id' => ['required'],
            'tensanpham' => ['required', 'string', 'max:191', 'unique:sanpham,tensanpham,' . $id],
            'soluong' => ['required', 'numeric'],
            'donvitinh' => ['required', 'string', 'max:191'],
            'dongia' => ['required', 'numeric'],
            'hinhanh' => ['nullable', 'image', 'max:2048'],
            'motasanpham' => ['required', 'text', 'max:191'],
            ]);

            // Upload hình ảnh
        $path = '';
        if($request->hasFile('hinhanh'))
        {
            // Xóa tập tin cũ
            $sp = sanpham::find($id);
            if(!empty($sp->hinhanh)) Storage::delete($sp->hinhanh);
            // Xác định tên tập tin mới
            $extension = $request->file('hinhanh')->extension();
            $filename = Str::slug($request->tensanpham, '-') . '.' . $extension;
            // Upload vào thư mục và trả về đường dẫn
            $lsp = loaisanpham::find($request->loaisanpham_id);$path = Storage::putFileAs($lsp->tenloai_slug, $request->file('hinhanh'), $filename);
        }

        $orm = sanpham::find($id);
        $orm->loaisanpham_id = $request->loaisanpham_id;
        $orm->nhacungcap_id = $request->nhacungcap_id;
        $orm->tensanpham = $request->tensanpham;
        $orm->tensanpham_slug = Str::slug($request->tensanpham, '-');
        $orm->soluong = $request->soluong;
        $orm->donvitinh = $request->donvitinh;
        $orm->dongia = $request->dongia;
        if(!empty($path)) $orm->hinhanh = $path;
        $orm->motasanpham = $request->motasanpham;
        
        $orm->save();
        return redirect()->route('sanpham');
    }
    public function getXoa($id)
    {
        $orm = sanpham::find($id);
        $orm->delete();
        if(!empty($orm->hinhanh)) Storage::delete($orm->hinhanh);
        return redirect()->route('sanpham');    
    }
}
