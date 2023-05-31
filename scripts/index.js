let closeBroswer = true;
const username = document.getElementById('username').value;

displayUsers();
setInterval(() => {
    displayUsers();
}, 20000);

function displayUsers(){
    fetch("./php/get_users.php",{
        method:"POST",
        header:{"Content-Type":"application/json"},
    }).then(res=>res.json())
    .then(data=>{
        let wrapUsers = document.querySelector('s-wrap-list-users');
        let wrapNoUser = document.querySelector('.s-wrap-no-users');
        let wrapErrorFromServer = document.getElementById('displayErrorFormServer');
        if(data.response == 1){
            console.log(data);
            wrapErrorFromServer.innerHTML = "";
            wrapNoUser.style.display = "none";
            return;
        }
        if(data.response == 0){
            wrapNoUser.style.display = "flex";
            wrapErrorFromServer.innerHTML = data.message;
        }
    })
}




const imageForm = document.getElementById('app-form-area');
const btnOpenFormChangeImg = document.getElementById('btn-change-img');
btnOpenFormChangeImg.addEventListener('click',()=>{
    closeBroswer =false;
    openImageForm();
})
function openImageForm(){
    let x = 0;
    imageForm.style.display = "flex";
    let interval = setInterval(()=>{
        x++
        imageForm.style.opacity = x + '%';
        if(x == 100){
            clearInterval(interval);
        }
    },5)
}


const btnCloseImgForm = document.getElementById('icon-close-form-img');
btnCloseImgForm.addEventListener('click', closeFormImage);
 function closeFormImage(){
    let x = 100;
    let interv = setInterval(()=>{
        x--;
        imageForm.style.opacity = x + '%';
        if(x == 0){
            imageForm.style.display = "none";
            clearInterval(interv);
        }
    },5)
 } 



// Logout from the button or close the window
const btnLogout = document.getElementById('btn-logout');

btnLogout.addEventListener('click',()=> window.location.href = "./php/logout.php");
//   window.addEventListener('beforeunload',()=>{
//       if(closeBroswer == true){
//           fetch('./php/logout.php').then(res=>res.json()).then(data=>{})      
//       }
//  })
