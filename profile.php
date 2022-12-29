<?php
session_start();
include_once 'php/config.php';

if (!isset($_SESSION['user_id'])) {
    header("location: login.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UIU PSP</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/profile.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Concert One' rel='stylesheet'>
</head>

<body>

    <?php
    $sql = mysqli_query($connection, "SELECT * FROM users WHERE student_id = '{$_SESSION['user_id']}'");
    if ($sql) {
        if (mysqli_num_rows($sql) > 0) {
            $user = mysqli_fetch_assoc($sql);
        }
    }
    $count = 0;
    ?>
    <div class="profile">
        <div class="profile-wrapper">

            <div class="top_bar">
                <nav class="navbar navbar-dark">
                    <div class="container-fluid px-4">
                        <div class="back-page">
                            <a href="index.php"><i class="fa fa-arrow-left"></i></a>
                            <a class="navbar-brand" style="color: #f50; margin-left: 20px" href="index.php">UIU PSP</a>
                        </div>

                        <nav class="navbar navbar-expand-sm">

                            <div class="">
                                <!-- Links -->
                                <ul class="navbar-nav align-items-center">

                                    <li class="nav-item me-1">
                                        <a class="nav-link qp_upload ques-upload-btn" href="#" data-bs-toggle="modal"
                                            data-bs-target="#quesitonPaperUpload">Q. PAPER UPLOAD</a>
                                    </li>
                                </ul>
                            </div>

                        </nav>

                    </div>
                </nav>
            </div>



            <div class="profile-container">

                <section class="first-sec">
                    <div class="profile-pic">
                        <img src="resources/profile-pic/<?php echo $user['img'] ?>" alt="">
                        <div class="user-info">
                            <h4>
                                <?php echo $user['name'] ?>
                            </h4>
                            <h6><?php echo $user['student_id'] ?></h6>
                            <h6>
                                <?php echo $user['email'] ?>
                            </h6>
                        </div>
                    </div>

                    <div class="edit-button">
                        <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                            data-bs-target="#edit">Edit</button>

                    </div>
                </section>


                <section class="user-progress">
                    <div class="all-progress-container">
                        <div class="p-container">
                            <div class="p-circular-progress" style="background-color: #002b6b;">
                                <div class="p-value-container">14</div>
                            </div>
                            <h6>Problem Asked</h6>
                        </div>

                        <div class="p-container">
                            <div class="p-circular-progress" style="background-color: #2d006b;">
                                <div class="p-value-container">18</div>
                            </div>
                            <h6>Answer Provided</h6>
                        </div>

                        <div class="p-container">
                            <div class="p-circular-progress" style="background-color: #a4cc04;">
                                <div class="p-value-container">8</div>
                            </div>
                            <h6>Question Paper Uploaded</h6>
                        </div>

                        <div class="p-container">
                            <div class="p-circular-progress" style="background-color: #d76903;">
                                <div class="p-value-container">14</div>
                            </div>
                            <h6>Rating</h6>
                        </div>
                    </div>
                </section>




                <section class="ind-user-course">
                    <div class="course-bar">
                        <h5>Taken <span>Courses</span> And <span>Question</span> Papers</h5>
                        <div class="menu">
                            <i class="fa fa-plus add-course-btn fs-4" data-bs-toggle="modal"
                                data-bs-target="#addCourse"></i>
                        </div>
                    </div>
                    <div class="course_container" id="accordion">

                        <?php
                        $courseSql = mysqli_query($connection, "SELECT student_id, course.course_code, course.course_title
                                                                FROM taken_courses, course WHERE student_id = '{$_SESSION['user_id']}' 
                                                                AND taken_courses.course_code = course.course_code");
                        $i = 0;
                        $allCourses = array();
                        while ($courses = mysqli_fetch_assoc($courseSql)) {

                            array_push($allCourses, $courses);
                            echo '
                            
                            <div class="courseDetail" style="height: min-content;">
                            <div class="card">
                                <div class="card-header">

                                    <div class="course-header">
                                        <div class="course-detail">
                                            <h5>' . ltrim($courses['course_title']) . '</h5>
                                            <h6>' . $courses['course_code'] . '</h6>
                                        </div>
                                        <div class="remove-option">
                                            <i class="fa fa-minus-circle" data-bs-toggle="modal"
                                                data-bs-target="#delete' . $i . '"></i>
                                        </div>
                                    </div>

                                    <a class="view-qp" data-bs-toggle="collapse" href="#collapse' . $i . '">
                                        <p> View Question papers </p>
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                </div>
                                <div id="collapse' . $i . '" class="collapse" data-bs-parent="#accordion">
                                    <div class="card-body">
                                        <div class="qp-pdf-continer">';


                            $qpFileSql = mysqli_query($connection, "SELECT ques_file,ques_type,trimester_id FROM question_paper WHERE course_code = '{$courses['course_code']}'");
                            $allQP = array();
                            while ($qps = mysqli_fetch_assoc($qpFileSql)) {
                                array_push($allQP, $qps);
                            }
                            if (count($allQP) > 0) {
                                echo '
                                <div class="mid">
                                <h5>MID</h5>
                                <ul>
                                ';
                                $x = 0;
                                foreach ($allQP as $qp) {
                                    if ($qp['ques_type'] == "Mid") {
                                        $x++;
                                        $tmstrCode = $qp['trimester_id'];
                                        // echo
                                        //     '
                                        //         <a href="resources/question-paper/' . $qp['ques_file'] . '"
                                        //                             download>' . $qp['ques_file'] . '</a>
                                        //         ';
                                        echo '
                                        <li>
                                            <p>';
                                        if (substr($tmstrCode, 2) == 1) {
                                            echo "Spring ";
                                        } else if (substr($tmstrCode, 2) == 2) {
                                            echo "Summer ";
                                        } else if (substr($tmstrCode, 2) == 3) {
                                            echo "Fall ";
                                        }
                                        echo '20' . substr($tmstrCode, 0, 2) . '</p>

                                            <div class="qp-links">
                                                <a href="#"><i class="fa fa-exclamation-circle"></i></a>
                                                <a href="resources/question-paper/' . $qp['ques_file'] . '" download>

                                                    <i class="fa fa-download"></i>
                                                </a>
                                            </div>
                                        </li>
                                        ';
                                    }
                                }
                                if ($x == 0) {
                                    echo '<p> No question paper available for Mid </p>';
                                }
                                echo '
                                </ul>
                                </div>
                                    <div class="final">
                                        <h5>FINAL</h5>
                                    <ul>
                                ';
                                $y = 0;
                                foreach ($allQP as $qp) {
                                    if ($qp['ques_type'] == "Final") {
                                        $y++;
                                        $tmstrCode = $qp['trimester_id'];

                                        echo '
                                        <li>
                                            <p>';
                                        if (substr($tmstrCode, 2) == 1) {
                                            echo "Spring";
                                        } else if (substr($tmstrCode, 2) == 2) {
                                            echo "Summer";
                                        } else if (substr($tmstrCode, 2) == 3) {
                                            echo "Fall";
                                        }
                                        echo ' 20' . substr($tmstrCode, 0, 2) . '</p>
                                            <div class="qp-links">
                                                <a href="#"><i class="fa fa-exclamation-circle"></i></a>
                                                <a href="resources/question-paper/' . $qp['ques_file'] . '" download>
                                                <i class="fa fa-download"></i>
                                                </a>
                                            </div>
                                        </li>
                                        ';
                                    }
                                }
                                if ($y == 0) {
                                    echo '<p> No question paper available for Final </p>';
                                }
                                echo
                                    '
                                    </ul>
                                    </div>
                                    ';
                            } else {

                                echo '
                                            <p class="unavailable-txt w-100">
                                                Question paper is not available yet.
                                            </p>
                                        ';
                            }



                            echo '
                                            </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            ';
                            $i++;
                            $count++;
                        }

                        ?>



                    </div>

                </section>







            </div>
        </div>
        <div class="user-db-footer">
            <p> Develeped by <span>Dynamic Spectacles</span> Team</p>
        </div>
    </div>




    <!-- ---------------------------- Model ---------------------------------- -->

    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit your profile
                        information
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="signup_form update-user-info-form" enctype="multipart/form-data" action="#">
                        <div class="form-floating mb-2">
                            <input type="text" name="name" value="<?php echo $user['name'] ?>" class="form-control"
                                id="floatingInput1" placeholder="Name" required>
                            <label for="floatingInput1">Name</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="tel" name="student_id" value="<?php echo $user['student_id'] ?>"
                                class="form-control" id="floatingInput2" placeholder="Student Id" required>
                            <label for="floatingInput2">Student Id</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="email" name="email" value="<?php echo $user['email'] ?>" class="form-control"
                                id="floatingInput3" placeholder="Email (University Provided)" required>
                            <label for="floatingInput3">Email (University Provided)</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" value="<?php echo $user['password'] ?>"
                                class="form-control" id="floatingPassword" placeholder="Password" required>
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="mt-2">
                            <label class="form-label text-dark" style="margin:0 0 0 1px;" for="profilePic">Enter your
                                profile picture (only png, jpg &
                                jpeg)</label>
                            <input type="file" name="profilePic" class="form-control" id="profilePic" placeholder="">
                        </div>
                        <br>

                        <!-- <div class="buttons">
                                            <button type="submit" class="btn btn-primary">Sign up</button>
                                            <a href="/Student_Hub/login.php" class="btn btn-success">Go back to Login</a>
                                        </div> -->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary update-user-info-btn">Save
                                changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



    <div class="modal fade" id="quesitonPaperUpload">
        <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Upload Question Paper</h4>
                    <button type="button" class="btn-close ques-upload-cancel-btn" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form class="quesionUploadFrom" enctype="multipart/form-data" action="#" autocomplete="off">
                        <div class="course-id-container mb-2">
                            <div class="form-floating course-id-automate">
                                <input type="text" name="course-code" class="form-control" id="courseCode"
                                    placeholder="Type a name here..." />
                                <label for="courseCode">Course Code</label>
                            </div>
                            <ul class="course-search-list pp-course-search-list"></ul>
                        </div>

                        <?php
                        $current_year = getdate()['year'];
                        echo
                            '<div class="mb-3">
                                            <p style="margin-bottom:0px;">Select Trimester</p>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="trimester-code"
                                                    id="inlineRadio1" value="' . substr($current_year, 2, 3) . '1">
                                                <label class="form-check-label" for="inlineRadio1">Spring ' . $current_year . '</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="trimester-code"
                                                    id="inlineRadio2" value="' . substr($current_year, 2, 3) . '2">
                                                <label class="form-check-label" for="inlineRadio2">Summer ' . $current_year . '</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="trimester-code"
                                                    id="inlineRadio3" value="' . substr($current_year, 2, 3) . '3">
                                                <label class="form-check-label" for="inlineRadio3">Fall ' . $current_year . '</label>
                                            </div>
                                            </div>';

                        ?>

                        <div class="mb-3">
                            <p style="margin-bottom:3px;">Question Paper Type</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="exam" id="midRadio" value="Mid">
                                <label class="form-check-label" for="midRadio">Mid</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="exam" id="finalRadio" value="Final">
                                <label class="form-check-label" for="finalRadio">Final</label>
                            </div>
                        </div>


                        <div class="mt-2">
                            <label class="form-label text-dark" style="margin:0 0 0 1px;" for="profilePic">Select
                                quesiton paper (only pdf)</label>
                            <input type="file" class="form-control" name="qpFile" id="questionFile" placeholder="">
                        </div>
                        <br>

                        <!-- <div class="buttons">
                                            <button type="submit" class="btn btn-primary">Sign up</button>
                                            <a href="/Student_Hub/login.php" class="btn btn-success">Go back to Login</a>
                                        </div> -->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary ques-upload-cancel-btn"
                                data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary qp-upload-btn">Upload
                                <i class="fa fa-angle-double-up"></i></button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>




    <?php

    for ($x = 0; $x < $count; $x++) {
        echo
            '
            <div class="modal fade" id="delete' . $x . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body" style="color: #000;">
                                                    Are you sure, you want to remove it?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    
                                                    <a href="php/delete.php?course_code=' . $allCourses[$x]['course_code'] . '&deleteCode=takenCourse' . '"
                                                        class="btn btn-danger">remove</a>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
            
                                        ';
    }

    ?>


    <div class="add-course-option">
        <div class="modal fade" id="addCourse" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Course</h1>
                        <button type="button" class="btn-close add-course-cancel-btn" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="course-submit-form" action="#" autocomplete="off">
                            <div class="course-id-container mb-2">
                                <div class="form-floating course-id-automate">
                                    <input type="text" class="form-control" name="course-code" id="courseId"
                                        placeholder="Type a name here..." required />
                                    <label for="courseId">Course Code</label>
                                </div>
                                <ul class="course-search-list CCcourse-search-list"></ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary  add-course-cancel-btn"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary course-submit-btn">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- =============================================================================================================== -->

    <script src="bootstrap/bootstrap.min.js"></script>




    <script src="javascript/profile.js"></script>
</body>

</html>