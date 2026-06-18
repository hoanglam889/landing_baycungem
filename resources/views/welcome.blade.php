<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $setting->site_name }} | Flycam & Video Panorama</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('style.css') }}?v=1.0.2" />
  <style>
    /* Pulse Animation for Floating Buttons matching the web's amber theme */
    @keyframes contact-pulse-amber {
      0% {
        transform: scale(0.95);
        box-shadow: 0 0 0 0 rgba(245, 158, 11, 0.8);
      }
      70% {
        transform: scale(1.03);
        box-shadow: 0 0 0 14px rgba(245, 158, 11, 0);
      }
      100% {
        transform: scale(0.95);
        box-shadow: 0 0 0 0 rgba(245, 158, 11, 0);
      }
    }
    
    .pulsate-phone-btn {
      animation: contact-pulse-amber 2s infinite;
    }

    .pulsate-zalo-btn {
      animation: contact-pulse-amber 2.2s infinite;
    }
  </style>
</head>
<body class="font-sans bg-black text-white leading-relaxed">
  <!-- Navbar -->
  <header class="sticky top-0 z-50 bg-black/70 backdrop-blur-xl">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
      <a href="#home" class="text-2xl font-extrabold tracking-tight text-amber-400">{{ $setting->site_name }}</a>
      <nav class="hidden items-center gap-8 md:flex">
        <a href="#home" class="text-white transition-all duration-300 hover:text-amber-400">Trang chủ</a>
        <a href="#about" class="text-white transition-all duration-300 hover:text-amber-400">Giới thiệu</a>
        <div class="group relative">
          <button class="flex items-center gap-2 text-white transition-all duration-300 hover:text-amber-400">
            Dịch vụ
            <span class="text-amber-400">▾</span>
          </button>
          <div class="invisible absolute right-0 mt-3 w-48 rounded-2xl border border-white/10 bg-slate-950 p-3 opacity-0 transition-all duration-300 group-hover:visible group-hover:opacity-100">
            @foreach($services as $service)
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
      <a href="#home" class="block py-3 text-white transition-all duration-300 hover:text-amber-400">Trang chủ</a>
      <a href="#about" class="block py-3 text-white transition-all duration-300 hover:text-amber-400">Giới thiệu</a>
      <details class="group rounded-3xl border border-white/10 bg-black/60 p-4 transition-all duration-300">
        <summary class="flex cursor-pointer items-center justify-between text-white">Dịch vụ <span class="text-amber-400">▾</span></summary>
        <div class="mt-3 space-y-2">
          @foreach($services as $service)
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

  <!-- Hero Section -->
  <main id="home">
    <section class="relative min-h-[90vh] bg-cover bg-center" style="background-image:url('{{ str_starts_with($hero->background_image_url, 'http') ? $hero->background_image_url : asset('storage/' . $hero->background_image_url) }}');">
      <div class="absolute inset-0 bg-black/60"></div>
      <div class="relative mx-auto flex min-h-[90vh] max-w-7xl flex-col justify-center px-6 py-20 text-center text-white sm:px-8 lg:px-0">
        <span class="mx-auto mb-6 inline-flex rounded-full border border-amber-400/50 bg-white/5 px-4 py-2 text-sm uppercase tracking-[0.3em] text-amber-300">{{ $hero->badge_text }}</span>
        <h1 class="text-4xl font-bold leading-tight text-white sm:text-5xl lg:text-6xl">{{ $hero->title }}</h1>
        <p class="mx-auto mt-6 max-w-2xl text-base text-slate-200 sm:text-lg">{{ $hero->description }}</p>
        <div class="mt-10 flex flex-col items-center justify-center gap-4 sm:flex-row">
          <a href="{{ $hero->primary_button_url }}" class="inline-flex items-center justify-center rounded-full bg-amber-400 px-8 py-4 text-sm font-semibold text-black transition-all duration-300 hover:scale-[1.02]">
            {{ $hero->primary_button_text }}
          </a>
          <a href="{{ $hero->secondary_button_url }}" class="inline-flex items-center justify-center rounded-full border border-amber-400 px-8 py-4 text-sm font-semibold text-white transition-all duration-300 hover:bg-amber-400/10">
            {{ $hero->secondary_button_text }}
          </a>
        </div>
      </div>
    </section>

    <!-- Featured Products -->
    <section class="bg-white py-20 text-slate-900">
      <div class="mx-auto max-w-7xl px-6 sm:px-8">
        <div class="mb-12 text-center">
          <span class="text-sm uppercase tracking-[0.35em] text-amber-500">Sản phẩm nổi bật</span>
          <h2 class="mt-4 text-3xl font-bold sm:text-4xl">Dịch vụ Baycungem được ưa chuộng</h2>
          <p class="mx-auto mt-3 max-w-2xl text-base text-slate-600">Thiết kế gói dịch vụ chuyên nghiệp cho mọi nhu cầu marketing, sự kiện và truyền thông số.</p>
        </div>
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
          @foreach($services as $service)
            <article class="group overflow-hidden rounded-3xl border border-slate-200 bg-slate-50 p-6 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl">
              <img class="h-56 w-full rounded-3xl object-cover" src="{{ str_starts_with($service->image_url, 'http') ? $service->image_url : asset('storage/' . $service->image_url) }}" alt="{{ $service->title }}" />
              @if($service->badge)
                <span class="mt-5 inline-flex rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold uppercase tracking-[0.3em] text-amber-600">{{ $service->badge }}</span>
              @endif
              <h3 class="mt-4 text-xl font-semibold">{{ $service->title }}</h3>
              <p class="mt-3 text-sm text-slate-600">{{ $service->description }}</p>
              <div class="mt-6 flex items-center justify-between border-t border-slate-200 pt-4">
                <span class="text-amber-600 font-bold text-base">{{ format_price($service->price) }}</span>
                <a href="{{ url('/dich-vu/' . $service->id) }}" class="inline-flex items-center gap-2 text-sm font-semibold text-amber-500 transition-all duration-300 hover:text-amber-700">
                  Xem chi tiết →
                </a>
              </div>
            </article>
          @endforeach
        </div>
      </div>
    </section>

    <!-- About Us -->
    <section id="about" class="bg-slate-950 py-20 text-white">
      <div class="mx-auto grid max-w-7xl gap-12 px-6 sm:px-8 lg:grid-cols-2 lg:items-center">
        <div class="overflow-hidden rounded-[2rem] bg-[radial-gradient(circle_at_top_left,_rgba(245,158,11,0.18),_transparent_50%)] p-1">
          <img class="h-full w-full rounded-[1.75rem] object-cover" src="{{ str_starts_with($about->image_url, 'http') ? $about->image_url : asset('storage/' . $about->image_url) }}" alt="Đội ngũ Baycungem" />
        </div>
        <div>
          <span class="text-sm uppercase tracking-[0.35em] text-amber-400">{{ $about->badge }}</span>
          <h2 class="mt-4 text-4xl font-bold leading-tight">{{ $about->title }}</h2>
          <p class="mt-6 max-w-xl text-slate-300">{{ $about->description }}</p>
          <ul class="mt-8 space-y-4 text-slate-300">
            @if(is_array($about->features))
              @foreach($about->features as $feature)
                <li class="flex items-start gap-3">
                  <span class="mt-1 inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-amber-500/15 text-amber-400">✓</span>
                  <p>{{ $feature }}</p>
                </li>
              @endforeach
            @endif
          </ul>
        </div>
      </div>
    </section>

    <!-- Video Section -->
    <section class="bg-white py-20 text-slate-900">
      <div class="mx-auto max-w-7xl px-6 sm:px-8 text-center">
        <span class="text-sm uppercase tracking-[0.35em] text-amber-500">{{ $videoShowcase->badge }}</span>
        <h2 class="mt-4 text-3xl font-bold sm:text-4xl">{{ $videoShowcase->title }}</h2>
        <p class="mx-auto mt-4 max-w-2xl text-base text-slate-600">{{ $videoShowcase->description }}</p>
        <div class="mx-auto mt-12 max-w-5xl overflow-hidden rounded-[2rem] bg-black shadow-2xl shadow-slate-900/20">
          <div class="aspect-video bg-slate-900">
            <iframe class="h-full w-full rounded-[2rem] bg-black" src="{{ $videoShowcase->youtube_embed_url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </section>

    <!-- TikTok Section -->
    <section class="bg-slate-950 py-20 text-white">
      <div class="mx-auto max-w-7xl px-6 sm:px-8 text-center">
        <span class="text-sm uppercase tracking-[0.35em] text-amber-400">Baycungem trên Tiktok</span>
        <h2 class="mt-4 text-3xl font-bold sm:text-4xl">Chạm tim người xem qua video dọc</h2>
        <p class="mx-auto mt-4 max-w-2xl text-slate-400">Dàn video ngắn hàng đầu được thiết kế để lan truyền và ghi dấu ấn thương hiệu.</p>
        
        <div class="mt-12 grid gap-8 sm:grid-cols-1 md:grid-cols-3 justify-center items-start max-w-6xl mx-auto">
          @foreach($tiktokVideos as $video)
            <!-- Video -->
            <div class="video-card mx-auto w-full max-w-[340px] overflow-hidden rounded-[2.5rem] border border-white/10 bg-slate-900/40 p-2 transition-all duration-300 hover:border-amber-400/60 hover:-translate-y-1 shadow-2xl relative group cursor-pointer" data-tiktok-url="{{ $video->tiktok_url }}">
              <div class="relative aspect-[9/16] w-full overflow-hidden rounded-[2rem] bg-black">
                <video class="tiktok-video h-full w-full object-cover" loop muted playsinline webkit-playsinline="true" preload="metadata" src="{{ asset($video->local_video_path) }}"></video>
                <!-- Play overlay -->
                <div class="play-overlay absolute inset-0 flex items-center justify-center bg-black/30 opacity-100 transition-opacity duration-300 pointer-events-none">
                  <span class="play-icon text-white text-3xl bg-black/60 rounded-full w-14 h-14 flex items-center justify-center border border-white/20 shadow-lg transition-transform duration-300 group-hover:scale-110">▶</span>
                </div>
                <!-- Mute button -->
                <button class="mute-btn absolute top-4 right-4 z-10 bg-black/60 hover:bg-black/80 text-white rounded-full p-2 border border-white/10 transition-all duration-300 shadow-md">
                  <!-- Mute icon -->
                  <svg class="w-5 h-5 mute-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2"></path>
                  </svg>
                  <!-- Unmute icon -->
                  <svg class="w-5 h-5 unmute-icon hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z"></path>
                  </svg>
                </button>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </section>

    <!-- News Section -->
    <section class="bg-white py-20 text-slate-900">
      <div class="mx-auto max-w-7xl px-6 sm:px-8">
        <div class="mb-12 text-center">
          <span class="text-sm uppercase tracking-[0.35em] text-amber-500">Tin tức & Sự kiện</span>
          <h2 class="mt-4 text-3xl font-bold sm:text-4xl">Cập nhật mới nhất từ Baycungem</h2>
        </div>
        <div class="grid gap-6 lg:grid-cols-3">
          @foreach($newsList as $news)
            <article class="overflow-hidden rounded-[2rem] border border-slate-200 bg-slate-50 transition-all duration-300 hover:-translate-y-1 hover:shadow-2xl">
              <img class="h-56 w-full object-cover" src="{{ str_starts_with($news->image_url, 'http') ? $news->image_url : asset('storage/' . $news->image_url) }}" alt="{{ $news->title }}" />
              <div class="p-6">
                <p class="text-sm uppercase tracking-[0.3em] text-amber-500">{{ $news->published_date->translatedFormat('d \T\h\á\n\g m, Y') }}</p>
                <h3 class="mt-4 text-xl font-semibold">{{ $news->title }}</h3>
                <p class="mt-3 text-sm text-slate-600 leading-relaxed">{{ $news->summary }}</p>
                <a href="{{ url('/tin-tuc/' . $news->id) }}" class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-amber-600 transition-all duration-300 hover:text-amber-700">Đọc thêm →</a>
              </div>
            </article>
          @endforeach
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black text-slate-300">
      <div class="mx-auto max-w-7xl px-6 py-16 sm:px-8">
        <div class="grid gap-12 lg:grid-cols-3">
          <div>
            <h3 class="text-xl font-semibold text-white">Liên hệ</h3>
            <p class="mt-5 text-slate-400">Địa chỉ: {{ $setting->address }}</p>
            <p class="mt-3 text-slate-400">SĐT: <a href="tel:{{ $setting->phone }}" class="text-amber-400 hover:text-amber-300">{{ $setting->phone }}</a></p>
            <p class="mt-3 text-slate-400">Email: <a href="mailto:{{ $setting->email }}" class="text-amber-400 hover:text-amber-300">{{ $setting->email }}</a></p>
          </div>
          <div>
            <h3 class="text-xl font-semibold text-white">Links nhanh</h3>
            <ul class="mt-5 space-y-3 text-slate-400">
              <li><a href="#home" class="transition-all duration-300 hover:text-white">Trang chủ</a></li>
              <li><a href="#about" class="transition-all duration-300 hover:text-white">Giới thiệu</a></li>
              @foreach($services as $service)
                <li><a href="{{ url('/dich-vu/' . $service->id) }}" class="transition-all duration-300 hover:text-white">{{ $service->title }}</a></li>
              @endforeach
            </ul>
          </div>
          <div>
            <h3 class="text-xl font-semibold text-white">Mạng xã hội</h3>
            <div class="mt-5 flex items-center gap-4">
              <a href="{{ $setting->facebook_url }}" class="inline-flex h-12 w-12 items-center justify-center rounded-full border border-white/10 bg-white/5 text-amber-400 transition-all duration-300 hover:border-amber-400 hover:bg-amber-500/10">F</a>
              <a href="{{ $setting->instagram_url }}" class="inline-flex h-12 w-12 items-center justify-center rounded-full border border-white/10 bg-white/5 text-amber-400 transition-all duration-300 hover:border-amber-400 hover:bg-amber-500/10">I</a>
              <a href="{{ $setting->youtube_url }}" class="inline-flex h-12 w-12 items-center justify-center rounded-full border border-white/10 bg-white/5 text-amber-400 transition-all duration-300 hover:border-amber-400 hover:bg-amber-500/10">Y</a>
              <a href="{{ $setting->tiktok_url }}" class="inline-flex h-12 w-12 items-center justify-center rounded-full border border-white/10 bg-white/5 text-amber-400 transition-all duration-300 hover:border-amber-400 hover:bg-amber-500/10">T</a>
            </div>
          </div>
        </div>
        <div class="mt-12 border-t border-white/10 pt-6 text-center text-sm text-slate-500">{{ $setting->copyright }}</div>
      </div>
    </footer>
  </main>

  <!-- Floating Contact Buttons (Phone & Zalo) -->
  <div class="fixed bottom-6 left-6 z-50 flex flex-col gap-4">
    <!-- Phone Button -->
    @if($setting->show_phone_button)
      <a href="tel:{{ preg_replace('/[^0-9]/', '', $setting->phone) }}" class="pulsate-phone-btn flex h-14 w-14 items-center justify-center rounded-full bg-amber-500 text-black shadow-2xl transition-transform duration-300 hover:scale-110" title="Gọi điện tư vấn">
        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
          <path d="M6.62 10.79a15.15 15.15 0 0 0 6.59 6.59l2.2-2.2c.28-.28.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
        </svg>
      </a>
    @endif
    <!-- Zalo Button -->
    @if($setting->show_zalo_button)
      <a href="{{ $setting->zalo_url ?? 'https://zalo.me/' . preg_replace('/[^0-9]/', '', $setting->phone) }}" target="_blank" class="pulsate-zalo-btn flex h-14 w-14 items-center justify-center rounded-full bg-blue-600 text-white shadow-2xl transition-transform duration-300 hover:scale-110" title="Chat qua Zalo">
        <span class="text-xs font-black tracking-tight select-none">ZALO</span>
      </a>
    @endif
  </div>

  <script src="{{ asset('script.js') }}?v=1.0.1"></script>
</body>
</html>
