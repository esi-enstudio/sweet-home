@props(['rating' => 0, 'maxRating' => 5])

@php
    $fullStars = floor($rating);
    $halfStar = ($rating - $fullStars) >= 0.5;
    $emptyStars = $maxRating - $fullStars - ($halfStar ? 1 : 0);
@endphp

<ul {{ $attributes->merge(['class' => 'text-ratings flex items-center gap-1']) }}>
    @for ($i = 0; $i < $fullStars; $i++)
        <li>
            <i class="fas fa-star"></i>
        </li>
    @endfor

    @if ($halfStar)
        <li><i class="fas fa-star-half-alt"></i></li>
    @endif

    @for ($i = 0; $i < $emptyStars; $i++)
        <li><i class="far fa-star"></i></li>
    @endfor
</ul>
