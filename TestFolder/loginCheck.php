<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") 

    if (empty($_POST["username"]) || empty($_POST["password"])) {
        header("Location: LoginCabreraFrance.php?error=empty");
        exit;
    }
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $valid_username = "user";
    $valid_password = "password";

    if($username === $valid_username && $password === $valid_password){
        $_SESSION['username'] = $username;
        header("Location: LoanCabreraFrance.php");
        exit;
    } else {
        echo "Username and Password does not match";
    }
} else {
    header("Location: LoginCabreraFrance.php");
    exit;
}
?>