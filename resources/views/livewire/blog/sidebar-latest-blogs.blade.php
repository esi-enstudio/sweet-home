<div class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px mb-10 border-2 border-border-color-11">
    <h4 class="text-lg font-semibold text-heading-color mb-25px">
          <span class="leading-1.3 pl-10px border-l-2 border-secondary-color">
              Leatest Blogs
          </span>
    </h4>

    <ul>
        @foreach($this->latestPosts as $post)
            <li
                wire:key="latest-post-{{ $post->id }}"
                class="@if(!$loop->last) pb-5 mb-30px border-b border-border-color-1 @endif"
            >
                <div class="flex gap-x-5">
                    <div class="w-20 flex-shrink-0">
                        <a href="{{ route('blog.show', $post->slug) }}">
                            <img src="{{ $post->featured_image && Storage::disk('public')->exists($post->featured_image) ? Storage::url($post->featured_image) : '' }}" alt="{{ $post->title }}">
                        </a>
                    </div>

                    <div>
                        <h6 class="text-sm font-medium mb-5px">
                            <a href="{{ route('blog.show', $post->slug) }}" class="leading-1.3">
                                {{ \Illuminate\Support\Str::limit($post->title, 45) }}
                            </a>
                        </h6>

                        <div
                            class="text-xs md:text-sm font-semibold text-secondary-color">
                            <a href="#" class="leading-1.8 md:leading-1.8">
                                <i class="far fa-calendar-alt"></i>
                                {{ $post->published_at->format('F d, Y') }}
                            </a>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
