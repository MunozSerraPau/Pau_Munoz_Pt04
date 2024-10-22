<?php 
// Pau Muñoz Serra
require "../Model/modelEditarChampions.php";

$host = 'localhost'; // Servidor donde se aloja la base de datos
$dbname = 'pt04_pau_munoz'; // Nombre de la base de datos
$username = 'root'; // Usuario de la base de datos
$password = ''; // Contraseña de la base de datos


$error = "<br>"; // Error per guardar en cas de algun espai buit

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    try {
    // Crear una nueva instancia de PDO
    $connexio = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Configurar PDO per llençar uan exepcio en cas de error
    $connexio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        // Mostrar error en cas de que falli la conexión
        die("Error en la conexión: " . $e->getMessage());
    }

    $nom = ($_POST['nomCampio']);
    $descripcio = ($_POST['descripcio']);
    $recurs = ($_POST['resource']);
    $rol = ($_POST['role']);


    if(empty($nom)) {
        $error .= "Error no has ficat el NOM<br>";
    } 
    if (empty($descripcio)) {
        $error .= "Error no has ficat DESCRIPCIO<br>";
    } 
    if (empty($recurs)) {
        $error .= "Error no has ficat el RECURS<br>";
    } 
    if (empty($rol) || $rol === "-----") {
        $error .= "Error no has ficat el seu ROLE<br>";
    } 

    if($error === "<br>") {
        if(isset($_SESSION['usuari'])){ $nomUsuari = $_SESSION['usuari']; }; 
        $champDuplicat = modelComprovarNom($connexio, $nom);

        if ($champDuplicat === "ChampNoDuplicat") {
            $afegirChamp = modelAfegirCampio($connexio, $nom, $descripcio, $recurs, $rol, $nomUsuari);
            if($afegirChamp === "SiCreat") {
                $error = "ChampCreat";
            }
        } else {
            $error = "Error el NOM del campio ja EXISTEIX<br>";
        }
        
       
    }
}


?>