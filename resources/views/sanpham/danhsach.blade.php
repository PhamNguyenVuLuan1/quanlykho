@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Sản phẩm</div>
        <div class="card-body table-responsive">
            <p><a href="{{ route('sanpham.them') }}" class="btn btn-info"><i class="fa-light fa-plus"></i> <i class="bi bi-plus"></i> Thêm mới</a>
            
            <table class="table table-bordered table-hover table-sm mb-3">
                <thead>
                    <tr>
                        <th width="5%">#</th>   
                        <th width="9%">Hình ảnh<th>              
                        <th width="8%">Loại sản phẩm</th>
                        <th width="8%">Nhà cung cấp</th>
                        <th width="25%">Tên sản phẩm<th>                     
                        <th width="7%">SL</th>
                        <th width="8%">ĐVT</th>
                        <th width="10%">Đơn giá</th>
                        <th width="10%">Mô tả</th>
                        <th width="5%">Sửa</th>
                        <th width="5%">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sanpham as $value)
                        <tr>
                            <td>{{ $loop->index + $sanpham->firstItem() }}</td>
                            <td class="text-center"><img src="{{ env('APP_URL') . '/storage/app/' . $value->hinhanh }}" width="80" class="img-thumbnail" /></td>
                            <td>{{ $value->loaisanpham->tenloai }}</td>
                            <td>{{ $value->nhacungcap->tenncc }}</td>
                            <td>{{ $value->tensanpham }}</td>
                            <td class="text-end">{{ $value->soluong }}</td>
                            <td>{{ $value->donvitinh }}</td>
                            <td class="text-end">{{ number_format($value->dongia) }}</td>
                            <td>{{ $value->motasanpham }}</td>
                            <td class="text-center"><a href="{{ route('sanpham.sua', ['id' => $value->id]) }}"><i class="bi bi-pencil-square"></i></a></td>
                            <td class="text-center"><a href="{{ route('sanpham.xoa', ['id' => $value->id]) }}" onclick = "return confirm('Bạn có muốn xóa {{ $value->tensanpham }} không?')"><i class="bi bi-trash text-danger"></i></a>
                        </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection