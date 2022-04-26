@extends('admin.master')
@section('home')
  <div class="content-wrapper" style="min-height: 500px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lý menu trang giao diện
       
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
     <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Sửa menu</h3>
                
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('category-sub.update',$categorySub->id) }}">
                @method('PUT')
                @csrf
                <!-- Để truyền id vào phần validate -->
                <input type="hidden" name="categorySub_id" value="{{$categorySub->id}}">
                
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Tên Menu</label>
                  <input type="text"  name="name" value="{{ $categorySub->name }}" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" placeholder="Nhập tên menu cha bạn muốn thêm">
                    @error('name')
                        <span class="message-err" style="color:red;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Chọn trạng thái</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="status" id="input" value="1" {{ $categorySub->status == 1 ? 'checked' : '' }}>
                      Hiện
                    </label>
                    <label>
                      <input type="radio" name="status" id="input" value="0" {{ $categorySub->status == 0 ? 'checked' : '' }} >
                      Ẩn
                    </label>
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
              </div>
            </form>
          </div>
       
          <!-- /.box -->

        </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
@stop