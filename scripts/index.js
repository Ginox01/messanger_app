
const btnChangeImg = document.getElementById('btn-change-img');



// Logout from the button or close the window
const btnLogout = document.getElementById('btn-logout');
let closeBroswer = true;
btnLogout.addEventListener('click',()=> window.location.href = "./php/logout.php");
// window.addEventListener('beforeunload',()=>{
//     if(closeBroswer){
//         fetch('./php/logout.php').then(res=>res.json()).then(data=>{})      
//     }
// })

