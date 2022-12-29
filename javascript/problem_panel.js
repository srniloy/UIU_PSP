


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


// ---------------------------------------------------------All ANSWER fetch-------------------------------------------------------->


const allAnswerContainer = document.querySelector(".all-answers");
let answersLength = 0;
// let ansCommentLength = 0;

setInterval(()=>{

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/getData.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = "";
                data = xhr.response;
                let dataSplit = data.split("*#");
                let ppNums = parseInt(dataSplit[0]);
                // let dataSplitPro = dataSplit[1];
                // console.log(dataSplit[ppNums]);
                if(answersLength != ppNums){
                    allAnswerContainer.innerHTML = dataSplit[1];
                    answersLength = ppNums;
                    setAnswerCommentPostData();
                    fetchAnswerComment();
                }else if(ppNums == 0){
                    allAnswerContainer.innerHTML = '<p style="margin-top: 30px;">There is no answer has been posted yet </p>';
                }
            }
        }
    }
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("getCode=getAnswers");




},1000);


// ---------------------------------------------------------Problem Comment Post-------------------------------------------------------->




const pCommentBtn = document.querySelector(".question-details .pblm-comment-submit-btn"),
pCommentForm = document.querySelector(".question-details .pblm-comment-form");

pCommentForm.onsubmit = (e)=>{
    e.preventDefault();
}
pCommentBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST","php/insert.php",true);
    xhr.onload = ()=>{
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200){
                let data = xhr.response;
                pCommentForm.reset();
                console.log(data);
                // location.href = "problem_panel.php?post_id="+data;
                // if(data == "success"){
                // }
            }
        }
    }
    let formData = new FormData(pCommentForm);
    formData.append("insertCode","insertPComment");
    xhr.send(formData);
}


// --------------------------------------------------------- Fetch all comments of problem -------------------------------------------------------->


const probCommentContainer = document.querySelector(".question-details .comment-texts");

let pCommentsLength = 0;

setInterval(()=>{

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/getData.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = "";
                data = xhr.response;
                // console.log(data);
                let dataSplit = data.split("*#");
                let ppNums = parseInt(dataSplit[0]);
                // console.log(dataSplit[0]);
                if(pCommentsLength != ppNums){
                    probCommentContainer.innerHTML = dataSplit[1];
                    probCommentContainer.scrollTop = probCommentContainer.scrollHeight;
                    pCommentsLength = ppNums;
                }
            }
        }
    }
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("getCode=getPComment");




},1000);



// ---------------------------------------------------------answer Comment Post-------------------------------------------------------->



let aCommentBtn, aCommentForm, answer_ids;

function setAnswerCommentPostData(){
    aCommentBtn = document.querySelectorAll(".answer-comment-submit-btn");
    aCommentForm = document.querySelectorAll(".answer-comment-form");
    answer_ids = document.querySelectorAll(".answer-comments .answer_id");
    // console.log(aCommentForm[1]);


    for (let i = 0; i < aCommentBtn.length; i++) {
        aCommentForm[i].onsubmit = (e)=>{
            e.preventDefault();
        }
        aCommentBtn[i].onclick = ()=>{
            let xhr = new XMLHttpRequest();
            xhr.open("POST","php/insert.php",true);
            xhr.onload = ()=>{
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if(xhr.status === 200){
                        let data = xhr.response;
                        aCommentForm[i].reset();
                        // console.log(data);
                        // location.href = "problem_panel.php?post_id="+data;
                        // if(data == "success"){
                        // }
                    }
                }
            }
            let formData = new FormData(aCommentForm[i]);
            formData.append("insertCode","insertAComment");
            formData.append("answer_id", answer_ids[i].innerHTML);
            xhr.send(formData);
        }
    }
}


//==================================== Fetch all answers comment ================================>


function fetchAnswerComment(){
    const ansCommentContainer = document.querySelectorAll(".answer-comments .a-comments");
    const forScroll = document.querySelectorAll(".answer-comments");
    const answer_id = document.querySelectorAll(".answer-comments .answer_id");
    let aCommentsLength = [];
    for (let i = 0; i < ansCommentContainer.length; i++){
        aCommentsLength[i] = 0;
    };

    setInterval(() => {
        for (let i = 0; i < ansCommentContainer.length; i++) {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "php/getData.php", true);
            xhr.onload = ()=>{
                if(xhr.readyState === XMLHttpRequest.DONE){
                    if(xhr.status === 200){
                        let data = "";
                        data = xhr.response;
                        // console.log(data);
                        let dataSplit = data.split("*#");
                        let ppNums = parseInt(dataSplit[0]);
                        if(aCommentsLength[i] != ppNums){
                            console.log(ppNums+" - "+aCommentsLength[i]);
                            ansCommentContainer[i].innerHTML = dataSplit[1];
                            forScroll[i].scrollTop = forScroll[i].scrollHeight;
                            aCommentsLength[i] = ppNums;
                        }
                    }
                }
            }
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("getCode=getAComment&answer_id="+answer_id[i].innerHTML);
            
        }
    }, 1000);
}
