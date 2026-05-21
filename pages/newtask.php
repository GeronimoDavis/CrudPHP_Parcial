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
                    Listado de Tareas de la Categoría DBA
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <div class="container" style="width: 80%">
            <div class="row">
                <div class="col-sm-12 mx-auto">
                    <table id="listTable" class="table table-sm table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>TÍTULO</th>    
                                <th>INICIADA</th>
                                <th>PRIORIDAD</th>
                                <th>ESTADO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                require_once "../controllers/tasksController.php";
                                use Controllers\TaskController;

                                $idCat = $_GET["id"];

                                $task = new TaskController;
                                $tasks = $task->getTasksByIdCategory($idCat);
                            
                                foreach($tasks as $tas){
                                    echo "<tr>";
                                    echo "<td>". $tas->taskId ."</td>";
                                    echo "<td>". $tas->title."</td>"; 
                                    echo "<td>". $tas->start ."</td>";
                                    echo "<td>".$tas->priority."</td>";
                                    echo "<td>". $tas->state ."</td>";
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
             <form>
            <div class="row mb-3">
                <div class="col">
            <label class="form-label" for="responsible">TÍTULO</label>
            <input type="text" class="form-control form-control-sm" placeholder="Título de la tarea">
            </div>
            <div class="col">
                <label for="rangePriority" class="form-label">PRIORIDAD</label>
                <input type="range" class="form-range form-control-sm" min="1" max="10" step="1" id="rangePriority">
                </div>
            </div>  
            <div class="row mb-3">
                <div class="col">
                    <label for="description" class="form-label">DESCRIPCIÓN</label>
                    <textarea type="text" id="Nombre" class="form-control form-control-sm" placeholder="Descripción de la tarea" maxlength="255" aria-label="Descripción"></textarea>
                  </div>
            </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="expiration" class="form-label">FINALIZACIÓN</label>
                        <input type="date" id="expiration" class="form-control form-control-sm" aria-label="Vencimiento">
                      </div>
                      <div class="col form-group">
                        <label class="form-label">ESTADO</label>
                        <select class="form-control form-control-sm">
                            <option>PENDIENTE</option>
                            <option>FINALIZADA</option>
                            <option>VENCIDA</option>
                            <option>INCONCLUSA</option>
                        </select>
                        
                </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col text-center">
                          <button class="btn btn-primary">ACEPTAR</button>
                      </div>
                     </div>  
            </form>
</div>
    </div>
</body>
</html>