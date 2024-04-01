@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Sản phẩm</div>
        <div class="card-body table-responsive">
            <p><a href="{{ route('xuatkho.them') }}" class="btn btn-info"><i class="fa-light fa-plus"></i> <i class="bi bi-plus"></i> Thêm phiếu xuất</a>
            
            <table class="table table-bordered table-hover table-sm mb-3">
                <thead>
                    <tr>
                        <th width="5%">#</th>   
                        <th width="15%">Khoa phòng<th>
                        <th width="15%">sản phẩm</th>
                        <th width="15%">Người xuất<th>                     
                        <th width="10%">SL xuất</th>
                        <th width="10%">Đơn vị tính</th>
                        <th width="10%">Giá xuất</th>
                        <th width="10%">Thành tiền</th>                     
                        <th width="5%">Sửa</th>
                        <th width="5%">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($xuatkho as $value)
                        <tr>
                            <td>{{ $loop->index + $xuatkho->firstItem() }}</td>
                            <td>{{ $value->sanpham->tensanpham }}</td> 
                            <td>{{ $value->khoaphong->tenkhoaphong }}</td>
                            <td>{{ $value->nguoidung->name }}</td>                 
                            <td class="text-end">{{ $value->soluongxuat }}</td>
                            <td>{{ $value->donvitinh }}</td>
                            <td class="text-end">{{ number_format($value->giaxuat) }}<td>
                            <td class="text-end">{{ number_format($value->thanhtien) }}</td>
                            <td class="text-center"><a href="{{ route('xuatkhoa.sua', ['id' => $value->id]) }}"><i class="bi bi-pencil-square"></i></a></td>
                            <td class="text-center"><a href="{{ route('xuatkho.xoa', ['id' => $value->id]) }}" onclick = "return confirm('Bạn có muốn xóa {{ $value->id }} không?')"><i class="bi bi-trash text-danger"></i></a>
                        </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection