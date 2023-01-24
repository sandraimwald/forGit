<?php session_start(); ?>
<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html>
<head>
<link rel="stylesheet" type="text/css" href="/style.css">
<style>
.fixed_header{
   text-align: center;
   position: relative;
   width: 100%;
   border-collapse: collapse;

}
th {
   top: 0;
   position: sticky;
   border-bottom: 1px solid;
}
td {
		border: 1px solid;
	}
</style>
<script>
/*	function callPHPFunc(var id){
	var myID = document.getElementById(id);
}
*/
</script>
<script>
	/*function sendID(var id) {
	var reservationID= id;
	sessionStorage.setItem("id", reservationID);
	}
	*/
	function sendID(var buttonRow){ //Zeile übergeben in der sich der Button befindet
		var buttonZeile = buttonRow;
		var myID = document.getElementById("reservationtable").rows[buttonZeile].item(11).innerHTML;
		return myID;
	}
</script>	
</head>
<body>
<a href='/'><button>Startseite</button></a>
<h2>Reservierung bearbeiten</h2>
<table id="reservationtable" class="fixed_header">
        <tbody>
		<tr>
		<th>Datum</th>
		<th>Uhrzeit</th>
		<th>Personen</th>
		<th>Infos</th>
		<th>Nachricht</th>
		<th>Ablauf</th>
		<th>Tischnr</th>			
        <th>Vorname</th>
        <th>Nachname</th>
        <th>EMail</th>
		<th>Telefon</th>
		<th>ID</th>
		<th>Zeitstempel</th>
		<th>Bearbeiten</th>
        </tr>		
<?php 
$conn = mysqli_connect("localhost", "d0381c6f", "mFmWUCM49FXPyT7mHv4N", "d0381c6f");
	  if($conn === false){
				die("ERROR: Could not connect. "
					. mysqli_connect_error());
			}

$bearbeiten ="<img src='img/icons8-pencil-30.png'>";
$sql = "SELECT * FROM WaldcafeReservierung";
$rowArray = array();
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
   $number = -1;
   while($row = $result->fetch_assoc()) {
	   		$number +=1;
	   		$buttonString = "Button";
	   		$id = $row["ID"];
	   		echo"<form action= '/reservierungbearbeitenMitarbeiter' method='post'><input type='hidden' name='id' value=$id>";
	   		$rowArray[$number] = (string)$number;
			$Datum = preg_replace('#^(\d{4})-(\d{2})-(\d{2})$#', '\3.\2.\1',$row["Datum"]);
            echo "<tr id='$numberString'><td>" . $Datum. "</td><td>" . $row["Uhrzeit"]. "</td><td>" . $row["Personen"]. "</td><td>" . $row["Infos"]. "</td><td>" . $row["Nachricht"]. "</td><td>" . $row["Ablauf"]. "</td><td>" . $row["Tischnr"]. "</td><td>" . $row["Vorname"]. "</td><td>" . $row["Nachname"] . "</td><td>"
. $row["EMail"]. "</td><td>" . $row["Telefon"]. "</td><td>" . $id . "</td><td>" . $row["Zeitstempel"]. "</td><td id='$buttonString'><button class='edit' type='submit'></button></form></td></tr>";
	}
echo "</tbody></table>";

}
else { 
    echo "Keine Ergebnisse"; 
    }
$conn->close();
//mysqli_close($conn);
?>