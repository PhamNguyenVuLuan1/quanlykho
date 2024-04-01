@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Sửa khoa phòng</div>
        <div class="card-body">
            <form action="{{ route('khoaphong.sua', ['id' => $khoaphong->id]) }}" method="post">
            @csrf
            
            <div class="mb-3">
                <label class="form-label" for="tenkhoaphong">Tên khoa phòng</label>
                <input type="text" class="form-control @error('tenkhoaphong') is-invalid @enderror" id="tenkhoaphong" name="tenkhoaphong" value="{{ $khoaphong->tenkhoaphong }}" required />
                @error('tenkhoaphong')
                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="loaikhoaphong">Loại khoa phong</label>
                <input type="text" class="form-control @error('loaikhoaphong') is-invalid @enderror" id="loaikhoaphong" name="loaikhoaphong" value="{{ $khoaphong->loaikhoaphong }}"  required />
                @error('loaikhoaphong')
                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="trangthai">Trạng thái</label>
                <input type="text" class="form-control @error('trangthai') is-invalid @enderror"  id="trangthai" name="trangthai" value="{{ $khoaphong->trangthai }}"  required />
                @error('trangthai')
                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa-light fa-save"></i> Cập nhật</button>
            </form>
        </div>
    </div>
@endsectiON