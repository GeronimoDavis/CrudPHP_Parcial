<?php
namespace Controllers;

    require_once "../config/DB.php";
    require_once "../entities/task.php";

    use Config\DB;
    use Entities\Tasks;

    class TaskController{
        private $task;

        public function __construct(){
            $db = new DB();
            $this->task = new Tasks($db->getConnection());
        }

        public function countTasks($idCat){
            try{
                $cantTasks = $this->task->count($idCat);
                return $cantTasks;
            }catch(PDOException $e){
                echo "Error al obtener las categorias" . $e->getMessage();
                return $cantTasks;
            }
        } 

        public function getTasksByIdCategory($idCat){
            try{
                $tasks = $this->task->getAll($idCat);
                return $tasks;
            }catch(PDOException $e){
                echo "Error al obtener las categorias" . $e->getMessage();
            }
        }

        public function createTask(){
            $this->task->categoryId = $_POST['categoryId'];
            $this->task->title = $_POST['title'];
            $this->task->description = $_POST['description'];
            $this->task->finish = $_POST['finish'];
            $this->task->priority = $_POST['priority'];
            $this->task->state = $_POST['state'];

            if($this->task->create()){
                echo "Tarea creada exitosamente.";
            } else {
                echo "Error al crear la tarea.";
            }
        }

    }

    if(isset($_POST["action"]) && $_POST["action"] === "create"){
        $controller = new TaskController();
        $controller->createTask();
    }

?>