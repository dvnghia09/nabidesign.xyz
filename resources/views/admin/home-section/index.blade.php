@extends('admin.master')
@section('home')
<div class="content-wrapper" style="min-height: 500px;">
    <section class="content-header">
        <h1>Cài đặt trang chủ</h1>
        <small>Quản lý danh sách sản phẩm hiển thị trên trang chủ</small>
    </section>

    <section class="content">
        @if(Session::has('message'))
            <div class="alert alert-success">
                <button type="button" data-dismiss="alert" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>{{ Session::get('message') }}</strong>
            </div>
        @endif

        {{-- Form thêm mới Sector --}}
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-plus"></i> Thêm khu vực mới (Home Section)</h3>
            </div>
            <div class="box-body">
                <form action="{{ route('admin.home-section.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tiêu đề chính <span class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" placeholder="VD: THỜI TRANG NỮ" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Tiêu đề phụ</label>
                                <input type="text" name="subtitle" class="form-control" placeholder="VD: Tôn dáng & thanh lịch">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Hiển thị sản phẩm theo DM (nếu có)</label>
                                <select name="category_sub_id" class="form-control">
                                    <option value="">-- KHÔNG CHỌN DM KÉO THEO LOGIC DƯỚI --</option>
                                    @foreach($categorySubs as $sub)
                                        <option value="{{ $sub->id }}">{{ $sub->Category->name ?? '' }} &rsaquo; {{ $sub->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Loại Logic Hiển thị</label>
                                <select name="type" class="form-control" required>
                                    <option value="latest">Mới nhất mặc định</option>
                                    <option value="sale">Giảm giá nhiều nhất</option>
                                    <option value="top_buy">Bán chạy nhất (Kèm Banner dọc)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Giới hạn SL</label>
                                <div class="input-group">
                                    <input type="number" name="limit" class="form-control" value="8" min="1" max="20" required>
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Thêm</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- Danh sách các section hiện có --}}
        @foreach($sections as $section)
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Khối số {{$loop->iteration}}: <strong>{{ $section->title }}</strong></h3>
                <div class="box-tools pull-right">
                    <a href="{{ route('admin.home-section.destroy', $section->id) }}" class="btn btn-box-tool text-red" onclick="return confirm('Bạn có chắc chắn muốn xóa section này?');"><i class="fa fa-trash"></i> Xóa khối này</a>
                </div>
            </div>
            <div class="box-body">
                <form action="{{ route('admin.home-section.update', $section->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="text" name="title" value="{{ $section->title }}" class="form-control" placeholder="Tiêu đề chính" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="text" name="subtitle" value="{{ $section->subtitle }}" class="form-control" placeholder="Tiêu đề phụ">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <select name="category_sub_id" class="form-control">
                                    <option value="">-- THEO LOGIC BÊN CẠNH --</option>
                                    @foreach($categorySubs as $sub)
                                        <option value="{{ $sub->id }}" {{ $section->category_sub_id == $sub->id ? 'selected' : '' }}>
                                            {{ $sub->Category->name ?? '' }} &rsaquo; {{ $sub->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <select name="type" class="form-control" required>
                                    <option value="latest" {{ $section->type == 'latest' ? 'selected' : '' }}>Mới nhất</option>
                                    <option value="sale" {{ $section->type == 'sale' ? 'selected' : '' }}>Giảm giá</option>
                                    <option value="top_buy" {{ $section->type == 'top_buy' ? 'selected' : '' }}>Bán chạy (Kèm Banner)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="number" name="limit" value="{{ $section->limit }}" class="form-control" min="1" max="20" required>
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lưu</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </section>
</div>
@stop
