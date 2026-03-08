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

        <form method="POST" action="{{ route('admin.setting.update') }}" enctype="multipart/form-data">
            @csrf

            {{-- THÔNG TIN CỬA HÀNG --}}
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-store"></i> Thông tin cửa hàng</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tên thương hiệu (Brand Name)</label>
                                <input type="text" name="brand_name" value="{{ $settings['brand_name'] ?? '' }}" class="form-control" placeholder="VD: Nabi Design">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>
                                    <i class="fa fa-image"></i> Logo thương hiệu
                                    <small class="text-muted">(Nếu có ảnh logo, sẽ ẩn text Brand Name trên header)</small>
                                </label>
                                <div style="margin-bottom:10px;">
                                    @if(!empty($settings['logo']))
                                        <div style="display:flex; align-items:center; gap:12px;">
                                            <img src="{{ url('images/seo/' . $settings['logo']) }}"
                                                 style="max-height:56px; max-width:180px; object-fit:contain; border:1px solid #ddd; padding:4px; border-radius:6px; background:#fff;"
                                                 alt="Logo hiện tại">
                                            <label style="margin:0;">
                                                <input type="checkbox" name="remove_logo" value="1"> Xóa logo
                                            </label>
                                        </div>
                                        <p class="text-muted" style="margin-top:4px;"><small>Logo hiện tại: {{ $settings['logo'] }}</small></p>
                                    @else
                                        <div style="width:180px;height:56px;border:2px dashed #ccc;display:flex;align-items:center;justify-content:center;border-radius:6px;">
                                            <span class="text-muted"><i class="fa fa-image"></i> Chưa có logo</span>
                                        </div>
                                    @endif
                                </div>
                                <input type="file" name="logo" class="form-control" accept=".jpg,.jpeg,.png,.gif,.webp,.svg">
                                <p class="text-muted" style="margin-top:4px; font-size:12px;"><i class="fa fa-info-circle"></i> Khuyên dùng ảnh nền trong suốt (.png, .svg). Chiều cao tối đa hiển thị 50px.</p>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>
                                    <i class="fa fa-phone"></i> Danh sách số điện thoại
                                    <small class="text-muted">(Số đầu tiên là số <strong>mặc định</strong> — dùng cho nút Gọi ngay ở header)</small>
                                </label>
                                <div id="phones-container">
                                    @php
                                        $phonesJson = $settings['phones'] ?? null;
                                        $phonesList = $phonesJson ? json_decode($phonesJson, true) : [];
                                        if (empty($phonesList) && !empty($settings['phone'])) {
                                            $phonesList = [['number' => $settings['phone'], 'label' => '']];
                                        }
                                        if (empty($phonesList)) {
                                            $phonesList = [['number' => '', 'label' => '']];
                                        }
                                    @endphp
                                    @foreach($phonesList as $i => $ph)
                                    <div class="phone-row" style="display:flex; gap:8px; margin-bottom:8px; align-items:center;">
                                        <span class="phone-badge" style="min-width:26px; height:26px; border-radius:50%; background:{{ $i === 0 ? '#3c8dbc' : '#aaa' }}; color:#fff; display:inline-flex; align-items:center; justify-content:center; font-size:12px; font-weight:bold;">{{ $i+1 }}</span>
                                        <input type="text" name="phones_number[]" value="{{ $ph['number'] ?? '' }}" class="form-control" placeholder="Số điện thoại (VD: 0919295123)" style="flex:2;">
                                        <input type="text" name="phones_label[]" value="{{ $ph['label'] ?? '' }}" class="form-control" placeholder="Nhãn (VD: Kinh doanh, CSKH...)" style="flex:2;">
                                        @if($i === 0)
                                            <span class="label label-primary" style="white-space:nowrap; padding:6px 8px;"><i class="fa fa-star"></i> Mặc định</span>
                                        @else
                                            <button type="button" class="btn btn-danger btn-sm remove-phone-row" title="Xóa"><i class="fa fa-trash"></i></button>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                                <button type="button" id="add-phone-btn" class="btn btn-default btn-sm" style="margin-top:4px;">
                                    <i class="fa fa-plus"></i> Thêm số điện thoại
                                </button>
                                <p class="text-muted" style="margin-top:6px; font-size:12px;">
                                    <i class="fa fa-info-circle"></i> Các số sẽ hiển thị ở footer, trang liên hệ và trang sản phẩm. Nhãn không bắt buộc.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tên công ty (Footer)</label>
                                <input type="text" name="company_name" value="{{ $settings['company_name'] ?? '' }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ $settings['email'] ?? '' }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" name="address" value="{{ $settings['address'] ?? '' }}" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Link Messenger (Facebook)</label>
                                <input type="text" name="messenger_link" value="{{ $settings['messenger_link'] ?? '' }}" class="form-control" placeholder="https://m.me/...">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>URL Facebook</label>
                                <input type="text" name="facebook_url" value="{{ $settings['facebook_url'] ?? '' }}" class="form-control" placeholder="https://facebook.com/...">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>URL Zalo</label>
                                <input type="text" name="zalo_url" value="{{ $settings['zalo_url'] ?? '' }}" class="form-control" placeholder="https://zalo.me/...">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SEO CƠ BẢN --}}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-search"></i> SEO cơ bản</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Meta Title <small class="text-muted">(Tiêu đề hiển thị trên Google, tối đa 60 ký tự)</small></label>
                                <input type="text" name="meta_title" value="{{ $settings['meta_title'] ?? ($settings['brand_name'] ?? '') }}" class="form-control" placeholder="Tiêu đề trang web hiển thị trên Google" maxlength="60">
                                <small class="text-muted">Còn lại: <span id="title-count">{{ 60 - strlen($settings['meta_title'] ?? ($settings['brand_name'] ?? '')) }}</span> ký tự</small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Meta Description <small class="text-muted">(Mô tả hiển thị trên Google, tối đa 160 ký tự)</small></label>
                                <textarea name="meta_description" class="form-control" rows="3" placeholder="Mô tả ngắn về cửa hàng" maxlength="160">{{ $settings['meta_description'] ?? '' }}</textarea>
                                <small class="text-muted">Còn lại: <span id="desc-count">{{ 160 - strlen($settings['meta_description'] ?? '') }}</span> ký tự</small>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Meta Keywords <small class="text-muted">(Từ khóa ngăn cách bằng dấu phẩy)</small></label>
                                <input type="text" name="meta_keywords" value="{{ $settings['meta_keywords'] ?? '' }}" class="form-control" placeholder="nabi, design, thời trang, áo dài">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Google Analytics ID <small class="text-muted">(VD: G-XXXXXXXXXX)</small></label>
                                <input type="text" name="google_analytics" value="{{ $settings['google_analytics'] ?? '' }}" class="form-control" placeholder="G-XXXXXXXXXX">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- FAVICON & OG IMAGE --}}
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-image"></i> Favicon & OG Image (Ảnh chia sẻ mạng xã hội)</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Favicon <small class="text-muted">(File .ico, .png - kích thước 32x32 hoặc 16x16px)</small></label>
                                <div style="margin-bottom: 10px;">
                                    @if(!empty($settings['favicon']))
                                        <img src="{{ url('images/seo/' . $settings['favicon']) }}" style="width:64px; height:64px; object-fit:contain; border:1px solid #ddd; padding:4px; border-radius:4px;" alt="Favicon hiện tại">
                                        <p class="text-muted" style="margin-top:4px;"><small>Favicon hiện tại: {{ $settings['favicon'] }}</small></p>
                                    @else
                                        <div style="width:64px;height:64px;border:2px dashed #ccc;display:flex;align-items:center;justify-content:center;border-radius:4px;">
                                            <i class="fa fa-image text-muted"></i>
                                        </div>
                                        <p class="text-muted"><small>Chưa có favicon</small></p>
                                    @endif
                                </div>
                                <input type="file" name="favicon" class="form-control" accept=".ico,.png,.jpg,.jpeg">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>OG Image (Share Image) <small class="text-muted">(Ảnh hiển thị khi chia sẻ lên Facebook/Zalo, kích thước 1200x630px)</small></label>
                                <div style="margin-bottom: 10px;">
                                    @if(!empty($settings['og_image']))
                                        <img src="{{ url('images/seo/' . $settings['og_image']) }}" style="max-width:200px; max-height:120px; object-fit:cover; border:1px solid #ddd; padding:4px; border-radius:4px;" alt="OG Image hiện tại">
                                        <p class="text-muted" style="margin-top:4px;"><small>OG Image hiện tại</small></p>
                                    @else
                                        <div style="width:200px;height:105px;border:2px dashed #ccc;display:flex;align-items:center;justify-content:center;border-radius:4px;">
                                            <span class="text-muted"><i class="fa fa-image"></i> 1200x630</span>
                                        </div>
                                        <p class="text-muted"><small>Chưa có OG Image</small></p>
                                    @endif
                                </div>
                                <input type="file" name="og_image" class="form-control" accept=".jpg,.jpeg,.png,.gif,.webp">
                            </div>
                        </div>
                    </div>

                    <hr>
                    <h4>Cấu hình OG Tags (Open Graph)</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>OG Title <small class="text-muted">(Tiêu đề khi chia sẻ)</small></label>
                                <input type="text" name="og_title" value="{{ $settings['og_title'] ?? ($settings['brand_name'] ?? '') }}" class="form-control" placeholder="Tiêu đề khi chia sẻ">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>OG Description <small class="text-muted">(Mô tả khi chia sẻ)</small></label>
                                <input type="text" name="og_description" value="{{ $settings['og_description'] ?? ($settings['meta_description'] ?? '') }}" class="form-control" placeholder="Mô tả khi chia sẻ Facebook/Zalo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- MAP & FANPAGE Cấu hình Bổ sung --}}
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-code"></i> Cấu hình Iframe (Fanpage & Bản đồ)</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fanpage Iframe <small class="text-muted">(Lấy từ Facebook Page Plugin)</small></label>
                                <textarea name="fanpage_iframe" class="form-control" rows="5" placeholder="Dán mã <iframe ...></iframe> của Facebook Fanpage vào đây...">{{ $settings['fanpage_iframe'] ?? '' }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Map Iframe (Google Maps) <small class="text-muted">(Lấy từ Google Maps > Chia sẻ > Nhúng Bản đồ)</small></label>
                                <textarea name="map_iframe" class="form-control" rows="5" placeholder="Dán mã <iframe ...></iframe> của Google Maps vào đây...">{{ $settings['map_iframe'] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box box-default">
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Lưu tất cả cài đặt</button>
                    <a href="{{ url('/sitemap.xml') }}" target="_blank" class="btn btn-info btn-lg" style="margin-left:10px;">
                        <i class="fa fa-sitemap"></i> Xem Sitemap.xml
                    </a>
                </div>
            </div>
        </form>
    </section>
</div>

@section('tinymce')
<script>
    // Đếm ký tự meta title
    var titleInput = document.querySelector('[name="meta_title"]');
    if (titleInput) {
        titleInput.addEventListener('input', function() {
            document.getElementById('title-count').textContent = 60 - this.value.length;
        });
    }
    // Đếm ký tự meta description
    var descInput = document.querySelector('[name="meta_description"]');
    if (descInput) {
        descInput.addEventListener('input', function() {
            document.getElementById('desc-count').textContent = 160 - this.value.length;
        });
    }

    // ===== Quản lý nhiều số điện thoại =====
    function refreshPhoneBadges() {
        var rows = document.querySelectorAll('#phones-container .phone-row');
        rows.forEach(function(row, idx) {
            var badge = row.querySelector('.phone-badge');
            if (badge) {
                badge.textContent = idx + 1;
                badge.style.background = idx === 0 ? '#3c8dbc' : '#aaa';
            }
            // Ẩn/hiện nút xóa trên dòng đầu
            var removeBtn = row.querySelector('.remove-phone-row');
            var defaultLabel = row.querySelector('.label-primary');
            if (idx === 0) {
                if (removeBtn) removeBtn.style.display = 'none';
                if (!defaultLabel) {
                    var span = document.createElement('span');
                    span.className = 'label label-primary';
                    span.style.cssText = 'white-space:nowrap; padding:6px 8px;';
                    span.innerHTML = '<i class="fa fa-star"></i> Mặc định';
                    row.appendChild(span);
                } else {
                    defaultLabel.style.display = '';
                }
            } else {
                if (removeBtn) removeBtn.style.display = '';
                if (defaultLabel) defaultLabel.style.display = 'none';
            }
        });
    }

    document.getElementById('add-phone-btn').addEventListener('click', function() {
        var container = document.getElementById('phones-container');
        var idx = container.querySelectorAll('.phone-row').length;
        var div = document.createElement('div');
        div.className = 'phone-row';
        div.style.cssText = 'display:flex; gap:8px; margin-bottom:8px; align-items:center;';
        div.innerHTML =
            '<span class="phone-badge" style="min-width:26px;height:26px;border-radius:50%;background:#aaa;color:#fff;display:inline-flex;align-items:center;justify-content:center;font-size:12px;font-weight:bold;">' + (idx+1) + '</span>' +
            '<input type="text" name="phones_number[]" class="form-control" placeholder="Số điện thoại (VD: 0919295123)" style="flex:2;">' +
            '<input type="text" name="phones_label[]" class="form-control" placeholder="Nhãn (VD: Kinh doanh, CSKH...)" style="flex:2;">' +
            '<button type="button" class="btn btn-danger btn-sm remove-phone-row" title="Xóa"><i class="fa fa-trash"></i></button>';
        container.appendChild(div);
        div.querySelector('.remove-phone-row').addEventListener('click', function() {
            div.remove();
            refreshPhoneBadges();
        });
        refreshPhoneBadges();
    });

    // Gắn sự kiện xóa cho các nút xóa đã tồn tại
    document.querySelectorAll('.remove-phone-row').forEach(function(btn) {
        btn.addEventListener('click', function() {
            btn.closest('.phone-row').remove();
            refreshPhoneBadges();
        });
    });
</script>
@stop
@stop
