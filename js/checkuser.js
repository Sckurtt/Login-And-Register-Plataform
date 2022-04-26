var inputHTML = document.querySelector('.userInput');
const pHTML = document.querySelector(".result");
const validUser = document.querySelector('.valid');

inputHTML.addEventListener("keyup", (e)=>{ // Função que escuta a tecla pressionada
  key = e.which; // Pega o número da  tecla
  keyMark = ''; // Vai guardar o resultado da digitação
  var user = ''; // Vai ser enviado para check_user.php
  if((key >= 65 && key <= 90) || (key >= 48 && key <= 57)){
      
    // A - Z && 0 - 9
    
     // Exibe no front o resultado da digitação
    user = inputHTML.value;
    keyMark = pHTML.textContent;
    inputValue = inputHTML.value;
    // ---- AJAX -------
 
    
    if(inputValue.length <= 19){
      console.log(inputValue.length);
      $.ajax({
        method: "GET",
        url: "php/check_user.php",
        data: { user: user}
        })
        .done(function( msg ) {
            validUser.textContent = '' + msg;
        });
        pHTML.textContent += e.key;
    }

    
    console.log(keyMark);
  
  }else if(key == 32){ // Space
    alert("O nome de usuário não pode conter espaços!");
    // keyMark = keyMark.replace(' ', '');
  }else if(key == 8){ 
    keyMark = pHTML.textContent;
    keyMark = keyMark.slice(0,-1);
    pHTML.textContent = keyMark;
    // console.log(keyMark);
    // ---- AJAX -------
    $.ajax({
        method: "GET",
        url: "php/check_user.php",
        data: { user: keyMark}
        })
        .done(function( msg ) {
            validUser.textContent = '' + msg;
        });
        console.log(keyMark);
  }
  if(key == 8){
    if(inputHTML.value == ''){
      pHTML.textContent = '';
      keyMark = pHTML.textContent;
      // ---- AJAX -------
      $.ajax({
        method: "GET",
        url: "php/check_user.php",
        data: { user: user}
        })
        .done(function( msg ) {
            
            if(inputHTML.value == ''){
                validUser.textContent = 'O nome de usuário é inválido';
            }else{
                validUser.textContent = '' + msg;
            }
        });
        
      console.log(keyMark);
    }
  }
})
