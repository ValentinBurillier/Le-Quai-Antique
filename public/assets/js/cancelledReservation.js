let btn = document.getElementsByClassName('button')[0];
btn.addEventListener('click', () => {
  document.cookie = 'suppr=suppr; path=/';
  location.reload();
})