<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $profile?->school_name ?? 'Website Sekolah' }}</title>
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
    </style>
</head>
<body class="font-sans antialiased bg-brand-light text-slate-800 selection:bg-brand-amber selection:text-white">

    <!-- Navbar -->
    <nav class="bg-white text-brand-navy sticky top-0 z-50 shadow-sm border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center gap-3">
                    <span class="font-bold text-2xl tracking-tight text-brand-navy">
                        {{ $profile?->school_name ?? 'Website Sekolah' }}
                    </span>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-center space-x-8">
                        <a href="#profil" class="text-sm font-semibold text-slate-600 hover:text-brand-amber transition-all duration-200">Profil</a>
                        <a href="#berita" class="text-sm font-semibold text-slate-600 hover:text-brand-amber transition-all duration-200">Berita</a>
                        <a href="#guru" class="text-sm font-semibold text-slate-600 hover:text-brand-amber transition-all duration-200">Guru</a>
                        <a href="#ekskul" class="text-sm font-semibold text-slate-600 hover:text-brand-amber transition-all duration-200">Ekskul</a>
                        <a href="#kontak" class="text-sm font-semibold text-slate-600 hover:text-brand-amber transition-all duration-200">Kontak</a>
                        <a href="/admin" class="bg-brand-navy text-white hover:bg-slate-800 px-5 py-2.5 rounded-xl font-semibold text-sm shadow-sm hover:shadow-md transition-all duration-200">
                            Portal Admin
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="bg-brand-light relative overflow-hidden pt-24 pb-16 lg:pt-32 lg:pb-28">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white text-slate-700 font-semibold text-xs md:text-sm mb-8 border border-slate-200 shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-brand-amber animate-pulse"></span>
                    Tahun Ajaran 2026/2027 &bull; Sistem Informasi & Akademik Resmi
                </div>
                <h1 class="text-5xl md:text-7xl font-extrabold text-brand-navy tracking-tight mb-6 leading-tight">
                    Masa Depan Cerah <br/>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-navy to-slate-500">Dimulai Dari Sini</span>
                </h1>
                <p class="text-lg md:text-xl text-slate-600 mb-10 max-w-2xl mx-auto leading-relaxed">
                    {{ $profile?->school_name ?? 'Institusi Pendidikan Kami' }} berkomitmen membentuk generasi unggul, berprestasi, dan berkarakter dengan fasilitas modern serta tenaga pendidik profesional.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#profil" class="bg-brand-navy hover:bg-slate-800 text-white px-8 py-4 rounded-xl font-bold text-lg shadow-sm hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5">
                        Jelajahi Profil
                    </a>
                    <a href="#kontak" class="bg-white hover:bg-slate-50 text-brand-navy border border-slate-300 px-8 py-4 rounded-xl font-bold text-lg shadow-sm hover:shadow-md transition-all duration-200 transform hover:-translate-y-0.5">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
        <!-- Decorative elements -->
        <div class="absolute top-0 w-full h-full overflow-hidden -z-10 flex justify-center pointer-events-none">
            <div class="w-[800px] h-[800px] bg-white rounded-full blur-3xl opacity-60 absolute -top-40"></div>
        </div>
    </header>

    <!-- Sambutan Kepala Sekolah -->
    <section id="profil" class="py-24 bg-white relative border-y border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="order-1 flex justify-center lg:justify-start">
                    <div class="relative w-full max-w-md aspect-[4/5] rounded-xl overflow-hidden shadow-md border border-slate-200 p-2 bg-white">
                        <div class="w-full h-full rounded-lg overflow-hidden relative bg-slate-50">
                            @if(isset($profile?->principal_photo) && $profile?->principal_photo)
                                <img src="{{ Storage::url($profile?->principal_photo) }}" alt="Foto Kepala Sekolah" loading="lazy" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex flex-col items-center justify-center text-slate-400">
                                    <svg class="w-20 h-20 mb-4 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    <span class="text-base font-medium">Foto Pimpinan</span>
                                </div>
                            @endif
                            <div class="absolute inset-0 ring-1 ring-inset ring-black/5 rounded-lg pointer-events-none"></div>
                        </div>
                    </div>
                </div>
                <div class="order-2 relative">
                    <svg class="absolute -top-10 -left-6 w-24 h-24 text-slate-100 z-0 transform -rotate-3" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" /></svg>
                    <blockquote class="relative z-10">
                        <h2 class="text-xs font-bold tracking-widest text-brand-amber uppercase mb-5">Sambutan Pimpinan</h2>
                        <p class="text-2xl md:text-3xl font-serif font-light text-brand-navy leading-snug mb-8 italic text-slate-800">
                            &ldquo;{!! nl2br(e($profile?->principal_welcome ?? 'Pendidikan adalah investasi terbaik untuk masa depan. Kami siap membimbing dan memfasilitasi putra-putri Anda untuk mencapai potensi maksimal mereka.')) !!}&rdquo;
                        </p>
                        <footer class="flex items-center gap-5 mt-8 pt-6 border-t border-slate-100">
                            <div class="w-10 h-10 rounded-full bg-slate-50 border border-slate-200 flex items-center justify-center text-brand-navy">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-brand-navy">{{ $profile?->principal_name ?? 'Nama Kepala Sekolah, S.Pd., M.Pd.' }}</h3>
                                <p class="text-slate-500 font-medium text-sm">Kepala Sekolah {{ $profile?->school_name ?? '' }}</p>
                            </div>
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi & Misi -->
    <section class="py-24 bg-brand-light">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-xs font-bold tracking-widest text-brand-amber uppercase mb-3">Arah Tujuan</h2>
                <h3 class="text-3xl font-extrabold text-brand-navy">Visi & Misi Institusi</h3>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Visi Card -->
                <div class="bg-white rounded-xl p-10 shadow-sm hover:shadow-md transition-all duration-200 border border-slate-200 border-t-4 border-t-brand-navy">
                    <div class="w-12 h-12 bg-slate-50 rounded-lg flex items-center justify-center mb-6 text-brand-navy border border-slate-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    </div>
                    <h4 class="text-2xl font-bold text-brand-navy mb-4">Visi</h4>
                    <p class="text-slate-600 leading-relaxed text-lg">
                        {!! nl2br(e($profile?->vision ?? 'Menjadi sekolah unggulan yang menghasilkan lulusan berprestasi, berkarakter, dan berdaya saing global.')) !!}
                    </p>
                </div>
                <!-- Misi Card -->
                <div class="bg-white rounded-xl p-10 shadow-sm hover:shadow-md transition-all duration-200 border border-slate-200 border-t-4 border-t-brand-amber">
                    <div class="w-12 h-12 bg-orange-50/50 rounded-lg flex items-center justify-center mb-6 text-brand-amber border border-orange-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                    </div>
                    <h4 class="text-2xl font-bold text-brand-navy mb-4">Misi</h4>
                    <div class="text-slate-600 leading-relaxed space-y-2">
                        {!! nl2br(e($profile?->mission ?? "1. Menyelenggarakan pendidikan berkualitas.\n2. Mengembangkan potensi siswa secara holistik.\n3. Membangun lingkungan belajar yang inklusif.")) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Berita & Pengumuman -->
    <section id="berita" class="py-24 bg-white border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-4">
                <div>
                    <h2 class="text-xs font-bold tracking-widest text-brand-amber uppercase mb-3">Informasi Terkini</h2>
                    <h3 class="text-3xl font-extrabold text-brand-navy">Berita & Pengumuman</h3>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($posts ?? [] as $post)
                <article class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-200 border border-slate-200 flex flex-col overflow-hidden group">
                    <div class="aspect-[16/9] relative overflow-hidden bg-slate-50 border-b border-slate-100">
                        @if($post->image)
                            <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex flex-col items-center justify-center text-slate-400">
                                <svg class="w-10 h-10 mb-2 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                        <div class="absolute top-4 left-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-md text-xs font-bold bg-white/95 text-brand-navy shadow-sm border border-slate-100 tracking-wide">
                                {{ $post->category ?? 'Berita' }}
                            </span>
                        </div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <time class="text-xs font-semibold text-slate-500 mb-3 block uppercase tracking-wider">
                            {{ $post->published_at ? \Carbon\Carbon::parse($post->published_at)->translatedFormat('d F Y') : $post->created_at->translatedFormat('d F Y') }}
                        </time>
                        <h4 class="text-xl font-bold text-brand-navy mb-3 line-clamp-2 group-hover:text-brand-amber transition-colors">
                            {{ $post->title }}
                        </h4>
                        <p class="text-slate-600 mb-6 line-clamp-2 flex-grow text-sm leading-relaxed">
                            {{ Str::limit(strip_tags($post->content), 120) }}
                        </p>
                        <a href="{{ url('/berita/' . $post->slug) }}" class="inline-flex items-center text-brand-navy font-bold hover:text-brand-amber transition-all duration-200 group/link mt-auto text-sm">
                            Baca Artikel &rarr;
                        </a>
                    </div>
                </article>
                @empty
                <div class="col-span-full flex flex-col items-center justify-center py-16 px-4 bg-brand-light rounded-xl border border-dashed border-slate-300">
                    <svg class="w-16 h-16 text-slate-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5L16.5 5.5M9 11l3 3L22 4"></path></svg>
                    <p class="text-slate-500 font-medium text-lg">Belum ada berita atau pengumuman saat ini.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Daftar Guru -->
    <section id="guru" class="py-24 bg-brand-light border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-xs font-bold tracking-widest text-brand-amber uppercase mb-3">Tenaga Pendidik</h2>
                <h3 class="text-3xl font-extrabold text-brand-navy">Guru & Staf Pengajar</h3>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @forelse($teachers ?? [] as $teacher)
                <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-all duration-200 text-center border border-slate-200 group">
                    <div class="w-24 h-24 sm:w-28 sm:h-28 mx-auto mb-5 rounded-xl overflow-hidden border border-slate-100 relative bg-slate-50">
                        @if($teacher->photo)
                            <img src="{{ Storage::url($teacher->photo) }}" alt="{{ $teacher->name }}" loading="lazy" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-slate-400">
                                <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                        @endif
                    </div>
                    <h4 class="text-base font-bold text-brand-navy mb-1 line-clamp-1" title="{{ $teacher->name }}">{{ $teacher->name }}</h4>
                    <p class="text-slate-600 font-medium text-xs mb-2 line-clamp-1">{{ $teacher->subject }}</p>
                    @if($teacher->nip)
                        <p class="text-xs text-slate-400 font-mono bg-slate-50 inline-block px-2 py-1 rounded border border-slate-100">NIP. {{ $teacher->nip }}</p>
                    @endif
                </div>
                @empty
                <div class="col-span-full flex flex-col items-center justify-center py-16 px-4 bg-white rounded-xl border border-dashed border-slate-300 shadow-sm">
                    <svg class="w-16 h-16 text-slate-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    <p class="text-slate-500 font-medium text-lg">Belum ada data guru.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Ekstrakurikuler -->
    <section id="ekskul" class="py-24 bg-white border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-xs font-bold tracking-widest text-brand-amber uppercase mb-3">Pengembangan Diri</h2>
                <h3 class="text-3xl font-extrabold text-brand-navy">Ekstrakurikuler</h3>
                <p class="mt-4 text-slate-600 max-w-2xl mx-auto">Kembangkan bakat dan minat di luar jam pelajaran melalui berbagai pilihan kegiatan ekstrakurikuler sekolah.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($extracurriculars ?? [] as $ekskul)
                <div class="group relative rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-200 bg-brand-navy border border-slate-200">
                    <div class="absolute inset-0 bg-gradient-to-t from-brand-navy via-brand-navy/80 to-transparent opacity-95 z-10"></div>
                    @if($ekskul->photo)
                        <img src="{{ Storage::url($ekskul->photo) }}" alt="{{ $ekskul->name }}" loading="lazy" class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-500 opacity-70">
                    @else
                        <div class="w-full h-64 bg-slate-800 flex items-center justify-center opacity-70">
                            <svg class="w-16 h-16 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    @endif
                    
                    <div class="absolute bottom-0 left-0 right-0 p-6 z-20 text-white">
                        <h4 class="text-xl font-bold mb-2">{{ $ekskul->name }}</h4>
                        @if($ekskul->description)
                            <p class="text-sm text-slate-300 line-clamp-2 leading-relaxed mb-4">{{ $ekskul->description }}</p>
                        @endif
                        @if($ekskul->schedule)
                            <div class="inline-flex items-center gap-2 text-xs font-semibold bg-white/10 px-3 py-1.5 rounded-md backdrop-blur-sm border border-white/10">
                                <svg class="w-4 h-4 text-brand-amber" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <span>{{ $ekskul->schedule }}</span>
                            </div>
                        @endif
                    </div>
                </div>
                @empty
                <div class="col-span-full flex flex-col items-center justify-center py-16 px-4 bg-brand-light rounded-xl border border-dashed border-slate-300">
                    <svg class="w-16 h-16 text-slate-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"></path></svg>
                    <p class="text-slate-500 font-medium text-lg">Belum ada data ekstrakurikuler.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Kontak & Pesan -->
    <section id="kontak" class="py-24 bg-brand-light border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-xs font-bold tracking-widest text-brand-amber uppercase mb-3">Layanan Informasi</h2>
                <h3 class="text-3xl font-extrabold text-brand-navy">Hubungi Kami</h3>
                <p class="mt-4 text-slate-600 max-w-2xl mx-auto">Punya pertanyaan atau masukan? Jangan ragu untuk mengirimkan pesan kepada kami melalui form di bawah ini.</p>
            </div>

            <div class="max-w-5xl mx-auto bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden flex flex-col md:flex-row">
                <div class="bg-brand-navy text-white p-10 md:w-2/5 flex flex-col justify-between">
                    <div>
                        <h4 class="text-2xl font-bold mb-8 text-white">Informasi Kontak</h4>
                        <ul class="space-y-6">
                            <li class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-brand-amber" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                </div>
                                <span class="leading-relaxed mt-2 text-slate-300">{{ $profile?->address ?? 'Jl. Pendidikan No. 1, Kota Pelajar, Indonesia' }}</span>
                            </li>
                            <li class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-brand-amber" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                </div>
                                <span class="text-slate-300">{{ $profile?->phone ?? '(021) 1234-5678' }}</span>
                            </li>
                            <li class="flex items-center gap-4">
                                <div class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-brand-amber" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                </div>
                                <span class="text-slate-300">{{ $profile?->email ?? 'info@sekolah.sch.id' }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="mt-12 md:mt-0 pt-8 border-t border-slate-700/50">
                        <p class="text-slate-400 text-sm font-medium">Jam Operasional:<br/><span class="text-slate-300">Senin - Jumat (07:00 - 15:00)</span></p>
                    </div>
                </div>
                
                <div class="p-10 md:w-3/5 bg-white">
                    @if(session('success'))
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100 dark:bg-gray-800 dark:text-green-400" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('kontak.store') }}" method="POST" class="space-y-5">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label for="name" class="block text-sm font-bold text-brand-navy mb-2">Nama Lengkap *</label>
                                <input type="text" name="name" id="name" required class="w-full px-4 py-3 rounded-lg border border-slate-200 focus:ring-2 focus:ring-brand-amber focus:border-brand-amber outline-none transition-all bg-slate-50 focus:bg-white" placeholder="Masukkan nama" value="{{ old('name') }}">
                                @error('name') <span class="text-red-500 text-xs mt-1.5 font-medium block">{{ $message }}</span> @enderror
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-bold text-brand-navy mb-2">Email *</label>
                                <input type="email" name="email" id="email" required class="w-full px-4 py-3 rounded-lg border border-slate-200 focus:ring-2 focus:ring-brand-amber focus:border-brand-amber outline-none transition-all bg-slate-50 focus:bg-white" placeholder="email@contoh.com" value="{{ old('email') }}">
                                @error('email') <span class="text-red-500 text-xs mt-1.5 font-medium block">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-bold text-brand-navy mb-2">No. Telepon / WA</label>
                            <input type="text" name="phone" id="phone" class="w-full px-4 py-3 rounded-lg border border-slate-200 focus:ring-2 focus:ring-brand-amber focus:border-brand-amber outline-none transition-all bg-slate-50 focus:bg-white" placeholder="08xxxxxxxxxx" value="{{ old('phone') }}">
                            @error('phone') <span class="text-red-500 text-xs mt-1.5 font-medium block">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-bold text-brand-navy mb-2">Pesan *</label>
                            <textarea name="message" id="message" rows="4" required class="w-full px-4 py-3 rounded-lg border border-slate-200 focus:ring-2 focus:ring-brand-amber focus:border-brand-amber outline-none transition-all resize-none bg-slate-50 focus:bg-white" placeholder="Tulis pesan Anda di sini...">{{ old('message') }}</textarea>
                            @error('message') <span class="text-red-500 text-xs mt-1.5 font-medium block">{{ $message }}</span> @enderror
                        </div>
                        <div class="pt-2">
                            <button type="submit" class="w-full bg-brand-navy hover:bg-slate-800 text-white font-bold py-4 px-6 rounded-lg shadow-sm hover:shadow-md transition-all duration-200 flex justify-center items-center group">
                                <span>Kirim Pesan Sekarang</span>
                                <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-brand-navy text-white border-t-4 border-brand-amber pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
                <div>
                    <h3 class="text-2xl font-bold text-white mb-6">{{ $profile?->school_name ?? 'Website Sekolah' }}</h3>
                    <p class="text-slate-400 mb-6 leading-relaxed pr-4">
                        Membentuk generasi penerus yang cerdas, terampil, dan berbudi pekerti luhur melalui pendidikan yang berkualitas dan inovatif.
                    </p>
                </div>
                <div>
                    <h4 class="text-lg font-bold text-white mb-6 uppercase tracking-wider">Tautan Cepat</h4>
                    <ul class="space-y-3 text-slate-400 font-medium">
                        <li><a href="#profil" class="hover:text-brand-amber transition-colors duration-200">Profil Sekolah</a></li>
                        <li><a href="#berita" class="hover:text-brand-amber transition-colors duration-200">Berita & Pengumuman</a></li>
                        <li><a href="#guru" class="hover:text-brand-amber transition-colors duration-200">Tenaga Pendidik</a></li>
                        <li><a href="#ekskul" class="hover:text-brand-amber transition-colors duration-200">Ekstrakurikuler</a></li>
                        <li><a href="/admin" class="hover:text-brand-amber transition-colors duration-200">Login Admin</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold text-white mb-6 uppercase tracking-wider">Hubungi Kami</h4>
                    <ul class="space-y-4 text-slate-400 font-medium">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 mr-3 text-brand-amber flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span>{{ $profile?->address ?? 'Jl. Pendidikan No. 1, Kota Pelajar, Indonesia' }}</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-6 h-6 mr-3 text-brand-amber flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                            <span>{{ $profile?->phone ?? '(021) 1234-5678' }}</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-6 h-6 mr-3 text-brand-amber flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span>{{ $profile?->email ?? 'info@sekolah.sch.id' }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-slate-400 text-sm mb-4 md:mb-0 font-medium">
                    &copy; {{ date('Y') }} {{ $profile?->school_name ?? 'Website Sekolah' }}. All rights reserved.
                </p>
                <div class="flex space-x-5">
                    <a href="#" class="text-slate-400 hover:text-brand-amber transition-colors duration-200">
                        <span class="sr-only">Facebook</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.47-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                    </a>
                    <a href="#" class="text-slate-400 hover:text-brand-amber transition-colors duration-200">
                        <span class="sr-only">Instagram</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
