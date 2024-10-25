<?php
// Pau Muñoz Serra
session_start();

$host = 'localhost'; // Servidor donde se aloja la base de datos
$dbname = 'pt04_pau_munoz'; // Nombre de la base de datos
$username = 'root'; // Usuario de la base de datos
$password = ''; // Contraseña de la base de datos


$error; // Error per guardar en cas de algun espai buit

  
try {
// Crear una nueva instancia de PDO
$connexio = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

// Configurar PDO per llençar uan exepcio en cas de error
$connexio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // Mostrar error en cas de que falli la conexión
    die("Error en la conexión: " . $e->getMessage());
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // HACER UN SWITCH
    if (isset($_POST['delete'])) {
        
    } else if (isset($_POST['login'])) {
        
    }

}

?>