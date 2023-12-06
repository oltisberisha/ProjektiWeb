const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const loginForm = document.getElementById('loginForm');

registerLink.addEventListener('click', () => {
  wrapper.classList.add('active');
});

loginLink.addEventListener('click', () => {
  wrapper.classList.remove('active');
});
loginForm.addEventListener('submit', (event) => { // Change this line
  event.preventDefault(); 

  window.location.href = "Home.html"; 
});
function validateForm() {
  var username = document.getElementById("Username").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  var termsCheckbox = document.querySelector('input[type="checkbox"]');


  if (username === "" || email === "" || password === "") {
      alert("All fields must be filled out");
      return false;
  }
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
      alert("Please enter a valid email address");
      return false;
  }
  alert("Registration successful!");
  wrapper.classList.remove('active');
  return true;
}
