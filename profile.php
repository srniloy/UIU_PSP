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
    ?>
    <div class="profile">
        <div class="profile-container">
            <div class="back-page">
                <a href="index.php"><i class="fa fa-arrow-left"></i></a>
            </div>
            <section class="first-sec">
                <div class="profile-pic">
                    <img src="resources/profile-pic/<?php echo $user['img'] ?>" alt="">
                </div>
                <div class="user-info">
                    <h4><?php echo $user['name'] ?></h4>
                    <h6><?php echo $user['student_id'] ?></h6>
                    <h6><?php echo $user['email'] ?></h6>
                </div>
                <div class="edit-button">
                    <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                        data-bs-target="#edit">Edit</button>
                    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit your profile information
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="signup_form update-user-info-form" enctype="multipart/form-data"
                                        action="#">
                                        <div class="form-floating mb-2">
                                            <input type="text" name="name" value="<?php echo $user['name'] ?>"
                                                class="form-control" id="floatingInput1" placeholder="Name" required>
                                            <label for="floatingInput1">Name</label>
                                        </div>
                                        <div class="form-floating mb-2">
                                            <input type="tel" name="student_id"
                                                value="<?php echo $user['student_id'] ?>" class="form-control"
                                                id="floatingInput2" placeholder="Student Id" required>
                                            <label for="floatingInput2">Student Id</label>
                                        </div>
                                        <div class="form-floating mb-2">
                                            <input type="email" name="email" value="<?php echo $user['email'] ?>"
                                                class="form-control" id="floatingInput3"
                                                placeholder="Email (University Provided)" required>
                                            <label for="floatingInput3">Email (University Provided)</label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="password" name="password"
                                                value="<?php echo $user['password'] ?>" class="form-control"
                                                id="floatingPassword" placeholder="Password" required>
                                            <label for="floatingPassword">Password</label>
                                        </div>
                                        <div class="mt-2">
                                            <label class="form-label text-dark" style="margin:0 0 0 1px;"
                                                for="profilePic">Enter your profile picture (only png, jpg &
                                                jpeg)</label>
                                            <input type="file" name="profilePic" class="form-control" id="profilePic"
                                                placeholder="">
                                        </div>
                                        <br>

                                        <!-- <div class="buttons">
                                            <button type="submit" class="btn btn-primary">Sign up</button>
                                            <a href="/Student_Hub/login.php" class="btn btn-success">Go back to Login</a>
                                        </div> -->

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary update-user-info-btn">Save
                                                changes</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="second-sec">
                <div class="user-activity">
                    <nav class="nav nav-pills nav-fill">
                        <p class="nav-link disabled">Question asked: 05</p>
                        <p class="nav-link disabled">Problem solved: 00</p>
                    </nav>
                </div>
                <div class="taken-course">
                    <div class="add-course-option">
                        <div class="modal fade" id="addCourse" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Course</h1>
                                        <button type="button" class="btn-close add-course-cancel-btn"
                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="course-submit-form" action="#" autocomplete="off">
                                            <div class="course-id-container mb-2">
                                                <div class="form-floating course-id-automate">
                                                    <input type="text" class="form-control" name="course-code"
                                                        id="courseId" placeholder="Type a name here..." required />
                                                    <label for="courseId">Course Code</label>
                                                </div>
                                                <ul class="course-search-list"></ul>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary  add-course-cancel-btn"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button"
                                                    class="btn btn-primary course-submit-btn">Add</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="show-courses">
                        <div class="course-bar">
                            <h6>Taken Courses</h6>
                            <div class="menu">
                                <i class="fa fa-plus add-course-btn" data-bs-toggle="modal"
                                    data-bs-target="#addCourse"></i>

                            </div>
                        </div>
                        <p class="default-text visually-hidden">You do not added any courses yet</p>

                        <ul class="">
                            <?php
                            $courseSql = mysqli_query($connection, "SELECT student_id, course.course_code, course.course_title
                                                                FROM taken_courses, course WHERE student_id = '{$_SESSION['user_id']}' 
                                                                AND taken_courses.course_code = course.course_code");
                            $i = 0;
                            while ($courses = mysqli_fetch_assoc($courseSql)) {
                                echo
                                    '
                                    <li>
                                        <p>' . ltrim($courses['course_title']) . ' (' . $courses['course_code'] . ') </p>
                                        <i class="fa fa-minus-circle" data-bs-toggle="modal" data-bs-target="#delete' . $i . '"></i>
                                    
                                        <div class="modal fade" id="delete' . $i . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body" style="color: #000;">
                                                    Are you sure, you want to remove it?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <a href="php/delete.php?course_code=' . $courses['course_code'] . '&deleteCode=takenCourse' . '"
                                                        class="btn btn-danger">remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    ';
                                $i++;
                            }

                            ?>


                        </ul>
                    </div>
                </div>
            </section>

            <section class="third-sec">
                <div class="show-questions">
                    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <!-- <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                                aria-label="Slide 3"></button> -->




                            <?php

                            $courseSql = mysqli_query($connection, "SELECT student_id, course.course_code, course.course_title
                                                                        FROM taken_courses, course WHERE student_id = '{$_SESSION['user_id']}' 
                                                                        AND taken_courses.course_code = course.course_code");
                            for ($i = 0; $i < mysqli_num_rows($courseSql); $i++) {
                                echo
                                    '
                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="' . ($i) . '"
                                ' . (($i == 0) ? 'class="active"' : "") . ' aria-current="true" aria-label="Slide ' . ($i) . '"></button>
                                ';
                            }
                            echo
                                '
                                </div>
                                <div class="carousel-inner">
                                
                                ';
                            $i = 0;
                            $allCourses = array();
                            while ($course = mysqli_fetch_assoc($courseSql)) {
                                array_push($allCourses, $course);
                            }
                            if (count($allCourses) > 0) {
                                foreach ($allCourses as $courses) {
                                    echo
                                        '
                                            <div class="carousel-item ' . (($i == 0) ? "active" : "") . '" data-bs-interval="4000">
    
    
                                                <div class="question-view">
                                                    <h5>' . $courses['course_title'] . ' (' . $courses['course_code'] . ') </h5>
                                        ';

                                    $qpFileSql = mysqli_query($connection, "SELECT ques_file,ques_type FROM question_paper WHERE course_code = '{$courses['course_code']}'");
                                    $allQP = array();
                                    while ($qps = mysqli_fetch_assoc($qpFileSql)) {
                                        array_push($allQP, $qps);
                                    }
                                    if (count($allQP) > 0) {
                                        echo '
                                                    <div class="question-set">
                                                        <div class="questions ct">
                                                            <h6>Mid Questions</h6>
                                                            <div class="q-list">
                                        ';
                                        $x = 0;
                                        foreach ($allQP as $qp) {
                                            if ($qp['ques_type'] == "Mid") {
                                                $x++;
                                                echo
                                                    '
                                                <a href="resources/question-paper/' . $qp['ques_file'] . '"
                                                                    download>' . $qp['ques_file'] . '</a>
                                                ';
                                            }
                                        }
                                        if ($x == 0) {
                                            echo '<p> No question paper available for Mid';
                                        }
                                        echo '</div>
                                                        </div>
                                                        <div class="questions final">
                                                            <h6>Final Questions</h6>
                                                            <div class="q-list">
                                        ';
                                        $y = 0;
                                        foreach ($allQP as $qp) {
                                            if ($qp['ques_type'] == "Final") {
                                                $y++;
                                                echo
                                                    '
                                                <a href="resources/question-paper/' . $qp['ques_file'] . '"
                                                                    download>' . $qp['ques_file'] . '</a>
                                                ';
                                            }
                                        }
                                        if ($y == 0) {
                                            echo '<p> No question paper available for Final';
                                        }
                                        echo
                                            '
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
    
                                            </div>
    
                                            ';
                                    } else {

                                        echo '
                                            <p class="unavailable-txt">
                                                Question paper of ' . $courses['course_title'] . ' (' . $courses['course_code'] . ') is not available yet.
                                            </p>
                                            </div>
                                            </div>
                                        ';
                                    }

                                    $i++;
                                }
                            } else {
                                echo '
                                <div class="carousel-item active" data-bs-interval="2000">
                                    <div class="question-view">
                                        <h5>There is no course added yet to show corresponding question papers</h5>
                                    </div>
                                </div>
                                ';
                            }

                            ?>


                            <!-- <div class="carousel-item" data-bs-interval="2000">


                                <div class="question-view">
                                    <h5>Data Structure and Algorithm (CSE2217)</h5>
                                    <p class="unavailable-txt visibility-hide">
                                        Question paper of Data structure and Algorithm course is not available yet.
                                    </p>
                                    <div class="question-set">
                                        <div class="questions ct">
                                            <h6>Mid Questions</h6>
                                            <div class="q-list">
                                                <a href="/php/question_papers/213_CSE_2217_Mid_Question.pdf" class=""
                                                    download>summer 2022.pdf</a>
                                                <a href="#" class="">spring 2022.pdf</a>
                                                <a href="#" class="">fall 2022.pdf</a>
                                                <a href="#" class="">fall 2022.pdf</a>
                                                <a href="#" class="">fall 2022.pdf</a>
                                                <a href="#" class="">fall 2022.pdf</a>
                                                <a href="#" class="">fall 2022.pdf</a>
                                                <a href="#" class="">fall 2022.pdf</a>
                                                <a href="#" class="">fall 2022.pdf</a>
                                                <a href="#" class="">fall 2022.pdf</a>
                                            </div>
                                        </div>
                                        <div class="questions final">
                                            <h6>Final Questions</h6>
                                            <div class="q-list">
                                                <a href="/php/question_papers/171_CSI_227_Final_Question.pdf" class=""
                                                    download>summer 2022.pdf</a>
                                                <a href="#" class="">spring 2022.pdf</a>
                                                <a href="#" class="">fall 2022.pdf</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div> -->
                            <!-- <div class="carousel-item">


                                <div class="question-view">
                                    <h5>Data Structure and Algorithm (CSE2217)</h5>
                                    <p class="unavailable-txt">
                                        Question paper of Data structure and Algorithm course is not available yet.
                                    </p>
                                    <div class="question-set visibility-hide">
                                        <div class="questions ct">
                                            <h6>Mid Questions</h6>
                                            <div class="q-list">
                                                <a href="/php/question_papers/213_CSE_2217_Mid_Question.pdf" class=""
                                                    download>summer 2022.pdf</a>
                                                <a href="#" class="">spring 2022.pdf</a>
                                                <a href="#" class="">fall 2022.pdf</a>
                                                <a href="#" class="">fall 2022.pdf</a>
                                                <a href="#" class="">fall 2022.pdf</a>
                                                <a href="#" class="">fall 2022.pdf</a>
                                                <a href="#" class="">fall 2022.pdf</a>
                                                <a href="#" class="">fall 2022.pdf</a>
                                                <a href="#" class="">fall 2022.pdf</a>
                                                <a href="#" class="">fall 2022.pdf</a>
                                            </div>
                                        </div>
                                        <div class="questions final">
                                            <h6>Final Questions</h6>
                                            <div class="btn-group-vertical q-list">
                                                <a href="/php/question_papers/171_CSI_227_Final_Question.pdf" class=""
                                                    download>summer 2022.pdf</a>
                                                <a href="#" class="">spring 2022.pdf</a>
                                                <a href="#" class="">fall 2022.pdf</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div> -->
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </section>
        </div>
    </div>



    <script src="bootstrap/bootstrap.min.js"></script>




    <script src="javascript/profile.js"></script>
</body>

</html>