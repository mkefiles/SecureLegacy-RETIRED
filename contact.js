/* CONTACT FORM FUNCTIONALITY: START */
let fullName = document.getElementById("full_name");
let errorName = document.getElementById("error_name");

let emailAddress = document.getElementById("email_address");
let errorEmail = document.getElementById("error_email");

let phoneNumber = document.getElementById("phone_number");
let errorPhone = document.getElementById("error_phone");

let messageInput = document.getElementById("message_input");
let errorMessage = document.getElementById("error_message");

let formButton = document.getElementById("form_button");

function nameCheck(name){
    let pattern = /^[a-zA-Z\s]+$/;
    return pattern.test(name);
}
function emailCheck(email){
    let pattern = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    return pattern.test(email);
}
function numberCheck(num){
    let pattern = /\d{3}\-\d{3}\-\d{4}/;
    return pattern.test(num);
}
function isValidInput(){
    if(fullName.classList.contains("valid") &&
    emailAddress.classList.contains("valid") &&
    phoneNumber.classList.contains("valid") &&
    messageInput.classList.contains("valid")){
        formButton.classList.remove("btn--disabled");
        formButton.disabled = false;
    }else{
        formButton.disabled = true;
        formButton.classList.add("btn--disabled");
    }
}

// Set Button to Disabled (By Default)
formButton.disabled = true;
formButton.classList.add("btn--disabled");

fullName.addEventListener("change", () => {
    if(!nameCheck(fullName.value)){
        errorName.style.display = "block";
        fullName.classList.remove("valid");
        fullName.classList.add("invalid");
        isValidInput();
    }else{
        errorName.style.display = "none";
        fullName.classList.remove("invalid");
        fullName.classList.add("valid");
        isValidInput();
    }
});

emailAddress.addEventListener("change", () => {
    if(!emailCheck(emailAddress.value)){
        errorEmail.style.display = "block";
        emailAddress.classList.remove("valid");
        emailAddress.classList.add("invalid");
        isValidInput();
    }else{
        errorEmail.style.display = "none";
        emailAddress.classList.remove("invalid");
        emailAddress.classList.add("valid");
        isValidInput();
    }
});

phoneNumber.addEventListener("change", () => {
    if(!numberCheck(phoneNumber.value)){
        errorPhone.style.display = "block";
        phoneNumber.classList.remove("valid");
        phoneNumber.classList.add("invalid");
        isValidInput();
    }else{
        errorPhone.style.display = "none";
        phoneNumber.classList.remove("invalid");
        phoneNumber.classList.add("valid");
        isValidInput();
    }
});

messageInput.addEventListener("change", () => {
    if(messageInput.value === ""){
        errorMessage.style.display = "block";
        messageInput.classList.remove("valid");
        messageInput.classList.add("invalid");
        isValidInput();
    }else{
        errorMessage.style.display = "none";
        messageInput.classList.remove("invalid");
        messageInput.classList.add("valid");
        isValidInput();
    }
});
/* CONTACT FORM FUNCTIONALITY: END */