<?php
// Pau Muñoz Serra

$host = 'localhost'; // Servidor donde se aloja la base de datos
$dbname = 'Pt02_Pau_Munoz'; // Nombre de la base de datos
$username = 'root'; // Usuario de la base de datos
$password = ''; // Contraseña de la base de datos


$error; // Error per guardar en cas de algun espai buit

    
try {
    // Crear una nueva instancia de PDO
    $connexio = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

} catch (PDOException $e) {
    // Mostrar error en cas de que falli la conexión
    die("Error en la conexión: " . $e->getMessage());
}



$champsPerPagina = 12;  // Definim 12 articles per pàgina coma maxim
  
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

$inici = ($pagina > 1) ? ($pagina * $champsPerPagina - $champsPerPagina) : 0 ;

require_once "./Model/modelChampions.php";
$campeons = selectModel($connexio, $inici, $champsPerPagina);



require_once "./Model/modelChampions.php";
$totalChamps = (int) contarChampionsModel($connexio);

$numeroPagines = ceil($totalChamps / $champsPerPagina);


include "./Vista/index.vista.php";
?>