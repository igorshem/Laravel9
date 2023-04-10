{{--Выпадающее вниз меню--}}
<nav class="relative border border-blue-500 rounded-md">
    <ul class="primary list-none relative text-left rounded-md">
        <li class="float-none rounded-md hover:bg-cyan-50">
            <a class="block no-underline hover:text-blue-500" href="#"><span>{{ __('Site map') }}</span></a>
                <ul class="sub list-none relative text-lefth">
                    <div class="bg-slate-50 w-full relative rounded-md border border-blue-700">
                        @foreach($arr_routes as $v)
                            <li class="rounded-md float-none hover:bg-cyan-50 hover:text-blue-500">
                                <a class="rounded-md whitespace-nowrap" href="/{{ $v['uri'] }}">{{ $v['page'] }}</a>
                            </li>
                        @endforeach
                    </div>
                </ul>
        </li>
    </ul>
</nav>
