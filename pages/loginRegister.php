<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Parcial - Algoritmos y Estructuras de Datos II - Login</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>


    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <?php
                if(isset($_GET['action']) && $_GET['action'] === 'register') {
                    echo "<a class='navbar-brand' href='loginRegister.php'>
                    ¿Ya tiene cuenta? <strong>Inicie sesión</strong>
                </a>";
                } else {
                    echo "<a class='navbar-brand' href='loginRegister.php?action=register'>
                    ¿No tiene cuenta? <strong>Regístrese</strong>
                </a>";
                }
                ?>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <div class="container" style="width: 80%;">
            <div class="row justify-content-center mt-4">
                <div class="col-sm-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <?php 
                            if(isset($_GET['action']) && $_GET['action'] === 'register') {
                                echo "<h3 class='card-title text-center mb-4'>Regístrese</h3>";
                            } else {
                                echo "<h3 class='card-title text-center mb-4'>Iniciar Sesión</h3>";
                            }
                            ?>
                            
                            
                            <form action="../controllers/usersController.php" method="POST">
                                <?php 
                                    if(isset($_GET['action']) && $_GET['action'] === 'register') {
                                        echo "<input type='hidden' name='register'/>";
                                    }
                                ?>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control form-control-sm" id="username" name="username" placeholder="Ingrese usuario o email" aria-label="Usuario">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Ingrese contraseña" aria-label="Contraseña">
                                </div>
                                
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Entrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</body>
</html>
