@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Khoa phòng</div>
        <div class="card-body table-responsive">
            <p><a href="{{ route('khoaphong.them') }}" class="btn btn-info"><i class="bi bi-plus"></i> Thêm mới</a></p>
            <table class="table table-bordered table-hover table-sm mb-0">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="30%">Tên khoa phòng</th>
                        <th width="25%">Tên khoa phòng không dấu</th>
                        <th width="15%">Loại khoa phòng</th>
                        <th width="15%">Trạng thái</th>
                        <th width="5%">Sửa</th>
                        <th width="5%">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($khoaphong as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->tenkhoaphong }}</td>
                            <td>{{ $value->tenkhoaphong_slug }}</td>
                            <td>{{ $value->loaikhoaphong }}</td>
                            <td>{{ $value->trangthai }}</td>
                            <td class="text-center"><a href="{{ route('khoaphong.sua', ['id' => $value->id]) }}"><i class="bi bi-pencil-square"></i></a></td>
                            <td class="text-center"><a href="{{ route('khoaphong.xoa', ['id' => $value->id]) }}" onclick = "return confirm('Bạn có muốn xóa {{ $value->tenkhoaphong }}?')"><i class="bi bi-trash text-danger"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>`
            </table>
        </div>
    </div>
@endsection


