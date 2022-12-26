


// ---------------------------------------------------------Problem Post-------------------------------------------------------->




const answerPostBtn = document.querySelector(".answer-section .answer-post-btn"),
answerPostForm = document.querySelector(".answer-section .answer_post_form");

answerPostForm.onsubmit = (e)=>{
    e.preventDefalut();
}
answerPostBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/insert.php",true);
    xhr.onload = ()=>{
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200){
                let data = xhr.response;
                console.log(data);
                location.href = "problem_panel.php?post_id="+data;
                // if(data == "success"){
                // }
            }
        }
    }
    let formData = new FormData(answerPostForm);
    formData.append("insertCode","insertAnswer");
    xhr.send(formData);
}


// // ---------------------------------------------------------All post fetch-------------------------------------------------------->


// const allPostContainer = document.querySelector(".user_activity .posts");



// setInterval(()=>{

//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "php/getData.php", true);
//     xhr.onload = ()=>{
//         if(xhr.readyState === XMLHttpRequest.DONE){
//             if(xhr.status === 200){
//                 let data = "";
//                 data = xhr.response;
//                 console.log(data);
//                 if(data != ""){
//                     allPostContainer.innerHTML = data;
//                 }
//             }
//         }
//     }
//     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
//     xhr.send("getCode=getPosts");




// },1000);
