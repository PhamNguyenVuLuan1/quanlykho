@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Sản phẩm</div>
        <div class="card-body table-responsive">
            <p><a href="{{ route('nhapkho.them') }}" class="btn btn-info"><i class="fa-light fa-plus"></i> <i class="bi bi-plus"></i> Thêm mới</a>
            
            <table class="table table-bordered table-hover table-sm mb-3">
                <thead>
                    <tr>
                        <th width="5%">#</th>   
                        <th width="15%">Người nhập<th>
                        <th width="15%">Sản phẩm<th>      
                        <th width="8%">Loại SP</th>
                        <th width="10%">NCC</th>                     
                        <th width="7%">SL nhập</th>
                        <th width="10%">ĐVT</th>
                        <th width="10%">Giá nhập</th>
                        <th width="10%">Thành tiền</th>                     
                        <th width="5%">Sửa</th>
                        <th width="5%">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($nhapkho as $value)
                        <tr>
                            <td>{{ $loop->index + $nhapkho->firstItem() }}</td>
                            <td>{{ $value->nguoidung->name }}</td>
                            <td>{{ $value->sanpham->tensanpham }}</td>
                            <td>{{ $value->loainhapkho->tenloai }}</td>
                            <td>{{ $value->nhacungcap->tenncc }}<td>                    
                            <td class="text-end">{{ $value->soluongnhapkho }}</td>
                            <td>{{ $value->donvitinh }}</td>
                            <td class="text-end">{{ number_format($value->gianhap) }}</td>
                            <td class="text-end">{{ number_format($value->thanhtien) }}</td>
                            <td class="text-center"><a href="{{ route('nhapkho.sua', ['id' => $value->id]) }}"><i class="bi bi-pencil-square"></i></a></td>
                            <td class="text-center"><a href="{{ route('nhapkho.xoa', ['id' => $value->id]) }}" onclick = "return confirm('Bạn có muốn xóa {{ $value->id }} không?')"><i class="bi bi-trash text-danger"></i></a>
                        </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection