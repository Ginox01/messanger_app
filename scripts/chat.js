let closeBroswer = true;

const mittente = document.getElementById('mittente').value;
const destinatario = document.getElementById('destinatario').value;

getTheDestinatarioInfo();
setInterval(()=>{
    getTheDestinatarioInfo();
},3000)
function getTheDestinatarioInfo(){
    let wrapInfoDestinatario = document.querySelector('.s-area-guest');
    let formData = new FormData;
    formData.append('username',destinatario);
    fetch("./php/get_destinatario_info.php",{
        method:'POST',
        header:{'Content-Type':'application/json'},
        body:formData
    }).then(res=>res.json())
    .then(data=>{
        if(data.response == 0){
            window.location.href = "index.php";
        };
        if(data.response == 1){
            wrapInfoDestinatario.innerHTML = `
                <p>${data.username}</p>
                    <p class="s-small">${data.status}</p>
                    <span class="s-icon-return">←</span>
                <div class="s-wrap-img-guest">
                    <img src=${data.image == 'default' ? './src/no-img.jpg':'./src/images/'+data.image}>
                </div>
            `;
            const arrowToReturnToIndex = document.querySelector('.s-icon-return');
            arrowToReturnToIndex.addEventListener('click',()=>{
            closeBroswer = false;
            window.location.href = "index.php";
})

        }
    })
}


const btnMex = document.getElementById('btn-mex');
btnMex.addEventListener('click',sendMessage);
function sendMessage(){
    let message = document.getElementById('mex');
    if(message.length == 0) return;
    let formData = new FormData;
    formData.append('mittente',mittente);
    formData.append('destinatario',destinatario);
    formData.append('message',message.value);


    fetch("./php/send_message.php",{
        method:'POST',
        header:{'Content-Type':'application/json'},
        body:formData
    }).then(res=>res.json()).then(data=>{
        if(data.response == 0){
            window.location.href = "index.php";
        }
        if(data.response == 1){
            message.value = "";
            clearChat()
            displayTheChats()
        }
    })


}

//CLEAR ALL THE MESSAGES FROM THE CHAT PAGE
function clearChat(){
    let wrapper = document.querySelector('.s-area-chat');
    wrapper.innerHTML = "";
}


displayTheChats();
function displayTheChats(){
    const wrapNoMessages = document.getElementById('wrap-no-messages');
    
    
    let formData = new FormData;
    formData.append('mittente',mittente);
    formData.append('destinatario',destinatario);

    fetch("./php/get_messages.php",{
        method:'POST',
        header:{'Content-Type':'application/json'},
        body:formData
    }).then(res=>res.json()).then(data=>{
        if(data.response == 0){
            window.location.href = "index.php"
        }
        if(data.response == 1){
            if(wrapNoMessages){
                wrapNoMessages.style.display = "none";
            }
            generateChats(data.messages);
        }
        if(data.response == 2){
            wrapNoMessages.style.display = "flex";
            const wrapNoMessagesDiv = wrapNoMessages.firstElementChild;
            wrapNoMessagesDiv.innerHTML = data.message;

        }
    })
}

function generateChats(messages){
    let wrapperChats = document.querySelector('.s-area-chat');
    let rows = "";
    messages.forEach(note=>{
        let row = ""
        if(mittente == note.mittente){
            row = `
            <div class="chat-user">
                <div class="chat-container-user">
                    <p>${note.message}</p>
                </div>
            </div> 
            `;
        }else{
            row = `
            <div class="chat-guess">
                <div class="chat-container-guess">
                    <p>${note.message}</p>
                </div>
            </div> 
            `;
        }
        rows += row;
    })
    wrapperChats.innerHTML = rows;
}



//LOGOUT THE USER WHEN HE CLOSE THE BROSWER
 window.addEventListener('beforeunload',()=>{
     if(closeBroswer == true){
         fetch('./php/logout.php').then(res=>res.json()).then(data=>{});
     }
 })