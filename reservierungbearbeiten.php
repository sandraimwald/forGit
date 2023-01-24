<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<html>
<head>
<title>Ihre Reservierung</title>
<link rel="stylesheet" type="text/css" href="/style.css">
</head>
<body>
<a href='/'><button>Startseite</button></a>
<h3>Ändern Ihrer Reservierung</h3>
Bitte beachten Sie, dass wir die Anpassung der Reservierung nicht immer garantieren können. Erst wenn Sie telefonisch, per E-Mail oder persönlich eine Bestätigung der Änderung erhalten, wird diese wirksam.
<div>Tel: <a href="tel:+4983349885805"> +49 833 49 88 58 05</a></div>
<div>E-Mail: <a href="mailto:info@wald-cafe.com" target="_blank" rel="noreferrer noopener">  info@wald-cafe.com</a></div>
<br>
<h3>Stornieren Ihrer Reservierung</h3>
<form action= "/reservierungstornieren" method="post">
<label for="reservierungsID">Bitte geben Sie Ihre Reservierungs- ID ein: </label>
<input type ="text" id="reservierungsID" name="reservierungsID">
<input type="submit" value="OK" name="submitID" id="submitID">
<p style="font-size: 10pt;">Die Reservierungs-ID finden Sie in der Bestätigungs- E-Mail der Reservierung.</p>
</form>
</body>
</html>