@extends('admin.master')
@section('home')
  <div class="content-wrapper" style="min-height: 500px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thêm Banner Mới
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
     <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('banner.store') }}" enctype='multipart/form-data'>
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Tên Banner</label>
                  <input type="text" value="{{ old('name') }}" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nhập tên banner">
                    @error('name')
                        <span class="message-err" style="color:red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="link">Đường dẫn banner</label>
                  <input type="text" value="{{ old('link') }}" name="link" class="form-control @error('link') is-invalid @enderror" id="link" placeholder="Nhập đường dẫn">
                    @error('link')
                        <span class="message-err" style="color:red;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                  <label for="file-upload">Ảnh Banner</label>
                  <div class="imageFile" style="height:120px;width:100%;">
                    <label for="file-upload" class="custom-file-upload">
                      <img src="" id="image" style="height:100%;border-radius:5px;display:none;" alt="Preview">
                    </label>
                  </div>
                  <label for="file-upload" style="margin-top: 4px;" class="custom-file">
                      <i class="fa fa-cloud-upload"></i>
                      Chọn ảnh
                  </label>
                  <input id="file-upload" type="file" value="{{ old('file') }}" onchange="chooseFile(this)" name="file" class="form-control dn @error('file') is-invalid @enderror" >
                    @error('file')
                        <span class="message-err" style="color:red;">{{ $message }}</span>
                    @enderror
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Thêm</button>
              </div>
            </form>
          </div>
       
          <!-- /.box -->

        </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
@stop

@section('tinymce')
<script>
        function chooseFile(fileInput){
          if(fileInput.files && fileInput.files[0]){
            var reader = new FileReader();

            reader.onload = function (e) {
              $('#image').attr('src',e.target.result);
              $('#image').css('display','block');
            }
            reader.readAsDataURL(fileInput.files[0]);

          }
        }
</script>
@stop
