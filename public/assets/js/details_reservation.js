let btn = document.getElementsByClassName('button')[0];
let input = document.getElementById('number');
input.addEventListener('click', () => {
  btn.removeAttribute('disabled');
})
btn.addEventListener('click', () => {
  let number = document.getElementById('number').value;
  let newNumber = parseInt(number, 10);
  if(!typeof(newNumber) === 'number') {
    btn.setAttribute('disabled');
  } else {
    document.cookie = 'number='+newNumber+'; path=/';
  }

  let allergy = document.getElementById('allergy').value;
  if(!typeof(newNumber) === 'number') {
    btn.setAttribute('disabled');
  } else {
    document.cookie = 'allergy='+allergy+'; path=/';
  }
})