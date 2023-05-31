let closeBroswer = true;
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
  window.addEventListener('beforeunload',()=>{
      if(closeBroswer == true){
          fetch('./php/logout.php').then(res=>res.json()).then(data=>{})      
      }
 })

console.log(closeBroswer)