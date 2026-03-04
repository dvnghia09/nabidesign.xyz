@extends('admin.master')

@section('home')
<div class="content-wrapper">
    <section class="content-header">
      <h1>Danh sách liên hệ</h1>
    </section>

    <section class="content">
      <div class="box">
        <div class="box-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Điện thoại</th>
                        <th>Ngày gửi</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            @if($item->status == 0)
                                <span class="label label-warning">Chưa đọc</span>
                            @else
                                <span class="label label-success">Đã đọc</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.contact.show', $item->id) }}" class="btn btn-xs btn-info"><i class="fa fa-eye"></i> Xem</a>
                            <form action="{{ route('admin.contact.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')"><i class="fa fa-trash"></i> Xóa</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </section>
</div>
@stop
