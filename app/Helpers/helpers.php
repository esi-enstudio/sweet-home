<?php

if (!function_exists('generate_link_from_settings')) {
    /**
     * Generate a URL from the structured link data saved in settings.
     *
     * @param array $linkData An associative array containing link information.
     * @param string $fallbackUrl A default URL if generation fails.
     * @return string
     */
    function generate_link_from_settings(array $linkData, string $fallbackUrl = '#'): string
    {
        // যদি কাস্টম URL দেওয়া থাকে, তাহলে সেটিই ব্যবহার করুন
        if (!empty($linkData['button_link_url'])) {
            return url($linkData['button_link_url']);
        }

        // যদি রাউটের নাম দেওয়া থাকে
        if (!empty($linkData['button_link_route_name'])) {
            try {
                $params = [];
                if (!empty($linkData['button_link_route_params'])) {
                    // KeyValue থেকে আসা প্যারামিটারগুলো প্রসেস করুন
                    foreach ($linkData['button_link_route_params'] as $key => $value) {
                        // আমাদের বিশেষ কেস: 'rent' বা 'sell' কে অ্যারের মধ্যে রাখা
                        if ($key === 'selectedListingTypes' || $key === 'selectedTypes') {
                            $params[$key] = [$value];
                        } else {
                            $params[$key] = $value;
                        }
                    }
                }
                return route($linkData['button_link_route_name'], $params);
            } catch (\Exception $e) {
                // যদি রাউট খুঁজে না পাওয়া যায় বা প্যারামিটারে সমস্যা হয়
                return $fallbackUrl;
            }
        }

        // যদি কোনোটিই না থাকে, তাহলে ফলব্যাক URL রিটার্ন করুন
        return $fallbackUrl;
    }
}
