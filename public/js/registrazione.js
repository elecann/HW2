
function validazione(event)
{
    if(nome.value.length === 0 ||cognome.value.length === 0 ||nickname.value.length === 0 ||email.value.length === 0 || password.value.length === 0)
    {
        
        document.querySelector('#mess').textContent="Compilare tutti i campi.";
       
        event.preventDefault();
    }
}


const span=document.querySelector('.nome span');
span.classList.add('messaggio');
    function checkNome(event) {
        
        if ( nome.value.length > 0) {
            span.classList.add('messaggio');
            document.querySelector('.nome').classList.remove('errorj');
        } else {
            document.querySelector('.nome').classList.add('errorj');
            span.classList.remove('messaggio');
        }
    }

    const s=document.querySelector('.cognome span');
    s.classList.add('messaggio');

    function checkCognome(event) {
        
        if (cognome.value.length > 0) {
            s.classList.add('messaggio');
            document.querySelector('.cognome').classList.remove('errorj');
        } else {
            document.querySelector('.cognome').classList.add('errorj');
            s.classList.remove('messaggio');
        }
    }

    const sp=document.querySelector('.nickname span');
    sp.classList.add('messaggio');

    function jsonCheckNickname(json) {
        console.log(json);
            
        if (!json.exists) {
            document.querySelector('.nickname').classList.remove('errorj');
        } else {
            
            document.querySelector('.nickname span').textContent = "Nome utente già utilizzato";
            document.querySelector('.nickname').classList.add('errorj');
            sp.classList.remove('messaggio');
             
        }
    
    }
    const spa=document.querySelector('.email span');
    spa.classList.add('messaggio');

    function jsonCheckEmail(json) {
        // Controllo il campo exists ritornato dal JSON
        console.log(json);
        if (!json.exists) {
            spa.classList.add('messaggio');
            document.querySelector('.email').classList.remove('errorj'); 
        } else {
            document.querySelector('.email span').textContent = "Email già utilizzata";
            document.querySelector('.email').classList.add('errorj');
            spa.classList.remove('messaggio');
        }
    
    }
    
    function fetchResponse(response) {
        if (!response.ok) return null;
        return response.json();
    }
    
    function checkNickname(event) {
        
    
        if(!/^[a-zA-Z0-9_]{1,15}$/.test(nickname.value)) {
            console.log(nickname.value);
            sp.classList.remove('messaggio');
            document.querySelector('.nickname span').textContent = "Sono ammesse lettere, numeri e underscore. Max. 15";
            document.querySelector('.nickname').classList.add('errorj');            
            
        } else {
            sp.classList.add('messaggio');
            fetch(FOTO+'checknickname/'+encodeURIComponent(nickname.value)).then(fetchResponse).then(jsonCheckNickname);
        }    
    }
    
    function checkEmail(event) {
        const emailInput = document.querySelector('.email input');
        if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(emailInput.value).toLowerCase())) {
            spa.classList.remove('messaggio');
            document.querySelector('.email span').textContent = "Email non valida";
            document.querySelector('.email').classList.add('errorj');
            
        } else {
            sp.classList.add('messaggio');
            fetch(FOTO+'checkemail/'+encodeURIComponent(String(emailInput.value).toLowerCase())).then(fetchResponse).then(jsonCheckEmail);
        }
    }
    const spann=document.querySelector('.password span');
    spann.classList.add('messaggio');

    function checkPassword(event) {
        const passwordInput = document.querySelector('.password input');
        let check=/[0-9]/;
        let check2=/[a-z]/;
        let check3=/[A-Z]/;
        var check4=/[$-/:-?{-~!"^_`\[\]]/;
        

        if(!(check&&check2&&check3&&check4).test(String(passwordInput.value).toLowerCase())){
            
            spann.classList.remove('messaggio');
            document.querySelector('.password').classList.add('errorj');
            //document.querySelector('.password div').textContent = spann;
        }else{
            a=8;
            console.log(8);
                     if(passwordInput.value.length>=8){
                           
                                document.querySelector('.password').classList.remove('errorj');
                                spann.classList.add('messaggio');
    }}    }     

   
    const nome = document.querySelector('.nome input');
    nome.addEventListener('blur', checkNome);
    const cognome = document.querySelector('.cognome input')
    cognome.addEventListener('blur', checkCognome);
    const nickname = document.querySelector('.nickname input')
    nickname.addEventListener('blur', checkNickname);
    const email = document.querySelector('.email input')
    email.addEventListener('blur', checkEmail);
    const password = document.querySelector('.password input')
    password.addEventListener('blur', checkPassword);
    const button = document.querySelector('#mandalo');
    button.addEventListener('click', validazione);
    
