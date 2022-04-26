@extends('admin.master')
@section('home')
<div class="content-wrapper" style="min-height: 500px;">
    <!-- Content Header (Page header) -->
    <section style="display:flex;justify-content: space-between;" class="content-header">
      <h1>
        Danh sách thuộc tính sản phẩm
      </h1>
      <a href="{{ route('attr-product.create') }}" style="background:#4070f4;color:#fff" class="btn">+Thêm mới</a>
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
      <div class="col-md-6">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                    <tr>
                      <th colspan="3">Bảng size</th>
                    </tr>
                      
                    <tr>
                        <th>STT</th>
                        <th>Giá trị</th>
                        <th>Hành động</th>

                    </tr>
                    @foreach($attrSize as $value)  
               <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $value->value }}</td>
                  <td>
                  <a href="{{ route('attr-product.show',$value->id) }}" title="Xóa" onclick="return confirm('Bạn có muốn xóa thuộc tính này không ?')"><i class="fa fa-fw fa-trash" style="color:red" ></i></a>  
                  </td>

                </tr>
                @endforeach 
                
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <div class="col-md-6">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                    <tr>
                      <th colspan="3">Bảng màu</th>
                    </tr>
                    <tr>
                        <th>STT</th>
                        <th>Giá trị</th>
                        <th>Hành động</th>
                    </tr>
                    @foreach($attrColor as $value)  
               <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $value->value }}</td>
                  <td>
                  <a href="{{ route('attr-product.show',$value->id) }}" title="Xóa" class="" onclick="return confirm('Bạn có muốn xóa thuộc tính này không ?')"><i class="fa fa-fw fa-trash" style="color:red" ></i></a>  
                  </td>

                </tr>
                @endforeach 
                
              </tbody></table>
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