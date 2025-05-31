const form = document.getElementById('contact-form');

form.addEventListener('submit', e => {
  const email = form.email.value.trim();
  if (!email.includes('@')) {
    e.preventDefault();
    alert('Please enter a valid email address.');
  }
});
