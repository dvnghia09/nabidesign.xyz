@extends('master')
@section('home')
<style>
  .header{
    background: #fff;
    animation: none;
    -webkit-box-shadow: 0 0 3px rgb(0 0 0 / 8%) inset;
    box-shadow: 6px 5px 8px 3px rgb(0 0 0 / 8%);
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
                                <!-- <?php 
                                /*
                                		if(isset($_GET['page'])) {
									        $page = $_GET['page'];
									        include 'page/'.$page.'.php';
									      }
								*/
                                 ?> -->
                            </div>
			            </div>
			        </div>
			    </div>
@stop