<?php

session_start();
include_once("config.php");

if (isset($_SESSION['user_id'])) {
    if ($_POST['getCode'] === "t3t") {
        $sql = mysqli_query($connection, "SELECT * FROM course ORDER BY course_title");
        $row = mysqli_fetch_assoc($sql);

        $all = [];
        for ($i = 1; $i < mysqli_num_rows($sql); $i++) {

            array_push($all, mysqli_fetch_assoc($sql));
        }
        echo json_encode($all);
    }
}



?>