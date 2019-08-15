<?php
session_start();
require_once("../private/config.php");
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = mysqli_connect(SERVER, USER, PW, DB);
    if (!$db) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }

    if (!isset($_POST["username"])) header("Location: index.php");
    $username = $_POST["username"];

    $password = $_POST["pwhash"];

    $stmt = $db->prepare("SELECT id, username, pwhash FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    // set parameters and execute
    $stmt->execute();
    $res=$stmt->get_result();
    $db->close();

    if($res->num_rows < 1) {
        echo "Bad Bad result";
    }
    //izņemam pirmo rindu
    $row=$res->fetch_assoc();

    var_dump($row);
    if (password_verify ($password , $row['pwhash'])){
        echo "You are logged in!";
        $_SESSION['id'] = $row['id'];
        $_SESSION['username'] = $username;
    }
    
    echo $username." is logged in! <hr>";
    // exit();
    // header("Location: todos.php");
    //parbaudīju vai dati tiek saņemti no db
    // echo $row['id'];
    // echo $row['username'];
    // echo $row['pwhash'];

}

?>