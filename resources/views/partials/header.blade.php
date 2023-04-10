{{--Header - Шапка--}}
<header class="flex justify-stretch items-stretch g-gray-100 h-7 leading-5 text-sm text-gray-700 pt-5 pb-10 px-3">
    <div class="grow-0 leading-5">
        @include('partials.menu')
    </div>
    <div class="grow leading-5 text-sm md:text-lg text-center px-5 font-semibold">{{ $response['header'] }}</div>
    <div class="grow-0">
        @include('partials.language_switcher')
    </div>
    <div class="grow-0">
        <div class="{{-- hidden fixed top-0 right-0 px-6 py-4 --}} sm:block">
{{--                @auth--}}
<!--                <a href="{{ url('/') }}" class="px-2 text-sm text-gray-700 dark:text-gray-500 underline hover:bg-cyan-50 hover:text-blue-500">Home</a>-->
{{--                @else--}}
<!--                <a href="{{-- route('login') --}}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>-->
                    <a href="{{ url('login') }}" class="px-2 text-sm text-gray-700 underline hover:bg-cyan-50 hover:text-blue-500">{{ __('Log in') }}</a>
{{--                    @if (Route::has('register'))--}}
<!--                        <a href="{{-- route('register') --}}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>-->
                        <a href="{{ url('register') }}" class="px-2 text-sm text-gray-700 underline hover:bg-cyan-50 hover:text-blue-500">{{ __('Register') }}</a>
{{--                    @endif--}}
{{--                @endauth--}}
        </div>
    </div>
</header>
