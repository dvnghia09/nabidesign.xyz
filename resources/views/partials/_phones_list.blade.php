{{-- Partial: hiển thị danh sách số điện thoại --}}
{{-- Truyền vào: $settings, $phoneClass (tuỳ chọn), $separator (tuỳ chọn) --}}
@php
    $phonesJson = $settings['phones'] ?? null;
    $phonesList = $phonesJson ? json_decode($phonesJson, true) : [];
    if (empty($phonesList) && !empty($settings['phone'])) {
        $phonesList = [['number' => $settings['phone'], 'label' => '']];
    }
    $phoneClass = $phoneClass ?? '';
    $separator  = $separator  ?? '';
@endphp
@foreach($phonesList as $i => $ph)
    @if(!empty($ph['number']))
        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $ph['number']) }}" class="{{ $phoneClass }}">
            @if(!empty($ph['label']))
                <span class="phone-label">{{ $ph['label'] }}:</span>
            @endif
            {{ $ph['number'] }}
        </a>
        @if($separator && !$loop->last)
            {{ $separator }}
        @endif
    @endif
@endforeach
