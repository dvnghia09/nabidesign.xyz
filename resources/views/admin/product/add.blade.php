@extends('admin.master')
@section('home')
  <div class="content-wrapper" style="min-height: 500px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Quản lý sản phẩm
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
     <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Thêm mới sản phẩm</h3>
                
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="" enctype='multipart/form-data'>
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="example1">Tên sản phẩm</label>
                  <input type="text" value="{{old('name')}}" name="name" class="form-control @error('name') is-invalid @enderror" id="example1" placeholder="Nhập sản phẩm">
                    @error('name')
                        <span class="message-err" style="color:red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="example2">Số lượng</label>
                  <input type="number" value="{{old('quantity')}}" name="quantity" class="form-control @error('quantity') is-invalid @enderror" id="example2" placeholder="Nhập số lượng sản phẩm">
                    @error('quantity')
                        <span class="message-err" style="color:red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="example3">Giá sản phẩm</label>
                  <input type="text" value="{{old('price')}}" name="price" class="form-control @error('price') is-invalid @enderror" id="example3" placeholder="Nhập giá sản phẩm">
                    @error('price')
                        <span class="message-err" style="color:red;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="example4">Giá sale</label>
                  <input type="text" value="{{old('sale_price')}}" name="sale_price" class="form-control @error('sale_price') is-invalid @enderror" id="example4" placeholder="Nhập khuyến mãi">
                    @error('sale_price')
                        <span class="message-err" style="color:red;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="checkbox">
                  <p>
                    <strong >Màu sắc :</strong>
                  </p>
                @foreach($attrColor as $value)
                  <label>
                  <input value="{{$value->id}}" name="attr[]" type="checkbox"> {{ $value->value }}
                  </label>
                  @endforeach
                  
                </div>

                <div class="checkbox">
                  <p><strong >Size :</strong></p> 
                @foreach($attrSize as $value)
                  <label>
                  <input value="{{$value->id}}" name="attr[]" type="checkbox"> {{ $value->value }}
                  </label> 
                  @endforeach
                   
                </div>

                

                <div class="form-group">
                  <label for="">Danh mục sản phẩm</label>
                  <select class="form-control" name="category_id">
                    @foreach($categorysub as $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="file-upload">Ảnh sản phẩm</label>
                  <div class="imageFile" style="height:120px;width:100%;">
                    <label for="file-upload" class="custom-file-upload">
                      <img src="{{ url('assest') }}/images/upfile.JPG" id="image" style="height:100%;border-radius:5px;" style="" alt="">
                    </label>
                  </div>
                  <label for="file-upload" style="margin-top:4px" class="custom-file">
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
                    <div class="image-preview" style="background-image:url({{ url('assest') }}/images/upfile.JPG)"></div>
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
                  <label for="content">Mô tả</label>
                  <textarea  name="description" id="content" >{{old('description')}}</textarea>
                        
                </div>

                <div class="form-group">
                  <label for="input">Chọn trạng thái</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="status" id="input" value="1" checked="checked">
                      Hiện
                    </label>
                    <label>
                      <input type="radio" name="status" id="input" value="0">
                      Ẩn
                    </label>
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Thêm mới</button>
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

      let file_input = document.querySelector('#files');
      let image_preview = document.querySelector('.image-preview');
      
      // const handle_file_preview = (e) => {
      //   let files = e.target.files;
      //   let length = files.length;
      
      //   for(let i = 0; i < length; i++) {
      //       let image = document.createElement('img');
      //       // use the DOMstring for source
      //       image.src = window.URL.createObjectURL(files[i]);
      //       image_preview.appendChild(image);
      //   }
      // }
      
      // file_input.addEventListener('change', handle_file_preview);

$("#files").on('change', function () {
 
 //Get count of selected files
 var countFiles = $(this)[0].files.length;

 var imgPath = $(this)[0].value;
 var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
 var image_holder = $(".image-preview");
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