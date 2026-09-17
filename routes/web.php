<?php

use App\Models\Extracurricular;
use App\Models\Message;
use App\Models\Post;
use App\Models\SchoolProfile;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $profile = SchoolProfile::latest()->first();
    $posts = Post::latest()->take(6)->get();
    $teachers = Teacher::all();
    $extracurriculars = Extracurricular::all();

    return view('welcome', compact('profile', 'posts', 'teachers', 'extracurriculars'));
});

Route::get('/berita/{slug}', function ($slug) {
    $post = Post::where('slug', $slug)->firstOrFail();
    $recentPosts = Post::where('id', '!=', $post->id)->latest()->take(3)->get();
    $profile = SchoolProfile::latest()->first();

    return view('posts.show', compact('post', 'recentPosts', 'profile'));
})->name('berita.show');

Route::post('/kontak', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:20',
        'message' => 'required|string',
    ]);

    Message::create($validated);

    return redirect('/#kontak')->with('success', 'Pesan Anda berhasil dikirim! Terima kasih atas masukannya.');
})->name('kontak.store');
