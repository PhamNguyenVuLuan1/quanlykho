@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Sản phẩm</div>
        <div class="card-body table-responsive">
            <p><a href="{{ route('kiemketon.them') }}" class="btn btn-info"><i class="fa-light fa-plus"></i> <i class="bi bi-plus"></i> Kiểm kê</a>
            
            <table class="table table-bordered table-hover table-sm mb-3">
                <thead>
                    <tr>
                        <th width="5%">#</th>   
                        <th width="20%">Người kiểm kê<th>
                        <th width="20%">sản phẩm</th>         
                        <th width="10%">Số lượng tồn</th>
                        <th width="10%">Số lượng thực tế</th>
                        <th width="10%">Chênh lệch</th>
                        <th width=20%">Mô tả</th>  
                        <th width="5%">Sửa</th>
                        <th width="5%">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kiemketon as $value)
                        <tr>
                            <td>{{ $loop->index + $kiemketon->firstItem() }}</td>
                            <td>{{ $value->nguoidung->name }}</td>
                            <td>{{ $value->sanpham->tensanpham }}</td>                  
                            <td class="text-end">{{ $value->soluongtonkho }}</td>
                            <td class="text-end">{{ $value->soluongthucte }}</td>
                            <td class="text-end">{{ $value->chenhlech }}</td>
                            <td>{{ $value->mota }}</td>
                            <td class="text-center"><a href="{{ route('kiemketon.sua', ['id' => $value->id]) }}"><i class="bi bi-pencil-square"></i></a></td>
                            <td class="text-center"><a href="{{ route('kiemketon.xoa', ['id' => $value->id]) }}" onclick = "return confirm('Bạn có muốn xóa {{ $value->id }} không?')"><i class="bi bi-trash text-danger"></i></a>
                        </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection