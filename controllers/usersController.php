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

        public function loginUser(){
            $this->user->username = $_POST["username"];
            $this->user->password = $_POST["password"];

            $userData = $this->user->login();

            if($userData){
                $_SESSION["userId"] = $userData->userId;
                $_SESSION["username"] = $userData->username;
                header("Location: ../pages/list.php");
            }else{
                echo "<p>usuario o contraseña incorrectos</a>";
            }
        }

        public function logoutUser(){
            session_destroy();
            header("Location: ../pages/loginRegister.php");
        }

    }

    if(isset($_POST["register"])){
        $userController = new UserController();
        $userController->registerUser();
    }
    else if(isset($_GET["action"]) && $_GET["action"] === "logout"){
        $userController = new UserController();
        $userController->logoutUser();
    }
    else{
        $userController = new UserController();
        $userController->loginUser();
    }

?>

