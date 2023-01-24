<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/style.css">
		<a href='/'><button>Startseite</button></a>	
		<script>		
	function myFunction() {
	var timeID = document.getElementById("time");
	var newDate = new Date(document.getElementById("date").value);
    var intDate = newDate.getDay();
	var today = new Date();
		if(newDate == today){
			var weekdayTimes = ["14:00", "14:15", "14:30", "14:45", "15:00", "15:15", "15:30", "15:45", "16:00", "16:15", "16:30", "16:45", "17:00", "17:15","17:30"];
		document.getElementById('time').options.length = 1;
		}
	//0 Sunday
	//1 Monday
	if((intDate == 1) || (intDate == 2) || (intDate == 3) || (intDate == 4) || (intDate == 5) || (intDate == 6)){	
		var weekdayTimes = ["14:00", "14:15", "14:30", "14:45", "15:00", "15:15", "15:30", "15:45", "16:00", "16:15", "16:30", "16:45", "17:00", "17:15", "17:30"];
		document.getElementById('time').options.length = 1;
	}
		if(intDate == 0){
			var weekdayTimes = ["10:00 (Brunch)", "12:00", "12:15", "12:30", "12:45", "13:00", "13:15", "13:30", "13:45", "14:00", "14:15", "14:30", "14:45", "15:00", "15:15", "15:30", "15:45", "16:00", "16:15", "16:30", "16:45", "17:00", "17:15", "17:30"];
			document.getElementById('time').options.length = 1;
		}
		for(var i = 0; i< weekdayTimes.length; i++) {
			var option = document.createElement("option");
			option.value = weekdayTimes[i];
			console.log(option.value);
			option.text = weekdayTimes[i];
			timeID.add(option);
		}
	}	
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
			
<?php
$servername = "localhost";
$username = "d0381c6f";
$password = "mFmWUCM49FXPyT7mHv4N";
$dbname = "d0381c6f";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id =$_REQUEST['id'];
echo $id;
$sql = "SELECT * FROM WaldcafeReservierung WHERE ID = '" . $id . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
			$Vorname = $row["Vorname"];
			$Nachname = $row["Nachname"];
			$EMail = $row["EMail"];
			$Telefon = $row["Telefon"];
			$Datum = $row["Datum"];
			$Uhrzeit = $row["Uhrzeit"];
			$Personen = $row["Personen"];
			$Infos = $row["Infos"];
			$Nachricht = $row["Nachricht"];
			$ID = $row["ID"];
			$Zeitstempel = $row["Zeitstempel"];
			$Ablauf = $row["Ablauf"];
			$Tischnr = $row["Tischnr"];
			$Status = $row["Status"];
    }
} else {
    echo "0 results";
}

$conn->close();
?>			
	</head>
	
	
	<body>
	<form action= "/NOCHKEINESEITEERSTELLT" method="post" onsubmit="return validate()">
<?php 
$string = "";
$string .= "<fieldset> 
				<label for='group'>Personen</label>
				<input type='number' name='Personen' id='group' placeholder= '$Personen'>
				<label for='date'>Datum</label>
				<input type='date' id='date' name='Datum' onchange='myFunction()' placeholder='$Datum'>
				<label for='time'>Uhrzeit</label>
				<select id='time' name='Uhrzeit' onchange='valide()'><option value='Uhrzeit' selected>Uhrzeit</option></select>
			</fieldset>	
			<fieldset>
				<legend>Angaben zur Person</legend>
				<div>
				<input type='text' id='name' placeholder='$Vorname' name='Vorname'>
				</div>
				<div>	
					<input type='text' id='surname' placeholder='$Nachname' name='Nachname'>
				</div>
					<div>	
						<input type='email' id='eMail' placeholder='$EMail' name='EMail'>
					</div>
					<div>	
						<input type='tel' id='phone' placeholder='$Telefon' name='Telefon'>
					</div>
				</fieldset>
				<fieldset>
					<legend>Weitere Angaben</legend>
					<div>";
					if(strpos($Infos,'Glutenfrei') !== false) {
						$string.= "<input type='checkbox' id='glutenfrei' name='Infos[]' value='Glutenfrei' checked>Glutenfrei";}
					else {$string.=	"<input type='checkbox' id='glutenfrei' name='Infos[]' value='Glutenfrei'>Glutenfrei"; }
					
					if(strpos($Infos,'Kinderstuhl') !== false){
						$string .= "<input type='checkbox' id='kinderstuhl' name='Infos[]' value='Kinderstuhl' checked>Kinderstuhl";}
					else {$string .= "<input type='checkbox' id='kinderstuhl' name='Infos[]' value='Kinderstuhl'>Kinderstuhl";}

					if(strpos($Infos, 'Kinderwagen') !== false){
						$string .= "<input type='checkbox' id='kinderwagen' name='Infos[]' value='Kinderwagen' checked>Kinderwagen";
					}
					else {	$string .= "<input type='checkbox' id='kinderwagen' name='Infos[]' value='Kinderwagen'>Kinderwagen";

					}
					if(strpos($Infos, 'Rollstuhl') !== false){
						$string .= "<input type='checkbox' id='rollstuhl' name='Infos[]' value='Rollstuhl' checked>Rollstuhl";
					}
					else {
						$string .= "<input type='checkbox' id='rollstuhl' name='Infos[]' value='Rollstuhl'>Rollstuhl";
					}
					if(strpos($Infos, 'Hund') !== false){
						$string .= "<input type='checkbox' id='hund' name='Infos[]' value='Hund' checked>Hund";
					}
					else {$string .= "<input type='checkbox' id='hund' name='Infos[]' value='Hund'>Hund";}
			$string .= "</div>
						<div>
							<textarea name='Nachricht' id='nachricht' cols='30' rows='3' maxlength=10000 wrap='soft' placeholder='$Nachricht'></textarea>		
						</div>
				</fieldset>		
			<p>Reservierungs-ID: $ID</p>
			<p>Zeitstempel: $Zeitstempel</p>
			<p>Status: $Status</p><br>
			<div>
				<input type='submit' value='Absenden' name='reservierungSenden' id='submit'>
			</div>
		</form>
</body>
</html>";
echo $string; ?>