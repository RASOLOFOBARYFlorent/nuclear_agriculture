
        let services=document.querySelectorAll('.services');
        let current=3;
        if(services.length<3){
            let k=services.length;
            for(var i=0;i<k;i++){
               services[i].style.display="block";
               }
        }else{
            for(var i=0;i<current;i++){
               services[i].style.display="block";
         }
        }
        /*
        if(services.length<current||services.length==current){
                let loadmore=document.getElementById('loadmore');
                loadmore.style.display='none';
                for(var i=0;i<current;i++){
                services[i].style.display="block";
                }
        }else{
                for(var i=0;i<current;i++){
                services[i].style.display="block";
            }
            let loadmore=document.getElementById('loadmore');
            loadmore.onclick=()=>{
                for(var k=current;k<current+3;k++){
                    services[k].style.display="block";
                }
                current+=3;
                if(current>=services.length){
                    loadmore.style.display="none";
                }
            }

        }*/


        //   notification
        let not=document.querySelectorAll('#notifications');
        let number=document.getElementById('number');
        let n=not.length;
        if(not.length>=1){
            number.style.display="block";
            number.innerText=n;
        }else{
            number.style.display="none";
        }
        not.forEach(not=>{
            not.addEventListener('click',()=>{
                not.remove();
                n-=1;
                number.innerText=n;
                if(n==0){
                    number.style.display="none";
                }
            })
            
        })



        let productincommande=document.querySelectorAll('.commande');
        let numbercart=document.getElementById('numbercart');
        numbercart.innerText=productincommande.length;
        window.addEventListener('mousedown',()=>{
        // cart
        let cart=document.getElementById('btncart');

        let cartcont=document.getElementById('commande');
        cart.onclick=()=>{
            for(let m=0;m<services.length;m++){
                services[m].style.display="none";
            }

            /*
            numbercart.style.display="none";
            loadmore.style.display="none";
            cartcont.style.display="inline-block";
            */
            numbercart.style.display="none";
            loadmore.style.display="none";
            for(let m=0;m<productincommande.length;m++){
                productincommande[m].style.display='block';
            }
        }  
        
        

            // profile
            let slogan=document.querySelector('.slogan');
            let contservice=document.querySelector('.containerservices');
            let formmodify=document.querySelector('.forms1');
            let btnmodif=document.getElementById('modif');
            btnmodif.onclick=()=>{
                formmodify.style.display="block";
                cartcont.style.opacity="40%";
                contservice.style.opacity="40%";
                slogan.style.opacity="40%";
            }


    });

    let dec=document.querySelector('deconnecter');
    dec.onclick=()=>{
        window.location.href="index.php";
    };
 