<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NewsViewController extends Controller
{
    public function store(Post $post, Request $request): JsonResponse
    {
        // Route Model Binding স্বয়ংক্রিয়ভাবে প্রপার্টি খুঁজে আনবে

        $viewTracked = $post->trackView($request);

        if ($viewTracked) {
            return response()->json(['status' => 'success', 'message' => 'View tracked.']);
        }

        return response()->json(['status' => 'ignored', 'message' => 'View already tracked or invalid.']);
    }
}
