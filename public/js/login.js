function validazione(event)
{console.log(nickname.value);
    
    // Verifica se tutti i campi sono riempiti
    if(nickname.value.length === 0 || password.value.length === 0)
    {
        
        document.querySelector('#mess').textContent="Compilare tutti i campi.";
        //document.querySelector('#mess').classList.add('errorj');     
        event.preventDefault();
    }
    else{
        //document.querySelector('#mess').classList.remove('errorj');
        document.querySelector('#mess').classList.add('messaggio');
    }
        
}
// const span=document.querySelector('span');
// span.classList.add('messaggio');
// function checkNickname(event) {
        
    
//     if(!/^[a-zA-Z0-9_]{1,15}$/.test(nickname.value)) {
//         console.log(nickname.value);
//         span.classList.remove('messaggio');
//         document.querySelector('.nickname span').textContent = "Sono ammesse lettere, numeri e underscore. Max. 15";
//         document.querySelector('.nickname').classList.add('errorj');            
        
//     } else {
//         span.classList.add('messaggio');
//         fetch(FOTO+'checknickname/'+encodeURIComponent(nickname.value)).then(fetchResponse).then(jsonCheckNickname);
//     }    
// }
// function fetchResponse(response) {
//     if (!response.ok) return null;
//     return response.json();
// }
// function jsonCheckNickname(json) {
//     console.log(json);
        
//     if (json.exists) {
//         document.querySelector('.nickname').classList.remove('errorj');
//     } else {
        
//         document.querySelector('.nickname span').textContent = "Nikckname insesistente";
//         document.querySelector('.nickname').classList.add('errorj');
//         span.classList.remove('messaggio');
        
        
//     }

// }
// function fetchResponse1(response) {
//     //if (!response.ok) return null;
//     return response;
// }
// function jsonCheckPassword(json){
//     if (json.exists) {
//         document.querySelector('.password').classList.remove('errorj');
//     } else {
        
//         document.querySelector('.password span').textContent = "Errore";
//         document.querySelector('.password').classList.add('errorj');
//         span.classList.remove('messaggio');
        
        
//     }
// }
// function checkPassword(event) {
//     const passwordInput = document.querySelector('.password input');
//     if(passwordInput!=null){
//         span.classList.add('messaggio');
//         fetch(FOTO+'checkpassword/'+encodeURIComponent(nickname.value)+'/'+encodeURIComponent(password.value)).then(fetchResponse1).then(jsonCheckPassword);
//     }
// }

// // Riferimento al form
const input= document.querySelector('.nickname input');
const inp= document.querySelector('.password input');
// // Aggiungi listener
input.addEventListener('blur', validazione);
inp.addEventListener('blur', validazione);
const nickname = document.querySelector('.nickname input')
// nickname.addEventListener('blur', checkNickname);
const password=document.querySelector('.password input');
// password.addEventListener('blur', checkPassword);