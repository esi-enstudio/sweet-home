@props(['property'])

@php
    $media = $property->media->firstWhere('type','video')
@endphp

@if($media?->type == 'video')
    <div>
        <h4 class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color my-30px">
            Property Video
        </h4>

        <div class="mb-60px">
            <div
                style="background-image: url('{{ \Illuminate\Support\Facades\Storage::url($property->thumbnail) }}')"
                class="relative z-0 after:w-full after:h-full after:absolute after:left-0 after:top-0 after:bg-primary-color after:opacity-40 after:z-1 w-full h-auto lg:h-[450px] xl:h-[500px] min-h-80 md:min-h-[350px] bg-center bg-no-repeat bg-cover"
            >
                <div
                    class="absolute left-0 top-0 flex justify-center items-center h-full w-full z-10"
                >
                    <a
                        class="glightbox3 w-50px h-50px lg:w-20 lg:h-20 text-center text-sm lg:text-base text-secondary-color shadow-box-shadow-2 rounded-100% bg-white flex items-center justify-center"
                        href="{{ $media->video_url }}"
                        data-glightbox="type: video;"
                    >
                        <i class="icon-play"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endif
