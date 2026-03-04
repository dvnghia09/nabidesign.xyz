@extends('master')

@section('home')
<div class="grid wide warranty-container">
    <div class="row">
        <div class="col l-12 m-12 c-12">
            <h1 class="contact-heading">Chính sách bảo hành</h1>
            
            <div class="warranty-content">
                @if($policy)
                    {!! $policy->content !!}
                @else
                    <p class="warranty-empty">Nội dung chính sách bảo hành đang được cập nhật...</p>
                @endif
            </div>
        </div>
    </div>
</div>
@stop
