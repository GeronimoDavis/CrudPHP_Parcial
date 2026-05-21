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
            }catch(PDOExeption $e){
                echo "Error al obtener las categorias" . $e->getMesagge();
                return $cantTasks;
            }
        }
    }

?>