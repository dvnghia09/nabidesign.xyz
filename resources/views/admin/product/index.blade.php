@extends('admin.master')
@section('home')
<div class="content-wrapper" style="min-height: 500px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Danh sách tất cả sản phẩm
      </h1>
    </section>

    <!-- Main content -->
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
      <!-- Default box -->
      <div class="col-md-12">
          <div class="box">
            <div class="box-header">
           <a href="{{ route('add.product') }}" class="btn btn-success">+Thêm mới sản phẩm</a>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                  <thead>
                      <tr>
                          <th>STT</th>
                          <th>Tên sản phẩm</th>
                          <th>Ảnh</th>
                          <th>Số lượng</th>
                          <th>Giá</th>
                          <th>Giá đặc biệt</th>
                          <th>Thuộc danh mục</th>
                          <th>Trạng thái</th>
                          <th>Hành động</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($product as $value)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <th>{{ $value->name }}</th>
                        <th><img src="{{url('images')}}/{{ $value->image }}" style="width:60px" alt=""></th>
                        <th>{{ $value->quantity }}</th>
                        <th>{{ number_format($value->price,0,".",".") }}đ</th>
                        <th>{{ number_format($value->sale_price,0,".",".") }}đ</th>
                        <th>{{ $value->Category->name }}</th>
                        <th>
                        @if($value->status == 1)
                          <span class="label label-success">Hiển thị</span>
                        @else
                          <span class="label label-danger">Đang ẩn</span>
                        @endif
                        </th>
                        <th>
                          <a class="btn btn-primary" href="{{ route('edit.product',$value->id) }}">Sửa</a>
                          <a class="btn btn-danger" href="{{ route('delete.product',$value->id) }}">Xóa</a>
                        </th>
                        <!-- <th>{!! $value->description !!}</th> -->
                    </tr>
                    @endforeach
                  </tbody>
                
                  
                
              
            </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
</div>

@stop