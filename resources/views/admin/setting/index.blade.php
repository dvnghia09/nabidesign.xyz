@extends('admin.master')
@section('home')
<div class="content-wrapper" style="min-height: 500px;">
    <section class="content-header">
      <h1>Cài đặt hệ thống</h1>
    </section>

    <section class="content">
        @if(Session::has('message'))
            <div class="alert alert-success">
                <button type="button" data-dismiss="alert" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>{{ Session::get('message') }}</strong>
            </div>
        @endif

        <div class="box box-primary">
            <form method="POST" action="">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label>Tên thương hiệu (Brand Name)</label>
                        <input type="text" name="brand_name" value="{{ $settings['brand_name'] ?? '' }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại liên hệ</label>
                        <input type="text" name="phone" value="{{ $settings['phone'] ?? '' }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tên công ty (Footer)</label>
                        <input type="text" name="company_name" value="{{ $settings['company_name'] ?? '' }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input type="text" name="address" value="{{ $settings['address'] ?? '' }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ $settings['email'] ?? '' }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Link Messenger (Facebook)</label>
                        <input type="text" name="messenger_link" value="{{ $settings['messenger_link'] ?? '' }}" class="form-control">
                    </div>

                    <hr>
                    <h4>Cấu hình SEO</h4>
                    <div class="form-group">
                        <label>Meta Title</label>
                        <input type="text" name="meta_title" value="{{ $settings['meta_title'] ?? ($settings['brand_name'] ?? '') }}" class="form-control" placeholder="Tiêu đề trang web hiển thị trên Google">
                    </div>
                    <div class="form-group">
                        <label>Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="3" placeholder="Mô tả ngắn về cửa hàng">{{ $settings['meta_description'] ?? '' }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Meta Keywords</label>
                        <input type="text" name="meta_keywords" value="{{ $settings['meta_keywords'] ?? '' }}" class="form-control" placeholder="Từ khóa ngăn cách bằng dấu phẩy">
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Lưu cài đặt</button>
                </div>
            </form>
        </div>
    </section>
</div>
@stop
