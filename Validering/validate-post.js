		var posta = documents.getElementById('posta');
		posta.addEventListener('submit', validateForm);
		
		function validateForm() {
		var cmt = document.kommentar.kommentaren.value;
		
		if ((cmt == "") || (cmt == null))
		{
			alert('Att posta tomma kommentarer är inte tillåtet');
			return false;
		}
		}