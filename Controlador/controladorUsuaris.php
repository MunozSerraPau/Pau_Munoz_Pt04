<?php 

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



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    if(isset($_POST['singup'])) {
        echo "SING UP";
    } else if (isset($_POST['login'])) {
        echo "LOGIN";
        $username = ($_POST['username']);
        $password = ($_POST['password']);

        $error = comprovarUsuari($connexio, $username, $password);

    }

}


function comprovarUsuari(PDO $connexio, string $username, string $password) {
    require_once "../Model/modelUsuaris.php";

    if (empty($username) && empty($password)) {
        $error = "Nom d'Usuari i contrasenya BUIDA!";
    } elseif (empty($username)){
        $error = "El nom d'Usuari esta BUIT!";
    } elseif (empty($password)) {
        $error = "La contrasenya esta BUIDA!";
    } else {
        $error = modelUsuariExisteix($connexio, $username, $password);
    }

    return $error;
}


?>