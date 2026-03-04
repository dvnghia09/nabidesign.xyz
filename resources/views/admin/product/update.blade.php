@extends('admin.master')
@section('home')
  <div class="content-wrapper" style="min-height: 500px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sửa sản phẩm 
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
     <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Sửa sản phẩm</h3>
                
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('update.product',$product->id) }}" enctype='multipart/form-data'>
                @csrf
                <input type="hidden" name="id" value="{{$product->id}}">
              <div class="box-body">
                <div class="form-group">
                  <label for="example1">Tên sản phẩm</label>
                  <input type="text" value="{{ old('name', $product->name) }}" name="name" class="form-control @error('name') is-invalid @enderror" id="example1" placeholder="Nhập sản phẩm">
                    @error('name')
                        <span class="message-err" style="color:red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="example2">Số lượng</label>
                  <input type="number" value="{{ old('quantity', $product->quantity) }}" name="quantity" class="form-control @error('quantity') is-invalid @enderror" id="example2" placeholder="Nhập số lượng sản phẩm">
                    @error('quantity')
                        <span class="message-err" style="color:red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="example3">Giá sản phẩm (Để trống nếu muốn hiển thị nút Liên hệ)</label>
                  <input type="text" value="{{ old('price', $product->price) }}" name="price" class="form-control @error('price') is-invalid @enderror" id="example3" placeholder="Nhập giá sản phẩm">
                    @error('price')
                        <span class="message-err" style="color:red;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row">
                  @foreach($attributes as $name => $values)
                  <div class="col-md-4">
                    <div class="form-group">
                      <label style="text-transform: uppercase;">{{ $name }}</label>
                      <input type="text" name="attr_values[{{ $name }}]" 
                             value="{{ old('attr_values.'.$name, $selectedAttrs[$name] ?? '') }}"
                             class="form-control" list="list-{{ $loop->index }}" placeholder="Nhập {{ $name }}...">
                      <datalist id="list-{{ $loop->index }}">
                        @foreach($values as $value)
                          <option value="{{ $value->value }}">
                        @endforeach
                      </datalist>
                      <p class="help-block"><small>Bạn có thể nhập nhiều giá trị cách nhau bằng dấu phẩy (,)</small></p>
                    </div>
                  </div>
                  @endforeach
                </div>

                <div class="form-group">
                  <label for="">Danh mục sản phẩm</label>
                  <select class="form-control" name="category_id">
                    @foreach($categorysub as $value)
                    <option  value="{{ $value->id }}" {{ old('category_id', $product->category_id) == $value->id ? 'selected' : '' }} >{{ $value->name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="file-upload">Ảnh sản phẩm</label>
                  <div class="imageFile" style="height:120px;width:100%;">
                    <label for="file-upload" class="custom-file-upload">
                      <img src="{{url('images')}}/{{$product->image}}" id="image" style="height:100%;border-radius:5px;" style="" alt="">
                    </label>
                  </div>
                  <label for="file-upload" style="margin-top: 4px;" class="custom-file">
                      <i class="fa fa-cloud-upload"></i>
                      Chọn ảnh
                  </label>
                  <input id="file-upload" type="file" value="{{old('file')}}" onchange="chooseFile(this)" name="file" class="form-control dn @error('image') is-invalid @enderror" >
                    @error('file')
                        <span class="message-err" style="color:red;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                  <label for="files">Ảnh mô tả</label>
                  <label for="files" style="display:block;height:120px">
                    <div class="image-preview " style="background-image:url(http://127.0.0.1:8000/assest/images/upfile.JPG)">
                           @foreach($imageProduct as $value) 
                              <img src="{{ url('images') }}/{{$value}}">
                           @endforeach 
                    </div>

                    <div class="image-preview dn" style="background-image:url({{ url('assest') }}/images/upfile.JPG)"></div>
                  </label>
                  <label for="files" class="custom-file">
                      <i class="fa fa-cloud-upload"></i>
                      Chọn ảnh
                    </label>
                  <input id="files"  type="file" value="{{old('files')}}" multiple name="files[]" class="dn form-control @error('files') is-invalid @enderror" >
                    @error('files')
                        <span class="message-err" style="color:red;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Mô tả</label>
                  <textarea  name="description" id="content" >{{ old('description', $product->description) }}</textarea>
                        
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Chọn trạng thái</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="status" id="input" value="1" {{ old('status', $product->status) == 1 ? 'checked' : '' }}>
                      Hiện
                    </label>
                    <label>
                      <input type="radio" name="status" id="input" value="0" {{ old('status', $product->status) == 0 ? 'checked' : '' }}>
                      Ẩn
                    </label>
                  </div>
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
        var Showimg =  document.querySelectorAll('.image-preview');

        

$("#files").on('change', function () {

  Showimg[0].classList.add('dn');
  Showimg[1].classList.remove('dn');
 //Get count of selected files
 var countFiles = $(this)[0].files.length;

 var imgPath = $(this)[0].value;
 var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
 var image_holder = $('.image-preview');
 image_holder.empty();

 if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
     if (typeof (FileReader) != "undefined") {

         //loop for each file selected for uploaded.
         for (var i = 0; i < countFiles; i++) {

             var reader = new FileReader();
             reader.onload = function (e) {
                 $("<img />", {
                     "src": e.target.result,
                         "class": "thumb-image"
                 }).appendTo(image_holder);
             }

             image_holder.show();
             reader.readAsDataURL($(this)[0].files[i]);
         }

     } else {
         alert("This browser does not support FileReader.");
     }
 } else {
     alert("Pls select only images");
 }
});
</script>
@stop