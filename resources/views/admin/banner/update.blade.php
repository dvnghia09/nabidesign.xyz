@extends('admin.master')
@section('home')
  <div class="content-wrapper" style="min-height: 500px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Trang quản lý banner 
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
     <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Sửa banner</h3>
                
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('banner.update',1) }}" enctype='multipart/form-data'>
                @csrf
                @method('PUT')
              <div class="box-body">
                
                <div class="form-group">
                  <label for="file-upload">Banner slide 1</label>
                  <div class="imageFile" style="height:120px;width:100%;">
                    <label for="file-upload" class="custom-file-upload">
                      <img src="{{url('images')}}/{{$banner->banner1}}" id="image" style="height:100%;border-radius:5px;" style="" alt="">
                    </label>
                  </div>
                  <label for="file-upload" style="margin-top: 4px;" class="custom-file">
                      <i class="fa fa-cloud-upload"></i>
                      Chọn ảnh
                  </label>
                  <input id="file-upload" type="file" value="{{old('file')}}" onchange="chooseFile(this)" name="file1" class="form-control dn @error('image') is-invalid @enderror" >
                    @error('file1')
                        <span class="message-err" style="color:red;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                  <label for="file-upload2">Banner slide 2</label>
                  <div class="imageFile" style="height:120px;width:100%;">
                    <label for="file-upload2" class="custom-file-upload">
                      <img src="{{url('images')}}/{{$banner->banner2}}" id="image2" style="height:100%;border-radius:5px;" style="" alt="">
                    </label>
                  </div>
                  <label for="file-upload2" style="margin-top: 4px;" class="custom-file">
                      <i class="fa fa-cloud-upload"></i>
                      Chọn ảnh
                  </label>
                  <input id="file-upload2" type="file" value="{{old('file')}}" onchange="chooseFiles(this)" name="file2" class="form-control dn @error('image') is-invalid @enderror" >
                    @error('file2')
                        <span class="message-err" style="color:red;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                  <label for="file-upload3">Banner slide 3</label>
                  <div class="imageFile" style="height:120px;width:100%;">
                    <label for="file-upload3" class="custom-file-upload">
                      <img src="{{url('images')}}/{{$banner->banner3}}" id="image3" style="height:100%;border-radius:5px;" style="" alt="">
                    </label>
                  </div>
                  <label for="file-upload3" style="margin-top: 4px;" class="custom-file">
                      <i class="fa fa-cloud-upload"></i>
                      Chọn ảnh
                  </label>
                  <input id="file-upload3" type="file" value="{{old('file')}}" onchange="chooseFiless(this)" name="file3" class="form-control dn @error('image') is-invalid @enderror" >
                    @error('file3')
                        <span class="message-err" style="color:red;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                  <label for="file-upload4">Banner product</label>
                  <div class="imageFile" style="height:120px;width:100%;">
                    <label for="file-upload4" class="custom-file-upload">
                      <img src="{{url('images')}}/{{$banner->banner4}}" id="image4" style="height:100%;border-radius:5px;" style="" alt="">
                    </label>
                  </div>
                  <label for="file-upload4" style="margin-top: 4px;" class="custom-file">
                      <i class="fa fa-cloud-upload"></i>
                      Chọn ảnh
                  </label>
                  <input id="file-upload4" type="file" value="{{old('file')}}" onchange="chooseFilesss(this)" name="file4" class="form-control dn @error('image') is-invalid @enderror" >
                    @error('file4')
                        <span class="message-err" style="color:red;">{{ $message }}</span>
                    @enderror
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Sửa</button>
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
<script src="{{ url('assest') }}/tinymce/tinymce.min.js"></script>
<script src="{{ url('assest') }}/tinymce/config.js"></script>
<script>
        tinymce.init({
            selector: '#content'
        });

        function chooseFile(fileInput){
          if(fileInput.files && fileInput.files[0]){
            var reader = new FileReader();

            reader.onload = function (e) {
              $('#image').attr('src',e.target.result);
            }
            reader.readAsDataURL(fileInput.files[0]);

          }
        }

        function chooseFiles(fileInput){
          if(fileInput.files && fileInput.files[0]){
            var reader = new FileReader();

            reader.onload = function (e) {
              $('#image2').attr('src',e.target.result);
            }
            reader.readAsDataURL(fileInput.files[0]);

          }
        }

        function chooseFiless(fileInput){
          if(fileInput.files && fileInput.files[0]){
            var reader = new FileReader();

            reader.onload = function (e) {
              $('#image3').attr('src',e.target.result);
            }
            reader.readAsDataURL(fileInput.files[0]);

          }
        }

        function chooseFilesss(fileInput){
          if(fileInput.files && fileInput.files[0]){
            var reader = new FileReader();

            reader.onload = function (e) {
              $('#image4').attr('src',e.target.result);
            }
            reader.readAsDataURL(fileInput.files[0]);

          }
        }
  

        


</script>
@stop