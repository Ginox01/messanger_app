let closeBroswer = true;
const username = document.getElementById('username').value;


displayUsers();
let intervallo = setInterval(() => {
    displayUsers();
}, 1000);

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
    let wrapUsers = document.querySelector('.s-wrap-list-users');
    let rows ='';
    users.forEach(user =>{
        let row = `
        
            <div data-friend="${user.username}" class="s-utente friend" style="display:${user.username == username ? 'none':'flex'}">
                <div class="s-utente-img">
                    <img src="${user.image == 'default' ? './src/no-img.jpg':'./src/images/'+user.image}">
                </div>
                <div class="s-utente-info">
                    <h4 data-user="${user.username}" style="cursor:pointer;color:forrest" class="s-link">${user.username}</h4>
                    <p data-user="${user.username}"  class="s-small last-messages"></p>
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
    
    const btnsLinkToChatUser = document.querySelectorAll('.s-link');
    btnsLinkToChatUser.forEach(btn=>{
        btn.addEventListener('click',goToChat);
    })

    const lastMessages = document.querySelectorAll('.last-messages');
    lastMessages.forEach(lastMessage=>{
        getTheLastMessage(lastMessage.dataset.user,lastMessage);
    })
}



function goToChat(e){
    closeBroswer = false;
    window.location.href = "./chat_page.php?user="+e.target.dataset.user;
}


function getTheLastMessage(destinatario,target){
    let formData = new FormData;
    formData.append('mittente',username);
    formData.append('destinatario',destinatario);
    

    fetch("./php/get_last_message.php",{
        method:'POST',
        header:{'Content-Type':'application/json'},
        body:formData
    }).then(res=>res.json()).then(data=>{
        if(data.response == 0){
            window.location.href = "index.php";
            return;
        }
        if(data.response == 1){
            target.innerHTML = data.message;
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
    closeBroswer = true;
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

//SEARCH THE USER FROM THE BAR
const searchInput = document.getElementById('search');
searchInput.addEventListener('keyup',searchUserWithTheBar)
function searchUserWithTheBar(e){
    clearInterval(intervallo);
    let friends = document.querySelectorAll('.friend');
    
    friends.forEach(friend=>{
        let userInput = e.target.value;
        if(friend.dataset.friend.includes(userInput)){
            friend.style.display = "flex";
        }else{
            friend.style.display = "none";
        }
    })
}

//ACTIVE THE DISPLAY USERS WHEN LEAVE THE SEARCHBAR
searchInput.addEventListener('blur',()=>{
    displayUsers();
    intervallo = setInterval(() => {
    displayUsers();
}, 800);
    
})


// Logout from the button or close the window
const btnLogout = document.getElementById('btn-logout');
 btnLogout.addEventListener('click',()=> window.location.href = "./php/logout.php");
      window.addEventListener('beforeunload',()=>{
          if(closeBroswer == true){
              fetch('./php/logout.php').then(res=>res.json()).then(data=>{})      
          }
     })
