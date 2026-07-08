@extends('layouts.detail')

@section('title', $news->title)

@section('content')
  <section class="bg-slate-950 text-white py-16">
    <div class="mx-auto max-w-4xl px-6 sm:px-8">
      
      <!-- Back Link -->
      <a href="{{ url('/') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-amber-400 transition-colors duration-300 hover:text-amber-300 mb-8">
        ← Trở về trang chủ
      </a>

      <!-- Article Header -->
      <header class="space-y-4">
        <span class="inline-flex rounded-full bg-amber-400/10 px-3 py-1 text-xs font-semibold uppercase tracking-wider text-amber-300">
          {{ $news->category }}
        </span>
        <h1 class="text-3xl font-extrabold tracking-tight text-white sm:text-4xl md:text-5xl leading-tight">
          {{ $news->title }}
        </h1>
        <p class="text-sm text-slate-400">
          Xuất bản ngày: {{ $news->published_date->translatedFormat('d \T\h\á\n\g m, Y') }}
        </p>
      </header>

      <!-- Featured Image -->
      <div class="mt-8 relative overflow-hidden rounded-[2rem] border border-white/10 bg-slate-950 aspect-video w-full">
        <img class="absolute inset-0 h-full w-full object-cover blur-3xl opacity-40 scale-125" src="{{ str_starts_with($news->image_url, 'http') ? $news->image_url : asset('storage/' . $news->image_url) }}" alt="" aria-hidden="true" />
        <img class="relative h-full w-full object-contain drop-shadow-2xl" src="{{ str_starts_with($news->image_url, 'http') ? $news->image_url : asset('storage/' . $news->image_url) }}" alt="{{ $news->title }}" />
      </div>

      <!-- Article Content -->
      <article class="mt-12 prose prose-invert prose-lg max-w-none border-b border-white/10 pb-12">
        <p class="text-slate-300 text-lg leading-relaxed whitespace-pre-line">
          {{ $news->summary }}
        </p>
      </article>

      <!-- Related Articles -->
      <div class="mt-16">
        <h3 class="text-2xl font-bold text-white mb-8">Bài viết liên quan</h3>
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
          @foreach($otherNews as $other)
            <a href="{{ url('/tin-tuc/' . $other->slug) }}" class="group overflow-hidden rounded-3xl border border-white/5 bg-slate-900/30 transition-all duration-300 hover:border-amber-400/40 hover:-translate-y-1 hover:shadow-xl">
              <div class="relative aspect-video w-full overflow-hidden bg-slate-900/50">
                <img class="absolute inset-0 h-full w-full object-cover blur-xl opacity-40 scale-110 transition-transform duration-500 group-hover:scale-125 group-hover:opacity-60" src="{{ str_starts_with($other->image_url, 'http') ? $other->image_url : asset('storage/' . $other->image_url) }}" alt="" aria-hidden="true" />
                <img class="relative h-full w-full object-contain drop-shadow-md" src="{{ str_starts_with($other->image_url, 'http') ? $other->image_url : asset('storage/' . $other->image_url) }}" alt="{{ $other->title }}" />
              </div>
              <div class="p-5">
                <span class="text-xs uppercase tracking-wider text-amber-400">{{ $other->category }}</span>
                <h4 class="mt-2 font-bold text-white group-hover:text-amber-300 line-clamp-2 transition-colors duration-300">{{ $other->title }}</h4>
              </div>
            </a>
          @endforeach
        </div>
      </div>

    </div>
  </section>
@endsection
