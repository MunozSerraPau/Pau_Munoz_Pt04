<?php
session_start();
// session_destroy();

$_SESSION['nom'] = 'Pep';

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sessions</title>
</head>
<body>
	<h1>Pagina inici</h1>
	<p>Has carregat una nova sessio</p>
	<a href="pagina2.php">anar a la pagina 2</a>
</body>
</html>