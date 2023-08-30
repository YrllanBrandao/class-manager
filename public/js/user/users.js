const formsDelete = document.querySelectorAll(".form-delete");

formsDelete.forEach(form => {
    form.addEventListener("submit", e => {
        e.preventDefault();
        const usernameInput = form.querySelector(".username");
        const username = usernameInput.value;
        const response = confirm(`Você tem certeza que deseja deletar o usuário ${username} ?`);

        if (response) {
            form.submit();
        }
    })
})