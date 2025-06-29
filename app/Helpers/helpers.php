<?php

if (!function_exists('generate_bangla_slug')) {
    function generate_bangla_slug(string $text): string
    {
        // ... (আগের উত্তরে দেওয়া সম্পূর্ণ ফাংশনটি এখানে থাকবে)
        $slug = mb_strtolower($text, 'UTF-8');
        $bn = ["১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০"];
        $en = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"];
        $slug = str_replace($bn, $en, $slug);
        $slug = preg_replace('/[\s\._,]+/', '-', $slug);
        $slug = preg_replace('/[^\p{L}\p{N}\-]+/u', '', $slug);
        $slug = preg_replace('/-+/', '-', $slug);
        return trim($slug, '-');
    }
}
