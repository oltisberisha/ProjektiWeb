
function validateForm() {
  var username = document.getElementById("Username").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;

  var usernameRegex = /^[A-z]+[a-zA-Z]+$/;
  if (!usernameRegex.test(username)) {
      alert("Please enter a valid username");
      return false;
  }
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
      alert("Please enter a valid email address");
      return false;
  }
  var passwordRegex = /^(?=.*[A-Z])(?=.*\d).{8,}$/;
  if (!passwordRegex.test(password)) {
      alert("Please enter a valid password");
      return false;
  }
  alert("Registration successful!");
  // wrapper.classList.remove('active');
  return true;
}
function validateLoginForm() {
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;

  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
      alert("Please enter a valid email address");
      return false;
  }

  var passwordRegex = /^(?=.*[A-Z])(?=.*\d).{8,}$/;
  if (!passwordRegex.test(password)) {
      alert("Please enter a valid password");
      return false;
  }

  alert("Login successful!");
  return true;
}