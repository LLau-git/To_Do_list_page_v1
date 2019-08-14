<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
    <link rel="stylesheet" href="../styles/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <script src="../scripts/main.js" defer></script>
    <title>ToDos</title>
</head>
<body>
    <div class="heading">
        <h1>ToDo list</h1>
        <div id="Date">
        </div>
    </div>
    <form method="POST" action="new_task.php">
        <input type="text" name="task" class="task_input">
        <button type="submit" class="add_btn" name="submit">Add To Do</button>
    </form>
    <ul id="to_do_list">
    <?php
    require_once("list_gen.php");
    getUpdate();
    ?>
    </ul> 
    

</body>
</html>