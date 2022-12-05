<?php

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
            echo "here";
            $sql2 = mysqli_query($connection, "INSERT INTO users(student_id,name,email,password) VALUES
                                ('{$id}', '{$name}', '{$email}', '{$password}')");

        }
    }
}

?>