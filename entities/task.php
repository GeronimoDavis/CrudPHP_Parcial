<?php
namespace Entities;

require_once "../config/DB.php";

use use Config\DB;

class Task{
    private $conn;
    
    public $taskId;
    public $categoryId;
    public $title;
    public $description;
    public $start;
    public $finish;
    public $priority;
    public $state;

    public function __construct(PDO $db){
        $this->conn = $db;
    }

    public functios getAll(){
        try{
            $query = "SELECT * FROM tasks";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            tasks = $stmt->fetchAll(PDO::FETCH_OBJ);

            return tasks;
        }catch(PDOException $e){
            echo "Error get tasks: ". $e->getMessage();
        }
    }

    public function static coutnTasks($idCat){
        try{
            $query = "SELECT COUNT(*) FROM tasks WHERE "
        }
    }

}

?>