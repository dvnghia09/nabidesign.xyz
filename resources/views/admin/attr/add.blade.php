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
                            <label>Tên thuộc tính (Ví dụ: Color, Size, Dòng máy...)</label>
                            <input type="text" list="existing-names" name="name" class="form-control" placeholder="Chọn hoặc nhập tên mới" required>
                            <datalist id="existing-names">
                                @foreach($names as $n)
                                    <option value="{{ $n }}">
                                @endforeach
                            </datalist>
                          </div>
                          <div class="form-group">
                            <label for="example1">Giá trị thuộc tính</label>
                            <input  type="text" name="value" class="form-control @error('value') is-invalid @enderror" id="example1" placeholder="Ví dụ: Red, L..." required>
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

