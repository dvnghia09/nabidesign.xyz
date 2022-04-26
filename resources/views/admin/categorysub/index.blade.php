@extends('admin.master')
@section('home')
<div class="content-wrapper" style="min-height: 500px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Danh sách menu con
       
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
           <a href="{{ route('category-sub.create') }}" class="btn btn-success">+Thêm mới Menu con</a>

              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Menu cha</th>
                        <th>Trạng thái</th>
                        <th>Tùy chọn</th>
                    </tr>
                <tr>
                  @foreach($categorySub as $value)  
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $value->name }}</td>
                  <td>{{ $value->Category->name }}</td>
                  <td>
                  @if($value->status == 1)
                  <span class="label label-success">Hiển thị</span>
                   @else
                  <span class="label label-danger">Đang ẩn</span>
                  @endif
                  </td>
                  
                  <td>
                  <a href="{{ route('category-sub.edit',$value->id) }}" class="btn btn-success">Sửa</a>
                  <form action="{{ route('category-sub.destroy',$value->id) }}" method="POST"> 
                    @method('DELETE')
                    @csrf               
                    <button type="submit" href="" class="btn btn-danger" onclick="return confirm('Xóa dang mục {{ $value->name }} đồng nghĩa với bạn sẽ xóa tất cả sản phẩm liên quan đến nó, Bạn có muốn thực hiện không?')">Xóa</button>
                  </form>    
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