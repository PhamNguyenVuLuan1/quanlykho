@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Nhà cung cấp</div>
        <div class="card-body table-responsive">
            <p><a href="{{ route('nhacungcap.them') }}" class="btn btn-info"><i class="bi bi-plus"></i> Thêm mới</a></p>
            <table class="table table-bordered table-hover table-sm mb-0">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="15%">Tên nhà cung cấp</th>
                        <th width="15%">Tên nhà cung cấp không dấu</th>
                        <th width="10%">SĐT</th>
                        <th width="25%">Địa chỉ</th>
                        <th width="20%">Email</th>                        
                        <th width="5%">Sửa</th>
                        <th width="5%">Xóa</th>
                    </tr>
                </thead>
            `   <tbody>
                    @foreach($nhacungcap as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->tenncc }}</td>
                            <td>{{ $value->tenncc_slug }}</td>
                            <td>{{ $value->sdt }}</td>
                            <td>{{ $value->diachi }}</td>
                            <td>{{ $value->email }}</td>
                            <td class="text-center"><a href="{{ route('nhacungcap.sua', ['id' => $value->id]) }}"><i class="bi bi-pencil-square"></i></a></td>
                            <td class="text-center"><a href="{{ route('nhacungcap.xoa', ['id' => $value->id]) }}" onclick = "return confirm('Bạn có muốn xóa {{ $value->tenncc }}?')"><i class="bi bi-trash text-danger"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


