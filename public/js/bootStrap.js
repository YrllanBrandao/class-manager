const btnHiddenAlert = document.querySelectorAll(".btn-hidden-alert");

btnHiddenAlert.forEach(button => {
    button.addEventListener("click", () => {

        const target = button.dataset.alert;
        const alert = document.getElementById(target);

        alert.classList.add("d-none");
    })
})