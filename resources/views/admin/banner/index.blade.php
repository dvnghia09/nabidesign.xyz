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
           <a href="{{ route('banner.edit', 1) }}" class="btn btn-success">Sửa banner</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                  <thead>
                      <tr>
                          <th>Tên banner</th>
                          <th>Ảnh</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($banner as $value)
                    <tr>
                        <th>Banner slide 1</th>
                        <th><img src="{{url('images')}}/{{ $value->banner1 }}" style="width:200px" alt=""></th>
                    </tr>
                    @endforeach
                    @foreach($banner as $value)
                    <tr>
                        <th>Banner slide 2</th>
                        <th><img src="{{url('images')}}/{{ $value->banner2 }}" style="width:200px" alt=""></th>
                    </tr>
                    @endforeach
                    @foreach($banner as $value)
                    <tr>
                        <th>Banner slide 3</th>
                        <th><img src="{{url('images')}}/{{ $value->banner3 }}" style="width:200px" alt=""></th>
                    </tr>
                    @endforeach
                    @foreach($banner as $value)
                    <tr>
                        <th>Banner sản phẩm bán chạy nhất</th>
                        <th><img src="{{url('images')}}/{{ $value->banner4 }}" style="width:60px" alt=""></th>
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