// BTN CONTINUE DISPLAY NONE IF NO COOKIE
let btn = document.getElementsByClassName('button')[0];

// GET DATES LIST OF THE MONTH
let datesList = document.getElementById('datesList');

// GET MONTH
let month = document.getElementsByClassName('title2__month')[0].id;

// EVENT ON CLICK ON THE DATE 
datesList.addEventListener('click', (e) => {
  let initElem = e.target;
  let date = initElem.innerHTML;
  if(date > 0) {
    // CREATE COOKIE
    document.cookie = 'date='+date+'/'+month+'; path=/';
    //DISPLAY CONTINUE BUTTON
    btn.removeAttribute('disabled');
  }
});



