<div class="px-5 pt-35px pb-10 xl:pl-35px xl:pr-30px border-2 border-border-color-11">
    <h4 class="text-lg font-semibold text-heading-color mb-30px">
          <span class="leading-1.3 pl-10px border-l-2 border-secondary-color">
              Popular Tags
          </span>
    </h4>

    <ul class="flex gap-10px flex-wrap items-center font-poppins">
        @foreach($this->popularTags as $tag)
            <li>
                <a
                    href="#"
                    class="text-13px px-6 py-2 leading-1.8 bg-section-bg-1 hover:bg-secondary-color hover:text-white flex items-center justify-center font-bold"
                >
                    {{ \Illuminate\Support\Str::title($tag->name) }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
