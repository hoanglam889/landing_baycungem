<footer class="bg-black text-slate-300 border-t border-white/10 mt-auto">
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
          <li><a href="{{ url('/#home') }}" class="transition-all duration-300 hover:text-white">Trang chủ</a></li>
          <li><a href="{{ url('/#about') }}" class="transition-all duration-300 hover:text-white">Giới thiệu</a></li>
          @php
              $footerServices = \App\Models\Service::orderBy('order')->get();
          @endphp
          @foreach($footerServices as $service)
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
    <div class="mt-12 border-t border-white/10 pt-6 text-center text-sm text-slate-500">
      {{ $setting->copyright }}<br>
      <span class="mt-2 block">Website được xây dựng và quản lý bởi <a href="https://www.facebook.com/phan.huynh.hoang.lam/" target="_blank" class="hover:text-slate-400 transition-colors">Hoàng Lâm</a></span>
    </div>
  </div>
</footer>
