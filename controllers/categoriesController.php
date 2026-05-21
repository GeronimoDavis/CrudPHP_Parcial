<?php 
    namespace Controllers;

    require_once "../config/DB.php";
    require_once "../entities/categories.php";

    use Config\DB;
    use Entities\Categories;


    class CategoryController{
        private $cat;

        public function __construct(){
            $db = new DB();
            $this->cat = new Categories($db->getConnection()); 
        }

        public function getAllcategories(){
            try{
                $categories = $this->cat->getAll();
                return $categories;
            }catch(PDOExeption $e){
                echo "Error al obtener las categorias" . $e->getMesagge();
            }
            
        }


    }



?>