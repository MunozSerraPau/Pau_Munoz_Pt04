<?php
// Pau Muñoz Serra
session_start();
require "../Model/modelEditarChampions.php";


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

$nomUsuari = $_SESSION['usuari'];


// Verifiquem que s'han rebut els paràmetres 'id' i 'action'
if (isset($_GET["id"]) && isset($_GET["action"])) {
    $id = trim(htmlspecialchars($_GET["id"]));
    $action = trim(htmlspecialchars($_GET["action"]));

    // Executar l'acció segons el valor de 'action'
    if ($action === "delete") {
        $comprovarUsuari = modelComprovarUsuariId($connexio, $nomUsuari, $id);
        if($comprovarUsuari === "LaCreatEll") {
            if (modelEliminarCampion($connexio, $id) === "ELIMINAT") {
                sleep(3);
                header("Location: ../index.php");
            } else {
                echo "<script>alert('ERROR amb la BASE DE DADES');</script>";
                sleep(3);
                header("Location: ../index.php");
            }
        } else {
            echo "<script>alert('No ha creat ell el id del Campio que li has passat');</script>";
            sleep(3);
            header("Location: ../index.php");
        }

    } else {
        header("Location: ../index.php");
    }

} else {
    header("Location: ../index.php");
}

?>