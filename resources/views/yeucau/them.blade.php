@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Yêu cầu</div>
        <div class="card-body">
            <form action="{{ route('yeucau.them') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="nguoiyeucau_id">Người yêu cầu</label>
                    <select class="form-select @error('nguoiyeucau_id') is-invalid @enderror" id="nguoiyeucau_id" name="nguoiyeucau_id" required>
                        <option value="">-- Chọn --</option>
                        @foreach($nguoidung as $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                    @error('nguoiyeucau_id')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="khoaphongyeucau">Khoa phòng</label>
                    <select class="form-select @error('khoaphongyeucau_id') is-invalid @enderror" id="khoaphongyeucau_id" name="khoaphongyeucau_id" required>
                        <option value="">-- Chọn khoa phòng --</option>
                        @foreach($khoaphong as $value)
                            <option value="{{ $value->id }}">{{ $value->tenkhoaphong }}</option>
                        @endforeach
                    </select>
                    @error('khoaphongyeucau_id')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="sanphamyeucau_id">Sản phẩm</label>
                    <select class="form-select @error('sanphamyeucau_id') is-invalid @enderror" id="sanphamyeucau_id" name="sanphamyeucau_id" required>
                        <option value="">-- Chọn sản phâm --</option>
                        @foreach($sanpham as $value)
                            <option value="{{ $value->id }}">{{ $value->tensanpham }}</option>
                        @endforeach
                    </select>
                    @error('sanphamyeucau_id')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>  
      
                <div class="mb-3">
                    <label class="form-label" for="soluongyeucau_id">Số lượng</label>
                    <input type="number" min="0" class="form-control @error('soluongyeucau_id') is-invalid @enderror" id="soluongyeucau_id" name="soluongyeucau_id" value="{{ old('soluongyeucau_id') }}" required />
                    @error('soluongyeucau_id')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="tinhtrang">Đơn vị tính</label>
                    <input type="text" class="form-control @error('tinhtrang') is-invalid @enderror" id="tinhtrang" name="tinhtrang" value="{{ old('tinhtrang') }}" required />
                    @error('tinhtrang')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>               
                   
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Thêm vào CSDL</button>
            </form>
        </div>
    </div>
@endsection