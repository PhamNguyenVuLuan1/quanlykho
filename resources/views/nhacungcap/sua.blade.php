@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Sửa nhà cung cấp</div>
        <div class="card-body">
            <form action="{{ route('nhacungcap.sua', ['id' => $nhacungcap->id]) }}" method="post">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label" for="tenncc">Tên nhà cung cấp</label>
                    <input type="text" class="form-control @error('tenncc') is-invalid @enderror" id="tenncc" name="tenncc" value="{{ $nhacungcap->tenncc }}" required />
                    @error('tenncc')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="sdt">SĐT</label>
                    <input type="text" class="form-control @error('sdt') is-invalid @enderror" id="sdt" name="sdt" value="{{ $nhacungcap->sdt }}" required />
                    @error('sdt')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="diachi">Địa chỉ</label>
                    <input type="text" class="form-control @error('diachi') is-invalid @enderror" id="diachi" name="diachi" value="{{ $nhacungcap->diachi }}" required />
                    @error('diachi')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $nhacungcap->email }}" required />
                    @error('email')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa-light fa-save"></i> Cập nhật</button>
            </form>
        </div>
    </div>
@endsectiON