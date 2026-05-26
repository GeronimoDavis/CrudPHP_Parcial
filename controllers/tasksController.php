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

        public function getTaskById($idTask){
            try{
                $task = $this->task->getById($idTask);
                return $task;
            }catch(PDOException $e){
                echo "Error al obtener la tarea" . $e->getMessage();
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
                header("Location: ../pages/newtask.php?id=" . $this->task->categoryId);
            } else {
                echo "Error al crear la tarea.";
                header("Location: ../pages/newtask.php?id=" . $this->task->categoryId);
            }
        }

         public function updateTask(){
            $this->task->categoryId = $_POST['categoryId'];
            $this->task->title = $_POST['title'];
            $this->task->description = $_POST['description'];
            $this->task->finish = $_POST['finish'];
            $this->task->priority = $_POST['priority'];
            $this->task->state = $_POST['state'];

            if($this->task->update()){
                echo "Tarea actualizada exitosamente.";
                header("Location: ../pages/newtask.php?id=" . $this->task->categoryId);
            } else {
                echo "Error al actualizar la tarea.";
                header("Location: ../pages/newtask.php?id=" . $this->task->categoryId);

            }
        }

    }

    if(isset($_POST["action"]) && $_POST["action"] === "create"){
        $controller = new TaskController();
        $controller->createTask();
    }else if(isset($_POST["action"]) && $_POST["action"] === "update"){
        $controller = new TaskController();
        $controller->updateTask();
    }
    

?>