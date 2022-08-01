@extends('master')
@section('home')
<style>
  .header{
    background: #fff;
    animation: none;
    -webkit-box-shadow: 0 0 3px rgb(0 0 0 / 8%) inset;
    box-shadow: 6px 5px 8px 3px rgb(0 0 0 / 8%);
  }

  	table, td, th {
  		border: 1px solid;
		font-size: 12px;
		text-align:center;
	}

	table {
		margin-top: 50px;
		width: 100%;
		border-collapse: collapse;
	}
</style>
<div class="box">
			        <div class="grid wide">
			            <div class="row">
			                <div class="col l-3">
			                    <ul class="cate_user">
                                <li class="cate_user_list">
			                            <h1 class="cate_usre_link">Tài khoản: {{ Auth::user()->email }}</h1>
			                        </li>
			                        <li class="cate_user_list">
			                            <a href="" class="cate_usre_link">Đơn hàng</a>
			                        </li>

			                        <li class="cate_user_list">
			                            <a href="{{ route('showCart.user') }}" class="cate_usre_link">Giỏ hàng</a>      
			                        </li>
			                        <li class="cate_user_list">
			                            <a href="{{ route('logout.user') }}" class="cate_usre_link">Đăng xuất</a>
			                        </li>
			                    </ul>
			                </div> 
                            
                            <div class="col l-9">
							<div class="box-body table-responsive no-padding">
              <table class="table table-hover" style="width: 100%;">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <th>Sản phẩm</th>
                        <th>Thanh toán</th>
                        <th>Thời gian</th>
                        <th>Trạng thái</th>
                    </tr>
                <tr>
                  @foreach($order as $value)  
                  <td>{{ $value->id }}</td>
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
                  <td>{{ $value->created_at }}</td>
                  <td>
                  @if($value->status == 1)
                  <span style="color: red;" class="label label-danger">Chờ giao hàng</span>
                   @else
                  <span style="color: red;" class="label label-success">Đang giao hàng</span>
                  @endif
                  </td>

                </tr>
                @endforeach 
                
              </tbody></table>
            </div>
                            </div>
			            </div>
			        </div>
			    </div>
@stop