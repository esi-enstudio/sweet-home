<div class="flex items-center gap-1" style="color: gold">
    @for ($i = 1; $i <= 5; $i++)
        @if ($i <= $getState())
            <x-heroicon-s-star class="h-5 w-5" />
        @else
            <x-heroicon-o-star class="h-5 w-5 text-gray-300" />
        @endif
    @endfor
</div>
