@php
    $navServices = \App\Models\Service::orderBy('order')->get();
@endphp
<header class="sticky top-0 z-50 bg-black/70 backdrop-blur-xl border-b border-white/5">
  <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
    <a href="{{ request()->is('/') ? '#home' : url('/#home') }}" class="flex items-center shrink-0">
      <img src="{{ asset('storage/logobce.png') }}" alt="{{ $setting->site_name }}" class="h-10 w-auto object-contain drop-shadow-[0_2px_4px_rgba(0,0,0,0.8)] scale-[3] origin-left transition-transform duration-300 hover:scale-[3.1]" />
    </a>
    <nav class="hidden items-center gap-8 md:flex">
      <a href="{{ request()->is('/') ? '#home' : url('/#home') }}" class="text-white transition-all duration-300 hover:text-amber-400">Trang chủ</a>
      <a href="{{ request()->is('/') ? '#about' : url('/#about') }}" class="text-white transition-all duration-300 hover:text-amber-400">Giới thiệu</a>
      <a href="{{ request()->is('/') ? '#news' : url('/#news') }}" class="text-white transition-all duration-300 hover:text-amber-400">Bài viết</a>
      <div class="group relative">
        <button class="flex items-center gap-2 text-white transition-all duration-300 hover:text-amber-400">
          Dịch vụ
          <span class="text-amber-400">▾</span>
        </button>
        <div class="invisible absolute right-0 mt-3 w-48 rounded-2xl border border-white/10 bg-slate-950 p-3 opacity-0 transition-all duration-300 group-hover:visible group-hover:opacity-100">
          @foreach($navServices as $service)
            <a href="{{ url('/dich-vu/' . $service->id) }}" class="block rounded-xl px-3 py-2 text-white transition-all duration-300 hover:bg-amber-500/10 hover:text-amber-300">{{ $service->title }}</a>
          @endforeach
        </div>
      </div>
      @auth
        <a href="{{ url('/dashboard') }}" class="inline-flex items-center justify-center rounded-full bg-amber-400 px-5 py-2 text-sm font-semibold text-black transition-all duration-300 hover:scale-[1.02]">
          Dashboard
        </a>
      @else
        <a href="{{ route('login') }}" class="text-white transition-all duration-300 hover:text-amber-400 text-sm font-semibold">
          Đăng nhập
        </a>
      @endauth
    </nav>

    <button id="mobile-menu-button" class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-white/10 bg-white/5 text-white transition-all duration-300 md:hidden">
      <span class="sr-only">Mở menu</span>
      <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
      </svg>
    </button>
  </div>
  <div id="mobile-menu" class="hidden border-t border-white/10 bg-slate-950/95 px-6 py-4 md:hidden">
    <a href="{{ request()->is('/') ? '#home' : url('/#home') }}" class="block py-3 text-white transition-all duration-300 hover:text-amber-400">Trang chủ</a>
    <a href="{{ request()->is('/') ? '#about' : url('/#about') }}" class="block py-3 text-white transition-all duration-300 hover:text-amber-400">Giới thiệu</a>
    <a href="{{ request()->is('/') ? '#news' : url('/#news') }}" class="block py-3 text-white transition-all duration-300 hover:text-amber-400">Bài viết</a>
    <details class="group rounded-3xl border border-white/10 bg-black/60 p-4 transition-all duration-300">
      <summary class="flex cursor-pointer items-center justify-between text-white">Dịch vụ <span class="text-amber-400">▾</span></summary>
      <div class="mt-3 space-y-2">
        @foreach($navServices as $service)
          <a href="{{ url('/dich-vu/' . $service->id) }}" class="block rounded-2xl bg-white/5 px-4 py-3 text-white transition-all duration-300 hover:bg-amber-500/10">{{ $service->title }}</a>
        @endforeach
      </div>
    </details>
    @auth
      <a href="{{ url('/dashboard') }}" class="block mt-4 rounded-full bg-amber-400 py-3 text-center text-sm font-semibold text-black transition-all duration-300 hover:scale-[1.02]">
        Dashboard
      </a>
    @else
      <a href="{{ route('login') }}" class="block mt-4 rounded-full border border-amber-400 py-3 text-center text-sm font-semibold text-white transition-all duration-300 hover:bg-amber-400/10">
        Đăng nhập
      </a>
    @endauth
  </div>
</header>
