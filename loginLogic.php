<?php
session_start();
require_once "conn.php";

class LoginLogic{
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function login($email, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM account WHERE email = :un");
        $stmt->execute(["un" => $email]);
        $data = $stmt->fetch(PDO::FETCH_OBJ);

        if (!$data) {
            // User is not found
            header("location: retry_login.php"); 
            exit;
        }

        $hashed_password = $data->password;
        $email = $data->email;
        $name = $data->name;
        $surname = $data->surname; 
    

        if (password_verify($password, $hashed_password)) {
            // If the password is correct 
            $_SESSION["name"] = $name;
            $_SESSION["surname"] = $surname;
            header("location: logged_in_user.php"); 
            exit;   
        } else {
            // This is if the typed in password is incorrect
            header("location: retry_login.php"); 
            exit;
        }
    }
}

$email = strip_tags($_POST["email"]);
$password = strip_tags($_POST["password"]);
$loginLogic = new LoginLogic($conn);
$loginLogic->login($email, $password);
?>