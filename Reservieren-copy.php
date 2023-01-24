<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html>
<head>
<title>Reservieren</title>
<link rel="stylesheet" type="text/css" href="/style.css">
<style type="text/css">

.invalid {
    border: 1px solid red;
}
.valid {
    border-color: black;
}
</style>
</head>
<body>
<a href='/'><button>Startseite</button></a>
	        <script>
			function validate(){
            let selectedTime = document.getElementById('time').value; 
			let timeElement = document.getElementById('time');  
			if(selectedTime == "Uhrzeit"){
	    	timeElement.className = "invalid";
			timeElement.focus();
			return false;
			}
			else timeElement.className = "valid";
			return true;
			}
			
			function valide(){
			let timeElement = document.getElementById('time');  
			let selectedTime = document.getElementById('time').value; 
		    timeElement.className = "valid";
			if(selectedTime == "Uhrzeit"){
	    	timeElement.className = "invalid";
			timeElement.focus();
			}
			}
			</script>
	<h2>Reservieren</h2>
			<form action= "/ihre-reservierung" method="post" onsubmit="return validate()">
				<fieldset> 
					<label for="group">Personen</label>
					 <select name="Personen" id="group" required="required">
						<option value=1>1</option>
						<option value=2>2</option>
						<option value=3>3</option>
						<option value=4>4</option>
						<option value=5>5</option>
						<option value=6>6</option>
						<option value=7>7</option>
						<option value=8>8</option>
						<option value=9>9</option>
						<option value=10>10</option>
					</select>
					<p class="info">Gruppen mit mehr als 10 Personen bitte über Telefon oder E-Mail anfragen</p>
						<label for="date">Datum</label>
						<input type="date" id="date" name="Datum" onchange="myFunction()" placeholder="dd-mm-yyyy" value=""
        min="1997-01-01" max="2030-12-31" required="required">
					<script>												
						
						
	function myFunction() {
	var timeID = document.getElementById("time");
	var newDate = new Date(document.getElementById("date").value);  //eingegebenes Datum
	var intDate = newDate.getDay();  //Wochentag des eingegebenen Datums
	var today = new Date(); // heutiges Datum
	
	if((intDate == 1) || (intDate == 2) || (intDate == 3) || (intDate == 4) || (intDate == 5) || (intDate == 6)) {
		if((newDate == today)&&(today.getHours()<=13)&&(today.getMinutes()<=15)){
			var weekdayTimes = ["14:00", "14:15", "14:30", "14:45", "15:00", "15:15", "15:30", "15:45", "16:00", "16:15", "16:30", "16:45", "17:00", "17:15", "17:30"];
		//	document.getElementById('time').options.length = 1;
		}   
		else {
			var weekdayTimes = ["nur bis 13 Uhr"];
		//	document.getElementById('time').options.length = 1;
		}
	}
							


	if(intDate == 0){  //Sonntags
		if((newDate === today)&&(today.getHours()<=12)&&(today.getMinutes()==0)){ //Sonntags bis 12
			var weekdayTimes = ["13:00", "13:15", "13:30", "13:45", "14:00", "14:15", "14:30", "14:45", "15:00", "15:15", "15:30", "15:45", "16:00", "16:15", "16:30", "16:45", "17:00", "17:15", "17:30"];	  
		//	document.getElementById('time').options.length = 1;
		}
		else if((today.getYear() === newDate.getYear()) && (today.getMonth() === newDate.getMonth()) && (today.getDay() < intDate)) { //Bis Samstag für Brunch reservieren
			var weekdayTimes = ["10:00 (Brunch)", "12:00", "12:15", "12:30", "12:45", "13:00", "13:15", "13:30", "13:45", "14:00", "14:15", "14:30", "14:45", "15:00", "15:15", "15:30", "15:45", "16:00", "16:15", "16:30", "16:45", "17:00", "17:15", "17:30"];	  
		//	document.getElementById('time').options.length = 1;
		}
	}
	for(var i = 0; i< weekdayTimes.length; i++) {
		var option = document.createElement("option");
		option.value = weekdayTimes[i];
		console.log(option.value);
		option.text = weekdayTimes[i];
		timeID.add(option);	
        }
	}	
					</script>
						<label for="time">Uhrzeit</label>
						<select id="time" name="Uhrzeit" onchange="valide()"><option value="Uhrzeit" selected>Uhrzeit</option>
						</select>
				</fieldset>	
				<fieldset>
					<legend>Angaben zur Person</legend>
					<div>	
						<input type="text" id="name" placeholder="Vorname*" name="Vorname" required="required">
					</div>
					<div>	
						<input type="text" id="surname" placeholder="Nachname*" name="Nachname" required="required">
					</div>
					<div>	
						<input type="email" id="eMail" placeholder="E-Mail" name="EMail">
					</div>
					<p class="info">Bitte beachten Sie: Nur bei Angabe einer E-Mail erhalten Sie eine Bestätigung zugeschickt.</p>
					<div>	
						<input type="tel" id="phone" placeholder="Telefon*" name="Telefon" required="required">
					</div>
				</fieldset>
				<fieldset>
					<legend>Weitere Angaben</legend>
					<div>
						<input type="checkbox" id="glutenfrei" name="Infos[]" value="Glutenfrei">Glutenfrei
						<input type="checkbox" id="kinderstuhl" name="Infos[]" value="Kinderstuhl">Kinderstuhl
						<input type="checkbox" id="kinderwagen" name="Infos[]" value="Kinderwagen">Kinderwagen
						<input type="checkbox" id="rollstuhl" name="Infos[]" value="Rollstuhl">Rollstuhl
						<input type="checkbox" id="hund" name="Infos[]" value="Hund">Hund
					</div>
						<div>
							<textarea name="Nachricht" id="nachricht" cols="30" rows="3" maxlength=10000 wrap="soft"></textarea>		
						</div>
				</fieldset>
				<script>
						function generateCode(){
      						const characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
       						let text = '';
        					for (let i = 0; i < 8; i++) {
          						text += characters.charAt(Math.floor(Math.random() * characters.length)) 
							};
							document.getElementById('ID').value = text;
							let userTimestamp = new Date().toLocaleString();
							document.getElementById('userTimestamp').value = userTimestamp;
							document.getElementById('status').value = "bestätigt";
						}
				</script>
				<input type="hidden" id="ID" name="ID">
				<input type="hidden" id="userTimestamp" name="Zeitstempel">
				<input type="hidden" id="status" name="Status">
                 <input type="checkbox" id="datenschutz" name="datenschutz" value="datenschutz" required>
                    <label for="datenschutz">Ich habe die <a href="https://www.wald-cafe.com/impressum/#datenschutz">Datenschutzerklärung</a> gelesen und nehme sie zur Kenntnis.*</label><br>
				<div>
					<input type="submit" value="Absenden" name="reservierungSenden" id="submit" onclick="generateCode()">
				</div>
			</form>
			
</body>
</html>