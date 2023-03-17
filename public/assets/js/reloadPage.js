/* GET DATA AND SET COOKIE */
let btn = document.getElementsByClassName('btn__review');
for(let i = 0 ; i < btn.length ; i++ ){
    btn[i].addEventListener('click', (e) => {
      let item = e.target;
      let parent = item.parentElement;
      let child = parent.children[0].id;
      document.cookie = 'suppr='+child+'; path=/';
      location.reload();
    })
  }
