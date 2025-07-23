@php
    // $getRecord() মেথডটি বর্তমান Eloquent মডেল ইনস্ট্যান্সটি দেয়
    $links = $getRecord()->social_links;
@endphp

{{-- শুধুমাত্র ভ্যালিড অ্যারে থাকলেই রেন্ডার হবে --}}
@if(!empty($links) && is_array($links))
    <div class="flex flex-wrap gap-1">

        @foreach($links as $platform => $url)
            {{-- প্রতিটি প্ল্যাটফর্মের জন্য একটি ব্যাজ --}}
            <span class="px-2 py-1 text-xs font-medium rounded-md bg-primary-500 text-white">
                {{ ucfirst($platform) }}
            </span>
        @endforeach
    </div>
@endif
