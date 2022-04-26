@extends('admin.master')
@section('home')
  <div class="content-wrapper" style="min-height: 500px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lý thuộc tính sản phẩm
       
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
     <div class="box box-primary">
          <!-- general form elements -->
              
                    <form method="POST" action="{{ route('attr-product.store') }}">
                        @csrf
                      <div class="box-body " >
                          <div class="form-group">
                            <label for="example1">Màu sản phảm</label>
                            <input type="hidden" name="name" value="color">
                            <input  type="text" name="value" class="form-control @error('value') is-invalid @enderror" id="example1" >
                            @error('value')
                                <span class="message-err" style="color:red;">{{ $message }}</span>
                            @enderror                              
                          </div>
                      </div>
                          <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                          </div>
                    </form>         
      </div>

      

        
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
@stop

