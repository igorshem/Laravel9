<!DOCTYPE html>
{{--Шаблон страницы типа About --}}
@if(Request()->segment(1) == 'en')
    <html>
@else
    <html lang="{{ Request()->segment(1) }}">
@endif
<head>
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="-1">
    <meta http-equiv="Cache-Control" content="private, no-cache, no-store, max-age=0, must-revalidate, proxy-revalidate">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $response['page_name'] }}</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <!--<script src="https://cdn.tailwindcss.com"></script>-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- JavaScript -->
    <script src="{{ asset('js/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/my.js') }}"></script>

</head>
<body class="antialiased text-sm text-gray-700">
@include('partials.header')
<div class="flex items-stretch justify-stretch w-full px-2 border-0 border-gray-700">
@if($response['about_type'] == 'page'){{--О странице--}}
    @include('partials.about_table')
@endif
@if($response['about_type'] == 'database'){{--О базе данных--}}
    @include('partials.about_db')
@endif
</div>
@include('partials.copyright')
</body>
</html>
