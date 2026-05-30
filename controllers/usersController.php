<?php 
    namespace Controllers;

    session_start();

    require_once "../config/DB.php";
    require_once "../entities/user.php";

    use Config\DB;
    use Entities\User;

    class UserController {
        private $user;

        public function __construct(){
            $db = new DB();
            $this->user = new User($db->getConnection());
        }

        public function registerUser(){
            $this->user->username = $_POST["username"];
            $this->user->password = $_POST["password"];

            if($this->user->register()){
                echo "<p>usuario registrado</a>";
            }else{
                echo "<p>usuario no registrado error</a>";
            }

            
        }



    }

    if(isset($_POST["register"])){
        $userController = new UserController();
        $userController->registerUser();
    }

?>

