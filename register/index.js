

var firstName = document.getElementById("firstname");
var efirstName = document.getElementById("fNameError");
var lastName = document.getElementById("lastname");
var eLastName = document.getElementById("lNameError");
var email = document.getElementById("email");
var eEmail = document.getElementById("emailError");
var userName = document.getElementById("username");
var eUsername = document.getElementById("usernameError");
var pass = document.getElementById("password");
var ePass = document.getElementById("passError");
var passConfirm = document.getElementById("passwordConfirm");
var ePassConfirm = document.getElementById("passConfirmError");


var submitBtn = document.getElementById("submit");

submitBtn.disabled = true;


passConfirm.onkeyup= function btnCheck(){
  if(passConfirm.value == pass.value){
	 ePassConfirm.textContent="";
    submitBtn.disabled=false;
  }
  else{
    submitBtn.disabled = true;
	ePassConfirm.textContent= "PASSWORDS DO NOT MATCH";
  }
};

