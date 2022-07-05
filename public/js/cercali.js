
function onJson(json){

    console.log("Json ricevuto");
    console.log(json);
    if(json[0]==null){
        console.log('non ce');
    }else{
         const pers=document.querySelector('#nome');

    pers.innerHTML='';
    pers.classList.add('elem');
    const nome=document.createElement('div');
    nome.textContent=json[0].nickname;
    const immage=document.createElement('img');
    immage.src=json[0].image;
    img=immage.src;
    console.log('3');
    pers.appendChild(nome);
    pers.appendChild(immage);
    
    fetch(FOTO+'cercapost/'+json[0].nickname).then(onResponse1).then(onJson2);
    
    }
   
    
}
let utente;

function cerca(event){
    
    nickname=form.cerca.value;
    console.log(nickname);

    //fetch('cercalinome'+ encodeURIComponent(nome)).then(onResponse).then(onJson);
    fetch(FOTO+"porfavor/"+nickname).then(onResponse).then(onJson);
    event.preventDefault();
}
const form = document.querySelector('.cerca');
form.addEventListener('submit', cerca);

function onResponse(response){ 
       return response.json(); 
 }

 function onResponse1(response){ 
    return response.json(); 
}

 let i;
function onJson2(json){
    console.log("Json ricevuto");
    console.log(json);
    const section=document.querySelector('#foto');
    section.innerHTML='';

    let conta;
    conta=json.length;
    section.classList.add('el');
    for(let i=0; i<conta; i++){

        const immage=document.createElement('img');
        immage.src=json[i].foto;
        section.appendChild(immage);

    }
    

}

