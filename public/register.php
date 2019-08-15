<?php
session_start();
require_once("../private/config.php");
// header("Location: lalala.php");
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = mysqli_connect(SERVER, USER, PW, DB);
    if (!$db) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    // header("Location: lalala.php");
    //TODO field validation from https://www.php.net/book.filter
    $username = $_POST["username"];

    $lastname = "";
    if (isset($_POST["lastname"])) $lastname = $_POST["lastname"];
    
    //TODo same for email
    $email = $_POST["email"];

 
    // if (isset($_POST['password'])) {
        if ($_POST["password"] === $_POST["password2"] ) {
            //ja match tad db ģenerejam passowrd hash vertību
            $pwhash = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $_SESSION['pwhash'] = $pwhash;
        } else {
            header("Location: register.php");
            exit();

    }; 
    // else {
    //     header("Location: tododo.php");
    // }; 
    // header("Location: lalala.php");

    
    $stmt = $db->prepare("INSERT INTO users (username, lastname, email, pwhash) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $lastname, $email, $pwhash);
    // set parameters and execute
    $stmt->execute();
    $db->close();
    echo "Creating new user";
    header("Location: todos.php");


}

?>

<!-- <form id="register" action="register.php" method="post">
        <h2>Register</h2>
        <div><input name="username" type="text" placeholder="username" required></div>
        <div><input name="lastname" type="text" placeholder="Last Name (optional)"></div>
        <div><input name="email" type="email" placeholder="Your email"></div>
        <div><input name="password" type="password" placeholder="password" required></div>
        <div><input name="password" type="password2" placeholder="password(repeat)" required></div>
        <button type="submit">Register</button>
</form> -->
