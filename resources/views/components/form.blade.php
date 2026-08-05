@props(['action', 'method' => 'POST'])

@php
    $method = strtoupper($method);

    // HTML forms only support GET and POST.
    // For PUT, PATCH, DELETE, etc., we use POST + @method.
    $htmlMethod = in_array($method, ['GET', 'POST']) ? $method : 'POST';
@endphp

<form
    method="{{ $htmlMethod }}"
    action="{{ $action }}"
    {{ $attributes }}
>
    @if ($htmlMethod !== 'GET')
        @csrf
    @endif

    @if (! in_array($method, ['GET', 'POST']))
        @method($method)
    @endif

    {{ $slot }}
</form>
