<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class FallbackController extends Controller
{
    /**
     * Handle unmatched routes.
     *
     * @return Response
     */
    public function __invoke(): Response
    {
        // 'errors.404' হলো আপনার কাস্টম 404 পেজের Blade ফাইল
        // আমরা 404 HTTP স্ট্যাটাস কোড সেট করে দিচ্ছি
        return response()->view('errors.404', [], 404);
    }
}
