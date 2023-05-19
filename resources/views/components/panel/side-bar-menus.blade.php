@props([
    'id' => '',
    'menus' => '',
    'hide' => false,
    'indent' => 1,
    'link' => '',
])
<ul id="{{ $id }}" class="flex flex-col gap-2 capitalize {{ $hide ? 'hidden' : '' }}">
    @foreach ($menus as $menu)
        <li class="flex flex-col gap-1">
            <x-panel.side-bar-menu :for="$id . '-item-' . $loop->iteration" :name="$menu->name" :link="$menu->link" :button="!!$menu->submenu"
                :pname="$menu->pname" :pclass="$menu->pclass" :indent="$indent" :index="$menu->index" :alink="$link">
                <x-slot:icon>
                    {!! $menu->icon !!}
                    </x-slot>
            </x-panel.side-bar-menu>
            @if ($menu->submenu)
                <x-panel.side-bar-menus :id="$id . '-item-' . $loop->iteration" :menus="$menu->submenu" :hide="!str_starts_with(request()->url(), $menu->link)" :indent="$indent + $indent" :link="$menu->link">

                </x-panel.side-bar-menus>
            @endif
        </li>
    @endforeach
</ul>
