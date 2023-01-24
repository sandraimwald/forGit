<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html>
<head>
<title>Reservieren</title>
<link rel="stylesheet" type="text/css" href="/style.css">
<style>
.fixed_header {
	width: 90%;
	max-height: 500px;
}
.fixed_header th {
	position: sticky;
	position: -webkit-sticky;
	top: 0px;
	z-index: 2;
	border-bottom: 1px solid;
}
.fixed_header td {
	/* word-wrap: break-word; */
	border: 1px solid;
}
</style>
</head>
<body>
<a href='/'><button>Startseite</button></a>
<h2>Reservierung stornieren</h2>	
	
<?php
$conn = mysqli_connect("localhost", "d0381c6f", "mFmWUCM49FXPyT7mHv4N", "d0381c6f");
	  if($conn === false){
				die("ERROR: Could not connect. " . mysqli_connect_error()); }

if($_SERVER['REQUEST_METHOD'] == 'POST'){  
echo("
<table class='fixed_header'>
        <tbody>
		<tr>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>EMail</th>
		<th>Telefon</th>
		<th>Datum</th>
		<th>Uhrzeit</th>
		<th>Personen</th>
		<th>Infos</th>
		<th>Nachricht</th>
		<th>ID</th>			
        </tr> 
");
$reservierungsID = $_REQUEST['reservierungsID'];
$sql = "SELECT * FROM WaldcafeReservierung WHERE ID = '$reservierungsID'";	
$result = mysqli_query($conn, $sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()){
$Datum = preg_replace('#^(\d{4})-(\d{2})-(\d{2})$#', '\3.\2.\1',$row["Datum"]);
echo "<tr><td>" . $row["Vorname"]. "</td><td>" . $row["Nachname"] . "</td><td>"
. $row["EMail"]. "</td><td>" . $row["Telefon"]. "</td><td>" . $Datum. "</td><td>" . $row["Uhrzeit"]. "</td><td>" . $row["Personen"]. "</td><td>" . $row["Infos"]. "</td><td>" . $row["Nachricht"]. "</td><td>" . $row["ID"]. "</td>
</tr>";
}
echo "</tbody></table>";
}
else {
    echo "Keine Ergebnisse";
}
mysqli_close($conn);
}
else echo "Keine ID eingegeben.";
echo "<form action= '/reservierungstorno' method='post'><input type='hidden' name='ID' value='" . $reservierungsID . "'><input type='submit' name='ReservierungStorno' value='Reservierung stornieren' id='ReservierungStorno'>";
?>
</body>
</html>