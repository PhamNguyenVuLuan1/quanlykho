@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Xuất kho</div>
        <div class="card-body">
            <form action="{{ route('xuatkho.them') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="khoaphongxuat_id">Khoa phòng</label>
                    <select class="form-select @error('khoaphongxuat_id') is-invalid @enderror" id="khoaphongxuat_id" name="khoaphongxuat_id" required>
                        <option value="">-- Chọn khoa phòng --</option>
                        @foreach($khoaphong as $value)
                            <option value="{{ $value->id }}">{{ $value->tenkhoaphong }}</option>
                        @endforeach
                    </select>
                    @error('khoaphongxuat_id')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="sanphamxuat_id">Sản phẩm</label>
                    <select class="form-select @error('sanphamxuat_id') is-invalid @enderror" id="sanphamxuat_id" name="sanphamxuat_id" required>
                        <option value="">-- Chọn sản phâm --</option>
                        @foreach($sanpham as $value)
                            <option value="{{ $value->id }}">{{ $value->tensanpham }}</option>
                        @endforeach
                    </select>
                    @error('sanphamxuat_id')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>  

                <div class="mb-3">
                    <label class="form-label" for="nguoixuat_id">Người xuất</label>
                    <select class="form-select @error('nguoixuat_id') is-invalid @enderror" id="nguoixuat_id" name="nguoixuat_id" required>
                        <option value="">-- Chọn --</option>
                        @foreach($nguoidung as $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                    @error('nguoixuat_id')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                                        
           
                <div class="mb-3">
                    <label class="form-label" for="soluongxuat">Số lượng xuất</label>
                    <input type="number" min="0" class="form-control @error('soluongxuat') is-invalid @enderror" id="soluongxuat" name="soluongxuat" value="{{ old('soluongxuat') }}" required />
                    @error('soluongxuat')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="donvitinh">Đơn vị tính</label>
                    <input type="text" class="form-control @error('donvitinh') is-invalid @enderror" id="donvitinh" name="donvitinh" value="{{ old('donvitinh') }}" required />
                    @error('donvitinh')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label class="form-label" for="giaxuat">Giá nhập</label>
                    <input type="number" min="0" class="form-control @error('giaxuat') is-invalid @enderror" id="giaxuat" name="giaxuat" value="{{ old('giaxuat') }}" required />
                    @error('giaxuat')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="thanhtien">Thành tiền</label>
                    <input type="number" min="0" class="form-control @error('thanhtien') is-invalid @enderror" id="thanhtien" name="thanhtien" value="{{ old('thanhtien') }}" required />
                    @error('thanhtien')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                   
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Thêm vào CSDL</button>
            </form>
        </div>
    </div>
@endsection