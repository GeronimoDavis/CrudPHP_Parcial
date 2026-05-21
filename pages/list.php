<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Parcial - Algoritmos y Estructuras de Datos II</title>
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
                <a class="navbar-brand" href="#">
                    Listado de Categorías
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <div class="container" style="width: 80%;">
            <div class="row">
                <div class="col-sm-12 mx-auto">
                    <table id="listTable" class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th style="text-align:center;">CATEGORÍA</th>    
                                <th style="text-align:center;">CANTIDAD TAREAS</th>
                                <th style="text-align:center;">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                             <?php
                                require_once "../controllers/categoriesController.php";
                                use Controllers\CategoryController;
                                
                                $cat = new CategoryController();
                                $categorias = $cat->getAllcategories();

                                foreach($categorias as $cate){
                                    echo "<tr>";
                                    echo "<td>". $cate->categoryId ."</td>";
                                    echo "<td style='text-align:center;'>". $cate->categoryName ."</td>";
                                    echo "<td style='text-align:center;'>12</td>";  
                                    echo "<td style='text-align:center;'>
                                            <a href='newtask.php?id=" . $cate->categoryId . "'>
                                                <button type='button' class='btn btn-primary btn-sm'>
                                                    <i class='fa fa-plus-circle' aria-hidden='true'></i>
                                                </button>
                                            </a>
                                        </td>";
                                    echo "</tr>";
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
        <div class="col"><hr></div>
    </div>
</div>
    </div>
</body>
</html>