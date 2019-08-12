<?php
    // $conn = mysqli_connect("localhost", "root", "", "todo");
    require_once("../private/config.php");
    $db = mysqli_connect(SERVER, USER, PW, DB);
     
    
    if (isset($_POST['submit'])) {
        $task = $_POST['task'];
        mysqli_query($db, "INSERT INTO tasks (task) VALUES ('$task')");
        header('location:index.php');
    }

    $task = mysqli_query($db, "SELECT * FROM tasks");

    mysqli_close($conn);
    ?>