// Simple interactivity for dashboard
// Toggle sidebar visibility on small screens (if implemented later)
const sidebar = document.getElementById('sidebar');
const sidebarToggle = document.getElementById('sidebar-toggle');

if (sidebarToggle && sidebar) {
  sidebarToggle.addEventListener('click', () => {
    sidebar.classList.toggle('hidden');
  });
}

// Placeholder: stash quick functions to animate counters (if needed)
function animateCounter(el, from, to, duration = 1000) {
  const start = performance.now();
  function tick(now) {
    const t = Math.min((now - start) / duration, 1);
    el.textContent = Math.round(from + (to - from) * t).toLocaleString();
    if (t < 1) requestAnimationFrame(tick);
  }
  requestAnimationFrame(tick);
}

// Example usage (commented):
// const el = document.querySelector('.some-counter');
// if (el) animateCounter(el, 0, 24000, 1200);
