{{-- <base href=" {{ env('APP_URL')}} "> --}}
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>INSPINIA | Dashboard v.2</title>

<link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

<link href="{{ asset('backend/css/animate.css') }}" rel="stylesheet">
<link href="{{ asset('backend/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('backend/css/customize.css') }}" rel="stylesheet">
@if (isset($config['css']) && is_array($config['css'] ))
    @foreach ($config['css'] as $val)
        <link href="{{ asset($val) }}" rel="stylesheet"></link>
    @endforeach
@endif
<script src="{{ asset('backend/js/jquery-3.1.1.min.js') }}"></script>
