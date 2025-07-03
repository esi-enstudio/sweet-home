@props(['property'])
{{--{{ dd($property->media->contains('type','image')) }}--}}
@if($property->media->contains('type','image'))
    <div>
        <h4 class="text-22px font-semibold leading-1.3 pl-10px border-l-2 border-secondary-color text-heading-color my-30px">
            From Our Gallery
        </h4>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-30px mb-60px">
            @foreach($property->media as $media)
                <div class="md:cols-start-1 md:col-span-1 leading-1">
                    <a
                        href="{{ \Illuminate\Support\Facades\Storage::url($media->path) }}"
                        class="glightbox w-full leading-1 md:h-full"
                    >
                        <img
                            src="{{ \Illuminate\Support\Facades\Storage::url($media->path) }}"
                            alt="{{ $property->title }}"
                            class="w-full md:h-full"
                        >
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endif
