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
    <title>UIU Student Hub</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Concert One' rel='stylesheet'>
</head>

<body>

    <?php
    $sql = mysqli_query($connection, "SELECT * FROM users WHERE student_id = '{$_SESSION['user_id']}'");
    if ($sql) {
        if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
        }
    }
    ?>

    <div class="user_dashboard">
        <div class="top_bar">
            <nav class="navbar navbar-dark bg-dark ">
                <div class="container-fluid">
                    <a class="navbar-brand" style="color: #f50;" href="#">UIU PSP</a>


                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                        <span class="navbar-toggler-icon" style="font-size: 1.8rem;"></span>
                    </button>
                    <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Profile</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <li class="nav-item">
                                    <a class="navbar-brand d-flex align-items-center" href="profile.php">
                                        <img src="resources/avater.png" alt="Your Photo" style="width:40px;" class="rounded-pill me-3">
                                        <h5 class="name" style="line-height: 40px; margin: 0;">
                                            <?php echo $row['name'] ?>
                                        </h5>
                                    </a>
                                </li>
                            </ul>
                            <button class="btn custom-btn logout-btn">Logout <i class="fa fa-sign-out"></i></button>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div class="user_dashboard_container">

            <div class="user_activity">
                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active px-lg-5" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Activity</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link px-lg-5" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Pending</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link px-lg-5" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Solved</button>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active post-activity-pane" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                        <div class="post-container">


                            <div class="posts">
                                <div class="card">
                                    <div class="card-body">
                                        <a href="problem_panel.php" class="card-title">
                                            <h5>How to find command output to echo without variable
                                                assignment, in
                                                one line ?</h5>
                                        </a>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural
                                            lead-in to additional content. This content is a little bit longer. This is
                                            a
                                            wider card with
                                            supporting text below as a natural
                                            lead-in to additional content. This content is a little bit longer.</p>
                                        <div class="related-topics">
                                            <p>Related:</p>
                                            <nav class="nav nav-pills nav-fill">
                                                <p class="nav-link disabled">Data Structure and Algorithm</p>

                                                <p class="nav-link disabled arrow"><i class="fa fa-long-arrow-right"></i></p>
                                                <p class="nav-link disabled ">Binary Tree</p>
                                            </nav>
                                        </div>
                                        <div class="card-bar">
                                            <nav class="nav nav-pills nav-fill">
                                                <p class="nav-link disabled">Solutions: 05</p>
                                                <p class="nav-link disabled">Likes: 19</p>
                                                <p class="nav-link disabled">Views: 27</p>
                                                <p class="card-text nav-link"><small class="text-muted">Posted by <a href="#">username</a> 3 mins ago</small></p>
                                            </nav>
                                        </div>
                                    </div>
                                </div>


                                <div class="card">
                                    <div class="card-body">
                                        <a href="problem_panel.php" class="card-title">
                                            <h5>How to find command output to echo without variable
                                                assignment, in
                                                one line ?</h5>
                                        </a>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural
                                            lead-in to additional content. This content is a little bit longer. This is
                                            a
                                            wider card with
                                            supporting text below as a natural
                                            lead-in to additional content. This content is a little bit longer.</p>
                                        <div class="related-topics">
                                            <p>Related:</p>
                                            <nav class="nav nav-pills nav-fill">
                                                <p class="nav-link disabled">Data Structure and Algorithm</p>

                                                <p class="nav-link disabled arrow"><i class="fa fa-long-arrow-right"></i></p>
                                                <p class="nav-link disabled ">Binary Tree</p>
                                            </nav>
                                        </div>
                                        <div class="card-bar">
                                            <nav class="nav nav-pills nav-fill">
                                                <p class="nav-link disabled">Solutions: 05</p>
                                                <p class="nav-link disabled">Likes: 19</p>
                                                <p class="nav-link disabled">Views: 27</p>
                                                <p class="card-text nav-link"><small class="text-muted">Posted by <a href="#">username</a> 3 mins ago</small></p>
                                            </nav>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <a href="problem_panel.php" class="card-title">
                                            <h5>How to find command output to echo without variable
                                                assignment, in
                                                one line ?</h5>
                                        </a>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural
                                            lead-in to additional content. This content is a little bit longer. This is
                                            a
                                            wider card with
                                            supporting text below as a natural
                                            lead-in to additional content. This content is a little bit longer.</p>
                                        <div class="related-topics">
                                            <p>Related:</p>
                                            <nav class="nav nav-pills nav-fill">
                                                <p class="nav-link disabled">Data Structure and Algorithm</p>

                                                <p class="nav-link disabled arrow"><i class="fa fa-long-arrow-right"></i></p>
                                                <p class="nav-link disabled ">Binary Tree</p>
                                            </nav>
                                        </div>
                                        <div class="card-bar">
                                            <nav class="nav nav-pills nav-fill">
                                                <p class="nav-link disabled">Solutions: 05</p>
                                                <p class="nav-link disabled">Likes: 19</p>
                                                <p class="nav-link disabled">Views: 27</p>
                                                <p class="card-text nav-link"><small class="text-muted">Posted by <a href="#">username</a> 3 mins ago</small></p>
                                            </nav>
                                        </div>
                                    </div>
                                </div>


                                <div class="card">
                                    <div class="card-body">
                                        <a href="problem_panel.php" class="card-title">
                                            <h5>How to find command output to echo without variable
                                                assignment, in
                                                one line ?</h5>
                                        </a>
                                        <p class="card-text">This is a wider card with supporting text below as a
                                            natural
                                            lead-in to additional content. This content is a little bit longer. This is
                                            a
                                            wider card with
                                            supporting text below as a natural
                                            lead-in to additional content. This content is a little bit longer.</p>
                                        <div class="related-topics">
                                            <p>Related:</p>
                                            <nav class="nav nav-pills nav-fill">
                                                <p class="nav-link disabled">Data Structure and Algorithm</p>

                                                <p class="nav-link disabled arrow"><i class="fa fa-long-arrow-right"></i></p>
                                                <p class="nav-link disabled ">Binary Tree</p>
                                            </nav>
                                        </div>
                                        <div class="card-bar">
                                            <nav class="nav nav-pills nav-fill">
                                                <p class="nav-link disabled">Solutions: 05</p>
                                                <p class="nav-link disabled">Likes: 19</p>
                                                <p class="nav-link disabled">Views: 27</p>
                                                <p class="card-text nav-link"><small class="text-muted">Posted by <a href="#">username</a> 3 mins ago</small></p>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>


                    </div>
                    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                        Pending </div>
                    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                        Solved </div>
                </div>
            </div>

            <div class="rated_students_list">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        zzzzzz zzzz zzzzz
                        <span class="badge bg-primary rounded-pill">Rating: 74</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        zzzzzz zzzz zzzzz
                        <span class="badge bg-primary rounded-pill">52</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        zzzzzz zzzz zzzzz
                        <span class="badge bg-primary rounded-pill">44</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        zzzzzz zzzz zzzzz
                        <span class="badge bg-primary rounded-pill">40</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        zzzzzz zzzz zzzzz
                        <span class="badge bg-primary rounded-pill">37</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        zzzzzz zzzz zzzzz
                        <span class="badge bg-primary rounded-pill">37</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        zzzzzz zzzz zzzzz
                        <span class="badge bg-primary rounded-pill">37</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        zzzzzz zzzz zzzzz
                        <span class="badge bg-primary rounded-pill">37</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        zzzzzz zzzz zzzzz
                        <span class="badge bg-primary rounded-pill">37</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        zzzzzz zzzz zzzzz
                        <span class="badge bg-primary rounded-pill">37</span>
                    </li>

                </ul>

                <div class="buttons">
                    <button type="submit" name="btnClicked" class="btn  pblm-post" data-bs-toggle="modal" data-bs-target="#problemPost">Post your problem</button>
                    <button type="button" class="btn mt-2 ques-up" data-bs-toggle="modal" data-bs-target="#quesitonPaperUpload">
                        Upload Question Paper
                    </button>

                    <div class="modal fade" id="quesitonPaperUpload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Question Paper</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="signup_form" action="#" autocomplete="off">
                                        <div class="course-id-container mb-2">
                                            <div class="form-floating course-id-automate">
                                                <input type="text" class="form-control" id="courseId" placeholder="Type a name here..." />
                                                <label for="courseId">Course ID</label>
                                            </div>
                                            <ul class="course-search-list"></ul>
                                        </div>

                                        <div class="mb-3">
                                            <p style="margin-bottom:0px;">Select Trimester</p>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="trimesterCode" id="inlineRadio1" value="231">
                                                <label class="form-check-label" for="inlineRadio1">Spring 2023</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="trimesterCode" id="inlineRadio2" value="232">
                                                <label class="form-check-label" for="inlineRadio2">Summer 2023</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="trimesterCode" id="inlineRadio3" value="233">
                                                <label class="form-check-label" for="inlineRadio3">Fall 2023</label>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <p style="margin-bottom:3px;">Question Paper Type</p>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="questionType" id="midRadio" value="Mid">
                                                <label class="form-check-label" for="midRadio">Mid</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="questionType" id="finalRadio" value="Final">
                                                <label class="form-check-label" for="finalRadio">Final</label>
                                            </div>
                                        </div>


                                        <div class="mt-2">
                                            <label class="form-label text-dark" style="margin:0 0 0 1px;" for="profilePic">Select quesiton paper (only pdf)</label>
                                            <input type="file" class="form-control" id="profilePic" placeholder="">
                                        </div>
                                        <br>

                                        <!-- <div class="buttons">
                                            <button type="submit" class="btn btn-primary">Sign up</button>
                                            <a href="/Student_Hub/login.php" class="btn btn-success">Go back to Login</a>
                                        </div> -->

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Upload <i class="fa fa-angle-double-up"></i></button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>




                    <div class="modal fade" id="problemPost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Post your problem</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="" action="#" autocomplete="off">


                                        <div class="form-floating mb-3">
                                            <input type="text" name="title" class="form-control" id="problemTitle" placeholder="Name" required>
                                            <label for="problemTitle">Title</label>
                                        </div>
                                        <div class="form-floating" style="overflow: hidden;">
                                            <div class="cover" style="border-radius: 5px;position: absolute; top: 0px; height: 20px; width: calc(100% - 2px); margin: 1px 1px 0; background-color: #fff; z-index: 10;">
                                            </div>
                                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="min-height: 100px;"></textarea>
                                            <label for="floatingTextarea2" style="z-index: 100;">Description</label>
                                        </div>


                                        <p class="mt-3 mb-1">Enter the course id and the topic name, which your problem
                                            is related to:</p>

                                        <div class="row g-2">
                                            <div class="col-md">
                                                <div class="course-id-container">
                                                    <div class="form-floating course-id-automate">
                                                        <input type="text" class="form-control" id="courseId" placeholder="Type a name here..." />
                                                        <label for="courseId">Course ID</label>
                                                    </div>
                                                    <ul class="course-search-list"></ul>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" name="title" class="form-control" id="problemTitle" placeholder="Name" required>
                                                    <label for="problemTitle">Topic Name</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="mt-2">
                                            <label class="form-label text-dark" style="margin:0 0 0 1px;" for="profilePic">Select the pictures/screenshots (only png, jpg,
                                                jpeg)</label>
                                            <input type="file" multiple class="form-control" id="profilePic" placeholder="">
                                        </div>
                                        <br>

                                        <!-- <div class="buttons">
                                            <button type="submit" class="btn btn-primary">Sign up</button>
                                            <a href="/Student_Hub/login.php" class="btn btn-success">Go back to Login</a>
                                        </div> -->

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Post</i></button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>

    <script src="bootstrap/bootstrap.min.js"></script>



    <script>
        let names = [
            "Ayla",
            "Ayla",
            "Ayla",
            "Ayla",
            "Ayla",
            "Jake",
            "Sean",
            "Henry",
            "Brad",
            "Stephen",
            "Taylor",
            "Timmy",
            "Cathy",
            "John",
            "Amanda",
            "Amara",
            "Sam",
            "Sandy",
            "Danny",
            "Ellen",
            "Camille",
            "Chloe",
            "Emily",
            "Nadia",
            "Mitchell",
            "Harvey",
            "Lucy",
            "Amy",
            "Glen",
            "Peter",
        ];
        //Sort names in ascending order
        let sortedNames = names.sort();

        //reference
        let input = document.getElementById("courseId");
        const courseIDList = document.querySelector(".course-search-list");

        //Execute function on keyup
        input.addEventListener("keyup", (e) => {
            //loop through above array
            //Initially remove all elements ( so if user erases a letter or adds new letter then clean previous outputs)
            removeElements();
            for (let i of sortedNames) {
                //convert input to lowercase and compare with each string

                if (
                    i.toLowerCase().startsWith(input.value.toLowerCase()) &&
                    input.value != ""
                ) {
                    //create li element
                    let listItem = document.createElement("li");
                    //One common class name
                    listItem.classList.add("list-items");
                    listItem.style.cursor = "pointer";
                    listItem.setAttribute("onclick", "displayNames('" + i + "')");
                    //Display matched part in bold
                    let word = "<b>" + i.substr(0, input.value.length) + "</b>";
                    word += i.substr(input.value.length);
                    //display the value in array
                    listItem.innerHTML = word;
                    // courseIDList.style.border = "1px solid #86b7fe";
                    courseIDList.appendChild(listItem);
                    if (courseIDList.childNodes.length > 0) {
                        courseIDList.style.border = "1px solid #86b7fe";
                    }
                }
            }
        });

        function displayNames(value) {
            input.value = value;
            removeElements();
        }

        function removeElements() {
            //clear all the item
            let items = document.querySelectorAll(".list-items");
            items.forEach((item) => {
                item.remove();
            });
            courseIDList.style.border = "none";
        }



        var animateButton = function(e) {

            e.preventDefault;
            //reset animation
            e.target.classList.remove('animate');

            e.target.classList.add('animate');
            setTimeout(function() {
                e.target.classList.remove('animate');
            }, 700);
        };

        var bubblyButtons = document.getElementsByClassName("bubbly-button");

        for (var i = 0; i < bubblyButtons.length; i++) {
            bubblyButtons[i].addEventListener('click', animateButton, false);
        }
    </script>

</body>

</html>