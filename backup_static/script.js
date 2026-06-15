// Mobile menu toggle for Baycungem landing page
const mobileMenuButton = document.getElementById('mobile-menu-button');
const mobileMenu = document.getElementById('mobile-menu');

mobileMenuButton?.addEventListener('click', () => {
  if (mobileMenu) {
    mobileMenu.classList.toggle('hidden');
  }
});

// Close mobile menu when clicking outside on small screens
window.addEventListener('click', (event) => {
  if (!mobileMenu || !mobileMenuButton) return;
  const target = event.target;
  if (!mobileMenu.contains(target) && !mobileMenuButton.contains(target) && !mobileMenu.classList.contains('hidden')) {
    mobileMenu.classList.add('hidden');
  }
});

// Custom Video Player controls for TikTok style videos
const videoCards = document.querySelectorAll('.video-card');

videoCards.forEach(card => {
  const video = card.querySelector('video');
  const playOverlay = card.querySelector('.play-overlay');
  const playIcon = card.querySelector('.play-icon');
  const muteBtn = card.querySelector('.mute-btn');
  const muteIcon = card.querySelector('.mute-icon');
  const unmuteIcon = card.querySelector('.unmute-icon');

  if (!video) return;

  // Click card to toggle play/pause
  card.addEventListener('click', (e) => {
    // If click is on mute button, don't trigger play/pause
    if (muteBtn && muteBtn.contains(e.target)) return;

    if (video.paused) {
      // Pause all other videos
      document.querySelectorAll('.tiktok-video').forEach(v => {
        if (v !== video) {
          v.pause();
          const cardParent = v.closest('.video-card');
          if (cardParent) {
            const pOverlay = cardParent.querySelector('.play-overlay');
            const pIcon = cardParent.querySelector('.play-icon');
            if (pOverlay) {
              pOverlay.classList.remove('opacity-0');
              pOverlay.classList.add('opacity-100');
            }
            if (pIcon) pIcon.textContent = '▶';
          }
        }
      });

      // Default to unmuted sound when user clicks to play
      video.muted = false;
      if (muteIcon) muteIcon.classList.add('hidden');
      if (unmuteIcon) unmuteIcon.classList.remove('hidden');

      video.play().then(() => {
        if (playOverlay) {
          playOverlay.classList.remove('opacity-100');
          playOverlay.classList.add('opacity-0');
        }
      }).catch(err => console.log('Play blocked:', err));
    } else {
      video.pause();
      if (playOverlay) {
        playOverlay.classList.remove('opacity-0');
        playOverlay.classList.add('opacity-100');
      }
      if (playIcon) playIcon.textContent = '▶';
    }
  });

  // Toggle Mute
  if (muteBtn) {
    muteBtn.addEventListener('click', (e) => {
      e.stopPropagation(); // Prevent card click
      video.muted = !video.muted;
      if (video.muted) {
        if (muteIcon) muteIcon.classList.remove('hidden');
        if (unmuteIcon) unmuteIcon.classList.add('hidden');
      } else {
        if (muteIcon) muteIcon.classList.add('hidden');
        if (unmuteIcon) unmuteIcon.classList.remove('hidden');
        
        // Make sure it is playing if user unmutes
        if (video.paused) {
          video.play().then(() => {
            if (playOverlay) {
              playOverlay.classList.remove('opacity-100');
              playOverlay.classList.add('opacity-0');
            }
          });
        }
      }
    });
  }
});

