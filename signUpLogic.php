<?php
session_start();
// Retrieve data from POST request
$name = strip_tags($_POST["name"]);
$surname = strip_tags($_POST["surname"]);
$email = strip_tags($_POST["email"]);
$password = strip_tags($_POST["password"]);

class Database
{
    public $connection;
    public function __construct()
    {
        $dsn = "mysql:host=localhost;dbname=evke_books;";
        $password = "";
        $username = "root";
        try {
            $this->connection = new PDO($dsn,$password,$username);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed:" . $e->getMessage();
            exit();
        }
    }
    public function query($query, $params = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
            exit();
        }
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
        $sql = "SELECT COUNT(*) AS AANTAL FROM account WHERE email = :email";
        $result = $this->query($sql, [':email' => $email]);
        return $result[0]['AANTAL'];
    }

    public function registerUser($name, $surname, $email, $password)
    {
        // Check if the email ends with "@tcrmbo.nl"
        if (!preg_match('/@tcrmbo\.nl$/', $email)) {
            // Redirect the user or display an error message ________ ADD retry page or another way to redirect people
            header("location: invalid_email.php");
            exit();
        }
        $hashed_password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 11]);
        $sql = "INSERT INTO account(name, surname, email, password) VALUES(:name, :surname, :email, :password)";
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
    $signup->registerUser($name, $surname, $email, $password);
    header("Location: logged_in_user.php");
    exit();
}
?>