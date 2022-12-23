<?php

session_start();
include_once("config.php");

if (isset($_SESSION['user_id'])) {
    if (isset($_POST['updateCode'])) {


        if ($_POST['updateCode'] === "updateProfile") {

            // echo $_POST['name'];

            $name = mysqli_real_escape_string($connection, $_POST['name']);
            $id = mysqli_real_escape_string($connection, $_POST['student_id']);
            $email = mysqli_real_escape_string($connection, $_POST['email']);
            $password = mysqli_real_escape_string($connection, $_POST['password']);

            if (!empty($name) && !empty($id) && !empty($email) && !empty($password)) {

                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $sql = mysqli_query($connection, "SELECT email FROM users WHERE email = '{$email}' AND student_id != '{$_SESSION['user_id']}'");
                    if (mysqli_num_rows($sql) > 0) {
                        echo $email . " - This email already exist";
                    } else {

                        if (isset($_FILES['profilePic'])) {
                            $img_name = $_FILES['profilePic']['name'];
                            $img_type = $_FILES['profilePic']['type'];
                            $tmp_name = $_FILES['profilePic']['tmp_name'];

                            $img_explode = explode('.', $img_name);
                            $img_ext = end($img_explode);

                            $extentions = ['png', 'jpeg', 'jpg'];
                            if (in_array($img_ext, $extentions, true) === true) {
                                $time = time();
                                $new_img_name = $time . $img_name;
                                if (move_uploaded_file($tmp_name, "../resources/profile-pic/" . $new_img_name)) {
                                    $sql2 = mysqli_query(
                                        $connection,
                                        "UPDATE users
                                    SET student_id = '{$id}',
                                    name = '{$name}',
                                    email = '{$email}',
                                    password = '{$password}',
                                    img = '{$new_img_name}'
                                    WHERE student_id = '{$_SESSION['user_id']}'"
                                    );
                                    if ($sql2) {
                                        echo "success";
                                    } else {
                                        echo "Something went wrong!";
                                    }
                                }
                            } else {
                                $sql2 = mysqli_query(
                                    $connection,
                                    "UPDATE users
                                SET student_id = '{$id}',
                                name = '{$name}',
                                email = '{$email}',
                                password = '{$password}'
                                WHERE student_id = '{$_SESSION['user_id']}'"
                                );
                                if ($sql2) {
                                    echo "success";
                                }
                            }
                        }
                    }
                }
            }

        }



    }

}


?>