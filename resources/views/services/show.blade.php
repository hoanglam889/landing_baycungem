@extends('layouts.detail')

@section('title', $service->title)
@section('meta_description', $service->description)

@section('content')
  <!-- Banner Section -->
  <section class="relative h-[40vh] bg-cover bg-center" style="background-image: url('{{ str_starts_with($service->image_url, 'http') ? $service->image_url : asset('storage/' . $service->image_url) }}');">
    <div class="absolute inset-0 bg-black/70"></div>
    <div class="relative mx-auto flex h-full max-w-7xl flex-col justify-center px-6 text-white sm:px-8">
      @if($service->badge)
        <span class="mb-4 inline-self-start rounded-full bg-amber-400 px-3 py-1 text-xs font-semibold uppercase tracking-wider text-black w-fit">
          {{ $service->badge }}
        </span>
      @endif
      <h1 class="text-3xl font-bold leading-tight sm:text-4xl md:text-5xl max-w-3xl">{{ $service->title }}</h1>
    </div>
  </section>

  <!-- Content Section -->
  <section class="bg-slate-950 text-white py-16">
    <div class="mx-auto max-w-7xl px-6 sm:px-8">
      <div class="grid gap-12 lg:grid-cols-3">
        <!-- Main Service Details -->
        <div class="lg:col-span-2 space-y-8">
          <div class="prose prose-invert max-w-none">
            <h2 class="text-2xl font-bold text-amber-400 border-b border-white/10 pb-4 mb-6">Mô tả dịch vụ</h2>
            <div class="text-slate-300 text-lg leading-relaxed whitespace-pre-line">{!! $service->content !!}</div>
          </div>

          <!-- Why Choose Us / Process Details -->
          <div class="rounded-3xl border border-white/10 bg-white/5 p-8">
            <h3 class="text-xl font-semibold text-white mb-6">Cam kết chất lượng từ Baycungem</h3>
            <ul class="space-y-4 text-slate-300">
              <li class="flex items-start gap-3">
                <span class="inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-amber-500/10 text-amber-400 text-sm">✓</span>
                <p>Thiết bị bay chụp chuyên nghiệp (4K/6K), camera chống rung hoàn hảo.</p>
              </li>
              <li class="flex items-start gap-3">
                <span class="inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-amber-500/10 text-amber-400 text-sm">✓</span>
                <p>Hỗ trợ xin cấp phép bay chuyên nghiệp theo đúng quy định.</p>
              </li>
              <li class="flex items-start gap-3">
                <span class="inline-flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-amber-500/10 text-amber-400 text-sm">✓</span>
                <p>Hậu kỳ chỉnh sửa hình ảnh, dựng phim nhanh chóng và chu đáo.</p>
              </li>
            </ul>
          </div>
        </div>

        <!-- Sidebar (Price & CTAs & Other Services) -->
        <div class="space-y-8">
          <!-- Pricing and Contact Card -->
          <div class="rounded-3xl border border-amber-400/20 bg-gradient-to-br from-slate-900 to-black p-8 shadow-xl">
            <span class="text-sm text-slate-400">Giá hiển thị:</span>
            <div class="mt-2 text-3xl font-extrabold text-amber-400 mb-6">{{ format_price($service->price) }}</div>
            
            <div class="space-y-4">
              <!-- Zalo CTA -->
              <a href="{{ $setting->zalo_url ?? 'https://zalo.me/' . preg_replace('/[^0-9]/', '', $setting->phone) }}" target="_blank" class="flex items-center justify-center gap-3 rounded-full bg-blue-600 px-6 py-4 text-center font-bold text-white transition-all duration-300 hover:bg-blue-700 hover:scale-[1.02] shadow-lg">
                Tư vấn qua Zalo
              </a>
              <!-- Hotline CTA -->
              <a href="tel:{{ preg_replace('/[^0-9]/', '', $setting->phone) }}" class="flex items-center justify-center gap-3 rounded-full bg-amber-400 px-6 py-4 text-center font-bold text-black transition-all duration-300 hover:bg-amber-300 hover:scale-[1.02] shadow-lg">
                Gọi Hotline: {{ $setting->phone }}
              </a>
            </div>
            <p class="mt-4 text-center text-xs text-slate-500">
              Liên hệ ngay để nhận báo giá chi tiết theo yêu cầu dự án.
            </p>
          </div>

          <!-- Other Services List -->
          <div class="rounded-3xl border border-white/10 bg-slate-900/50 p-8">
            <h3 class="text-xl font-bold text-white mb-6 border-b border-white/5 pb-3">Dịch vụ liên quan</h3>
            <div class="space-y-4">
              @foreach($otherServices as $other)
                <a href="{{ url('/dich-vu/' . $other->id) }}" class="group block rounded-2xl border border-white/5 bg-black/40 p-4 transition-all duration-300 hover:border-amber-400/40 hover:bg-black">
                  <h4 class="font-semibold text-white group-hover:text-amber-400 transition-colors duration-300">{{ $other->title }}</h4>
                  <p class="mt-1 text-xs text-slate-400 line-clamp-2">{{ $other->description }}</p>
                </a>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
