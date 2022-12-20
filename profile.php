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
            $row = mysqli_fetch_assoc($sql);
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
                    <img src="resources/avater.png" alt="">
                </div>
                <div class="user-info">
                    <h4><?php echo $row['name'] ?></h4>
                    <h6><?php echo $row['student_id'] ?></h6>
                    <h6><?php echo $row['email'] ?></h6>
                </div>
                <div class="edit-button">
                    <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#edit">Edit</button>
                    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit your profile information
                                    </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="signup_form" action="#">
                                        <div class="form-floating mb-2">
                                            <input type="text" name="name" value="<?php echo $row['name'] ?>" class="form-control" id="floatingInput1" placeholder="Name" required>
                                            <label for="floatingInput1">Name</label>
                                        </div>
                                        <div class="form-floating mb-2">
                                            <input type="tel" name="student_id" value="<?php echo $row['student_id'] ?>" class="form-control" id="floatingInput2" placeholder="Student Id" required>
                                            <label for="floatingInput2">Student Id</label>
                                        </div>
                                        <div class="form-floating mb-2">
                                            <input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control" id="floatingInput3" placeholder="Email (University Provided)" required>
                                            <label for="floatingInput3">Email (University Provided)</label>
                                        </div>
                                        <div class="form-floating">
                                            <input type="password" name="password" value="<?php echo $row['password'] ?>" class="form-control" id="floatingPassword" placeholder="Password" required>
                                            <label for="floatingPassword">Password</label>
                                        </div>
                                        <div class="mt-2">
                                            <label class="form-label text-dark" style="margin:0 0 0 1px;" for="profilePic">Enter your profile picture (only png, jpg &
                                                jpeg)</label>
                                            <input type="file" class="form-control" id="profilePic" placeholder="">
                                        </div>
                                        <br>

                                        <!-- <div class="buttons">
                                            <button type="submit" class="btn btn-primary">Sign up</button>
                                            <a href="/Student_Hub/login.php" class="btn btn-success">Go back to Login</a>
                                        </div> -->

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
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
                        <div class="modal fade" id="addCourse" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Course</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="signup_form" action="#" autocomplete="off">
                                            <div class="course-id-container mb-2">
                                                <div class="form-floating course-id-automate">
                                                    <input type="text" class="form-control" id="courseId" placeholder="Type a name here..." required />
                                                    <label for="courseId">Course ID</label>
                                                </div>
                                                <ul class="course-search-list"></ul>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Add</button>
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
                                <i class="fa fa-plus" data-bs-toggle="modal" data-bs-target="#addCourse"></i>

                            </div>
                        </div>
                        <p class="default-text visually-hidden">You do not added any courses yet</p>
                        <ul class="">
                            <li>
                                <p>Data Structure and Algorithm (CSE 2232) </p>
                                <i class="fa fa-trash-o"></i>
                            </li>
                            <li>
                                <p>Data Structure and Algorithm (CSE 2232) </p>
                                <i class="fa fa-trash-o"></i>
                            </li>
                            <li>
                                <p>Data Structure and Algorithm (CSE 2232) </p>
                                <i class="fa fa-trash-o"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

            <section class="third-sec">
                <div class="show-questions">
                    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="10000">

                                <div class="question-view">
                                    <!-- <h5>Data Structure and Algorithm (CSE2217)</h5> -->
                                    <h5>There is no course added yet to show corresponding question papers</h5>

                                    <p class="unavailable-txt">
                                        Question paper of Data structure and Algorithm course is not available yet.
                                    </p>
                                    <div class="question-set  visibility-hide">
                                        <div class="questions ct">
                                            <h6>Mid Questions</h6>
                                            <div class="q-list">
                                                <a href="/php/question_papers/213_CSE_2217_Mid_Question.pdf" class="" download>summer 2022.pdf</a>
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
                                                <a href="/php/question_papers/171_CSI_227_Final_Question.pdf" class="" download>summer 2022.pdf</a>
                                                <a href="#" class="">spring 2022.pdf</a>
                                                <a href="#" class="">fall 2022.pdf</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="carousel-item" data-bs-interval="2000">


                            <div class="question-view">
                                <h5>Data Structure and Algorithm (CSE2217)</h5>
                                <p class="unavailable-txt visibility-hide">
                                    Question paper of Data structure and Algorithm course is not available yet.
                                </p>
                                <div class="question-set">
                                    <div class="questions ct">
                                        <h6>Mid Questions</h6>
                                        <div class="q-list">
                                            <a href="/php/question_papers/213_CSE_2217_Mid_Question.pdf" class="" download>summer 2022.pdf</a>
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
                                            <a href="/php/question_papers/171_CSI_227_Final_Question.pdf" class="" download>summer 2022.pdf</a>
                                            <a href="#" class="">spring 2022.pdf</a>
                                            <a href="#" class="">fall 2022.pdf</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="carousel-item">


                            <div class="question-view">
                                <h5>Data Structure and Algorithm (CSE2217)</h5>
                                <p class="unavailable-txt">
                                    Question paper of Data structure and Algorithm course is not available yet.
                                </p>
                                <div class="question-set visibility-hide">
                                    <div class="questions ct">
                                        <h6>Mid Questions</h6>
                                        <div class="q-list">
                                            <a href="/php/question_papers/213_CSE_2217_Mid_Question.pdf" class="" download>summer 2022.pdf</a>
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
                                            <a href="/php/question_papers/171_CSI_227_Final_Question.pdf" class="" download>summer 2022.pdf</a>
                                            <a href="#" class="">spring 2022.pdf</a>
                                            <a href="#" class="">fall 2022.pdf</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </section>
        </div>
    </div>



    <script src="bootstrap/bootstrap.min.js"></script>



    <script>
        let names = [
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
    </script>
</body>

</html>