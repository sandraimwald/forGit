<!DOCTYPE html>
<html>
<head>
<title>Ihre Reservierung</title>
<link rel="stylesheet" type="text/css" href="/style.css">
</head>
<body>
<div style="margin-left: 200px; font-size: 18px;">
<a href='/'><button>Startseite</button></a>
	  <h2>Ihre Reservierung</h2>
 <?php
				
        // servername
        // username
        // password
        // database name
        $conn = mysqli_connect("localhost", "d0381c6f", "mFmWUCM49FXPyT7mHv4N", "d0381c6f");

         
        // Check connection
        if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
if ($_SERVER['REQUEST_METHOD'] == 'POST'){  
	
		echo("<p>Vielen Dank. Ihre Reservierung wurde gespeichert.</p>");

		$Infos = "";
        $Informationen = $_REQUEST['Infos'];
		if (count($Informationen) > 0) {
    		foreach ($Informationen as $Info) { 
        		$Infos = $Infos . $Info . ", ";
			}
		}			
        // Taking all values from the form data(input)
        $Vorname =  $_REQUEST['Vorname'];
        $Nachname = $_REQUEST['Nachname'];
        $EMail =  $_REQUEST['EMail'];
        $Telefon = $_REQUEST['Telefon'];
        $Datum = $_REQUEST['Datum'];
        $Uhrzeit = $_REQUEST['Uhrzeit'];
        $Personen = $_REQUEST['Personen'];
		$Nachricht = $_REQUEST['Nachricht'];
		$ID = $_REQUEST['ID'];
		$Zeitstempel = $_REQUEST['Zeitstempel'];
		$Ablauf = $_REQUEST['Ablauf'];
		$Tischnr = $_REQUEST['Tischnr'];
		$Status = $_REQUEST['Status'];
        // Performing insert query execution
        $sql = "INSERT INTO WaldcafeReservierung VALUES ('$Vorname',
            '$Nachname','$EMail','$Telefon','$Datum','$Uhrzeit', '$Personen', '$Infos', '$Nachricht', '$ID', '$Zeitstempel', '$Ablauf', '$Tischnr', '$Status')";
        if (mysqli_query($conn, $sql)) {
			echo "";
		}
else	{
      	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
// Close connection
        mysqli_close($conn);

		//Send E-Mail if user typed an Email into the form
$reservierung = "<html><head></head><body>";
		$reservierung .= "<p style='font-size: 16pt;'><b>Ihre Reservierungsdaten</b></p>
		<p><b>Vorname:&nbsp;</b>" . $Vorname . "</p><p><b>Nachname:&nbsp;</b>" . $Nachname . "</p><p><b>Datum:&nbsp;</b>" . $Datum . 	"</p><p><b>Uhrzeit:&nbsp;</b>" . $Uhrzeit . "</p><p><b>Weitere Angaben: </b></p>";

	$reservierung = $reservierung . "<p>" . $Infos . "</p>";

if($_POST["Nachricht"]){
	$reservierung = $reservierung . "<p><b>Ihre Nachricht: </b></p><p>" . $Nachricht . "</p>";
}
$reservierung.= "<p><b>Ihre Reservierungs- ID: </b>" . $ID . "</p>";
$reservierung .= "</body></html>";
if($_POST["EMail"]) {
	$abs = "info@wald-cafe.com";
	$header  = 'MIME-Version: 1.0' . "\r\n";
	$header .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	$header .= 'From: ' . $abs . "\r\n";
	mail($_POST["EMail"], "Ihre Reservierung", $reservierung, $header);
	echo nl2br("Sie erhalten eine Bestätigung an die angegebene E-Mailadresse.\n");
	}

//print text on screen
echo nl2br("<br><br>");
echo nl2br($reservierung);
}
else echo "Keine Reservierung";

	?>
	  <br>
	  <br>
	  <br>
	  <br>
</div>
</body>
</html>