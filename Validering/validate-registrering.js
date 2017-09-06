		
		var Submit = documents.getElementbyId('Submit');
		Submit.addEventListener('submit', validateForm);
		
		function validateForm() {
		var uname = document.registrering.username.value;
		var pword = document.registrering.password.value;
		var email = document.registrering.email.value;
	
		 atpos = email.indexOf("@");
         dotpos = email.lastIndexOf(".");
		 
		
		if ((email == "") || (email == null) || (uname == "") || (uname == null) || (pword == "") || (pword == null))
		{
			alert('Alla fält måste vara ifyllda.');
		return false; }
		       
		//Validerar att e-mailadressen är giltig	   
         if (atpos < 1 || ( dotpos - atpos < 2 )) 
         {
            alert('Vänligen fyll i en giltig emailadress.')            
            return false;
         }
		 
		//Lite extra säkerhet
		if (/\d/.test(pword) == false) {
			alert('Lösenordet måste innehålla minst en siffra.');
			return false;
		}		
		return true;
		}
		