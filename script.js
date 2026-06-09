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
