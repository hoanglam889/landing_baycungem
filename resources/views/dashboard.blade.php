<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Baycungem Dashboard</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body class="bg-slate-900 text-slate-100">
  <!-- Topbar -->
  <header class="sticky top-0 z-40 flex items-center justify-between border-b border-white/5 bg-black/70 px-4 py-3 backdrop-blur">
    <div class="flex items-center gap-4">
      <button id="sidebar-toggle" class="inline-flex h-10 w-10 items-center justify-center rounded-md border border-white/10 bg-white/5 text-amber-400 transition-all duration-300 md:hidden">
        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
      </button>
      <a href="{{ url('/') }}" class="text-2xl font-bold text-amber-400">Baycungem</a>
      <nav class="hidden md:flex md:items-center md:gap-6">
        <a href="{{ url('/') }}" class="text-sm text-slate-300 hover:text-white">Trang chủ</a>
        <a href="/admin" class="text-sm text-slate-300 hover:text-white font-semibold text-amber-400">Trang Quản Trị (CMS)</a>
      </nav>
    </div>
    <div class="flex items-center gap-4">
      <div class="flex items-center gap-3">
        <div class="hidden items-center gap-3 md:flex">
          <div class="flex items-center gap-3">
            <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=80&q=80" class="h-9 w-9 rounded-full object-cover" alt="avatar">
            <span class="text-sm">{{ Auth::user()->name }}</span>
          </div>
        </div>
        <!-- Logout Form -->
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="rounded-full bg-white/10 hover:bg-white/20 text-xs px-3 py-2 text-slate-200 transition-all">
            Đăng xuất
          </button>
        </form>
      </div>
    </div>
  </header>

  <div class="min-h-[calc(100vh-56px)]">
    <div class="mx-auto grid max-w-7xl grid-cols-1 gap-6 p-4 md:grid-cols-12">
      <!-- Sidebar -->
      <aside id="sidebar" class="col-span-1 md:col-span-3 lg:col-span-2 sticky top-20 z-30 hidden transform-gpu flex-col gap-4 rounded-2xl border border-white/5 bg-slate-950/60 p-4 md:flex">
        <div class="mb-2 flex items-center justify-between">
          <h4 class="text-sm font-semibold text-amber-400">Menu Dashboard</h4>
        </div>
        <ul class="space-y-2 text-sm">
          <li><a href="#overview" class="block rounded-lg px-3 py-2 text-slate-200 hover:bg-amber-500/10 hover:text-amber-300">Tổng quan</a></li>
          <li><a href="#products" class="block rounded-lg px-3 py-2 text-slate-200 hover:bg-amber-500/10 hover:text-amber-300">Sản phẩm</a></li>
          <li><a href="#videos" class="block rounded-lg px-3 py-2 text-slate-200 hover:bg-amber-500/10 hover:text-amber-300">Videos</a></li>
          <li><a href="#tiktok" class="block rounded-lg px-3 py-2 text-slate-200 hover:bg-amber-500/10 hover:text-amber-300">Tiktok</a></li>
          <li><a href="#news" class="block rounded-lg px-3 py-2 text-slate-200 hover:bg-amber-500/10 hover:text-amber-300">Tin tức</a></li>
          <li><a href="/admin" class="block rounded-lg px-3 py-2 text-amber-400 hover:bg-amber-500/10 font-bold">Admin CMS →</a></li>
        </ul>
      </aside>

      <!-- Main content -->
      <main class="col-span-1 md:col-span-9 lg:col-span-10">
        <!-- Overview -->
        <section id="overview" class="mb-6 rounded-2xl bg-gradient-to-br from-slate-900/60 to-slate-800/40 p-6 shadow-lg">
          <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
              <h2 class="text-xl font-bold">Tổng quan</h2>
              <p class="mt-1 text-sm text-slate-400">Thống kê nhanh về lượt xem, doanh thu và video mới nhất.</p>
            </div>
            <div class="flex items-center gap-3">
              <a href="/admin" class="rounded-full bg-amber-400 px-4 py-2 font-semibold text-black text-sm">Đến CMS Quản trị</a>
            </div>
          </div>

          <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <div class="rounded-xl bg-white/3 p-4">
              <p class="text-sm text-slate-300">Lượt xem (7d)</p>
              <h3 class="mt-2 text-2xl font-bold">24.8k</h3>
              <p class="mt-1 text-sm text-slate-400">Tăng 12% so với tuần trước</p>
            </div>
            <div class="rounded-xl bg-white/3 p-4">
              <p class="text-sm text-slate-300">Doanh thu</p>
              <h3 class="mt-2 text-2xl font-bold">₫152.4M</h3>
              <p class="mt-1 text-sm text-slate-400">Dự kiến tháng này</p>
            </div>
            <div class="rounded-xl bg-white/3 p-4">
              <p class="text-sm text-slate-300">Đơn hàng</p>
              <h3 class="mt-2 text-2xl font-bold">128</h3>
              <p class="mt-1 text-sm text-slate-400">Đang xử lý 12 đơn</p>
            </div>
            <div class="rounded-xl bg-white/3 p-4">
              <p class="text-sm text-slate-300">Video mới</p>
              <h3 class="mt-2 text-2xl font-bold">8</h3>
              <p class="mt-1 text-sm text-slate-400">Đăng trong 30 ngày</p>
            </div>
          </div>
        </section>

        <!-- Products management -->
        <section id="products" class="mb-6 rounded-2xl bg-white p-6 text-slate-900 shadow-lg">
          <div class="flex items-center justify-between">
            <h3 class="text-lg font-semibold">Sản phẩm nổi bật</h3>
            <a href="/admin/services" class="rounded-md bg-amber-400 px-4 py-2 font-semibold text-black text-sm">Quản lý</a>
          </div>

          <div class="mt-6 overflow-x-auto">
            <table class="w-full table-auto">
              <thead>
                <tr class="text-left text-sm text-slate-600">
                  <th class="py-3">Ảnh</th>
                  <th class="py-3">Tên</th>
                  <th class="py-3">Giá</th>
                  <th class="py-3">Trạng thái</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-200/10">
                <tr class="align-top">
                  <td class="py-4 w-28"><img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=120&q=80" class="h-20 w-32 rounded-lg object-cover" alt="thumb"></td>
                  <td class="py-4 font-semibold text-slate-800">VR Panorama 360°</td>
                  <td class="py-4">₫8,500,000</td>
                  <td class="py-4"><span class="rounded-full bg-amber-100 px-3 py-1 text-xs font-semibold text-amber-700">Hot</span></td>
                </tr>
                <tr>
                  <td class="py-4 w-28"><img src="https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=120&q=80" class="h-20 w-32 rounded-lg object-cover" alt="thumb"></td>
                  <td class="py-4 font-semibold text-slate-800">Video Flycam Sự kiện</td>
                  <td class="py-4">₫5,000,000</td>
                  <td class="py-4"><span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700">Bình thường</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </section>

        <!-- Videos -->
        <section id="videos" class="mb-6 rounded-2xl bg-white p-6 text-slate-900 shadow-lg">
          <h3 class="text-lg font-semibold">Video nhúng</h3>
          <div class="mt-4 grid gap-4 md:grid-cols-2">
            <div class="rounded-xl overflow-hidden bg-black shadow">
              <div class="aspect-video">
                <iframe class="w-full h-full" src="https://www.youtube.com/embed/9aiZ-FieyvY" title="Video" allowfullscreen></iframe>
              </div>
            </div>
            <div class="rounded-xl overflow-hidden bg-black shadow p-4 text-white">
              <h4 class="text-md font-semibold text-amber-400">Video giới thiệu</h4>
              <p class="mt-2 text-sm text-slate-400">Showcase chính được hiển thị trên trang chủ của Baycungem.</p>
              <div class="mt-4">
                <a href="/admin/video-showcases" class="rounded-full bg-amber-400 px-4 py-2 font-semibold text-black text-sm inline-block">Sửa Video</a>
              </div>
            </div>
          </div>
        </section>

        <!-- TikTok grid -->
        <section id="tiktok" class="mb-6 rounded-2xl bg-slate-900/60 p-6 shadow-lg">
          <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold text-white">Tiktok</h3>
            <a href="/admin/tik-tok-videos" class="rounded-md bg-amber-400 px-4 py-2 font-semibold text-black text-sm">Quản lý</a>
          </div>
          <div class="grid gap-4 sm:grid-cols-3">
            <div class="relative overflow-hidden rounded-xl border border-white/5 bg-slate-800 p-3">
              <video class="h-48 w-full rounded-md object-cover" muted src="{{ asset('videos/video1.mp4') }}"></video>
              <div class="absolute inset-0 bg-black/30 flex items-center justify-center">▶</div>
            </div>
            <div class="relative overflow-hidden rounded-xl border border-white/5 bg-slate-800 p-3">
              <video class="h-48 w-full rounded-md object-cover" muted src="{{ asset('videos/video2.mp4') }}"></video>
              <div class="absolute inset-0 bg-black/30 flex items-center justify-center">▶</div>
            </div>
            <div class="relative overflow-hidden rounded-xl border border-white/5 bg-slate-800 p-3">
              <video class="h-48 w-full rounded-md object-cover" muted src="{{ asset('videos/video3.mp4') }}"></video>
              <div class="absolute inset-0 bg-black/30 flex items-center justify-center">▶</div>
            </div>
          </div>
        </section>

        <!-- News management -->
        <section id="news" class="mb-6 rounded-2xl bg-white p-6 text-slate-900 shadow-lg">
          <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Tin tức & Sự kiện</h3>
            <a href="/admin/news" class="rounded-md bg-amber-400 px-4 py-2 font-semibold text-black text-sm">Quản lý</a>
          </div>
          <div class="grid gap-4 md:grid-cols-3">
            <article class="rounded-lg border border-slate-200 p-4">
              <img src="https://images.unsplash.com/photo-1461749280684-dccba630e2f6?auto=format&fit=crop&w=800&q=80" class="h-36 w-full rounded-md object-cover" alt="">
              <h4 class="mt-3 font-semibold text-slate-800">Baycungem mở rộng dịch vụ</h4>
              <p class="mt-2 text-sm text-slate-500">Khai trương chi nhánh mới tại Đà Nẵng...</p>
            </article>
            <article class="rounded-lg border border-slate-200 p-4">
              <img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=800&q=80" class="h-36 w-full rounded-md object-cover" alt="">
              <h4 class="mt-3 font-semibold text-slate-800">Gói VR Panorama cao cấp</h4>
              <p class="mt-2 text-sm text-slate-500">Giải pháp hình ảnh VR Tour 360 độ...</p>
            </article>
            <article class="rounded-lg border border-slate-200 p-4">
              <img src="https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=800&q=80" class="h-36 w-full rounded-md object-cover" alt="">
              <h4 class="mt-3 font-semibold text-slate-800">Mẹo quay Flycam sự kiện</h4>
              <p class="mt-2 text-sm text-slate-500">Các lưu ý quan trọng khi setup ngoài trời...</p>
            </article>
          </div>
        </section>
      </main>
    </div>
  </div>

  <script>
    document.getElementById('sidebar-toggle')?.addEventListener('click', () => {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('hidden');
      sidebar.classList.toggle('flex');
    });
  </script>
</body>
</html>
