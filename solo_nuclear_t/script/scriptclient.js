let menuabove=document.getElementById('menuabove');
let mainlinks=document.getElementById('mainlinks');

menuabove.addEventListener('click',()=>{
   mainlinks.classList.toggle('afficher');
});

// about inscription and connexion

let clientconnexion=document.getElementById('clientconnexion');
let clientinscription=document.getElementById('clientinscription');
let main=document.getElementById('main');
let btninscriptioncl=document.getElementById('btninscription');
let btnconnexioncl=document.getElementById('btnconnexion');
window.addEventListener('mousedown',()=>{

    btninscriptioncl.addEventListener('click', ()=>{
      clientinscription.style.display="block";
      main.style.opacity="40%";
      if(window.getComputedStyle(clientconnexion).display!='none'){
         clientconnexion.style.display="none";
      }
      
   })
   
   
   btnconnexioncl.addEventListener('click', ()=>{
      clientconnexion.style.display="block";
      main.style.opacity="40%";
      if(window.getComputedStyle(clientinscription).display!='none'){
         clientinscription.style.display="none";
      }
   })

})



