setTimeout(() => {
  const box = document.getElementById('box-message');

  // 👇️ removes element from DOM
  box.style.display = 'none';

  // 👇️ hides element (still takes up space on page)
  // box.style.visibility = 'hidden';
}, 1000); // 👈️ time in milliseconds