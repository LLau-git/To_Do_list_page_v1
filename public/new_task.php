<?php
    session_start();
    require_once("../private/config.php");
    $db = mysqli_connect(SERVER, USER, PW, DB);

    if (!$db) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    
    if (isset($_POST['submit'])) {
        $task = $_POST['task'];
        mysqli_query($db, "INSERT INTO tasks (task) VALUES ('$task')");
        header("location: todos.php");
    }

    $task = mysqli_query($db, "SELECT * FROM tasks");

    mysqli_close($db);

    //ieliktais
    if (isset($_SESSION["id"])) {
        $qry = "SELECT * FROM tasks WHERE uid = ".$_SESSION["id"].";"; 
        // printTable(getRows($qry), "mytablestyle");
    } 
    
    
    // require_once("../src/foot.php");
//ieliktais beidzas
    ?>