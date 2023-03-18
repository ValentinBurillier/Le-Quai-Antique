/* GET DATA AND SET COOKIE */
let btn = document.getElementsByClassName('button')[0];
btn.addEventListener('click', () => {
    let value = document.getElementsByTagName('textarea')[0].value;
    document.cookie = 'review='+value+'; path=/';
    location.reload();
  })
