const form = document.getElementById("form-update");
const user = document.getElementById("username");
form.addEventListener("submit", e =>{
    e.preventDefault();
    const username = user.value;
    const confirm = window.confirm(`Tem certeza que deseja atualizar o usuário ${username}?`);

    if(confirm){
        form.submit();
    }

})



