<?php

$task = $_POST["task"];

$connection = mysqli_connect("localhost", "root", "", "tm_db");
mysqli_query($connection, "DELETE FROM Tasks WHERE `task` = '$task'");

?>
