<?php
    // $conn = mysqli_connect("localhost", "root", "", "todo");
    require_once("../private/config.php");
    $conn = mysqli_connect(SERVER, USER, PW, DB);
    
    // $conn = mysqli_connect("127.0.0.1","root", "", "music2019");
 
    if (!$conn) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    
    echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
    echo "Host information: " . mysqli_get_host_info($conn) . PHP_EOL;
    
    // izprintēs visu no datubāzes;
    // $sql = "SELECT * FROM tasks";
    // $result = $conn->query($sql);

    // $mydata = $result->fetch_all(MYSQLI_ASSOC);
    // foreach ($mydata as $key => $value) {
    //     echo "KEY:$key :";
    //     var_dump($value);
    //     echo "<hr>";
    // }

    // izprintēs KO NORĀDAM  no datubāzes;
    $sql = "SELECT * FROM tasks";
    $result = $conn->query($sql);

    $mydata = $result->fetch_all(MYSQLI_ASSOC);
    mysqli_close($conn);
    foreach ($mydata as $key => $row) {
        echo "ROW:$key :";
        // var_dump($value);
        echo $row['task'];
        echo "<hr>";
        // BR mums ir definets config.php, ko varam 
        //lietot tikai ar echo. liek atstarpes starp rindām
        echo BR;
    }
    // izprintēs mūsu norādītās vērtības 
    // $sql = "SELECT * FROM tasks";
    // $result = $conn->query($sql);

    // if ($result->num_rows > 0) {
    //     while($row = $result->fetch_assoc()) {
    //         echo "id: " . $row["id"]. " - Task: " . $row["task"]. "<br>";
    //     }
    //     echo "<hr>";
    // } else {
    //     echo "0 results";
    // }

    // mysqli_close($conn);
    // ?>