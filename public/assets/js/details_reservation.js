let btn = document.getElementsByClassName('button')[0];

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

  if ((number || allergy) || (number && allergy)) {
    btn.removeAttribute('disabled');
  }
})