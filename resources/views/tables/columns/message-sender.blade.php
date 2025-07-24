<div>
    {{-- যদি মেসেজটি একজন গেস্টের হয় --}}
    @if($getRecord()->is_guest)
        <div class="flex items-center gap-x-2">
            <x-heroicon-o-check-circle class="w-6 h-6 text-success-500" />
            <span class="text-sm text-gray-500">Guest</span>
        </div>
    @else
        {{-- যদি রেজিস্টার্ড ব্যবহারকারী হয় --}}
        {{-- আমরা সরাসরি $getRecord()->user রিলেশনশিপটি চেক করছি --}}
        @if($getRecord()->user)
            @php
                // ছবির পাথ ভ্যারিয়েবলে নিন
                $avatarPath = $getRecord()->user->avatar_url; // অথবা profile_photo_path

                // ডিফল্ট ছবির পাথ
                $defaultAvatar = asset('path/to/your/default-avatar.png');

                // ছবির চূড়ান্ত URL তৈরি করুন
                $avatarUrl = ($avatarPath && Illuminate\Support\Facades\Storage::disk('public')->exists($avatarPath))
                             ? Illuminate\Support\Facades\Storage::disk('public')->url($avatarPath)
                             : $defaultAvatar;
            @endphp

            <div class="flex items-center gap-x-3">
                <img src="{{ $avatarUrl }}" alt="{{ $getRecord()->user->name }}" class="h-8 w-8 rounded-full object-cover">
            </div>
        @else
            {{-- যদি কোনো কারণে user রিলেশনটি null হয়, তাহলে গেস্টের মতোই দেখান --}}
            <div class="flex items-center gap-x-2">
                <x-heroicon-o-question-mark-circle class="w-6 h-6 text-gray-400" />
                <span class="text-sm text-gray-500">User Deleted</span>
            </div>
        @endif
    @endif
</div>
