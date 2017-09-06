		var login = documents.getElementById('LogIn');
		login.addEventListener('submit', validateForm);
		
		function validateForm() {
		var uname = document.loginform.username.value;
		var pword = document.loginform.password.value;
		
		if ((uname == "") || (uname == null) || (pword == "") || (pword == null))
		{
			alert('Alla fält måste vara ifyllda.');
			return false;
		}
		
		else 
		{
			return true;
		}
		}