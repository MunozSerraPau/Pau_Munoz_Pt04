<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>
    <link rel="stylesheet" href="../Style/signUp.css">
</head>
<body>
    <?php include '../Controlador/controladorUsuaris.php'; ?>


    <header>
        <!-- Enlace a la izquierda para "Home" -->
        <div class="home">
            <a href="../index.php">Home</a>
        </div>

        <!-- Título centrado -->
        <div class="title">
            <h1>Crear Usuari</h1>
        </div>

        <!-- Perfil desplegable a la derecha -->
        <div class="profile-dropdown">
            <button class="profile-btn">
                <img src="https://via.placeholder.com/40" alt="Icono Perfil" class="profile-icon">
                Perfil
            </button>
        </div>
    </header>

    <!-- Formulario de creación de cuenta -->
    <div class="signup-form-container">
        <form <?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>, method="POST" class="signup-form">
            <h2>Crea un compte</h2>
            <div class="form-group">
                <label for="firstname">Nom: </label>
                <input type="text" id="firstname" name="firstname" required>
            </div>
            <div class="form-group">
                <label for="lastname">Cognoms: </label>
                <input type="text" id="lastname" name="lastname" required>
            </div>
            <div class="form-group">
                <label for="email">Correu: </label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="nickname">Nom d'Usuari: </label>
                <input type="text" id="nickname" name="nickname" required>
            </div>
            <div class="form-group">
                <label for="birthdate">Data de naixement: </label>
                <input type="date" id="birthdate" name="birthdate" required>
            </div>
            <div class="form-group">
                <label for="password">Contrasenya: </label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirmar Contrasenya: </label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>
            
            <?php if (isset($error)): // Comprova si la variable "error" existeix ?> 
                <?php if (!empty($error) && $error != "Confirmat"): // Si hi ha un error que no sigui "Confirmat" entra ?>   
                    <p><?php echo $error // Mostra l'error que hi ha ?></p>
                <?php elseif ($error == "Confirmat"): // Si l'error és "Confirmat" ?>
                    <p><?php echo '✅ Inserit correctament!'; // Missatge de inserir amb èxit ?></p>
                <?php endif ?>                
            <?php endif ?>

            <br><br>

            <div class="form-group">
                <button type="submit" class="btn-submit" name="singup">CREAR COMPTE</button>
            </div>
            <p class="form-footer">Tens un compte? <a href="./login.php">Inicia Sessió</a></p>
        </form>
    </div>

</body>
</html>

