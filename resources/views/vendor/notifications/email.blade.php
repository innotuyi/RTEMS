@component('mail::message')
<div style="text-align: center; margin-bottom: 30px;">
    <img src="{{ asset('image/logo.png') }}" alt="RTEMS Logo" style="max-width: 200px;">
</div>

# {{ $greeting }}

{{ $introLines[0] }}

{{ $introLines[1] }}

@component('mail::button', ['url' => $actionUrl])
{{ $actionText }}
@endcomponent

{{ $outroLines[0] }}

@foreach(array_slice($outroLines, 1) as $line)
{{ $line }}
@endforeach

{{ $salutation }}

@foreach(array_slice($outroLines, -2) as $line)
{{ $line }}
@endforeach

@component('mail::subcopy')
If you're having trouble clicking the "{{ $actionText }}" button, copy and paste the URL below
into your web browser: [{{ $displayableActionUrl }}]({{ $actionUrl }})
@endcomponent
@endcomponent
