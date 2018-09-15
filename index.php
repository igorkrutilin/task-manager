<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.1.5/css/iziToast.min.css">
        <link rel="stylesheet" href="style.css">
        <title>Task Manager</title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.1.5/js/iziToast.min.js" type="text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="script.js"></script>
    </head>
    <body>
        <div id="list">
            <h1>Current tasks:</h1>

            <?php
            $connection = mysqli_connect("localhost", "root", "", "tm_db");
            $request = mysqli_query($connection, "SELECT * FROM `Tasks`");
            while ($task = mysqli_fetch_assoc($request)) {
                $button = "<button>&#10004</button>";
                echo "<div class='task'>" . $task["Task"] . " " . $button . " <br></div>";
            }
            ?>
        </div>
        <br>
        <form id="form">
            <input id="task" type="text" placeholder="My task" name="task" autocomplete="off">
            <input type="submit" value="Add task">
        </form>
    </body>
</html>
