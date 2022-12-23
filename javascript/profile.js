const updateInfoBtn = document.querySelector(".update-user-info-btn"),
updateInfoForm= document.querySelector(".update-user-info-form");

updateInfoForm.onload = (e)=>{
    e.preventDefault();
}

updateInfoBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/update.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                console.log(data);
                if(data == "success"){
                    location.href = "profile.php";
                }
            }
        }
    }
    let formData = new FormData(updateInfoForm);
    formData.append("updateCode", "updateProfile");
    xhr.send(formData);
}


// -------------------------------------- keyup suggestion -------------------------------------

const addCourseBtn = document.querySelector(".add-course-btn"),
addCourseCancelBtn = document.querySelector(".add-course-cancel-btn");
takenCourseForm = document.querySelector(".course-submit-form");
let courses;
let courseCodes =[];

addCourseBtn.onclick = ()=>{ // -------------- Getting All course's info from database as object.
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/getData.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                courses = JSON.parse(data);
                for(let i=0; i<Object.keys(courses).length; i++){
                    courseCodes.push(courses[i]["course_title"]+" - "+courses[i]["course_code"]); // taking only course codes
                }
            }
        }
    }
    let Data = "t3t";
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("getCode="+ Data);

    
}


let input = document.getElementById("courseId");
const courseIDList = document.querySelector(".course-search-list");

addCourseCancelBtn.onclick=()=>{
    courseCodes = [];
    takenCourseForm.reset();
    removeElements();
}
//Execute function on keyup
input.addEventListener("keyup", (e) => {



    removeElements(); //Initially remove all elements ( so if user erases a letter or adds new letter then clean previous outputs)
    for (let i of courseCodes) {
        //convert input to lowercase and compare with each string

        if (
            i.toLowerCase().includes(input.value.toLowerCase()) &&
            input.value != ""
        ) {
            //create li element
            let sIndex =i.toLowerCase().indexOf(input.value.toLowerCase());
            let lIndex = sIndex + input.value.toLowerCase().length;
            let listItem = document.createElement("li");
            //One common class name
            listItem.classList.add("list-items");
            listItem.style.cursor = "pointer";
            listItem.setAttribute("onclick", "displayNames('" + i.trim() + "')");
            //display the value in array
            listItem.innerHTML = i;
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




// ------------------------ inserting taken courses in database -------------------------------



const courseSubmitBtn = document.querySelector(".course-submit-btn"),
courseSubmitForm = document.querySelector(".course-submit-form");


courseSubmitForm.onload = (e)=>{
    e.preventDefault();
}
courseSubmitBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                console.log(data);
                location.href = "profile.php";
            }
        }
    }
    let formData = new FormData(courseSubmitForm);
    formData.append("insertCode","takenCourse");
    xhr.send(formData);
}