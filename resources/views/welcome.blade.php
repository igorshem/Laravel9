<!DOCTYPE html>
{{--Шаблон главной страницы портала/сайта --}}
@if(Request()->segment(1) == 'en')
    <html>
@else
    <html lang="{{ Request()->segment(1) }}">
@endif
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $response['page_name'] }}</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--<script src="https://cdn.tailwindcss.com"></script>-->
    <!-- JavaScript -->
    <script src="{{ asset('js/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/my.js') }}"></script>

</head>
<body class="antialiased">
{{----}}@include('partials.header')

<div class="block w-full h-[80vh] p-2 border-0 border-gray-700 text-white" style="background-image: url('public/img/code_blade.png')">
    <div class="block relative z-[1] top-2 left-1/3 w-fit bg-gray-500 rounded-md text-sm border-4" style="border-image: linear-gradient(to right, Yellow, Aquamarine) 1;">
        <div class="w-full border-0 border-black rounded-md px-2 py-1 text-center text-base">
            {{ __('Welcome to our website') }}
        </div>
    </div>
    <div class="block relative z-[1] top-32 left-1/4 w-1/6 bg-gray-500 rounded-md text-sm min-w-200 border border-amber-300">
        <div class="w-full border-0 border-black rounded-t-md px-2 py-1">
            {{ __('Site example') }}
        </div>
        <div class="w-full bg-gray-200 text-gray-900 rounded-b-md p-2">
            {!! __('Message site status') !!}
        </div>
    </div>
    <div class="block relative z-[1] top-36 lg:left-3/4 left-1/2 w-1/6 bg-gray-500 rounded-md text-sm min-w-200 border border-amber-300">
        <div class="w-full border-0 border-black rounded-t-md px-2 py-1">
            {{ __('Technologies') }}
        </div>
        <div class="w-full bg-gray-200 text-gray-900 rounded-b-md p-2">
            SQL<br><br>
            PHP (Laravel)<br><br>
            JavaScript (jQuery, DataTables)<br><br>
            HTML, CSS (Tailwind CSS, FlexBox, Responsive Design)
        </div>
    </div>
</div>
@include('partials.copyright')
</body>
</html>
