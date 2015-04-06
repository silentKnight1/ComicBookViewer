function validateName(){
	var name = document.forms["register"]["name"].value;
	var re = new RegExp(/^[a-zA-Z0-9 .]+$/);
	if(re.exec(name)!=null){
		document.getElementById("nameerror").innerHTML = "";
		return true;
	}
	else
		document.getElementById("nameerror").innerHTML = "Only alphabets, digits, space and dot(.) allowed.";
	return false;
}

function validateEmail(){
	var email = document.forms["register"]["email"].value;
	var re = new RegExp(/^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/);
	if(re.exec(email)!=null)
		document.getElementById("emailerror").innerHTML = "";
	else{
		document.getElementById("emailerror").innerHTML = "Invalid email address";
		return false;
	}
	var searchReq;
   	searchReq=new XMLHttpRequest();
	searchReq.onreadystatechange=function()
	{
		if(searchReq.readyState==4 && searchReq.status==200){
			if(searchReq.responseText != "ok"){
				document.getElementById("emailerror").innerHTML = searchReq.responseText;
				return false;
			}
			else
				document.getElementById("emailerror").innerHTML = "";
		}
	 }
     url="validateEmail.php?email="+email;
     searchReq.open("GET",url,true);
	 searchReq.send(null);
	 return true;
}
 
function validatePassword(){
	var pass = document.forms["register"]["password"].value;
	var re = new RegExp(/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}/);
	if(re.test(pass)==true){
		document.getElementById("passerror").innerHTML = "";
		return true;
	}
	else
		document.getElementById("passerror").innerHTML = "Password should be 8-15 characters in length<br/>Atleast one uppercase letter, one lowercase letter and one digit required";
	return false;
}

function validateCPassword(){
	var pe = validatePassword();
	var pass = document.forms["register"]["password"].value;
	var cpass = document.forms["register"]["cpassword"].value;
	if(pass == cpass){
		document.getElementById("cpasserror").innerHTML = "";
		if(pe == true)
			return true;
	}
	else
		document.getElementById("cpasserror").innerHTML = "Password mismatch";		
	return false;
}

function validateForm(){
	var ne = validateName();
	var ee = validateEmail();
	var cpe = validateCPassword();
	if(ne==false || ee==false || cpe == false)
		return false;
	else
		return true;
}
