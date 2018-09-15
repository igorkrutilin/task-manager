<?php

$task = $_POST["task"];

$connection = mysqli_connect("localhost", "root", "", "tm_db");
mysqli_query($connection, "INSERT INTO Tasks VALUES ('$task')");

$button = "<button>&#10004</button>";

$task = "<div class='task'>" . $task . " " . $button . "<br></div>";

echo $task;

?>
