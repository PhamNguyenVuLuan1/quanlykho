@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Sửa</div>
        <div class="card-body">
            <form action="{{ route('kiemketon.sua') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="nguoikiemke_id">Người kiểm kê</label>
                    <select class="form-select @error('nguoikiemke_id') is-invalid @enderror" id="nguoikiemke_id" name="nguoikiemke_id" required>
                        <option value="">-- Chọn --</option>
                        @foreach($nguoidung as $value)
                            <option value="{{ $value->id }}" {{ ($nguoidung->nguoikiemke_id == $value->id) ? 'selected' : '' }}>{{ $value->name }}</option>
                        @endforeach
                    </select>
                    @error('nguoikiemke_id')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="sanphamxuat_id">Sản phẩm</label>
                    <select class="form-select @error('sanphamxuat_id') is-invalid @enderror" id="sanphamxuat_id" name="sanphamxuat_id" required>
                        <option value="">-- Chọn sản phâm --</option>
                        @foreach($sanpham as $value)
                            <option value="{{ $value->id }}" {{ ($sanpham->sanphamxuat_id == $value->id) ? 'selected' : '' }}>{{ $value->tensanpham }}</option>
                            
                        @endforeach
                    </select>
                    @error('sanphamxuat_id')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div> 
              
                <div class="mb-3">
                    <label class="form-label" for="soluongtonkho">Số lượng tồn kho</label>
                    <input type="number" min="0" class="form-control @error('soluongtonkho') is-invalid @enderror" id="soluongtonkho" name="soluongtonkho" value="{{ $kiemketon->soluongtonkho }}" required />
                    @error('soluongtonkho')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="soluongthucte">Số lượng thực tế</label>
                    <input type="number" min="0" class="form-control @error('soluongthucte') is-invalid @enderror" id="soluongthucte" name="soluongthucte" value="{{ $kiemketon->soluongthucte }}" required />
                    @error('soluongthucte')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="chenhlech">Chênh lệch</label>
                    <input type="number" min="0" class="form-control @error('chenhlech') is-invalid @enderror" id="chenhlech" name="chenhlech" value="{{ $kiemketon->chenhlech }}" required />
                    @error('chenhlech')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="mota">Mô tả</label>
                    <input type="text" class="form-control @error('mota') is-invalid @enderror" id="mota" name="mota" value="{{ $kiemketon->mota }}" required />
                    @error('mota')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Cập Nhật</button>
            </form>
        </div>
    </div>
@endsection
