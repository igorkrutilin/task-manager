<?php

$task = $_GET["task"];

$connection = mysqli_connect("localhost", "root", "", "tm_db");
mysqli_query($connection, "DELETE FROM Tasks WHERE `task` = '$task'");
header("Location: index.php");

?>
