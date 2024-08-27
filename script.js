let inputeList = [];

function textValidate(myInput){
    let myInputValue = myInput.value.trim();
    let myInputCheck = document.getElementById(myInput.id + "_check");
    let buttonSignUp = document.getElementById("registratiBtn");

    if(myInputValue == undefined || myInputValue == ""){
        myInputCheck.classList.remove("okCheck");
        myInputCheck.classList.add("errorCheck");
        myInputCheck.innerHTML = "Error";
        inputList[myInput.id] = 0;
    }else{
        myInputCheck.classList.remove("errorCheck");
        myInputCheck.classList.add("okCheck");
        myInputCheck.innerHTML = "Ok";        
        inputList[myInput.id] = 1;
    }    
    buttonSignUp.disabled = checkAllInput() ? false : true; 
}