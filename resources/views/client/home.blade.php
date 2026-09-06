@extends('layouts.client')

@section('title', ($profile->name ?? 'Portfolio') . ' - Web Developer & Business Analyst')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-12">
        
    <!-- HEADER SECTION -->
    <header class="text-center mb-16">
        <div class="relative w-36 h-36 mx-auto mb-6">
            <!-- Hiệu ứng vòng sáng quanh avatar -->
            <div class="absolute inset-0 rounded-full bg-gradient-to-r from-cyan-400 to-blue-500 dark:from-cyan-500 dark:to-blue-600 blur-md opacity-75"></div>
            <img src="{{ $profile->avatar_path ? asset($profile->avatar_path) : asset('images/avatar.jpg') }}" alt="{{ $profile->name ?? 'Avatar' }}" class="relative w-36 h-36 rounded-full object-cover border-2 border-white dark:border-slate-700 shadow-xl bg-white">
        </div>
        
        <h1 class="text-4xl font-extrabold tracking-tight mb-2 bg-gradient-to-r from-cyan-600 to-blue-600 dark:from-cyan-400 dark:to-blue-500 bg-clip-text text-transparent uppercase">
            {{ $profile->name ?? 'LÊ BÁ HÙNG ANH' }}
        </h1>
        <p class="text-sm font-semibold tracking-widest text-cyan-600 dark:text-cyan-400 uppercase">
            {{ $profile->job_title ?? 'Web Developer & Business Analyst' }}
        </p>
    </header>

    <!-- INFO CARDS SECTION -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-16">
        
        <div class="bg-white/80 dark:bg-cardBg/60 backdrop-blur-md border border-slate-200 dark:border-slate-800 p-4 rounded-xl flex items-center space-x-4 shadow-sm transition-colors duration-300">
            <div class="p-3 bg-cyan-100 dark:bg-cyan-500/10 text-cyan-600 dark:text-cyan-400 rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            </div>
            <div>
                <span class="text-xs text-slate-500 dark:text-slate-400 block font-medium">HỌ VÀ TÊN</span>
                <span class="text-sm font-semibold text-slate-800 dark:text-slate-200">{{ $profile->name ?? 'N/A' }}</span>
            </div>
        </div>

        <div class="bg-white/80 dark:bg-cardBg/60 backdrop-blur-md border border-slate-200 dark:border-slate-800 p-4 rounded-xl flex items-center space-x-4 shadow-sm transition-colors duration-300">
            <div class="p-3 bg-cyan-100 dark:bg-cyan-500/10 text-cyan-600 dark:text-cyan-400 rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
            </div>
            <div>
                <span class="text-xs text-slate-500 dark:text-slate-400 block font-medium">ĐIỆN THOẠI</span>
                <span class="text-sm font-semibold text-slate-800 dark:text-slate-200">{{ $profile->phone ?? 'N/A' }}</span>
            </div>
        </div>

        <div class="bg-white/80 dark:bg-cardBg/60 backdrop-blur-md border border-slate-200 dark:border-slate-800 p-4 rounded-xl flex items-center space-x-4 shadow-sm transition-colors duration-300">
            <div class="p-3 bg-cyan-100 dark:bg-cyan-500/10 text-cyan-600 dark:text-cyan-400 rounded-lg">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
            <div>
                <span class="text-xs text-slate-500 dark:text-slate-400 block font-medium">EMAIL</span>
                <span class="text-sm font-semibold text-slate-800 dark:text-slate-200 truncate max-w-[120px] sm:max-w-[150px] inline-block align-bottom" title="{{ $profile->email }}">{{ $profile->email ?? 'N/A' }}</span>
            </div>
        </div>

    </div>

    <!-- BIO & BUTTONS -->
    <section class="text-center max-w-2xl mx-auto mb-20">
        <h2 class="text-2xl font-bold mb-4 text-slate-800 dark:text-slate-100">Hi! I'm {{ explode(' ', trim($profile->name ?? 'Hùng Anh'))[array_key_last(explode(' ', trim($profile->name ?? 'Hùng Anh')))] }}</h2>
        <p class="text-slate-600 dark:text-slate-400 leading-relaxed mb-8">
            {{ $profile->about_text ?? "Mình là một sinh viên chuyên ngành Hệ thống Thông tin với đam mê sâu sắc về phát triển phần mềm và phân tích nghiệp vụ. Mình luôn nỗ lực học hỏi để tạo ra những sản phẩm web có hiệu suất cao, giao diện tối ưu và mang lại giá trị thực tế cho doanh nghiệp." }}
        </p>
        <div class="flex justify-center gap-4">
            <a href="#work" class="px-6 py-3 rounded-full bg-cyan-500 hover:bg-cyan-400 text-white dark:text-slate-950 font-semibold transition shadow-lg shadow-cyan-500/20">My Work</a>
            <a href="#contact" class="px-6 py-3 rounded-full bg-white hover:bg-slate-50 dark:bg-slate-800 dark:hover:bg-slate-700 text-slate-800 dark:text-slate-200 font-semibold border border-slate-300 dark:border-slate-700 transition shadow-sm">Hire Me</a>
        </div>
    </section>

    <!-- SERVICES / SKILLS -->
    @if(isset($services) && $services->count() > 0)
    <section id="skills" class="mb-20">
        <h3 class="text-xl font-bold mb-8 text-center bg-gradient-to-r from-slate-600 to-slate-900 dark:from-slate-200 dark:to-slate-400 bg-clip-text text-transparent">
            <i class="fa-solid fa-laptop-code mr-2"></i>MY SERVICES & SKILLS
        </h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($services as $service)
            <div class="bg-white dark:bg-cardBg/40 border border-slate-200 dark:border-slate-800 p-6 rounded-2xl hover:border-cyan-400 dark:hover:border-cyan-500/50 transition duration-300 group shadow-sm dark:shadow-none">
                <div class="w-12 h-12 bg-cyan-100 dark:bg-cyan-500/10 rounded-lg flex items-center justify-center text-cyan-600 dark:text-cyan-400 mb-4 group-hover:scale-110 transition-transform">
                    <i class="{{ $service->icon ?? 'fa-solid fa-code' }} text-xl"></i>
                </div>
                <h4 class="text-lg font-semibold text-slate-800 dark:text-slate-200 mb-2">{{ $service->title }}</h4>
                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed">{{ $service->description }}</p>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    <!-- EXPERIENCE -->
    @if(isset($experiences) && $experiences->count() > 0)
    <section id="work" class="mb-20">
        <h3 class="text-xl font-bold mb-8 text-center bg-gradient-to-r from-slate-600 to-slate-900 dark:from-slate-200 dark:to-slate-400 bg-clip-text text-transparent">
            <i class="fa-solid fa-briefcase mr-2"></i>MY EXPERIENCE
        </h3>
        <div class="space-y-8 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-slate-300 dark:before:via-slate-700 before:to-transparent">
            
            @foreach($experiences as $experience)
            <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                <div class="flex items-center justify-center w-10 h-10 rounded-full border border-slate-300 dark:border-slate-700 bg-white dark:bg-cardBg text-cyan-600 dark:text-cyan-400 shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10">
                    <span class="text-xs font-bold">{{ $experience->year }}</span>
                </div>
                <div class="w-[calc(100%-4rem)] md:w-[calc(50%-2.5rem)] p-4 rounded-xl border border-slate-200 dark:border-slate-800 bg-white/80 dark:bg-cardBg/50 backdrop-blur-sm shadow-sm group-hover:border-cyan-400 dark:group-hover:border-cyan-500/30 transition">
                    <div class="flex items-center justify-between mb-1">
                        <div class="font-bold text-slate-800 dark:text-slate-200">{{ $experience->title }}</div>
                    </div>
                    <div class="text-slate-600 dark:text-slate-400 text-sm">{{ $experience->description }}</div>
                </div>
            </div>
            @endforeach

        </div>
    </section>
    @endif

    <!-- CONTACT / FOOTER -->
    <section id="contact" class="text-center">
        <h3 class="text-xl font-bold mb-6 text-slate-800 dark:text-slate-200">Let's Work Together</h3>
        <p class="text-slate-600 dark:text-slate-400 mb-8 max-w-lg mx-auto">Sẵn sàng để bắt đầu một dự án mới? Đừng ngần ngại liên hệ với mình qua email hoặc số điện thoại bên dưới.</p>
        <a href="mailto:{{ $profile->email ?? 'test@example.com' }}" class="inline-flex items-center justify-center px-8 py-3 bg-white dark:bg-slate-800 border border-slate-300 dark:border-slate-700 hover:border-cyan-500 dark:hover:border-cyan-500 rounded-full text-slate-800 dark:text-slate-200 font-medium transition duration-300 shadow-sm">
            <svg class="w-5 h-5 mr-2 text-cyan-500 dark:text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            {{ $profile->email ?? 'Liên hệ Email' }}
        </a>
    </section>
    
    <footer class="mt-20 pt-8 border-t border-slate-200 dark:border-slate-800 text-center text-slate-500 dark:text-slate-500 text-sm">
        <p>&copy; {{ date('Y') }} {{ $profile->name ?? 'Hùng Anh' }}. All rights reserved.</p>
    </footer>

</div>
@endsection
