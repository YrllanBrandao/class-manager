const password = document.getElementById('password');
const passwordConfirm = document.getElementById('password2');
const form = document.getElementById("form-register");
const invalidFeedback = document.getElementById("invalid-feedback");
form.addEventListener("submit", e =>{
    e.preventDefault();

    if(password.value === passwordConfirm.value)
    {
        form.submit();
    }
    else{
        password.classList.add("border");
        password.classList.add("border-danger");
        passwordConfirm.classList.add("border");
        passwordConfirm.classList.add("border-danger");

        invalidFeedback.classList.remove("d-none");

      
    }
})



