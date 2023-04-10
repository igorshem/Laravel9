<div class="w-3/4 border-0 border-gray-700 px-2 pt-4 md:pt-0">
    <span class="block w-full text-center text-sm md:text-base">{{ __('Backend page structure') }}</span>
    <div class="w-full h-fit">
        <img title="{{ __('Simplified backend diagram') }}" src="../../img/backend_chassi.png">
    </div>
</div>
<div class="w-1/4 border-0 border-gray-700 px-2 pt-3 text-xs md:text-sm">
    <div class="block w-full border-0 border-gray-700 px-2">
        <span class="block w-full text-center text-sm md:text-base">Backend</span>
        <ul class="border-0 border-gray-700 list-disc">
            <li>PHP v.{{ $response['vers_php'] }} ({{ __('from the environment') }})</li>
            <li>MySQL v.{{ $response['vers_db'] }} ({{ __('from the environment') }})</li>
            <li>Laravel v.{{ $response['vers_laravel'] }} ({{ __('from the environment') }})</li>
            <li>PHPStorm</li>
        </ul>
    </div>
    <div class="block w-full border-0 border-gray-700 px-2 pt-3 text-xs md:text-sm">
        <span class="block w-full text-center text-sm md:text-base">Frontend</span>
        <ul class="border-0 border-gray-700 list-disc">
            <li>HTML v.5</li>
            <li>CSS v.3 (responsive over 400px)</li>
            <li>Tailwind CSS v.<span id="tailwindcss_vers">3</span> ({{ __('directly from') }} javascript)</li>
            <li>jQuery v.<span id="jquery_vers">3</span> ({{ __('directly from') }} javascript)</li>
            <li>DataTables v.<span id="datatables_vers">1.13</span> ({{ __('directly from') }} javascript) (static responsive over 400px)</li>
            <li>PHPStorm</li>
        </ul>
    </div>
</div>
<script>
    $(document).ready(function() {
        getVers();
    });

    function getVers() {
        if (typeof window.packagejson !== 'undefined') {
            let ver = window.packagejson.devDependencies.tailwindcss;
            ver = ver.replaceAll('^', '');
            ver = ver.replaceAll('~', '');
            $('#tailwindcss_vers').text(ver);
//                console.log("Tailwind CSS [package.json] v." + window.packagejson.devDependencies.tailwindcss);
        }
        if (jQuery.fn.hasOwnProperty('jquery')) {
            $('#jquery_vers').text(jQuery.fn.jquery);
//                console.log("jQuery [javascript] v." + jQuery.fn.jquery);
        }
        if (typeof $.fn.dataTable !== 'undefined') {
            if ($.fn.dataTable.hasOwnProperty('version')) {
                $('#datatables_vers').text($.fn.dataTable.version);
//                    console.log("DataTable [javascript] v." + $.fn.dataTable.version);
            }
        }
    }
</script>
