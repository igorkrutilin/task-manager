<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.1.5/css/iziToast.min.css">
        <link rel="stylesheet" href="style.css">
        <title>Task Manager</title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.1.5/js/iziToast.min.js" type="text/javascript"></script>
        <script>

        function delete_task(link) {
            window.location = link;
        }

        function handle() {
            var task = document.getElementById("task").value;
        	for (var i = 0; i < task.length; i++) {
        		if (task[i] == "\"" || task[i] == "'") {
                    event.preventDefault();
        			iziToast.error({
        				title: "Error",
        				message: "You can't use ' or \" symbols",
        			});
                    document.getElementById("task").value = "";
                    return;
        		}
        	}
        }

        </script>
    </head>
    <body>
        <div id="list">
            <h1>Current tasks:</h1>

            <?php
            $connection = mysqli_connect("localhost", "root", "", "tm_db");
            $request = mysqli_query($connection, "SELECT * FROM `Tasks`");
            while ($task = mysqli_fetch_assoc($request)) {
                $link = "deleting_handler.php?task=" . $task["Task"];
                $button = "<button onClick='delete_task(" . '"' . $link . '"' . ")'>&#10004</button>";
                echo "<div class='task'>" . $task["Task"] . " " . $button . " </div><br>";
            }
            ?>

            <br>

            <form method="POST" action="adding_handler.php">
                <input id="task" type="text" placeholder="My task" name="task" autocomplete="off">
                <input type="submit" value="Add task" onclick="handle()">
            </form>
        </div>
    </body>
</html>
