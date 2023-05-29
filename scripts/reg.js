const msgErrorFromServer = document.getElementById('err-server');
const msgErrorMail = document.getElementById('err-mail');
const msgErrorUsername = document.getElementById('err-username');
const msgErrorPsw = document.getElementById('err-psw');
const msgErrorConfirmPsw = document.getElementById('err-confirm-psw');
const mail = document.getElementById('mail');
const username = document.getElementById('username');
const psw = document.getElementById('psw');
const confirmPsw = document.getElementById('confirm-psw');
const btnSignUp = document.getElementById('btn-new-user');



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

function checkMail(target,msgErr){

    let test = /@/;

    if(target.value.length < 6){
        target.className = 'err-input';
        msgErr.innerHTML = 'Mail must be atleast six chars long';
        msgErr.classList.remove('msg-off');
        return false;
    }else if(!test.test(target.value)){
        target.className = 'err-input';
        msgErr.innerHTML = "Miss the @!";
        msgErr.classList.remove('msg-off');
        return false;
    }else{
        target.className = 'valid-input';
        msgErr.innerHTML = "..";
        msgErr.classList.add('msg-off');
        return true;
    }

}

function checkConfirPsw(target,pattern,msgErr){
    if(target.value != pattern.value){
        target.className = 'err-input';
        msgErr.innerHTML = "The password doesn't match" ;
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
    msgErrorMail.classList.add('msg-off');
    msgErrorMail.innerHTML = "..";
    msgErrorUsername.classList.add('msg-off');
    msgErrorUsername.innerHTML = "..";
    msgErrorPsw.classList.add('msg-off');
    msgErrorPsw.innerHTML = "..";
    msgErrorConfirmPsw.classList.add('msg-off');
    msgErrorConfirmPsw.innerHTML = "..";
    mail.value = "";
    username.value ="";
    psw.value = "";
    confirmPsw.value = "";
}


btnSignUp.addEventListener('click',createNewUser);
function createNewUser(){
    if( checkMail(mail,msgErrorMail) && checkSimplyField(username,msgErrorUsername) && 
    checkSimplyField(psw,msgErrorPsw) && checkConfirPsw(confirmPsw,psw,msgErrorConfirmPsw) ){
        
        let formData = new FormData;
        formData.append('mail',mail.value);
        formData.append('username',username.value);
        formData.append('psw',psw.value);
        
        fetch("./php/new_user.php",{
            method:'POST',
            header:{'Content-Type':'application/json'},
            body:formData
        }).then(res=>res.json())
        .then(data =>{
            console.log(data);
        })
    }
}