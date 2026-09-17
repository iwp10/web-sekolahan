<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $post->title }} - {{ $profile?->school_name ?? 'Website Sekolah' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            navy: '#0F172A',
                            light: '#F8FAFC',
                            amber: '#D97706',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'ui-sans-serif', 'system-ui', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'sans-serif'],
                        serif: ['Merriweather', 'ui-serif', 'Georgia', 'Cambria', 'Times New Roman', 'Times', 'serif'],
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Merriweather:ital,wght@0,300;0,400;0,700;1,300;1,400&display=swap');
        
        .prose img {
            border-radius: 0.75rem;
            max-height: 500px;
            object-fit: cover;
            margin-top: 2rem;
            margin-bottom: 2rem;
        }
        .prose p {
            margin-bottom: 1.5rem;
            line-height: 1.8;
        }
        .prose h2, .prose h3, .prose h4 {
            color: #0F172A;
            font-weight: 700;
            margin-top: 2.5rem;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body class="font-sans antialiased bg-brand-light text-slate-800 selection:bg-brand-amber selection:text-white">

    <!-- Navbar Minimalist -->
    <nav class="bg-white text-brand-navy sticky top-0 z-50 shadow-sm border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center gap-3">
                    <a href="{{ url('/') }}" class="font-bold text-2xl tracking-tight text-brand-navy hover:text-brand-amber transition-colors">
                        {{ $profile?->school_name ?? 'Website Sekolah' }}
                    </a>
                </div>
                <div class="hidden md:block">
                    <a href="{{ url('/') }}" class="text-sm font-semibold text-slate-600 hover:text-brand-amber transition-all duration-200 flex items-center gap-2">
                        &larr; Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="py-12 lg:py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-8 md:hidden">
                <a href="{{ url('/') }}" class="inline-flex items-center text-brand-navy font-bold hover:text-brand-amber transition-all duration-200 text-sm">
                    &larr; Kembali ke Beranda
                </a>
            </div>

            <div class="flex flex-col lg:flex-row gap-12">
                
                <!-- Main Content -->
                <main class="w-full lg:w-2/3">
                    <article class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                        
                        <!-- Header Artikel -->
                        <header class="p-8 md:p-10 border-b border-slate-100">
                            <div class="flex items-center gap-4 mb-6">
                                <span class="inline-flex items-center px-3 py-1 rounded-md text-xs font-bold bg-brand-navy text-white tracking-wide shadow-sm">
                                    {{ $post->category ?? 'Berita' }}
                               </span>
                                <time class="text-sm font-semibold text-slate-500 uppercase tracking-wider">
                                    {{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->translatedFormat('l, d F Y') : $post->created_at->translatedFormat('l, d F Y') }}
                                </time>
                            </div>
                            
                            <h1 class="text-3xl md:text-5xl font-extrabold text-brand-navy leading-tight mb-6">
                                {{ $post->title }}
                            </h1>
                            
                            <div class="flex items-center gap-3 text-sm font-medium text-slate-600">
                                <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-brand-navy border border-slate-200">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </div>
                                <span>Oleh <span class="font-bold text-brand-navy">Administrator</span></span>
                            </div>
                        </header>

                        <!-- Cover Image -->
                        @if($post->image)
                            <div class="w-full relative aspect-[21/9] bg-slate-50 border-b border-slate-100">
                                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                            </div>
                        @endif

                        <!-- Isi Artikel -->
                        <div class="p-8 md:p-10">
                            <div class="prose prose-lg max-w-none font-serif text-slate-700">
                                {!! $post->content !!}
                            </div>
                        </div>

                    </article>
                </main>

                <!-- Sidebar -->
                <aside class="w-full lg:w-1/3">
                    <div class="sticky top-28 bg-white rounded-xl shadow-sm border border-slate-200 p-6 md:p-8">
                        <h3 class="text-lg font-extrabold text-brand-navy mb-6 border-b border-slate-100 pb-4 flex items-center gap-2">
                            <svg class="w-5 h-5 text-brand-amber" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5L16.5 5.5M9 11l3 3L22 4"></path></svg>
                            Berita Lainnya
                        </h3>
                        
                        <div class="space-y-6">
                            @forelse($recentPosts ?? [] as $recent)
                            <a href="{{ url('/berita/' . $recent->slug) }}" class="group block">
                                <article class="flex gap-4 items-start">
                                    <div class="w-24 h-24 rounded-lg overflow-hidden bg-slate-100 flex-shrink-0 border border-slate-200">
                                        @if($recent->image)
                                            <img src="{{ Storage::url($recent->image) }}" alt="{{ $recent->title }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-slate-400">
                                                <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-grow">
                                        <time class="text-[10px] font-bold text-slate-400 uppercase tracking-wider mb-1 block">
                                            {{ $recent->published_at ? \Carbon\Carbon::parse($recent->published_at)->translatedFormat('d M Y') : $recent->created_at->translatedFormat('d M Y') }}
                                        </time>
                                        <h4 class="text-sm font-bold text-brand-navy group-hover:text-brand-amber transition-colors line-clamp-2 leading-snug">
                                            {{ $recent->title }}
                                        </h4>
                                    </div>
                                </article>
                            </a>
                            @empty
                            <p class="text-sm text-slate-500 italic">Belum ada berita lainnya.</p>
                            @endforelse
                        </div>

                        <div class="mt-8 pt-6 border-t border-slate-100">
                            <a href="{{ url('/') }}" class="w-full block text-center bg-slate-50 hover:bg-slate-100 text-brand-navy border border-slate-200 font-bold py-3 px-4 rounded-lg transition-colors text-sm">
                                &larr; Kembali ke Beranda
                            </a>
                        </div>
                    </div>
                </aside>

            </div>
        </div>
    </div>

    <!-- Footer Minimalist -->
    <footer class="bg-white border-t border-slate-200 py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-slate-500 text-sm font-medium">
                &copy; {{ date('Y') }} {{ $profile?->school_name ?? 'Website Sekolah' }}. All rights reserved.
            </p>
        </div>
    </footer>

</body>
</html>
