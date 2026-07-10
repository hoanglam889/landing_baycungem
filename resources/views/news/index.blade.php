@extends('layouts.detail')

@section('title', 'Tất cả bài viết')

@section('content')
  <section class="bg-slate-950 text-white py-20 min-h-screen">
    <div class="mx-auto max-w-7xl px-6 sm:px-8">
      
      <!-- Back Link -->
      <a href="{{ url('/#news') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-amber-400 transition-colors duration-300 hover:text-amber-300 mb-8">
        ← Trở về trang chủ
      </a>

      <!-- Header -->
      <div class="mb-12">
        <span class="text-sm uppercase tracking-[0.35em] text-amber-500">Baycungem</span>
        <h1 class="mt-4 text-4xl font-bold sm:text-5xl">Tất cả bài viết</h1>
      </div>

      <!-- News Grid -->
      <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($newsList as $news)
          <a href="{{ url('/tin-tuc/' . $news->slug) }}" class="group flex flex-col h-full overflow-hidden rounded-[2rem] border border-white/10 bg-slate-900/50 transition-all duration-300 hover:border-amber-400/50 hover:-translate-y-1 hover:shadow-2xl">
            <div class="relative aspect-video w-full overflow-hidden bg-slate-900/80 shrink-0">
              <img class="absolute inset-0 h-full w-full object-cover blur-xl opacity-40 scale-125 transition-transform duration-500 group-hover:scale-150 group-hover:opacity-60" src="{{ str_starts_with($news->image_url, 'http') ? $news->image_url : asset('storage/' . $news->image_url) }}" alt="" aria-hidden="true" />
              <img class="relative h-full w-full object-contain drop-shadow-lg" src="{{ str_starts_with($news->image_url, 'http') ? $news->image_url : asset('storage/' . $news->image_url) }}" alt="{{ $news->title }}" />
            </div>
            <div class="flex flex-col flex-grow p-6">
              <p class="text-xs uppercase tracking-widest text-amber-500 mb-3">{{ $news->published_date->translatedFormat('d/m/Y') }}</p>
              <h3 class="text-xl font-bold text-white group-hover:text-amber-400 transition-colors duration-300 mb-3">{{ $news->title }}</h3>
              <p class="text-sm text-slate-400 leading-relaxed line-clamp-3 mb-6 flex-grow">{{ $news->summary }}</p>
              <div class="mt-auto text-sm font-semibold text-amber-500 group-hover:text-amber-400 flex items-center gap-2">
                Đọc thêm <span class="transition-transform duration-300 group-hover:translate-x-1">→</span>
              </div>
            </div>
          </a>
        @endforeach
      </div>

      <!-- Pagination -->
      @if($newsList->hasPages())
        <div class="mt-16 flex justify-center">
          {{ $newsList->links('pagination::tailwind') }}
        </div>
      @endif

    </div>
  </section>
@endsection
