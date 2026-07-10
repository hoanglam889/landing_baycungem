<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title') | {{ $setting->site_name }}</title>
  <meta name="description" content="@yield('meta_description', $setting->site_name . ' - Cập nhật tin tức và dịch vụ mới nhất.')" />
  <link rel="icon" href="{{ asset('storage/thumbnailbce.png') }}" type="image/png" />
  <meta property="og:image" content="{{ asset('storage/thumbnailbce.png') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com?plugins=typography"></script>
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
      animation: contact-pulse-amber 2.2s infinite; /* slightly offset duration for natural flow */
    }
  </style>
</head>
<body class="font-sans bg-black text-white leading-relaxed flex flex-col min-h-screen">
  <!-- Navbar -->
  @include('partials.navbar')

  <!-- Main Content -->
  <main class="flex-grow">
    @yield('content')
  </main>

  <!-- Footer -->
  @include('partials.footer')

  <!-- Floating Contact Buttons -->
  @include('partials.floating-buttons')

  <script>
    // Mobile menu toggle (matching ID from navbar partial)
    const menuBtn = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    if (menuBtn && mobileMenu) {
      menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
      });
    }
  </script>
</body>
</html>
