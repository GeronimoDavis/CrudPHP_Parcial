<?php
namespace Entities;

require_once "../config/DB.php";

use Config\DB;
use PDO;
use PDOException;

class Tasks{
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

    public function getAll($idCategory){
        try{
            $query = "SELECT * FROM tasks WHERE categoryId = :cat";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":cat", $idCategory);
            $stmt->execute();

            $tasks = $stmt->fetchAll(PDO::FETCH_OBJ);

            return $tasks;
        }catch(PDOException $e){
            echo "Error get tasks: ". $e->getMessage();
        }
    }

    public function getById($idTask){
        try{
            $query = "SELECT * FROM tasks WHERE taskId = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $idTask);
            $stmt->execute();

            $task = $stmt->fetch(PDO::FETCH_OBJ);

            return $task;
        }catch(PDOException $e){
            echo "Error get task: ". $e->getMessage();
        }
    }

    public function count($idCat){
        try{
            $query = "SELECT COUNT(*) FROM tasks WHERE categoryId = :cat";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":cat", $idCat);
            $stmt->execute();
            
            $cant = $stmt->fetchColumn();
            return $cant;
            
        }catch(PDOException $e){
            echo "Error counting tasks: " . $e->getMessage();
            return 0;
        }
    }

    public function create(){
        try{
            $query = "INSERT INTO tasks (categoryId, title, description, finish, priority, state) VALUES (:cat, :title, :desc, :finish, :priority, :state)";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":cat", $this->categoryId);
            $stmt->bindParam(":title", $this->title);
            $stmt->bindParam(":desc", $this->description);
            $stmt->bindParam(":finish", $this->finish);
            $stmt->bindParam(":priority", $this->priority);
            $stmt->bindParam(":state", $this->state);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo "Error creating task: " . $e->getMessage();
            return false;
        }

    }

    public function update(){
        try{
            $query = "UPDATE tasks SET title = :title, description = :description, finish = :finish, priority = :priority, state = :state WHERE taskId = :id";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":title", $this->title);
            $stmt->bindParam(":description", $this->description);
            $stmt->bindParam(":finish", $this->finish);
            $stmt->bindParam(":priority", $this->priority);
            $stmt->bindParam(":state", $this->state);
            $stmt->bindParam(":id", $this->taskId);

            $stmt->execute();

        }catch(PDOException $e){
            echo "Error updating task: " . $e->getMessage();
        }
    }


}

?>