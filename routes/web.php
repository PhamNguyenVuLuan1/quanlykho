<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoaisanphamController;
use App\Http\Controllers\NhacungcapController;
use App\Http\Controllers\KhoaphongController;
use App\Http\Controllers\SanphamController;
use App\Http\Controllers\NhapkhoController;
use App\Http\Controllers\XuatkhoController;
use App\Http\Controllers\KiemketonController;
use App\Http\Controllers\NguoidungController;
use App\Http\Controllers\YeucauController;

//Dang ky, dang nhap, quen mat khau
Auth::routes();

// Trang chủ
Route::get('/', [HomeController::class, 'getHome'])->name('frontend');
Route::get('/home', [HomeController::class, 'getHome'])->name('frontend');

// Quản lý khoa phòng
Route::get('/khoaphong', [KhoaphongController::class, 'getDanhSach'])->name('khoaphong');
Route::get('/khoaphong/them', [KhoaphongController::class, 'getThem'])->name('khoaphong.them');
Route::post('/khoaphong/them', [KhoaphongController::class, 'postThem'])->name('khoaphong.them');
Route::get('/khoaphong/sua/{id}', [KhoaphongController::class, 'getSua'])->name('khoaphong.sua');
Route::post('/khoaphong/sua/{id}', [KhoaphongController::class, 'postSua'])->name('khoaphong.sua');
Route::get('/khoaphong/xoa/{id}', [KhoaphongController::class, 'getXoa'])->name('khoaphong.xoa');

// Quản lý nhà cung cấp
Route::get('/nhacungcap', [NhacungcapController::class, 'getDanhSach'])->name('nhacungcap');
Route::get('/nhacungcap/them', [NhacungcapController::class, 'getThem'])->name('nhacungcap.them');
Route::post('/nhacungcap/them', [NhacungcapController::class, 'postThem'])->name('nhacungcap.them');
Route::get('/nhacungcap/sua/{id}', [NhacungcapController::class, 'getSua'])->name('nhacungcap.sua');
Route::post('/nhacungcap/sua/{id}', [NhacungcapController::class, 'postSua'])->name('nhacungcap.sua');
Route::get('/nhacungcap/xoa/{id}', [NhacungcapController::class, 'getXoa'])->name('nhacungcap.xoa');

// Quản lý Loại sản phẩm
Route::get('/loaisanpham', [LoaiSanphamController::class, 'getDanhSach'])->name('loaisanpham');
Route::get('/loaisanpham/them', [LoaiSanphamController::class, 'getThem'])->name('loaisanpham.them');
Route::post('/loaisanpham/them', [LoaiSanphamController::class, 'postThem'])->name('loaisanpham.them');
Route::get('/loaisanpham/sua/{id}', [LoaiSanphamController::class, 'getSua'])->name('loaisanpham.sua');
Route::post('/loaisanpham/sua/{id}', [LoaiSanphamController::class, 'postSua'])->name('loaisanpham.sua');
Route::get('/loaisanpham/xoa/{id}', [LoaiSanphamController::class, 'getXoa'])->name('loaisanpham.xoa');

// Quản lý Sản phẩm
Route::get('/sanpham', [SanphamController::class, 'getDanhSach'])->name('sanpham');
Route::get('/sanpham/them', [SanphamController::class, 'getThem'])->name('sanpham.them');
Route::post('/sanpham/them', [SanphamController::class, 'postThem'])->name('sanpham.them');
Route::get('/sanpham/sua/{id}', [SanphamController::class, 'getSua'])->name('sanpham.sua');
Route::post('/sanpham/sua/{id}', [SanphamController::class, 'postSua'])->name('sanpham.sua');
Route::get('/sanpham/xoa/{id}', [SanphamController::class, 'getXoa'])->name('sanpham.xoa');

// Quản lý nhập kho
Route::get('/nhapkho', [NhapkhoController::class, 'getDanhSach'])->name('nhapkho');
Route::get('/nhapkho/them', [NhapkhoController::class, 'getThem'])->name('nhapkho.them');
Route::post('/nhapkho/them', [NhapkhoController::class, 'postThem'])->name('nhapkho.them');
Route::get('/nhapkho/sua/{id}', [NhapkhoController::class, 'getSua'])->name('nhapkho.sua');
Route::post('/nhapkho/sua/{id}', [NhapkhoController::class, 'postSua'])->name('nhapkho.sua');
Route::get('/nhapkho/xoa/{id}', [NhapkhoController::class, 'getXoa'])->name('nhapkho.xoa');

// Quản lý nhập kho
Route::get('/xuatkho', [XuatkhoController::class, 'getDanhSach'])->name('xuatkho');
Route::get('/xuatkho/them', [XuatkhoController::class, 'getThem'])->name('xuatkho.them');
Route::post('/xuatkho/them', [XuatkhoController::class, 'postThem'])->name('xuatkho.them');
Route::get('/xuatkho/sua/{id}', [XuatkhoController::class, 'getSua'])->name('xuatkho.sua');
Route::post('/xuatkho/sua/{id}', [XuatkhoController::class, 'postSua'])->name('xuatkho.sua');
Route::get('/xuatkho/xoa/{id}', [XuatkhoController::class, 'getXoa'])->name('xuatkho.xoa');

// Quản lý yêu cầu
Route::get('/yeucau', [YeucauController::class, 'getDanhSach'])->name('yeucau');
Route::get('/yeucau/them', [YeucauController::class, 'getThem'])->name('yeucau.them');
Route::post('/yeucau/them', [YeucauController::class, 'postThem'])->name('yeucau.them');
Route::get('/yeucau/sua/{id}', [YeucauController::class, 'getSua'])->name('yeucau.sua');
Route::post('/yeucau/sua/{id}', [YeucauController::class, 'postSua'])->name('yeucau.sua');
Route::get('/yeucau/xoa/{id}', [YeucauController::class, 'getXoa'])->name('yeucau.xoa');

// Quản lý kiểm kê tồn
Route::get('/kiemketon', [KiemketonController::class, 'getDanhSach'])->name('kiemketon');
Route::get('/kiemketon/them', [KiemketonController::class, 'getThem'])->name('kiemketon.them');
Route::post('/kiemketon/them', [KiemketonController::class, 'postThem'])->name('kiemketon.them');
Route::get('/kiemketon/sua/{id}', [KiemketonController::class, 'getSua'])->name('kiemketon.sua');
Route::post('/kiemketon/sua/{id}', [KiemketonController::class, 'postSua'])->name('kiemketon.sua');
Route::get('/kiemketon/xoa/{id}', [KiemketonController::class, 'getXoa'])->name('kiemketon.xoa');

// Quản lý Tài khoản người dùng
Route::get('/nguoidung', [NguoidungController::class, 'getDanhSach'])->name('nguoidung');
Route::get('/nguoidung/them', [NguoidungController::class, 'getThem'])->name('nguoidung.them');
Route::post('/nguoidung/them', [NguoidungController::class, 'postThem'])->name('nguoidung.them');
Route::get('/nguoidung/sua/{id}', [NguoidungController::class, 'getSua'])->name('nguoidung.sua');
Route::post('/nguoidung/sua/{id}', [NguoidungController::class, 'postSua'])->name('nguoidung.sua');
Route::get('/nguoidung/xoa/{id}', [NguoidungController::class, 'getXoa'])->name('nguoidung.xoa');

