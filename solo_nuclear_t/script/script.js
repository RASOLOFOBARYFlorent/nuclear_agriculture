 // script for the mission
 let formmission=document.getElementById('formmission');
 let mission=document.querySelector('#missions table');
 let modifymission=document.querySelectorAll('#modifymission');
 modifymission.forEach(modifym=>{
    modifym.addEventListener('click',()=>{
        formmission.style.display="block";
        mission.style.opacity="40%";
    });
 })
 // add service
 let formservice=document.getElementById('formserviceadd');
 let service=document.querySelector('#services table');
 let addservice=document.querySelectorAll('#addservice');
 addservice.forEach(addservice=>{
     addservice.addEventListener('click',()=>{
     formservice.style.display="block";
     service.style.opacity="40%";
    })
 });
     // modify service program
     let formservicemodify=document.getElementById('formservicemd');
 let modifyservice=document.querySelectorAll('#modifyservice');
 modifyservice.forEach(modifyservice=>{
    modifyservice.addEventListener('click',()=>{
     formservicemodify.style.display="block";
     service.style.opacity="40%";
     });
 });

         // modify employes
 let formemployemodify=document.getElementById('formemployemd');
 let modifyemploye=document.querySelectorAll('#modifyemploye');
 let employes=document.querySelector('#employes table');
 modifyemploye.forEach(modifyemploy=>{
    modifyemploy.addEventListener('click',()=>{
     formemployemodify.style.display="block";
     employes.style.opacity="40%";
    });
 });
             // add employes
 let formemployeadd=document.getElementById('formemployeadd');
 let addemploye=document.querySelectorAll('#addemploye');
 addemploye.forEach(addemp=>{
     addemp.addEventListener('click',()=>{
     formemployeadd.style.display="block";
     employes.style.opacity="40%";
     });
 });

         // modify clients
 let formclientmodify=document.getElementById('formclientmd');
 let modifyclient=document.querySelectorAll('#modifyclient');
 let clients=document.querySelector('#clients table');
 modifyclient.forEach(modifycl=>{
     modifycl.addEventListener('click',()=>{
        formclientmodify.style.display="block";
        clients.style.opacity="40%";
    });
   
 });

 
// notifications 

let not=document.getElementById('notifications');
not.addEventListener('click',()=>{
 p.style.display="block";
 dash.style.display="none";
 dash.style.display="none";
 serv.style.display="none";
 mis.style.display="none";
 cli.style.display="none";
 emp.style.display="none";
 chcl.innerText="Paiments";
});

//all the div
let p=document.getElementById('paiments');
let cli=document.getElementById('clients');
let serv=document.getElementById('services');
let mis=document.getElementById('missions');
let dash=document.getElementById('dashboard');
let emp=document.getElementById('employes');

let d0=document.querySelector('.leftside .links #dashboard0');
let clients1=document.querySelector('.leftside .links #clients0');
let pay=document.querySelector('.leftside .links #paiments0');
let serv0=document.querySelector('.leftside .links #services0');
let m0=document.querySelector('.leftside .links #missions0');
let emp0=document.querySelector('.leftside .links #employes0');


let chcl=document.getElementById('changeeachclick');

window.addEventListener('mousedown', ()=>{
    if(window.getComputedStyle(dash).display=="none"){
        d0.addEventListener('click',()=>{
            dash.style.display="block";
           serv.style.display="none";
           mis.style.display="none";
           cli.style.display="none";
           emp.style.display="none";
           p.style.display="none";
           chcl.innerText="Dashboard";
        });
    }
    if(window.getComputedStyle(p).display=="none"){
        pay.addEventListener('click',()=>{
            dash.style.display="none";
           serv.style.display="none";
           mis.style.display="none";
           cli.style.display="none";
           emp.style.display="none";
           p.style.display="block";
           chcl.innerText="Paiments";
        });

    }
    if(window.getComputedStyle(cli).display=="none"){
        clients1.addEventListener('click',()=>{
            dash.style.display="none";
           serv.style.display="none";
           mis.style.display="none";
           cli.style.display="block";
           emp.style.display="none";
           p.style.display="none";
           chcl.innerText="Clients";
           
        });

    }
    if(window.getComputedStyle(serv).display=="none"){
        serv0.addEventListener('click',()=>{
            dash.style.display="none";
           serv.style.display="block";
           mis.style.display="none";
           cli.style.display="none";
           emp.style.display="none";
           p.style.display="none";
        
           chcl.innerText="Services";
        });

    }
    if(window.getComputedStyle(emp).display=="none"){
        emp0.addEventListener('click',()=>{
            dash.style.display="none";
           serv.style.display="none";
           mis.style.display="none";
           cli.style.display="none";
           emp.style.display="block";
           p.style.display="none";
           chcl.innerText="Employes";
           
        });

    }
    if(window.getComputedStyle(mis).display=="none"){
        m0.addEventListener('click',()=>{
            dash.style.display="none";
           serv.style.display="none";
           mis.style.display="block";
           cli.style.display="none";
           emp.style.display="none";
           p.style.display="none";
           chcl.innerText="Missions";
           
        });

    }
    
})

