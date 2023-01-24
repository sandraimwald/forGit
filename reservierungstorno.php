<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html>
<head>
<title>Reservieren</title>
<link rel="stylesheet" type="text/css" href="/style.css">
	</head>
	<body>
<a href='/'><button>Startseite</button></a>

<?php
	$conn = mysqli_connect("localhost", "d0381c6f", "mFmWUCM49FXPyT7mHv4N", "d0381c6f");
	if($conn === false){die("ERROR: Could not connect. " . mysqli_connect_error()); }
	$ID = $_REQUEST['ID'];
	$sql="UPDATE WaldcafeReservierung SET Status = 'storniert' WHERE ID = '" . $ID . "'";
    $result = mysqli_query($conn, $sql);
if($result) {
	echo "<br><br>";
	echo "<p style='margin-left: 140px; font-size: 16pt;'>Reservierung storniert</p>";
}
	// if ($conn->query($sql) === TRUE) {echo "Reservierung storniert";} else {echo "Error updating record: " . $conn->error;}
	mysqli_close($conn);
?>
	</body>
</html>