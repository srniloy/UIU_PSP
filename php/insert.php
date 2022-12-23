<?php

session_start();
include_once("config.php");

if (isset($_SESSION['user_id'])) {
    if (isset($_POST['insertCode'])) {
        // ========================================= Update/Add Course ======================================================


        if ($_POST['insertCode'] === "takenCourse") {
            $studentId = mysqli_escape_string($connection, $_SESSION['user_id']);
            $course = explode(" - ", $_POST['course-code']);
            $courseCode = mysqli_escape_string($connection, end($course));

            $sql1 = mysqli_query($connection, "SELECT course_code FROM taken_courses 
                                                WHERE student_id = '{$studentId}' AND course_code = '{$courseCode}'");
            if (mysqli_num_rows($sql1) > 0) {
                echo "you have already added this course";
            } else {
                $sql = mysqli_query($connection, "INSERT INTO taken_courses (student_id ,course_code) VALUES ('{$studentId}','{$courseCode}')");
                echo "success";
            }
        }


        if ($_POST['insertCode'] === "insertQP") {
            $studentId = mysqli_escape_string($connection, $_SESSION['user_id']);
            $course = explode(" - ", $_POST['course-code']);
            $courseCodeShort = explode("/", end($course));
            $qp_id = $_POST['trimester-code'] . "~" . $_POST['exam'] . "~" . str_replace(" ", "_", $courseCodeShort[0]);
            $courseCode = mysqli_escape_string($connection, end($course));
            $trimester = mysqli_escape_string($connection, $_POST['trimester-code']);
            $exam = mysqli_escape_string($connection, $_POST['exam']);


            if (!empty($trimester) && !empty($exam) && !empty($courseCode) && !empty($studentId)) {
                $sql = mysqli_query($connection, "SELECT * FROM question_paper WHERE qp_id = '{$qp_id}' AND error = 1");
                if (mysqli_num_rows($sql) > 0) {
                    echo "Question paper with this information is already exist";
                } else {
                    if (isset($_FILES['qpFile'])) {
                        $qp_name = $_FILES['qpFile']['name'];
                        $qp_type = $_FILES['qpFile']['type'];
                        $tmp_name = $_FILES['qpFile']['tmp_name'];
                        $qp_explode = explode('.', $qp_name);
                        $qp_ext = end($qp_explode);
                        if ($qp_ext == "pdf") {
                            $time = time();
                            $new_qp_name = $qp_id . "~" . $time . ".pdf";
                            if (move_uploaded_file($tmp_name, "../resources/question-paper/" . $new_qp_name)) {
                                $year = substr(getdate()['year'], 2, 4);
                                $trimesterCheckSql = mysqli_query($connection, "SELECT * FROM trimester WHERE trimester_id LIKE '{$year}%'");
                                if (mysqli_num_rows($trimesterCheckSql) > 0) {
                                    $qpUpSql = mysqli_query($connection, "INSERT INTO question_paper 
                                            (qp_id, course_code, trimester_id, ques_type,ques_file,error, uploader_id) VALUES
                                            ('{$qp_id}','{$courseCode}','{$trimester}','{$exam}','{$new_qp_name}', 1, '{$studentId}')");
                                    if ($qpUpSql) {
                                        echo "success";
                                    } else {
                                        echo "Something went wrong!";
                                    }
                                } else {
                                    // this will trimester code in every year
                                    $code = $year . "1";
                                    mysqli_query($connection, "INSERT INTO trimester (trimester_id , trimester_name) VALUES ('{$code}', 'Spring')");
                                    $code = $year . "2";
                                    mysqli_query($connection, "INSERT INTO trimester (trimester_id , trimester_name) VALUES ('{$code}', 'Summer')");
                                    $code = $year . "3";
                                    mysqli_query($connection, "INSERT INTO trimester (trimester_id , trimester_name) VALUES ('{$code}', 'Fall')");

                                    $qpUpSql = mysqli_query($connection, "INSERT INTO question_paper 
                                            (qp_id, course_code, trimester_id, ques_type,ques_file,error, uploader_id) VALUES
                                            ('{$qp_id}','{$courseCode}','{$trimester}','{$exam}','{$new_qp_name}', 1, '{$studentId}')");
                                    if ($qpUpSql) {
                                        echo "success";
                                    } else {
                                        echo "Something went wrong!";
                                    }
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