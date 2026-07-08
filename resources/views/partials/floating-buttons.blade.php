<div class="fixed bottom-6 left-6 z-50 flex flex-col gap-4">
  <!-- Phone Button -->
  @if($setting->show_phone_button)
    <a href="tel:{{ preg_replace('/[^0-9]/', '', $setting->phone) }}" class="pulsate-phone-btn flex h-14 w-14 items-center justify-center rounded-full bg-amber-500 text-black shadow-2xl transition-transform duration-300 hover:scale-110" title="Gọi điện tư vấn">
      <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
        <path d="M6.62 10.79a15.15 15.15 0 0 0 6.59 6.59l2.2-2.2c.28-.28.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
      </svg>
    </a>
  @endif
  <!-- Messenger Button -->
  @if($setting->messenger_url)
    <a href="{{ $setting->messenger_url }}" target="_blank" class="pulsate-phone-btn flex h-14 w-14 items-center justify-center rounded-full bg-[#0084FF] text-white shadow-2xl transition-transform duration-300 hover:scale-110" title="Chat qua Messenger">
      <svg viewBox="0 0 36 36" fill="currentColor" class="h-8 w-8">
        <path d="M18 2C9.163 2 2 8.653 2 16.858c0 4.673 2.378 8.847 6.046 11.606v4.757l5.526-3.036c1.433.396 2.923.606 4.428.606 8.837 0 16-6.653 16-14.858C34 8.653 26.837 2 18 2zm1.666 19.983l-4.17-4.453-8.156 4.453 8.966-9.52 4.316 4.453 7.994-4.453-8.95 9.52z"/>
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
