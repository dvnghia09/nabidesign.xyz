@extends('admin.master')
@section('home')
<div class="content-wrapper" style="min-height: 500px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Danh sách tất cả LookBook
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
            
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                  <thead>
                      <tr>
                          <th>Tên LookBook</th>
                          <th>Ảnh</th>
                          <th>Link</th>
                          <th>Hành Động</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach($lookBook as $value)
                      <tr>
                          <th>{{$value->name}}</th>
                          <th><img src="{{url('images')}}/{{$value->image}}" style="width:100px" alt=""></th>
                          <th>{{$value->link}}</th>
                          <th><a href="{{ route('look-book.edit',$value->id) }}" title="Sửa"><i class="fa fa-fw fa-pencil-square-o" style="color:red"></i></a></th>
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