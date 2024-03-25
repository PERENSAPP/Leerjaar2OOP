<?php
session_start();
// Retrieve data from POST request
$username = strip_tags($_POST["username"]);
$email = strip_tags($_POST["email"]);
$password = strip_tags($_POST["password"]);
$dob = strip_tags($_POST["dob"]);

class Database
{
    public $connection;
    public function __construct()
    {
        $dsn = "mysql:host=localhost;dbname=testdb;";
        $this->connection = new PDO($dsn);
    }
    public function query($query, $params = [])
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}

class Signup extends Database
{
    public function __construct()
    {
        parent::__construct(); // Call the parent class constructor
    }
    public function checkEmailExists($email)
    {
        $sql = "SELECT COUNT(*) AANTAL FROM account WHERE email = :email";
        $result = $this->query($sql, [':email' => $email]);
        return $result[0]['AANTAL'];
    }

    public function registerUser($name, $surname, $email, $password)
    {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 11]);
        $sql = "INSERT INTO account(name, surename, email, password) VALUES(:name, :surname, :email, :password)";
        $params = [
            ':name' => $name,
            ':surname' => $surname,
            ':email' => $email,
            ':password' => $hashed_password
        ];
        $this->query($sql, $params);
    }
}


// Create instance of Signup class
$signup = new Signup();

// Check if email already exists
$aantal = $signup->checkEmailExists($email);

if ($aantal == 1) {
    header("location: retry_register.php");
    exit();
} else {
    // Register user
    $signup->registerUser($username, $email, $password, $dob);
    header("Location: logged_in_user.php");
    exit();
}
?>