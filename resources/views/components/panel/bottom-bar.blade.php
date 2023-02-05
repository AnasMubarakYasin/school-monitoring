@aware([
    'panel' => new StdClass(),
])
<footer class="flex items-center justify-center h-[56px] bg-white dark:bg-gray-800 shadow transition-colors">
    <div class="text-sm">
        Copyright &copy; {{ $panel->vendor_name }}
        {{ $panel->vendor_year }}, All Right Reserved.
    </div>
</footer>
