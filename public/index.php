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
        <h2>ToDo list</h2>
        <div id="Date">Date?</div>
    </div>
    <form method="POST" action="db.php">
        <input type="text" name="task" class="task_input">
        <button type="submit" class="add_btn" name="submit">Add To Do</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>N</th>
                <th>Task</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_array($tasks)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td class="task"><?php echo $row['task']; ?></td>
                    <td class="delete">
                        <a href="#">X</a>
                    </td>
                </tr>
            <?php } ?>
            
        </tbody>
    </table>    

</body>
</html>