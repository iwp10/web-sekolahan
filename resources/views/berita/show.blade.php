<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $post->title }} - {{ $profile->school_name ?? 'Website Sekolah' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        academic: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-800 selection:bg-academic-500 selection:text-white flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav class="bg-academic-900 text-white sticky top-0 z-50 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-3">
                    <a href="/" class="font-bold text-xl tracking-wide">{{ $profile->school_name ?? 'Website Sekolah' }}</a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-center space-x-6">
                        <a href="/#profil" class="hover:text-academic-100 transition">Profil</a>
                        <a href="/#berita" class="hover:text-academic-100 transition">Berita</a>
                        <a href="/#guru" class="hover:text-academic-100 transition">Guru</a>
                        <a href="/#ekskul" class="hover:text-academic-100 transition">Ekskul</a>
                        <a href="/#kontak" class="hover:text-academic-100 transition">Kontak</a>
                        <a href="/admin" class="bg-white text-academic-900 hover:bg-academic-50 px-4 py-2 rounded-md font-semibold transition shadow-sm">
                            Admin Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 w-full">
        <!-- Back Button -->
        <div class="mb-8">
            <a href="/#berita" class="inline-flex items-center text-academic-500 hover:text-academic-700 font-medium transition">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Beranda
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Article Detail -->
            <article class="lg:col-span-2 bg-white rounded-2xl shadow-sm p-6 md:p-10 border border-gray-100">
                <span class="inline-block bg-academic-100 text-academic-700 text-sm font-bold px-4 py-1.5 rounded-full mb-4">
                    {{ $post->category }}
                </span>
                
                <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4 leading-tight">
                    {{ $post->title }}
                </h1>
                
                <div class="flex items-center text-gray-500 text-sm mb-8">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->format('d F Y') : $post->created_at->format('d F Y') }}
                </div>

                @if($post->image)
                    <div class="rounded-xl overflow-hidden mb-10 shadow-md">
                        <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-auto object-cover max-h-[500px]">
                    </div>
                @endif

                <div class="prose prose-lg prose-blue max-w-none text-gray-700 leading-relaxed">
                    {!! nl2br(e($post->content)) !!}
                </div>
            </article>

            <!-- Sidebar -->
            <aside class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-sm p-6 md:p-8 border border-gray-100 sticky top-24">
                    <h3 class="text-xl font-bold text-gray-900 mb-6 border-b pb-4">Berita Lainnya</h3>
                    
                    <div class="space-y-6">
                        @forelse($recentPosts as $recent)
                            <a href="{{ route('berita.show', $recent->slug) }}" class="group block">
                                <div class="flex gap-4">
                                    <div class="w-24 h-24 flex-shrink-0 rounded-lg overflow-hidden bg-gray-100">
                                        @if($recent->image)
                                            <img src="{{ Storage::url($recent->image) }}" alt="{{ $recent->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-gray-400 text-xs text-center">No Image</div>
                                        @endif
                                    </div>
                                    <div class="flex flex-col justify-center">
                                        <h4 class="text-sm font-bold text-gray-800 group-hover:text-academic-500 transition line-clamp-2 mb-1">
                                            {{ $recent->title }}
                                        </h4>
                                        <p class="text-xs text-gray-500">
                                            {{ $recent->published_at ? \Carbon\Carbon::parse($recent->published_at)->format('d M Y') : $recent->created_at->format('d M Y') }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <p class="text-sm text-gray-500">Belum ada berita lainnya.</p>
                        @endforelse
                    </div>
                </div>
            </aside>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-academic-900 text-academic-50 border-t-4 border-academic-500 pt-16 pb-8 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
                <div>
                    <h3 class="text-2xl font-bold text-white mb-6">{{ $profile->school_name ?? 'Website Sekolah' }}</h3>
                    <p class="text-gray-400 mb-6 leading-relaxed">
                        Membentuk generasi penerus yang cerdas, terampil, dan berbudi pekerti luhur melalui pendidikan yang berkualitas dan inovatif.
                    </p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-white mb-6 uppercase tracking-wider">Tautan Cepat</h4>
                    <ul class="space-y-3 text-gray-400">
                        <li><a href="/#profil" class="hover:text-white transition">Profil Sekolah</a></li>
                        <li><a href="/#berita" class="hover:text-white transition">Berita & Pengumuman</a></li>
                        <li><a href="/#guru" class="hover:text-white transition">Tenaga Pendidik</a></li>
                        <li><a href="/#ekskul" class="hover:text-white transition">Ekstrakurikuler</a></li>
                        <li><a href="/admin" class="hover:text-white transition">Login Admin</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-white mb-6 uppercase tracking-wider">Hubungi Kami</h4>
                    <ul class="space-y-4 text-gray-400">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 mr-3 text-academic-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span>{{ $profile->address ?? 'Jl. Pendidikan No. 1, Kota Pelajar, Indonesia' }}</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-6 h-6 mr-3 text-academic-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span>{{ $profile->phone ?? '(021) 1234-5678' }}</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-6 h-6 mr-3 text-academic-500 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2v10a2 2 0 002 2z"></path></svg>
                            <span>{{ $profile->email ?? 'info@sekolah.sch.id' }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-academic-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm mb-4 md:mb-0">
                    &copy; {{ date('Y') }} {{ $profile->school_name ?? 'Website Sekolah' }}. All rights reserved.
                </p>
                <div class="flex space-x-4">
                    <!-- Social icons here -->
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
