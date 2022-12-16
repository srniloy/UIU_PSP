<?php

session_start();
include_once "config.php";

$name = mysqli_real_escape_string($connection, $_POST['name']);
$id = mysqli_real_escape_string($connection, $_POST['student_id']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$password = mysqli_real_escape_string($connection, $_POST['password']);

if (!empty($name) && !empty($id) && !empty($email) && !empty($password)) {

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = mysqli_query($connection, "SELECT email FROM users WHERE email = '{$email}'");
        if (mysqli_num_rows($sql) > 0) {
            echo $email . " - This email already exist";
        } else {
            $sql2 = mysqli_query($connection, "INSERT INTO users(student_id,name,email,password) 
                                VALUES ('{$id}', '{$name}', '{$email}', '{$password}')");
            if ($sql2) {
                $sql3 = mysqli_query($connection, "SELECT student_id FROM users WHERE email = '{$email}'");
                if (mysqli_num_rows($sql3) > 0) {
                    $row = mysqli_fetch_assoc($sql3);
                    $_SESSION['user_id'] = $row['student_id'];
                    echo "success";
                }
            } else {
                echo "Something went wrong!";
            }
        }
    }
}
