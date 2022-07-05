let i, images;
let ricerca;
let z;

function onJson(json){
    console.log('JSON ricevuto');
     
     images = json.results; 
     const visione = document.querySelector('#foto'); 
     visione.innerHTML= ''; 
     visione.classList.add('disposizione');
    
     for( i=0; i<30; i++){
    
        
        img = json.results[i].urls.small;
        const image = document.createElement('img');
        
        image.src=img;

        visione.appendChild(image);
        
        }

          const v = document.querySelectorAll('#foto img'); 
          for(let calft of v) {
          calft.addEventListener('click', seleziona);
          
        
      }

}
function onResponse(response) {
    console.log('Risposta ricevuta');
    return response.json();
  }

function search(event){
    
    
    ricerca = form.ricerca.value;
    console.log(ricerca); 
    fetch(FOTO+'cerca/'+encodeURIComponent(ricerca)).then(onResponse).then(onJson);
    document.querySelector('form')
    event.preventDefault();

}
const form = document.querySelector('#cerca');
form.addEventListener('submit', search);

function seleziona(event){
    
    //console.log(ricerca);
    console.log(event.currentTarget);
    if(event.currentTarget!==0){
        
        document.querySelector('#testo').classList.add('barra');
        prova.innerHTML='';

        const image = document.createElement('img');
        image.id='sub';
        let img= event.currentTarget.src; 
        console.log(img);
        image.src=img;
        z =img;
        console.log(image.src);
        const visione = document.querySelector('#foto'); 
        visione.classList.add('barra');   
        prova.classList.add('selez');
        prova.appendChild(image);
        const sub= document.createElement('input');
        sub.type='submit';
        sub.value='Aggiungi al tuo profilo';
        sub.id='submit';
        prova.appendChild(sub);
        //let cuore=document.createElement('img');
        console.log(z);
        const form_data=new FormData();
        
        form_data.append('_token', csrf_token);
        form_data.append('foto', z);
        for(let value of form_data.values()){
            console.log(value);
        }
        fetch('verifico/', {method: 'post', body:form_data}).then(onResponse).then(verificala);
    
    
        
        

        let submit=document.querySelector('#submit');

        submit.addEventListener('click', inserisci);

       
    }

} 
function verificala(json){
    let cuore=document.createElement('img');
    console.log(json);
    if(json === 'ok'){
        cuore.src='img/like.png';
        cuore.id='cuore';
        prova.appendChild(cuore);
        document.querySelector('#cuore').addEventListener('click', remove);
    }else{
        cuore.src='img/cuore.png';
        cuore.id='cuore';
        prova.appendChild(cuore);
        document.querySelector('#cuore').addEventListener('click', preferiti);
    }
}
    const prova=document.querySelector('.seleziona');
    const messaggio=document.querySelector('#scritta');
    messaggio.classList.add('barra');

    function inserisci(event){
        console.log("HAI CLICCATO SUB");
        console.log(z);
        let bottone=z;
        console.log(bottone);
        const form_data=new FormData();
        
        form_data.append('_token', csrf_token);
        form_data.append('foto', bottone);
        for(let value of form_data.values()){
            console.log(value);
        }
        fetch('inserisci', {method: 'post', body:form_data}).then(avanti);
       
        
        event.preventDefault();
    }

    function preferiti(event){
        console.log(event.currentTarget.src);
        let cuore = document.querySelector('#cuore');
        cuore.src='img/like.png';

        console.log("preferiti");
        console.log(z);
        let elem=z;
        const form_data=new FormData();
        
        form_data.append('_token', csrf_token);
        form_data.append('foto', elem);
        for(let value of form_data.values()){
            console.log(value);
        }
        fetch('preferiti', {method: 'post', body:form_data});
        document.querySelector('#cuore').removeEventListener('click', preferiti);
        document.querySelector('#cuore').addEventListener('click', remove);

    }
    function remove(event){

        console.log(event);
        let cuore = document.querySelector('#cuore');
        console.log(cuore);
        cuore.src='img/cuore.png';
        console.log(cuore);
        prova.appendChild(cuore);
        console.log(prova);

        console.log("preferiti");
        console.log(z);
        let elem=z;
        const form_data=new FormData();
        form_data.append('_token', csrf_token);
        form_data.append('foto', elem);
        for(let value of form_data.values()){
            console.log(value);
        }
        fetch('remove',{method: 'post', body:form_data});
        document.querySelector('#cuore').removeEventListener('click', remove);
        document.querySelector('#cuore').addEventListener('click', preferiti);


    }
    
    function avanti(){
        
        const boxes = document.querySelectorAll('.seleziona');

        boxes.forEach(box => {
            box.remove();
        });
        messaggio.classList.remove('barra');
    }

