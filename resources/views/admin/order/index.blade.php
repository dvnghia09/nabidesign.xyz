@extends('admin.master')
@section('home')
<div class="content-wrapper" style="min-height: 500px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Danh sách đơn hàng
       
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
           

              <div class="box-tools" style="position: revert;">
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
                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Sản phẩm</th>
                        <th>Thanh toán</th>
                        <th>Lời nhắn</th>
                        <th>Thời gian</th>
                        <th>Trạng thái</th>
                        <th>Hành Động</th>
                    </tr>
                <tr>
                  @foreach($order as $value)  
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $value->name }}</td>
                  <td>{{ $value->phone }}</td>
                  <td>{{ $value->addrest }}</td>
                  <td>
                    @foreach($value->orderDetail as $ads)
                     <div style="display:flex;margin:3px;">
                       <img src="{{url('images')}}/{{ $ads->image }}" style="width:40px;border-radius:3px" alt="">
                       <p>
                       <strong>{{$ads->product_name}} </strong><br/>
                        Màu:{{$ads->color}}-Size:{{$ads->size}} <span style="color:#373ce3">x{{$ads->quantity}}</span>
                       </p>

                     </div>
                    @endforeach  
                  </td>
                  <td>{{ number_format($value->total_price,0,".",".") }}đ</td>
                  <td>{{ $value->note }}</td>
                  <td>{{ $value->created_at }}</td>
                  <td>
                  @if($value->status == 1)
                  <span class="label label-danger">Chưa xác nhận</span>
                   @else
                  <span class="label label-success">Đã xác nhận</span>
                  @endif
                  </td>
                  
                  <td>
                    <form action="{{ route('order.update',$value->id) }}" method="post">
                      @csrf
                      @method('PUT')
                      <input type="hidden" name="status" value="2">
                      <button style="border:none;background: transparent;" type="submit" class="" title="Xác Nhận"><i style="color:#00a65a" class="fa fa-fw fa-check-circle"></i></button>
                    </form>

                  
                  <form action="{{ route('order.destroy',$value->id) }}" method="post">
                      @csrf
                      @method('DELETE')
                      <input type="hidden" name="status" value="2">
                      <button style="border:none;background: transparent;" type="submit" onclick="return confirm('Bạn có muốn xóa đơn hàng này không?')" class="" title="Xóa"><i style="color:red" class="fa fa-fw fa-trash-o"></i></button>
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