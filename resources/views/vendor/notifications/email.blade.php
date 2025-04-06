<x-mail::message>
{{-- Logo --}}
<div style="text-align: center; margin-bottom: 25px;">
    <img src="https://www.upload.ee/image/17937355/logo2.png" alt="{{ config('app.name') }} Logo" style="max-width: 200px; height: auto;">
</div>

{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Welcome to ' . config('app.name') . '!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Custom Divider --}}
<div style="border-top: 2px solid #FCD34D; margin: 20px 0;"></div>

{{-- Action Button --}}
@isset($actionText)
<?php
    // Change default colors to match your yellow theme
    $color = match ($level) {
        'success' => 'success',
        'error' => 'error',
        default => 'yellow',
    };
?>
<x-mail::button :url="$actionUrl" :color="$color">
{{ $actionText }}
</x-mail::button>

{{-- Additional Help Text --}}
<div style="text-align: center; margin-top: 15px; color: #1F2937; font-size: 14px;">
    This link will expire in 60 minutes.
</div>
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Custom Note Box --}}
<div style="background-color: #FEF3C7; border-left: 4px solid #F59E0B; padding: 15px; margin: 20px 0; border-radius: 4px;">
    <strong style="color: #1F2937;">Need help?</strong>
    <p style="margin-top: 5px; color: #4B5563;">If you have any questions or concerns, please don't hesitate to contact our support team.</p>
</div>

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Thank you,')<br>
<strong>{{ config('app.name') }} Team</strong>
@endif

{{-- Social Media Links --}}
<div style="text-align: center; margin-top: 25px;">
    <a href="#" style="display: inline-block; margin: 0 10px; color: #1F2937;">
        <img src="https://cdn-icons-png.flaticon.com/512/124/124010.png" alt="Facebook" style="width: 24px; height: 24px;">
    </a>
    <a href="#" style="display: inline-block; margin: 0 10px; color: #1F2937;">
        <img src="https://cdn-icons-png.flaticon.com/512/124/124021.png" alt="Twitter" style="width: 24px; height: 24px;">
    </a>
    <a href="#" style="display: inline-block; margin: 0 10px; color: #1F2937;">
        <img src="https://cdn-icons-png.flaticon.com/512/174/174855.png" alt="Instagram" style="width: 24px; height: 24px;">
    </a>
</div>

{{-- Subcopy --}}
@isset($actionText)
<x-slot:subcopy>
@lang(
    "If you're having trouble clicking the \":actionText\" button, copy and paste the URL below\n".
    'into your web browser:',
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
</x-slot:subcopy>
@endisset
</x-mail::message>