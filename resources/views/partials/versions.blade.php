@if ($app_debug = 'true')
<div class="flex justify-center mt-4 sm:items-center sm:justify-between">
    <div class="ml-4 text-center text-xs text-gray-500 sm:text-right sm:ml-0">
        Laravel v.{{ Illuminate\Foundation\Application::VERSION }} (PHP v.{{ PHP_VERSION }}; MySQL v.{{ $mysql_version }})
    </div>
</div>
@endif
