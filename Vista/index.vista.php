<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./Style/index.css">
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

    <h1 style="text-align: center; margin-top: 25px;"><strong>ARTICLES</strong></h1>

    <div class="row row-cols-1 row-cols-md-4 g-5">
        <?php foreach ($articles as $article): ?>
            <div class="col">
                <div class="card">
                    <img src="" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $article['titol']; ?></h5>
                        <p class="card-text"> <?php echo $article['cos']; ?> </p>
                        <p class="card-text"> <?php echo $article['nickname']; ?> </p>
                        <a href="#" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>
                        <a href="#" class="btn btn-warning"><i class="bi bi-pen"></i></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?> 
    </div>

    º
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">

            <?php if($pagina == 1): ?>
			    <li class="page-item">Enrere</li>
    		<?php else: ?>
                <li class="page-item"> <a class="page-link" href="?pagina=<?php echo $pagina - 1 ?>">Enrere</a></li>
		    <?php endif; ?>

            <?php for($i = 1; $i <= $numeroPagines; $i++): ?>
                    <?php if ($pagina === $i): ?>
			    		<li class='page-item'><a clas='page-link' href='?pagina=<?php echo $i ?>'><?php echo $i ?></a></li>
				    <?php else: ?>
					    <li class='page-item disabled'><a clas='page-link' href='?pagina=<?php echo $i ?>'><?php echo $i ?></a></li>
    				<?php endif ?>
	    		
    	    <?php endfor ?>

            <?php if($pagina == $numeroPagines): ?>
	    		<li class="page-item disabled">Següent</li>
		    <?php else: ?>
                <li class="page-item"><a class="page-link" href="?pagina=<?php echo $pagina + 1 ?>">Següent</a></li>
		    <?php endif; ?>
        </ul>
    </nav>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>