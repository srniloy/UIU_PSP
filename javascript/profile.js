const updateInfoBtn = document.querySelector(".update-user-info-btn"),
updateInfoForm= document.querySelector(".update-user-info-form");

// updateInfoForm.onload = (e)=>{
//     e.preventDefault();
// }

updateInfoBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/update.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                let data = xhr.response;
                location.href = "profile.php";
                console.log(data);
            }
        }
    }
    let formData = new FormData(updateInfoForm);
    formData.append("update_code", "upd-u-i");
    xhr.send(formData);
}