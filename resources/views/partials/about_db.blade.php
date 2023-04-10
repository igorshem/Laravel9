<div class="w-4/5 border-0 border-gray-700 px-2">
    <span class="block w-full text-center text-base">{{ __('Database structure') }}</span>
    <div class="w-full h-fit">
        <img title="{{ __('Database structure') }}" src="../../img/database_structure.png">
    </div>
</div>
<div class="w-1/5 border-0 border-gray-700 px-2">
    <span class="block w-full text-center text-base">Database</span>
    <ul class="border-0 border-gray-700 list-disc">
        <li>MySQL v.{{ $response['vers_db'] }} ({{ __('from the environment') }})</li>
        <li>Navicat</li>
    </ul>
</div>
{{--<div class="w-1/5 border border-gray-700 px-2">
    right
</div>--}}
