@props(['author'])

<div
    class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px mb-10 border-2 border-border-color-11"
>
    <div class="flex flex-col items-center text-center">
        <div class="mb-25px">
            <img
                src="{{ $author->avatar_url && Storage::disk('public')->exists($author->avatar_url) ? Storage::url($author->avatar_url) : asset('assets/img/default-user-avatar.png') }}"
                alt="{{ $author->name }}"
                class="w-140px h-140px rounded-100%"
            >
        </div>

        <h4 class="mb-15px lg:text-lg text-heading-color font-bold">
            <span class="leading-1.3 lg:leading-1.3">
                {{ $author->name }}
            </span>
        </h4>

        <p class="text-[12.25px] lg:text-sm">
            <span class="lg:leading-1 8">{{ $author->type }}</span>
        </p>

        <div>
            <ul class="text-xs text-ratings flex items-center mb-10px">
                <li class="pt-2">
                    <a href="#"><i class="fas fa-star"></i></a>
                </li>
                <li class="pt-2">
                    <a href="#"><i class="fas fa-star"></i></a>
                </li>
                <li class="pt-2">
                    <a href="#"><i class="fas fa-star"></i></a>
                </li>
                <li class="pt-2">
                    <a href="#"><i class="fas fa-star-half-alt"></i></a>
                </li>
                <li class="pt-2">
                    <a href="#"><i class="far fa-star"></i></a>
                </li>
                <li class="pt-2"><a href="#"> ( 1 Reviews )</a></li>
            </ul>
        </div>

        <p class="text-sm mb-22px hyphens-none">
            <span class="leading-1.8">
                {{ $author->bio }}
            </span>
        </p>

        @if(isset($author->custom_fields))
            <ul class="text-sm lg:text-base flex gap-18px justify-center items-center text-color-1">
                @foreach($author->custom_fields as $key => $link)
                    @if($key == 'facebook' && $link != null)
                        <li class="leading-1.8 lg:leading-1.8">
                            <a target="_blank" href="{{ $link }}">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                    @elseif($key == 'instagram' && $link != null)
                        <li class="leading-1.8 lg:leading-1.8">
                            <a target="_blank" href="{{ $link }}">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                    @elseif($key == 'tiktok' && $link != null)
                        <li class="leading-1.8 lg:leading-1.8">
                            <a target="_blank" href="{{ $link }}">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </li>
                    @elseif($key == 'youtube' && $link != null)
                        <li class="leading-1.8 lg:leading-1.8">
                            <a target="_blank" href="{{ $link }}">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                    @endif
                @endforeach
            </ul>
        @endif
    </div>
</div>
