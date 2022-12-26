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


    if ($_POST['getCode'] === "getPosts") {
        $getPblmPostsSql = mysqli_query($connection, "SELECT * FROM problem_asked ORDER BY last_modified desc");
        $allPblmPosts = array();
        $output = "";
        if (mysqli_num_rows($getPblmPostsSql) > 0) {
            while ($row = mysqli_fetch_assoc($getPblmPostsSql)) {
                array_push($allPblmPosts, $row);
            }
            foreach ($allPblmPosts as $pblmDetail) {
                $pCourseTitle = mysqli_fetch_assoc(mysqli_query($connection, "SELECT course_title FROM course WHERE course.course_code = '{$pblmDetail['course_code']}'"));
                $output .= '
                
                    <div class="card">
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

                $output .= $userName['name'] . " </a>";
                $ftime = mysqli_fetch_assoc(mysqli_query($connection, "SELECT TIMEDIFF(CURRENT_TIMESTAMP(),'{$pblmDetail['last_modified']}') as difTime"));
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
}



?>