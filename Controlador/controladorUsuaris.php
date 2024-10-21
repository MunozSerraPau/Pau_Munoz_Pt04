<?php 
session_start();


$host = 'localhost'; // Servidor donde se aloja la base de datos
$dbname = 'pt04_pau_munoz'; // Nombre de la base de datos
$username = 'root'; // Usuario de la base de datos
$password = ''; // Contraseña de la base de datos


$error = ""; // Error per guardar en cas de algun espai buit

    
try {
    // Crear una nueva instancia de PDO
    $connexio = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

} catch (PDOException $e) {
    // Mostrar error en cas de que falli la conexión
    die("Error en la conexión: " . $e->getMessage());
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    echo "COMPROVAR ------   ";
    if(isset($_POST['singup'])) {
        echo "SING UP";
        $nom = ($_POST['firstname']);
        $cognoms = ($_POST['lastname']);
        $correu = ($_POST['email']);
        $nickname = ($_POST['nickname']);
        $contrasenya = ($_POST['password']);
        $confirmPassword = ($_POST['confirm-password']);

        $shaCreat = afegirUsuari($connexio, $nom, $cognoms, $correu, $nickname, $contrasenya, $confirmPassword);

        if($shaCreat === "SiCreat") {
            $error = "S'ha creat Correctament";
        } else {
            $error = $shaCreat;
        }


    } else if (isset($_POST['login'])) {
        echo "LOGIN";
        $nickname = ($_POST['username']);
        $contrasenya = ($_POST['password']);

        $existeixUsuari = comprovarUsuari($connexio, $nickname, $contrasenya);
        $error = $existeixUsuari;
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

        $contra = modelNickNameExisteixLogin($connexio, $username);
        
        if(password_verify($password, $contra)) {
            $error = "UsuariConnectat";
            ini_set('session.gc_maxlifetime', 1 * 60);
            $_SESSION['usuari'] = $username;
        } elseif($contra === "NoHiHaUsuari") {
            $error = "No hi ha cap Usuari amb aquest NICKNAME";
        } else {
            $error = "La CONTRASENYA no coninsideix";
        }

    }

    return $error;
}

function afegirUsuari(PDO $connexio, string $nom, string $cognoms, string $correu, string $nickname, string $contrasenya, string $confirmPassword) {
    require_once "../Model/modelUsuaris.php";
    $error = "<br>";
    
    if(empty($nom)) {
        $error .= "Error no has ficat el NOM<br>";
    } 
    if (empty($cognoms)) {
        $error .= "Error no has ficat els COGNOMS<br>";
    } 
    if (empty($correu)) {
        $error .= "Error no has ficat el CORREU<br>";
    } 
    if (empty($nickname)) {
        $error .= "Error no has ficat el NICKNAME<br>";
    } 
    if (empty($contrasenya)) {
        $error .= "Error no has ficat CONTRASENYA<br>";
    }
    if (empty($confirmPassword)) {
        $error .= "Error no has ficat la CONFIRMACIÓ de la CONTRASENYA<br>";
    } else if ($contrasenya !== $confirmPassword) {
        $error .= "Error les CONTRASENYES NO coinsideixen<br>";
    }
    
    if($error === "<br>") {
        $hashPassword = password_hash($contrasenya, PASSWORD_DEFAULT);
        $crearUsuari = modelAfegeixUsuari($connexio, $nom, $cognoms, $correu, $nickname, $hashPassword);
        return $crearUsuari;
    } else {
        return $error;
    }
}

?>