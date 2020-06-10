$(document).ready(function() {
    $('.menu-toggle').on('click',function() {
        $('.nav').toggleClass('showing');
    });
    

    $('.post-wrapper').slick({
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        nextArrow: $('.next'),
        prevArrow: $('.prev'),
        responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
          ]
      });
});

$('.message a').click(function(){
  $('form').animate({height: "toggle", opacity: "toggle"},"slow");
});

const form = document.getElementById('form');
const username = document.getElementById('username');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');
const mobilenumber = document.getElementById('mobilenumber');
const email = document.getElementById('email');

form.addEventListener('submit',(e) => {
  e.preventDefault();
  checkInputs();
});

function checkInputs() {
  const usernamevalue = username.value.trim();
  const passwordvalue = password.value.trim();
  const password2value = password2.value.trim();
  const mobilenumbervalue = mobilenumber.value.trim();
  const emailvalue = email.value.trim();

  if(usernamevalue === '') {
    setErrorFor(username, 'Username cannot be blank');
  } else {
    setSuccessFor(username);
  }

  if(passwordvalue === '') {
    setErrorFor(password, 'Password cannot be blank');
  } else {
    setSuccessFor(password);
  }

  if(password2value === '') {
    setErrorFor(password2, 'Password cannot be blank');
  } else if(passwordvalue !== password2value) {
    setErrorFor(password2, 'Passwords does not match');
  }  else {
    setSuccessFor(password2);
  }

  if(usernamevalue === '') {
    setErrorFor(username, 'Username cannot be blank');
  } else {
    setSuccessFor(username);
  }

  if(emailvalue === '') {
    setErrorFor(email, 'Email cannot be blank');
  } else if(!isEmail(emailvalue)) {
    setErrorFor(email, 'Email is not valid');
  } else {
    setSuccessFor(email);
  }
}

function setErrorFor(input, message) {
  const formControl1 = input.parentElement;
  const small = formControl1.querySelector('small');
  small.innerText = message;
  formControl1.className = 'form-control1 error';
}

function setSuccessFor(input) {
  const formControl1 = input.parentElement;
  formControl1.className = 'form-control1 success';
}

function isEmail(email) {
  return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}