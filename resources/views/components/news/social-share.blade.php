@props([
    'shareUrl' => url()->current(),
    'title' => config('app.name'),
])

@php
    // এনকোডিং এখন শুধু URL এবং টাইটেলের জন্য
    $encodedUrl = urlencode($shareUrl);
    $encodedTitle = urlencode($title);

    // ফেসবুকের জন্য একটি সহজ এবং নির্ভরযোগ্য URL
    $facebookUrl = "https://www.facebook.com/sharer/sharer.php?u=" . $shareUrl;

    // টুইটারের জন্য
    $twitterUrl = "https://twitter.com/intent/tweet?url={$encodedUrl}&text={$encodedTitle}";

    // লিঙ্কডইন-এর জন্য
    $linkedinUrl = "https://www.linkedin.com/shareArticle?mini=true&url={$encodedUrl}";
@endphp


<div>
    <h4 class="text-17px md:text-lg lg:text-xl font-bold text-heading-color mb-15px mt-30px lg:mt-0">
        <span class="leading-1.3 md:leading-1.3 xl:leading-1.3">Social Share</span>
    </h4>

    <ul class="text-sm lg:text-base flex gap-18px justify-center items-center text-color-1">
        {{-- Facebook --}}
        <li class="leading-1.8 lg:leading-1.8">
            <a
                href="{{ $facebookUrl }}"
                onclick="window.open(this.href, 'facebook-share', 'width=580,height=296'); return false;"
                title="Share on Facebook"
            >
                <i class="fab fa-facebook-f"></i>
            </a>
        </li>

        {{-- Twitter --}}
        <li class="leading-1.8 lg:leading-1.8">
            <a
                href="{{ $twitterUrl }}"
                onclick="window.open(this.href, 'twitter-share', 'width=550,height=235'); return false;"
                title="Share on Twitter"
            >
                <i class="fab fa-twitter"></i>
            </a>
        </li>

        {{-- LinkedIn --}}
        <li class="leading-1.8 lg:leading-1.8">
            <a
                href="{{ $linkedinUrl }}"
                onclick="window.open(this.href, 'linkedin-share', 'width=550,height=235'); return false;"
                title="Share on LinkedIn">
                <i class="fab fa-linkedin"></i>
            </a>
        </li>

        {{-- WhatsApp (মোবাইলের জন্য খুবই কার্যকর) --}}
{{--        <li class="leading-1.8 lg:leading-1.8">--}}
{{--            <a href="{{ $whatsappUrl }}" target="_blank">--}}
{{--                <i class="fab fa-whatsapp"></i>--}}
{{--            </a>--}}
{{--        </li>--}}
    </ul>
</div>
