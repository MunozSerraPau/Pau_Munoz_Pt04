<?php 
//condicional que anirà a buscar la informació de la cookie que hem creat (font-size) i per tant mostrarà el valor de la font a setcookie, en cas contrari mostrarà la mida de la vairable $mida.
if (isset($_COOKIE['font-size'])) {
	$mida = $_COOKIE['font-size'];
} else {
	$mida = '8px';
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Text</title>
	<style> /*codi css només per a fer proves*/
		{
			font-size: <?php echo $mida; ?>;
		}
	</style>
</head>
<body>
	<p>Oh yeah!!!</p>
</body>
</html>