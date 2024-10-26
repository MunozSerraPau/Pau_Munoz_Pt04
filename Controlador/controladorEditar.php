<?php
// Pau Muñoz Serra
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

echo "123123423534";
// Verifiquem que s'ha rebut l'id
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "gsrgsrg";
    if (isset($_POST['updateChamp'])) {
        echo "·········";
        $id = trim(htmlspecialchars($_GET['id']));
        $name = htmlspecialchars($_POST['nomCampio']);
        $description = htmlspecialchars($_POST['descripcio']);
        $recurce = htmlspecialchars($_POST['resource']);
        $role = htmlspecialchars($_POST['role']);

        modelModificarCampion($connexio, $name, $description, $recurce, $role, $id);
        header("Location: ../index.php");
        
        

        /*if ($stmt->execute()) {
            echo "<script>alert('Registre actualitzat correctament');</script>";
            echo "<script>window.location.href = '../Vista/listaChamps.php';</script>";
        } else {
            echo "<script>alert('Error en actualitzar el registre');</script>";
        }
        */
    }
} elseif (isset($_GET['id'])) { 
    $id = trim(htmlspecialchars($_GET['id']));

    echo "HOLAAAAAefsfsefAAAAAAAAAAAAAAAAAA";

    $champ = modelObtenirDadesChamp($connexio, $id);

    if (!empty($champ)) {
        include "../Vista/update.vista.php";
    } else {
        echo "<script>alert('No s\'ha trobat el registre');</script>";
        header("Location: ../index.php");
    }

} else {
    header("Location: ../index.php");

}


function actualitzarChamp(PDO $connexio, string $nom, string $descripcio, string $recurs, string $rol, string $id) {    

    require_once "../Model/modelEditarChampions.php";
    $error = "<br>";
    
    if(empty($id)) {
        $error .= "Error no has ficat el NOM<br>";
    } else if (empty($cognoms)) {
        $error .= "Error no has ficat els COGNOMS<br>";
    } else if (empty($correu)) {
        $error .= "Error no has ficat el CORREU<br>";
    } else if (empty($nickname)) {
        $error .= "Error no has ficat el NICKNAME<br>";
    } else if (empty($contrasenya)) {
        $error .= "Error no has ficat CONTRASENYA<br>";
    } elseif (!preg_match($validarContrasenya, $contrasenya)) {
        unset($_POST['password']);
        unset($_POST['confirm-password']);
        $error .= "La nova CONTRASENYA no compleix els requisits. <br>(1 majúscula, 1 minúscula, 1 caràcter especial, 1 número i 8 caracters mínim.)<br>";
    } else if (empty($confirmPassword)) {
        $error .= "Error no has ficat la CONFIRMACIÓ de la CONTRASENYA<br>";
    } else if ($contrasenya !== $confirmPassword) {
        $error .= "Error les CONTRASENYES NO coinsideixen<br>";
    }
    
    if($error === "<br>") {
        $hashPassword = password_hash($contrasenya, PASSWORD_DEFAULT);
        $crearUsuari = modelAfegeixUsuari($connexio, $nom, $cognoms, $correu, $nickname, $hashPassword);
        unset($_POST['firstname']);
        unset($_POST['lastname']);
        unset($_POST['email']);
        unset($_POST['nickname']);
        
        return $crearUsuari;
    } else {
        return $error;
    }
}
?>
