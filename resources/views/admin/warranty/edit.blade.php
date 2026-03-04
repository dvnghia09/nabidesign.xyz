@extends('admin.master')

@section('home')
<div class="content-wrapper">
    <section class="content-header">
      <h1>Cập nhật chính sách bảo hành</h1>
    </section>

    <section class="content">
      <div class="box">
        <div class="box-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('admin.warranty.update') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nội dung chính sách</label>
                    <textarea name="content" id="content_policy" class="form-control">{{ $policy ? $policy->content : '' }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Lưu nội dung</button>
            </form>
        </div>
      </div>
    </section>
</div>
@stop

@section('tinymce')
<script src="{{ url('assest') }}/tinymce/tinymce.min.js"></script>
<script src="{{ url('assest') }}/tinymce/config.js"></script>
<script>
    tinymce.init({
      selector: '#content_policy',
    });
</script>
@stop
