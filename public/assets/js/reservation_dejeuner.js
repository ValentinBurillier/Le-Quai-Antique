let btn = document.getElementsByClassName('button')[0];
let time = document.getElementById('time');
  time.addEventListener('click', (e) => {
  let hour = e.target.id;
  document.cookie = 'hour='+hour+'; path=/';
  btn.removeAttribute('disabled');
})