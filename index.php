<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Style/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Practica 4</title>
</head>
<body>
    <header>
        <!-- Enlace a la izquierda para "Home" -->
        <div class="home">
            <a href="./index.php">Home</a>
        </div>

        <!-- Título centrado -->
        <div class="title">
            <h1>Inici d'usuaris i registre de sessions</h1>
        </div>


        <div class="dropdown">
            <img src="https://via.placeholder.com/40" alt="Icono Perfil" class="profile-icon">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"> PERFIL </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="./Vista/login.php">Login</a></li>
                <li><a class="dropdown-item" href="./Vista/signUp.php">Sign Up</a></li>
            </ul>
        </div>

        <!-- Perfil desplegable a la derecha -->
        <div class="profile-dropdown">
            <button class="profile-btn">
                <img src="https://via.placeholder.com/40" alt="Icono Perfil" class="profile-icon">
                Perfil
            </button>
            <div class="dropdown-content">
                <a href="./Vista/login.php">Login</a>
                <a href="./Vista/signUp.php">Sign Up</a>
            </div>
        </div>
    </header>

    

    <div class="row row-cols-1 row-cols-md-4 g-5">
        <div class="col">
            <div class="card">
                <img src="https://yt3.googleusercontent.com/ytc/AIdro_nQDRMfNCBCUumCBMlgwAwrVCNYZPmI6wnUME9B5EmxYNY=s900-c-k-c0x00ffffff-no-rj" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"> TITULO DEL ARTICULO </h5>
                    <p class="card-text"> TEXTO DEL ARTICULO </p>
                    <a href="#" class="btn btn-primary"><i class="bi bi-trash3-fill"></i></a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col">    
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>