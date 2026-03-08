@extends('admin.master')
@section('home')
<div class="content-wrapper" style="min-height: 500px;">
    <section class="content-header">
      <h1>Quản lý Thương Hiệu</h1>
    </section>

    <section class="content">
        @if(Session::has('message'))
            <div class="alert alert-success">
                  <button type="button" data-dismiss="alert" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <strong>
                      {{ Session::get('message') }}
                    </strong>
            </div>
        @endif

      <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
                <a href="{{ route('look-book.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Thêm thương hiệu mới
                </a>
            </div>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Tên Thương Hiệu</th>
                          <th>Ảnh</th>
                          <th>Link</th>
                          <th>Hành Động</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($lookBook as $value)
                      <tr>
                          <th>{{ $loop->iteration }}</th>
                          <th>{{$value->name}}</th>
                          <th><img src="{{url('images')}}/{{$value->image}}" style="width:100px; height:70px; object-fit:cover;" alt=""></th>
                          <th>
                              <a href="{{ $value->link }}" target="_blank" style="max-width:200px; display:block; overflow:hidden; text-overflow:ellipsis; white-space:nowrap;">
                                  {{ $value->link }}
                              </a>
                          </th>
                          <th>
                              <a href="{{ route('look-book.edit', $value->id) }}" title="Sửa" class="btn btn-xs btn-warning">
                                  <i class="fa fa-pencil"></i> Sửa
                              </a>
                              <form action="{{ route('look-book.destroy', $value->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Bạn có chắc muốn xóa thương hiệu này?')">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-xs btn-danger">
                                      <i class="fa fa-trash"></i> Xóa
                                  </button>
                              </form>
                          </th>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
            </div>
          </div>
        </div>
    </section>
</div>

@stop