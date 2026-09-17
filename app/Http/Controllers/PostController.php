<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\SchoolProfile;

class PostController extends Controller
{
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        $recentPosts = Post::where('id', '!=', $post->id)
            ->latest()
            ->take(5)
            ->get();

        $profile = SchoolProfile::latest()->first();

        return view('berita.show', compact('post', 'recentPosts', 'profile'));
    }
}
