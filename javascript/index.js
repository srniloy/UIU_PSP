

// ----------------------- Question Paper Uploading -----------------------------------


const quesionUploadFrom = document.querySelector(".quesionUploadFrom"),
qpUploadBtn = document.querySelector(".qp-upload-btn");



qpUploadBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                console.log(data);
                if(data == "success"){
                    location.href = "index.php";
                }
            }
        }
    }
    let formData = new FormData(quesionUploadFrom);
    formData.append("insertCode", "insertQP");
    xhr.send(formData);
}












// -------------------------------------- keyup suggestion -------------------------------------

const addCourseBtn = document.querySelector(".ques-upload-btn"),
addCourseCancelBtn = document.querySelector(".ques-upload-cancel-btn");
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


let input = document.getElementById("courseCode");
const courseIDList = document.querySelector(".course-search-list");

addCourseCancelBtn.onclick=()=>{
    courseCodes = [];
    quesionUploadFrom.reset();
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



