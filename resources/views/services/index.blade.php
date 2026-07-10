@extends('layouts.detail')

@section('title', 'Tất cả Dịch vụ')
@section('meta_description', 'Khám phá tất cả các gói dịch vụ quay phim, chụp ảnh, Flycam và sự kiện chuyên nghiệp từ chúng tôi.')

@section('content')
  <section class="bg-slate-950 text-white py-20 min-h-screen">
    <div class="mx-auto max-w-7xl px-6 sm:px-8">
      
      <!-- Back Link -->
      <a href="{{ url('/#services') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-amber-400 transition-colors duration-300 hover:text-amber-300 mb-8">
        ← Trở về trang chủ
      </a>

      <!-- Header -->
      <div class="mb-12">
        <span class="text-sm uppercase tracking-[0.35em] text-amber-500">Dịch vụ chuyên nghiệp</span>
        <h1 class="mt-4 text-4xl font-bold sm:text-5xl">Tất cả dịch vụ</h1>
      </div>

      <!-- Services Grid -->
      <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($services as $service)
          <a href="{{ url('/dich-vu/' . $service->id) }}" class="group flex flex-col h-full overflow-hidden rounded-[2rem] border border-white/10 bg-slate-900/50 transition-all duration-300 hover:border-amber-400/50 hover:-translate-y-1 hover:shadow-2xl">
            <div class="relative aspect-[4/3] w-full overflow-hidden bg-slate-900/80 shrink-0">
              <img class="absolute inset-0 h-full w-full object-cover blur-xl opacity-40 scale-125 transition-transform duration-500 group-hover:scale-150 group-hover:opacity-60" src="{{ str_starts_with($service->image_url, 'http') ? $service->image_url : asset('storage/' . $service->image_url) }}" alt="" aria-hidden="true" />
              <img class="relative h-full w-full object-cover" src="{{ str_starts_with($service->image_url, 'http') ? $service->image_url : asset('storage/' . $service->image_url) }}" alt="{{ $service->title }}" />
              @if($service->badge)
                <div class="absolute top-4 right-4 bg-amber-500 text-white px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider shadow-lg">
                  {{ $service->badge }}
                </div>
              @endif
            </div>
            <div class="flex flex-col flex-grow p-6">
              <h3 class="text-xl font-bold text-white group-hover:text-amber-400 transition-colors duration-300 mb-3">{{ $service->title }}</h3>
              <p class="text-sm text-slate-400 leading-relaxed line-clamp-3 mb-6 flex-grow">{{ $service->description }}</p>
              <div class="mt-auto pt-4 border-t border-white/10 flex items-center justify-between">
                <span class="text-amber-500 font-bold text-lg">{{ format_price($service->price) }}</span>
                <span class="text-sm font-semibold text-white group-hover:text-amber-400 transition-colors duration-300 flex items-center gap-2">
                  Chi tiết <span class="transition-transform duration-300 group-hover:translate-x-1">→</span>
                </span>
              </div>
            </div>
          </a>
        @endforeach
      </div>

    </div>
  </section>
@endsection
