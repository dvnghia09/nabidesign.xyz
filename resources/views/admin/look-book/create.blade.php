@extends('admin.master')
@section('home')
  <div class="content-wrapper" style="min-height: 500px;">
    <section class="content-header">
      <h1>Thêm Thương Hiệu Mới</h1>
    </section>

    <section class="content">
      <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
                <a href="{{ route('look-book.index') }}" class="btn btn-default">
                    <i class="fa fa-arrow-left"></i> Quay lại
                </a>
            </div>
            <form method="POST" action="{{ route('look-book.store') }}" enctype='multipart/form-data'>
                @csrf
              <div class="box-body">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-group">
                  <label for="name">Tên Thương Hiệu <span class="text-danger">*</span></label>
                  <input type="text" value="{{ old('name') }}" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nhập tên thương hiệu">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="link">Đường dẫn (Link) <span class="text-danger">*</span></label>
                  <input type="text" value="{{ old('link') }}" name="link" class="form-control @error('link') is-invalid @enderror" id="link" placeholder="https://...">
                    @error('link')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                  <label for="file-upload">Ảnh Thương Hiệu <span class="text-danger">*</span></label>
                  <div class="imageFile" style="height:120px;width:100%;">
                    <label for="file-upload" class="custom-file-upload">
                      <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" id="image" style="height:100%;border-radius:5px;display:none;" alt="">
                      <div id="placeholder" style="height:100%;display:flex;align-items:center;justify-content:center;border:2px dashed #ddd;border-radius:5px;">
                          <span class="text-muted"><i class="fa fa-image fa-2x"></i><br>Click để chọn ảnh</span>
                      </div>
                    </label>
                  </div>
                  <label for="file-upload" style="margin-top: 4px;" class="custom-file">
                      <i class="fa fa-cloud-upload"></i>
                      Chọn ảnh
                  </label>
                  <input id="file-upload" type="file" value="{{old('file')}}" onchange="chooseFile(this)" name="file" class="form-control dn @error('file') is-invalid @enderror">
                    @error('file')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Thêm mới</button>
                <a href="{{ route('look-book.index') }}" class="btn btn-default">Hủy</a>
              </div>
            </form>
          </div>
        </div>
    </section>
  </div>
@stop
@section('tinymce')
<script>
    function chooseFile(fileInput){
      if(fileInput.files && fileInput.files[0]){
        var reader = new FileReader();
        reader.onload = function (e) {
          var img = document.getElementById('image');
          var placeholder = document.getElementById('placeholder');
          img.setAttribute('src', e.target.result);
          img.style.display = 'block';
          placeholder.style.display = 'none';
        }
        reader.readAsDataURL(fileInput.files[0]);
      }
    }
</script>
@stop
