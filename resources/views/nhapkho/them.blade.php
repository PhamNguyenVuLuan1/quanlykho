@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Nhập kho</div>
        <div class="card-body">
            <form action="{{ route('nhapkho.them') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="nguoinhap_id">Người nhập</label>
                    <select class="form-select @error('nguoinhap_id') is-invalid @enderror" id="nguoinhap_id" name="nguoinhap_id" required>
                        <option value="">-- Chọn --</option>
                        @foreach($nguoidung as $value)
                            <option value="{{ $value->id }}">{{ $value->name }}</option>
                        @endforeach
                    </select>
                    @error('nguoinhap_id')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="sanphamnhap_id">Sản phẩm</label>
                    <select class="form-select @error('sanphamnhap_id') is-invalid @enderror" id="sanphamnhap_id" name="sanphamnhap_id" required>
                        <option value="">-- Chọn sản phâm --</option>
                        @foreach($sanpham as $value)
                            <option value="{{ $value->id }}">{{ $value->tensanpham }}</option>
                        @endforeach
                    </select>
                    @error('sanphamnhap_id')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div> 
            
                <div class="mb-3">
                    <label class="form-label" for="loaisanphamnhap_id">Loại sản phẩm</label>
                    <select class="form-select @error('loaisanphamnhap_id') is-invalid @enderror" id="loaisanphamnhap_id" name="loaisanphamnhap_id" required>
                        <option value="">-- Chọn loại sản phâm --</option>
                        @foreach($loaisanpham as $value)
                            <option value="{{ $value->id }}">{{ $value->tenloai }}</option>
                        @endforeach
                    </select>
                    @error('loaisanphamnhap_id')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label" for="nhacungcapnhap_id">Nhà cung cấp</label>
                    <select class="form-select @error('nhacungcapnhap_id') is-invalid @enderror" id="nhacungcapnhap_id" name="nhacungcapnhap_id" required>
                        <option value="">-- Chọn nhà cung cấp --</option>@foreach($nhacungcap as $value)
                        <option value="{{ $value->id }}">{{ $value->tenncc }}</option>
                        @endforeach
                    </select>
                    @error('nhacungcapnhap_id')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
           
                <div class="mb-3">
                    <label class="form-label" for="soluongnhapkho">Số lượng</label>
                    <input type="number" min="0" class="form-control @error('soluongnhapkho') is-invalid @enderror" id="soluongnhapkho" name="soluongnhapkho" value="{{ old('soluongnhapkho') }}" required />
                    @error('soluongnhapkho')
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
                    <label class="form-label" for="gianhap">Giá nhập</label>
                    <input type="number" min="0" class="form-control @error('gianhap') is-invalid @enderror" id="gianhap" name="gianhap" value="{{ old('gianhap') }}" required />
                    @error('gianhap')
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