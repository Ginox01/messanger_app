const token = document.getElementById('token').value;
const msgErrFromServer = document.getElementById('err-server');
const errUsername = document.getElementById('err-username');
const errPsw = document.getElementById('err-psw');
const username = document.getElementById('username');
const psw = document.getElementById('psw');
const btnLogin = document.getElementById('btn-login');

btnLogin.addEventListener('click',login);

function login(){
    if(checkSimplyField(username,errUsername) && checkSimplyField(psw,errPsw)){

        let formData = new FormData;
        formData.append('token',token);
        formData.append('username',username.value);
        formData.append('psw',psw.value);

        fetch("./php/login.php",{
            method:'POST',
            header:{'Content-type':'application/json'},
            body:formData
        }).then(res=>res.json()).
        then(data=>{
            if(data.response == 0){
                resetField();
                msgErrFromServer.classList.remove('msg-off');
                msgErrFromServer.innerHTML = data.message;
                return 
            }   
            if(data.response == 1){
                resetField();
                msgErrFromServer.classList.add('msg-off');
                msgErrFromServer.innerHTML = "..";
                window.location.href = "./index.php";
            }
        })
    }
}


function checkSimplyField(target,msgErr){
    if(target.value.length < 4){
        target.className = 'err-input';
        msgErr.innerHTML = 'This field must be atleast four chars long';
        msgErr.classList.remove('msg-off');
        return false;
    }else {
        target.className = 'valid-input';
        msgErr.innerHTML = "..";
        msgErr.classList.add('msg-off');
        return true;
    }
}


function resetField(){
    errUsername.innerHTML ="..";
    errUsername.classList.add('msg-off');
    username.value = "";
    errPsw.innerHTML = "";
    errPsw.classList.add('msg-off');
    psw.value = "";
}