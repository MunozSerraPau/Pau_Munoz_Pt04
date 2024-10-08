<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="stylesheet" href="../Style/login.css">
</head>
<body>

    <header>
        <!-- Enlace a la izquierda para "Home" -->
        <div class="home">
            <a href="../index.php">Home</a>
        </div>

        <!-- Título centrado -->
        <div class="title">
            <h1>Inici de Sessions</h1>
        </div>

        <!-- Perfil desplegable a la derecha -->
        <div class="profile-dropdown">
            <button class="profile-btn">
                <img src="https://via.placeholder.com/40" alt="Icono Perfil" class="profile-icon">
                Perfil
            </button>
        </div>
    </header>

    <!-- Formulario de inicio de sesión -->
    <div class="login-form-container">
        <form action="login.php" method="POST" class="login-form">
            <h2>Iniciar sesión</h2>
            <div class="form-group">
                <label for="username">Usuario</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required>
            </div>
            <p class="form-footer">Has oblidat la contrasenya? <a href="#">Recuperar</a></p> <br>
            <div class="form-group">
                <button type="submit" class="btn-submit">Iniciar sesión</button>
            </div>
            <p class="form-footer">No tens un compte? <a href="./signUp.php">Regístrate</a></p>
        </form>
    </div>

</body>
</html>
