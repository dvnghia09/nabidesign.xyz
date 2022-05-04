@extends('admin.master')
@section('home')
<div class="content-wrapper" style="min-height: 500px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Danh sách menu cha
       
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
           <a href="{{ route('add.category') }}" class="btn btn-success">+Thêm mới Menu cha</a>

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
                <tbody>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Trạng thái</th>
                        <th>Menu con</th>
                        <th>Link</th>
                        <th>Tùy chọn</th>
                    </tr>
                <tr>
                  @foreach($category as $value)  
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $value->name }}</td>
                  <td>
                  @if($value->status == 1)
                  <span class="label label-success">Hiển thị</span>
                   @else
                  <span class="label label-danger">Đang ẩn</span>
                  @endif
                  </td>
                  <!-- <th>{{ $value->categorySub->count() }}</th> -->
                  <th>
                    @foreach($value->categorySub as $ads)
                     
                     <h4>-{{$ads->name}}</h4>
                    @endforeach

                  </th>
                  <th>{{ $value->link }}</th>

                  <td>
                  <a href="{{ route('edit-category', $value->id)}}" class="btn btn-success">Sửa</a>
                  <a href="{{ route('delete-category', $value->id)}}" class="btn btn-danger" onclick="return confirm('Xóa danh mục {{ $value->name }} nghĩa là bạn đang xóa tất cả danh mục con và tất cả sản phẩm thuộc những danh mục con đó, bạn có muốn thực hiện không?')">Xóa</a>
                    
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