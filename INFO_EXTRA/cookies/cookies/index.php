<!--Volem que quan accedim a aquest fitxer es creii automaticament una cookie que guardarà la info de la mida de la font-->
<?php
//creem la cookie nova, 30px serà el valor que guardarem. Time retorna el temps actual + el temps de més que volem: segons * minuts * hores * dies 
//el parametre '/' indica on es guardarà la cookie, p.exem: '/admin'
setcookie('font-size', '30px', time() + 60 * 60 * 24 * 30, '/'); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>Ja tinc cookie setejada!</h1>
	<a href="text.php">anar a la pagina 2</a>
</body>
</html>