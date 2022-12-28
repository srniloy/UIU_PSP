<?php

session_start();
include_once("config.php");

if (isset($_SESSION['user_id'])) {
    if ($_POST['getCode'] === "t3t") {
        $sql = mysqli_query($connection, "SELECT * FROM course ORDER BY course_title");
        // $row = mysqli_fetch_assoc($sql);

        $all = array();
        for ($i = 0; $i < mysqli_num_rows($sql); $i++) {

            array_push($all, mysqli_fetch_assoc($sql));
        }
        echo json_encode($all);
    }


    if ($_POST['getCode'] === "getPosts") {
        $getPblmPostsSql = mysqli_query($connection, "SELECT * FROM problem_asked ORDER BY last_modified desc");
        $allPblmPosts = array();
        $output = "";
        if (mysqli_num_rows($getPblmPostsSql) > 0) {
            while ($row = mysqli_fetch_assoc($getPblmPostsSql)) {
                array_push($allPblmPosts, $row);
            }
            $output .= count($allPblmPosts) . "*#";
            foreach ($allPblmPosts as $pblmDetail) {
                $pCourseTitle = mysqli_fetch_assoc(mysqli_query($connection, "SELECT course_title FROM course WHERE course.course_code = '{$pblmDetail['course_code']}'"));
                $output .= '
                
                    <div class="card pblm-post-card">
                        <div class="card-body">
                            <a href="problem_panel.php?post_id=' . $pblmDetail['problem_id'] . '" class="card-title">
                                <h5>' . $pblmDetail['title'] . '</h5>
                            </a>
                            <p class="card-text">' . ((strlen($pblmDetail['description']) > 220) ? substr($pblmDetail['description'], 0, 220) . "..." : $pblmDetail['description']) . '</p>
                            <div class="related-topics">
                                <p>Related:</p>
                                <nav class="nav nav-pills nav-fill">
                                    <p class="nav-link disabled">' . $pCourseTitle['course_title'] . '</p>
                        
                                    <p class="nav-link disabled arrow"><i
                                            class="fa fa-long-arrow-right"></i></p>
                                    <p class="nav-link disabled ">' . $pblmDetail['topic_name'] . '</p>
                                </nav>
                            </div>
                            <div class="card-bar">
                                <nav class="nav nav-pills nav-fill">
                                    <p class="nav-link disabled">Solutions: 05</p>
                                    <p class="nav-link disabled">Likes: 19</p>
                                    <p class="nav-link disabled">Views: ' . $pblmDetail['views'] . '</p>
                                    <p class="card-text nav-link"><small class="text-muted">Posted by <a
                                                href="#">';
                $userName = mysqli_fetch_assoc(mysqli_query($connection, "SELECT name FROM users WHERE users.student_id = '{$pblmDetail['student_id']}'"));

                $output .= $userName['name'] . " </a> ";
                $ftime = mysqli_fetch_assoc(mysqli_query($connection, "SELECT TIMEDIFF(CURRENT_TIMESTAMP(),'{$pblmDetail['last_modified']}') as difTime"));
                $splitedTime = explode(":", $ftime['difTime']);
                if ($splitedTime[0] == "00" && $splitedTime[1] == "00") {
                    $output .= intval($splitedTime[2]) . "sec ago";
                } else if ($splitedTime[0] == "00" && $splitedTime[1] != "00") {
                    $output .= intval($splitedTime[1]) . "min ago";
                } else if (intval($splitedTime[0]) < 24) {
                    $output .= intval($splitedTime[0]) . "h ago";
                } else if (intval($splitedTime[0]) / 24 < 30) {
                    $output .= intval(intval($splitedTime[0]) / 24) . "d ago";
                } else {
                    $output .= intval((intval($splitedTime[0]) / 24) / 30) . "M ago";
                }

                $output .= '
                                                </small></p>
                                </nav>
                            </div>
                        </div>
                    </div>
                
                
                
                ';
            }
        }
        echo $output;
    }

    // =========================================== Get all Answer form database ====================================>


    if ($_POST['getCode'] === "getAnswers") {
        $current_pblm_id = $_SESSION['current_pblm_id'];
        $getAnswersSql = mysqli_query($connection, "SELECT * FROM answer WHERE problem_id = '{$current_pblm_id}' ORDER BY last_modified desc");
        $allAnswers = array();
        $output = "";
        $output .= mysqli_num_rows($getAnswersSql) . "*#";
        if (mysqli_num_rows($getAnswersSql) > 0) {
            while ($row = mysqli_fetch_assoc($getAnswersSql)) {
                array_push($allAnswers, $row);
            }


            foreach ($allAnswers as $ansDetail) {
                $userName = mysqli_fetch_assoc(mysqli_query($connection, "SELECT name,img FROM users WHERE users.student_id = '{$ansDetail['posted_by']}'"));

                $output .= '

                <div class="card-body individual-solution">
                        <!-- <h4 style="border-bottom: 1px solid #333; padding: 0 0 5px 10px;">#1</h4> -->
                        <div class="navbar-brand d-flex align-items-center" style="padding: 0 5px 10px 5px;">
                            <a href="profile.php">
                                <img src="resources/profile-pic/' . $userName['img'] . '" alt="Your Photo" style="width:35px;"
                                    class="rounded-pill me-2">
                            </a>
                            <div
                                style="display: flex; align-items: center; justify-content: space-between; width: 100%; border-bottom: 1px solid #333;">
                                <a href="profile.php">
                                    <h6 class="name" style="line-height: 40px; width:100%; margin: 0;">
                                        ' . $userName['name'] . '
                                    </h6>
                                </a>
                                <i class="fa fa-star-o p-1 fs-3"></i>
                            </div>
                        </div>
                        <div class="Solution-details">
                            <xmp class="card-text" style="max-width:100%; white-space:pre-wrap; padding: 10px 5px 0 5px; text-align: justify;"> ' . $ansDetail['description'] . '
                            </xmp>
                            <div class="images visually-hidden">
                                <img src="resources/prob-img/prob-img-1.png" alt="">
                                <img src="resources/prob-img/prob-img-2.png" alt="">
                                <img src="resources/prob-img/prob-img-3.png" alt="">
                            </div>
                        </div>
                        <div class="related-topics">
                            <div class="reward-option">
                                <ul class="nav nav-pills nav-fill">
                                    <li class="reward">
                                        <p>If your problem is solved by this answer, then you are requested to reward him by
                                            giving a star</p>
                                    </li>
                                    <li class="arrow"><i class="fa fa-long-arrow-right"></i></li>
                                    <li class="star"><i class="fa fa-star-o"></i></li>
                                </ul>
                            </div>
                            <div class="menu">
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                                    data-bs-target="#AnswerDelete">Delete</button>
                                <button type="button" class="btn btn-outline-primary visually-" data-bs-toggle="modal"
                                    data-bs-target="#AnswerEdit">Edit</button>
                            </div>

                            <div class="modal fade" id="AnswerDelete" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body" style="color: #000;">
                                            Are you sure, you want to delete it?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-danger">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="AnswerEdit" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Your Answer</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form class="signup_form" action="#" autocomplete="off">


                                                <div class="form-floating mb-3">
                                                    <input type="text" name="title" class="form-control" id="problemTitle"
                                                        placeholder="Name" required>
                                                    <label for="problemTitle">Title</label>
                                                </div>
                                                <div class="form-floating" style="overflow: hidden;">
                                                    <div class="cover"
                                                        style="border-radius: 5px;position: absolute; top: 0px; height: 20px; width: calc(100% - 2px); margin: 1px 1px 0; background-color: #fff; z-index: 10;">
                                                    </div>
                                                    <textarea class="form-control" placeholder="Leave a comment here"
                                                        id="floatingTextarea2" style="min-height: 100px;"></textarea>
                                                    <label for="floatingTextarea2" style="z-index: 100;">Description</label>
                                                </div>




                                                <div class="mt-2">
                                                    <label class="form-label text-dark" style="margin:0 0 0 1px;"
                                                        for="profilePic">Select the pictures/screenshots (only png, jpg,
                                                        jpeg)</label>
                                                    <input type="file" multiple class="form-control" id="profilePic"
                                                        placeholder="">
                                                </div>
                                                <br>

                                                <!-- <div class="buttons">
                                                <button type="submit" class="btn btn-primary">Sign up</button>
                                                <a href="/Student_Hub/login.php" class="btn btn-success">Go back to Login</a>
                                            </div> -->

                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn custom-btn-sec"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn custom-btn">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="count-bar">
                            <ul class="">
                                <li class="like">
                                    <i class="fa fa-thumbs-o-up"></i>
                                    19
                                </li>
                                <li class="dislike">
                                    <i class="fa fa-thumbs-o-down"></i>
                                    08
                                </li>
                            </ul>
                            <p><small class="text-muted">answered ';

                $ftime = mysqli_fetch_assoc(mysqli_query($connection, "SELECT TIMEDIFF(CURRENT_TIMESTAMP(),'{$ansDetail['last_modified']}') as difTime"));
                $splitedTime = explode(":", $ftime['difTime']);
                if ($splitedTime[0] == "00" && $splitedTime[1] == "00") {
                    $output .= intval($splitedTime[2]) . "sec ago";
                } else if ($splitedTime[0] == "00" && $splitedTime[1] != "00") {
                    $output .= intval($splitedTime[1]) . "min ago";
                } else if (intval($splitedTime[0]) < 24) {
                    $output .= intval($splitedTime[0]) . "h ago";
                } else if (intval($splitedTime[0]) / 24 < 30) {
                    $output .= intval($splitedTime[0]) / 24 . "days ago";
                } else {
                    $output .= (intval($splitedTime[0]) / 24) / 30 . "M ago";
                }




                $output .= '</small></p>
                        </div>
                        <div class="comment-section">
                            <div class="comment-texts answer-comments">
                                <p class="answer_id visually-hidden">' . $ansDetail['answer_id'] . '</p>
                                <div class="a-comments"></div>
                            </div>
                            <form action="#" class="comment-input answer-comment-form" autocomplete="off">
                                <input type="text" name="aCommentTxt" class="form-control" id="problem-comment"
                                    placeholder="Write a comment here..." required>
                                <button type="submit" class="answer-comment-submit-btn"><i class="fa fa-paper-plane"></i></button>
                            </form>
                        </div>


                    </div>


                ';
            }
        }
        echo $output;
    }

    // ====================================Getting All problem Comments form db ===========================>

    if ($_POST['getCode'] === "getPComment") {
        $sql = mysqli_query($connection, "SELECT * FROM p_comment WHERE problem_id = '{$_SESSION['current_pblm_id']}' ORDER BY last_modified");

        $output = mysqli_num_rows($sql) . "*#";
        if (mysqli_num_rows($sql) == 0) {
            $output .= "empty";
            echo $output;
        }
        for ($i = 0; $i < mysqli_num_rows($sql); $i++) {
            $row = mysqli_fetch_assoc($sql);
            $userName = mysqli_fetch_assoc(mysqli_query($connection, "SELECT name FROM users WHERE users.student_id = '{$row['student_id']}'"));

            $output .= '
            <p class="individual-comment">' . $row['comment_text'] . '<small class="commented-by"> - <a href="#">' . $userName['name'] . '</a> ';
            $ftime = mysqli_fetch_assoc(mysqli_query($connection, "SELECT TIMEDIFF(CURRENT_TIMESTAMP(),'{$row['last_modified']}') as difTime"));
            $splitedTime = explode(":", $ftime['difTime']);
            if ($splitedTime[0] == "00" && $splitedTime[1] == "00") {
                $output .= intval($splitedTime[2]) . "sec ago";
            } else if ($splitedTime[0] == "00" && $splitedTime[1] != "00") {
                $output .= intval($splitedTime[1]) . "min ago";
            } else if (intval($splitedTime[0]) < 24) {
                $output .= intval($splitedTime[0]) . "h ago";
            } else if (intval($splitedTime[0]) / 24 < 30) {
                $output .= intval(intval($splitedTime[0]) / 24) . "days ago";
            } else {
                $output .= intval((intval($splitedTime[0]) / 24) / 30) . "M ago";
            }

            $output .= '</small></p>';
        }
        echo $output;
    }

    // ====================================Getting All Answer Comments form db ===========================>

    if ($_POST['getCode'] === "getAComment") {
        $sql = mysqli_query($connection, "SELECT * FROM a_comment WHERE answer_id = '{$_POST['answer_id']}' ORDER BY last_modified");

        $output = mysqli_num_rows($sql) . "*#";
        if (mysqli_num_rows($sql) == 0) {
            $output .= "empty";
            echo $output;
        }
        for ($i = 0; $i < mysqli_num_rows($sql); $i++) {
            $row = mysqli_fetch_assoc($sql);
            $userName = mysqli_fetch_assoc(mysqli_query($connection, "SELECT name FROM users WHERE users.student_id = '{$row['student_id']}'"));

            $output .= '
                            <p class="individual-comment">' . $row['comment_text'] . '<small class="commented-by"> - <a href="#">' . $userName['name'] . '</a> ';
            $ftime = mysqli_fetch_assoc(mysqli_query($connection, "SELECT TIMEDIFF(CURRENT_TIMESTAMP(),'{$row['last_modified']}') as difTime"));
            $splitedTime = explode(":", $ftime['difTime']);
            if ($splitedTime[0] == "00" && $splitedTime[1] == "00") {
                $output .= intval($splitedTime[2]) . "sec ago";
            } else if ($splitedTime[0] == "00" && $splitedTime[1] != "00") {
                $output .= intval($splitedTime[1]) . "min ago";
            } else if (intval($splitedTime[0]) < 24) {
                $output .= intval($splitedTime[0]) . "h ago";
            } else if (intval($splitedTime[0]) / 24 < 30) {
                $output .= intval(intval($splitedTime[0]) / 24) . "days ago";
            } else {
                $output .= intval((intval($splitedTime[0]) / 24) / 30) . "M ago";
            }

            $output .= '</small></p>';
        }
        echo $output;



    }




}



?>