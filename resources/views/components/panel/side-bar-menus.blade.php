@props([
    'id' => '',
    'menus' => '',
])
<ul id="{{ $id }}" class="flex flex-col gap-2 capitalize">
    @foreach ($menus as $menu)
        @if (is_array($menu))
            <x-panel.side-bar-menus :id="$loop->iteration . $id . '-' . $loop->index" :menus="$menu">

            </x-panel.side-bar-menus>
        @else
            <x-panel.side-bar-menu :id="$id . '-item-' . $loop->index" :name="$menu->name" :link="$menu->link" :button="!!$menu->submenu"
                :pname="$menu->pname" :pclass="$menu->pclass">
                <x-slot:icon>
                    {!! $menu->icon !!}
                    </x-slot>
            </x-panel.side-bar-menu>
            @if ($menu->submenu)
                <x-panel.side-bar-menus :id="$id . '-item-' . $loop->index" :menus="$menu->submenu">

                </x-panel.side-bar-menus>
            @endif
        @endif
    @endforeach
</ul>
