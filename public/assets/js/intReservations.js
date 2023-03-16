/* GET DATA AND SET COOKIE */
let data = document.getElementsByClassName('list__btn');
for(let i = 0 ; i < data.length ; i++ ){
  data[i].addEventListener('click', () => {
    let parent = data[i].parentElement;
    let childText = parent.children[0].innerHTML;
    document.cookie = 'suppr='+childText+'; path=/';
    location.reload();
  })
}
