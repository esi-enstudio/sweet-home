@props(['post'])

<div class="group shadow-box-shadow-5">
    <!-- card thumbs -->
    <div class="relative leading-1">
        <a href="{{ route('news.show', $post->slug) }}" class="overflow-hidden">
            <img src="{{ $post->featured_image && Storage::disk('public')->exists($post->featured_image) ? Storage::url($post->featured_image) : '' }}"
                 class="w-full transition-all duration-700"
                 alt="{{ $post->title }}"
            >
        </a>
    </div>

    <!-- card body -->
    <div class="px-5 md:pl-35px md:pr-30px pt-35px pb-30px">
        <p class="text-xs md:text-sm mb-5 text-secondary-color">
            <span class="leading-1.8 md:leading-1.8">
                <i class="far fa-calendar-alt text-secondary-color mr-5px"></i>
                {{ $post->published_at->format('F d, Y') }}
            </span>
        </p>

        <h4 class="text-xl font-semibold text-heading-color mb-5">
            <a
                href="{{ route('news.show', $post->slug) }}"
                class="hover:text-secondary-color leading-1.3">
                {{ \Illuminate\Support\Str::limit($post->title, 45) }}
            </a>
        </h4>

        <p class="text-sm">
            <span class="leading-1.8 lg:leading-1.8">
                {{ \Illuminate\Support\Str::limit($post->excerpt, 75) }}
            </span>
        </p>
    </div>
</div>
