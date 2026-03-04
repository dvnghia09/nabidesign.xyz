@extends('master')

@section('home')
<div class="grid wide contact-container">
    <div class="row">
        <div class="col l-12 m-12 c-12">
            <h1 class="contact-heading">Liên hệ với chúng tôi</h1>
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="row">
                <div class="col l-6 m-12 c-12">
                    <h3 class="contact-info-title">Thông tin liên hệ</h3>
                    <p class="contact-info-item"><strong>Địa chỉ:</strong> Số 96 Di Ái, Xã Di Trạch, Quận Hoài Đức, Thành phố Hà Nội</p>
                    <p class="contact-info-item"><strong>Điện thoại:</strong> 091.9295.123</p>
                    <p class="contact-info-item"><strong>Email:</strong> nghiadv13@gmail.com</p>
                    <div class="contact-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3741.750117515277!2d106.26297961422215!3d20.310607717282842!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313609986cd3c043%3A0x8d338f0dacb29a19!2zxJDhu5IgR-G7liBRVUFORyDEkOG7ik5I!5e0!3m2!1svi!2s!4v1630928162018!5m2!1svi!2s" width="100%" height="300" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <div class="col l-6 m-12 c-12">
                    <h3 class="contact-form-title">Gửi lời nhắn</h3>
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="contact-form-group">
                            <input type="text" name="name" class="contact-form-input" placeholder="Họ và tên" required>
                        </div>
                        <div class="contact-form-group">
                            <input type="email" name="email" class="contact-form-input" placeholder="Email" required>
                        </div>
                        <div class="contact-form-group">
                            <input type="text" name="phone" class="contact-form-input" placeholder="Số điện thoại">
                        </div>
                        <div class="contact-form-group">
                            <input type="text" name="subject" class="contact-form-input" placeholder="Tiêu đề">
                        </div>
                        <div class="contact-form-group">
                            <textarea name="message" class="contact-form-textarea" rows="5" placeholder="Lời nhắn" required></textarea>
                        </div>
                        <button type="submit" class="contact-form-btn">GỬI NGAY</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
