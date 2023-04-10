{{--Переключатель языков - только если поддерживается более 1 локали--}}

@if(count($available_locales) > 1)
<div>
<script>
    let arrstr = '{{ $av_locales }}';
    arrstr = arrstr.replaceAll('&quot;', '"');
    let languages = JSON.parse(arrstr);
</script>
@if($skin_av_locales === 'select')
<form class="" method="GET" accept-charset="UTF-8">
    <select id="language" class="bg-transparent leading-5 text-xs py-0.5 px-2 w-max w-fit h-full">
@endif
@if($skin_av_locales === 'select_imit')
    <div class="w-28 px-2 h-7 leading-5">
        <button class="langselect border border-blue-500 rounded-md relative z-[1] block bg-transparent w-full hover:text-blue-500 hover:bg-cyan-50">{{ __('Language') }}</button>
        <div class="langimg relative z-0 bottom-5 left-20 w-min h-min">
            <svg class=" pr-2" width="24" height="24" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path clip-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" fill-rule="evenodd"></path></svg></div>
        <div class="langoptions px-2 z-[1] -mt-6 hidden bg-slate-50 relative w-full hover:block border border-blue-500 rounded-md">
@endif
@if($skin_av_locales === 'column')
    <ul class="text-sm w-max w-fit">
@endif
@foreach($available_locales as $locale_name => $available_locale)
    @if($available_locale === $current_locale)
        @if($skin_av_locales === 'column')
        <li class="w-max w-fit">
            <span class="px-1">{{ $locale_name }}</span>
        </li>
        @endif
        @if($skin_av_locales === 'select')
            <option class=" hover:text-blue-500 hover:bg-cyan-50" selected value="{{ $locale_name }}">{{ $locale_name }}</option>-
        @endif
        @if($skin_av_locales === 'select_imit')
            <button class="block w-full bg-slate-50 hover:text-blue-500 hover:bg-cyan-50 border-0 rounded-md">{{ $locale_name }}</button>
        @endif
    @else
        @if($skin_av_locales === 'column')
        <li class="w-max w-fit"><a class="underline hover:text-blue-500" href="/{{ $available_locale }}">
            <span class="px-1">{{ $locale_name }}</span>
        </a></li>
        @endif
        @if($skin_av_locales === 'select')
            <option class=" hover:text-blue-500 hover:bg-cyan-50" value="{{ $locale_name }}">{{ $locale_name }}</option>
        @endif
        @if($skin_av_locales === 'select_imit')
            <button class="block w-full bg-slate-50 hover:text-blue-500 hover:bg-cyan-50 border-0 rounded-md">{{ $locale_name }}</button>
        @endif
    @endif
@endforeach
@if($skin_av_locales === 'select')
    </select>
</form>
@endif
@if($skin_av_locales === 'select_imit')
    </div></div>
@endif
@if($skin_av_locales === 'column')
    </ul>
@endif
</div>
@endif

