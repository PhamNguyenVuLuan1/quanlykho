@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Yêu cầu</div>
        <div class="card-body table-responsive">
            <p><a href="{{ route('yeucau.them') }}" class="btn btn-info"><i class="fa-light fa-plus"></i> <i class="bi bi-plus"></i> Thêm phiếu yêu cầu</a>
            
            <table class="table table-bordered table-hover table-sm mb-3">
                <thead>
                    <tr>
                        <th width="5%">#</th>   
                        <th width="20%">Người yêu cầu<th>
                        <th width="20%">Khoa phòng</th>
                        <th width="25%">Sản phẩm<th>                     
                        <th width="10%">SL yêu cầu</th>
                        <th width="15%">Tình trạng</th>                
                        <th width="5%">Sửa</th>
                        <th width="5%">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($yeucau as $value)
                        <tr>
                            <td>{{ $loop->index + $yeucau->firstItem() }}</td>
                            <td>{{ $value->nguoidung->name }}</td>
                            <td>{{ $value->khoaphong->tenkhoaphong }}</td>
                            <td>{{ $value->sanpham->tensanpham }}</td> 
                            <td class="text-end">{{ $value->soluongyeucau }}</td>
                            <td>{{ $value->tinhtrang }}</td>                         
                            <td class="text-center"><a href="{{ route('yeucau.sua', ['id' => $value->id]) }}"><i class="bi bi-pencil-square"></i></a></td>
                            <td class="text-center"><a href="{{ route('yeucau.xoa', ['id' => $value->id]) }}" onclick = "return confirm('Bạn có muốn xóa {{ $value->id }} không?')"><i class="bi bi-trash text-danger"></i></a>
                        </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection