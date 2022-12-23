<?php

session_start();
include_once("config.php");

if (isset($_SESSION['user_id'])) {

    if (isset($_GET['deleteCode'])) {
        // echo "success";

        if ($_GET['deleteCode'] === "takenCourse") {
            $studentId = mysqli_escape_string($connection, $_SESSION['user_id']);
            $courseCode = mysqli_escape_string($connection, $_GET['course_code']);
            $sql1 = mysqli_query($connection, "DELETE FROM taken_courses 
                                                WHERE student_id = '{$studentId}' AND course_code = '{$courseCode}'");
            if ($sql1) {
                header("location: ../profile.php");
            }
        }
    }

}


?>