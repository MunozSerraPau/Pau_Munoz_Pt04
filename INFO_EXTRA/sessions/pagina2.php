<?php 
session_start();

if ($_SESSION) {
	$nom = $_SESSION['nom'];
	echo "<h1>Hola $nom</h1>";
} else {
	echo 'No has iniciat sessio';
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pagina 2</title>
</head>
<body>
	<a href="tancar.php">Tancar Sessio</a>
</body>
</html>