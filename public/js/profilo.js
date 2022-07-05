
let img;
let i;

function onResponse(response){
	return response.json();
}

  function inserisci(event){

      console.log("ciao");
      console.log(event.currentTarget.url.value);
      const url=event.currentTarget.url.value;
    

     if((url)!==null){
          const togli=document.querySelector('form');
          togli.classList.add('rimuovi');
          console.log("sei nell'if");
          fetch('impostala', {method: 'post', body:form_data}).then(onResponse).then(onJson1);
      }  
    
    
      event.preventDefault();
      console.log("sei dopo la fetch");

  }
 const div= document.querySelector('form');
 div.addEventListener('submit', inserisci);


console.log("teoricamente fine");


function onJson1(json){
    console.log(json);
     img=json.image;
     if(img!==null){
         const label=document.querySelector('form');
         label.classList.add('rimuovi');

         const prepar=document.querySelector('#foto');
         prepar.innerHTML='';

         const sub= document.createElement('input');
         sub.type='submit';
         sub.value='Cambia img profilo';
         sub.id='submit';
         



        
         console.log(prepar);
         const image=document.createElement('img');
         image.src=img;
         prepar.appendChild(image);
         prepar.appendChild(sub);
         let submit=document.querySelector('#submit');

         submit.addEventListener('click', cambia);
     }
    

    
}
fetch(FOTO +'contenuti').then(onResponse).then(onJson2);
fetch(FOTO + 'porfavor').then(onResponse).then(onJson1);
function cambia(event){
    console.log(event.currentTarget);
    const label=document.querySelector('form');
    label.classList.remove('rimuovi');
    //label.addEventListener('submit', inserisci);

}


const prepara=document.querySelector('#contenuti');
let id, conta;
function onJson2(json){
    console.log(json);
    if(json.length!==0){
    console.log(json[0].foto);
    
     prepara.innerHTML='';
    
     conta=json.length;
     console.log(conta);
     
    for(i=0; i<conta; i++){
        id=json[i].id;
        let img=json[i].foto;
        const div=document.createElement('span');
        const image= document.createElement('img');
        console.log(img, id);
        image.src=img;
        div.id='id';
        div.appendChild(image);
        div.setAttribute("data-id",id);
        prepara.appendChild(div);
        
        div.addEventListener('click', elimina);
        fav.addEventListener('click', preferiti);
    }       
    }else{
        console.log('non ci sono post');
    }
}

    function elimina(event){
        console.log(event.currentTarget);
        elemento=event.currentTarget;
        //let prova=elemento.querySelector('#id');
        //console.log(elemento.querySelector('#id'));
        const ido=elemento.getAttribute("data-id");
        // console.log(elemento.getAttribute("data-id"));
        // console.log(elemento.getElementsByTagName('img'));
        let foto=elemento.getElementsByTagName('img');
        // console.log(foto[0].currentSrc);
        
        
        const bott=document.createElement('input');
        bott.type='submit';
        bott.value='elimina';
        bott.id='elimina';
        elemento.appendChild(bott);


        let submit=document.querySelector('#elimina');
        
        submit.addEventListener('click', cancella);
        fetch('rimuovi/'+ ido);
    }
    
    
    function cancella(event){
         console.log("eliminato");
        
        console.log("eliminato1");
        window.location.reload();
        event.preventDefault();
    }
    const prefe= document.querySelector('.prefe');
    prefe.classList.add('rimuovi');

    const fav=document.querySelector('#like'); 
    //fav.addEventListener('click', preferiti);

    function onJson3(json){
        console.log(json);
        console.log(fav);
        if(fav!=null){
            fav.classList.add('rimuovi');
            let sub=document.createElement('input');
            sub.type='submit';
            sub.id='like';
            sub.value='Non mostrare i like';
            prefe.appendChild(sub);
            sub.addEventListener('click', dontsee);
        }

        if(json.length!==0){
             prepara.innerHTML='';
            
             conta=json.length;
             console.log(conta);
             
            for(i=0; i<conta; i++){
                id=json[i].id;
                let img=json[i].elemento;
                //prefe.classList.remove('rimuovi');
                
                const image= document.createElement('img');
                //console.log(img, id);
                image.src=img;
                image.classList.add('prefe');
                //prefe.id='id';
                prefe.appendChild(image);
                
               
            }       
            }else{
                console.log('non hai like');
            }
        

    }
    
    function preferiti(){
        prefe.classList.remove('rimuovi');
        fetch(FOTO+'prefe').then(onResponse).then(onJson3);

    }
    function dontsee(){
        prefe.innerHTML='';

        fetch(FOTO +'contenuti').then(onResponse).then(onJson2);
        fav.classList.remove('rimuovi');
    }
    