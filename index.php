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



    
$articlesPerPagina = 12;  // Definim 12 articles per pàgina coma maxim
  
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

$inici = ($pagina > 1) ? ($pagina * $articlesPerPagina - $articlesPerPagina) : 0 ;

require_once "./Model/modelArticles.php";
$articles = selectModel($connexio, $inici, $articlesPerPagina);

// Comprovem que hagui articles, en cas contrari, rediriguim
if (!$articles) {
    header('Location: localhost/Practiques/Pt03/index.vista.php');
}

require_once "./Model/modelArticles.php";
$totalArticles = (int) contarArticlesModel($connexio);

$numeroPagines = ceil($totalArticles / $articlesPerPagina);


include "./Vista/index.vista.php";
?>