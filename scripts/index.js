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
       
        let wrapNoUser = document.querySelector('.s-wrap-no-users');
        let wrapErrorFromServer = document.getElementById('displayErrorFormServer');
        
        if(data.response == 1){
            generateUsers(data.users);
            return;
        }
        if(data.response == 0){
            wrapNoUser.style.display = "flex";
            wrapErrorFromServer.innerHTML = data.message;
        }
    })
}


// dislay the user call with previusly ajax function
function generateUsers(users){
    console.log(users)
    let wrapUsers = document.querySelector('.s-wrap-list-users');
    let rows ='';
    users.forEach(user =>{
        let row = `
        
            <div class="s-utente" style="display:${user.username == username ? 'none':'flex'}">
                <div class="s-utente-img">
                    <img src="${user.image == 'default' ? './src/no-img.jpg':'./src/images/'+user.image}">
                </div>
                <div class="s-utente-info">
                    <h4 style="padding:0;margin:0">${user.username}</h4>
                    <p class="s-small">last message</p>
                </div>
                <div class="s-utente-activity">
                    <span class="activity ${user.status}"></span>
                </div>
                <span></span>
            </div> 

        `;
        rows += row;
    })
    wrapUsers.innerHTML = rows;
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
