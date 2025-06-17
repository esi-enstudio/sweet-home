<x-dynamic-component :component="$getFieldWrapperView()" :field="$field">
    <div class="flex items-center gap-1" style="color: gold">
        @for ($i = 1; $i <= 5; $i++)
            @if ($i <= $getState())
                <x-heroicon-s-star class="h-6 w-6" />
            @else
                <x-heroicon-o-star class="h-6 w-6 text-gray-300" />
            @endif
        @endfor
    </div>
</x-dynamic-component>
