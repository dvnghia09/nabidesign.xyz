@extends('admin.master')

@section('home')
<div class="content-wrapper">
    <section class="content-header">
      <h1>Chi tiết liên hệ</h1>
    </section>

    <section class="content">
      <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Thông tin từ: {{ $contact->name }}</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Họ tên:</strong> {{ $contact->name }}</p>
                    <p><strong>Email:</strong> {{ $contact->email }}</p>
                    <p><strong>Điện thoại:</strong> {{ $contact->phone }}</p>
                    <p><strong>Ngày gửi:</strong> {{ $contact->created_at->format('d/m/Y H:i') }}</p>
                </div>
                <div class="col-md-12" style="margin-top: 20px;">
                    <p><strong>Tiêu đề:</strong> {{ $contact->subject }}</p>
                    <p><strong>Nội dung:</strong></p>
                    <div style="border: 1px solid #eee; padding: 15px; border-radius: 4px; background: #f9f9f9;">
                        {{ $contact->message }}
                    </div>
                </div>
            </div>
            <div style="margin-top: 20px;">
                <a href="{{ route('admin.contact.index') }}" class="btn btn-default">Quay lại</a>
            </div>
        </div>
      </div>
    </section>
</div>
@stop
