<?php

$task = $_POST["task"];

$connection = mysqli_connect("localhost", "root", "", "tm_db");
mysqli_query($connection, "INSERT INTO Tasks VALUES ('$task')");

$link = "deleting_handler.php?task=" . $task;
$button = "<button onClick='delete_task(" . '"' . $link . '"' . ")'>&#10004</button>";

$task = "<div class='task'>" . $task . " " . $button . "</div>";

echo $task;

?>
