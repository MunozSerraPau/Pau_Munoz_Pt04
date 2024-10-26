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
    
    if(isset($_POST['singup'])) {
        echo "SING UP";
        $nom = htmlspecialchars($_POST['firstname']);
        $cognoms = htmlspecialchars($_POST['lastname']);
        $correu = htmlspecialchars($_POST['email']);
        $nickname = htmlspecialchars($_POST['nickname']);
        $contrasenya = htmlspecialchars($_POST['password']);
        $confirmPassword = htmlspecialchars($_POST['confirm-password']);

        $shaCreat = afegirUsuari($connexio, $nom, $cognoms, $correu, $nickname, $contrasenya, $confirmPassword);

        if($shaCreat === "SiCreat") {
            $error = "S'ha creat Correctament";
        } else {
            $error = $shaCreat;
        }


    } else if (isset($_POST['login'])) {
        echo "LOGIN";
        
        $nickname = htmlspecialchars($_POST['username']);
        $contrasenya = htmlspecialchars($_POST['password']);

        $existeixUsuari = comprovarUsuari($connexio, $nickname, $contrasenya);
        $error = $existeixUsuari;


    } else if (isset($_POST['canviContrasenya'])) {
        echo "Canviar Contrasenya";

        $contraActual = htmlspecialchars($_POST['contrasenyaActual']);
        $contraNovaV1 = htmlspecialchars($_POST['contrasenyaNova1']);
        $contraNovaV2 = htmlspecialchars($_POST['contrasenyaNova2']);

        $canviContrasenya = canviarContrasenya($connexio, $contraActual, $contraNovaV1, $contraNovaV2);
        $error = $canviContrasenya;

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
            unset($_POST['username']);

        } else {
            $error = "La CONTRASENYA no coninsideix";

        }

    }

    return $error;
}

function afegirUsuari(PDO $connexio, string $nom, string $cognoms, string $correu, string $nickname, string $contrasenya, string $confirmPassword) {    
    $validarContrasenya = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*()_\-+=\[\]{};:,.<>?])[A-Za-z\d!@#$%^&*()_\-+=\[\]{};:,.<>?]{8,}$/';

    require_once "../Model/modelUsuaris.php";
    $error = "<br>";
    
    if(empty($nom)) {
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

function canviarContrasenya (PDO $connexio, string $contraActual, string $contraNovaV1, string $contraNovaV2) {
    $validarContrasenya = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*()_\-+=\[\]{};:,.<>?])[A-Za-z\d!@#$%^&*()_\-+=\[\]{};:,.<>?]{8,}$/';


    require_once "../Model/modelUsuaris.php";
    $error = "<br>";

    if(empty($contraActual)) {
        $error .= "Error no has ficat la CONTRASENYA ACTUAL<br>";

    } elseif (empty($contraNovaV1)) {
        $error .= "Error no has ficat la CONTRASENYA NOVA<br>";

    } elseif (empty($contraNovaV2)) {
        $error .= "Error no has ficat la CONTRASENYA NOVA REPETIDA<br>";

    } elseif (!preg_match($validarContrasenya, $contraNovaV1)) {
        $error .= "La nova CONTRASENYA no compleix els requisits. <br>(1 majúscula, 1 minúscula, 1 caràcter especial, 1 número i 8 caracters mínim.)<br>";
    } elseif ($contraNovaV1 != $contraNovaV2) {
        unset($_POST['contraNovaV1']);
        unset($_POST['contraNovaV2']);
        $error .= "Error les CONTRASENYAS novas NO COINSIDEIX";

    } else {
        $nomUsuari = $_SESSION['usuari'];
        echo $nomUsuari;
        $contra = modelNickNameExisteixLogin($connexio, $nomUsuari);
        
        if(password_verify($contraActual, $contra)) {
            $hashPassword = password_hash($contraNovaV1, PASSWORD_DEFAULT);
            $canviContrasenya = modelCanviContrasenya($connexio, $nomUsuari, $hashPassword);

            if ($canviContrasenya === "ContrasenyaCanviada"){
                $error = "Contrasenya Actualitzada";
                unset($_POST['contrasenyaActual']);
                unset($_POST['contrasenyaNova1']);
                unset($_POST['contrasenyaNova2']);

            } else {
                $error = $canviContrasenya;
            }
        } else {
            $error = "La CONTRASENYA no es la del USUARI ";
        } 
    }

    return $error;
}

?>