@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Kiểm kê</div>
        <div class="card-body">
            <form action="{{ route('kiemketon.them') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="nguoikiemke_id">Người xuất</label>
                    <select class="form-select @error('nguoikiemke_id') is-invalid @enderror" id="nguoikiemke_id" name="nguoikiemke_id" required>
                        <option value="">-- Chọn --</option>
                        @foreach($nguoidung as $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                    @error('nguoikiemke_id')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="sanphamkiemke_id">Sản phẩm</label>
                    <select class="form-select @error('sanphamkiemke_id') is-invalid @enderror" id="sanphamkiemke_id" name="sanphamkiemke_id" required>
                        <option value="">-- Chọn sản phâm --</option>
                        @foreach($sanpham as $value)
                            <option value="{{ $value->id }}">{{ $value->tensanpham }}</option>
                        @endforeach
                    </select>
                    @error('sanphamkiemke_id')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>                                
           
                <div class="mb-3">
                    <label class="form-label" for="soluongtonkho">Số lượng tồn</label>
                    <input type="number" min="0" class="form-control @error('soluongtonkho') is-invalid @enderror" id="soluongtonkho" name="soluongtonkho" value="{{ old('soluongtonkho') }}" required />
                    @error('soluongtonkho')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="soluongthucte">Số lượng thực tế</label>
                    <input type="number" min="0" class="form-control @error('soluongthucte') is-invalid @enderror" id="soluongthucte" name="soluongthucte" value="{{ old('soluongthucte') }}" required />
                    @error('soluongthucte')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="chenhlech">Chênh lệch</label>
                    <input type="number" min="0" class="form-control @error('chenhlech') is-invalid @enderror" id="chenhlech" name="chenhlech" value="{{ old('chenhlech') }}" required />
                    @error('chenhlech')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="mota">Đơn vị tính</label>
                    <input type="text" class="form-control @error('mota') is-invalid @enderror" id="mota" name="mota" value="{{ old('mota') }}" required />
                    @error('mota')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Thêm vào CSDL</button>
            </form>
        </div>
    </div>
@endsection