const navbarItems = document.querySelectorAll(".navbar-item");




navbarItems.forEach(item => {
    item.addEventListener("click", () => {

        const hasChild = item.classList.contains("has-child");

        if (hasChild && item.tagName === 'LI') {
            const child = item.dataset.child;

            if (child !== null) {
                const isOpen = isOpened(child);
                if (isOpen) {
                    hiddenChild(child);
                    
                    item.classList.add("active");
                }
                else {
                    item.classList.remove("active");
                    showChild(child);
                }
            }
        }

    })
})


function showChild(childId) {
    const childList = document.getElementById(childId);
    childList.classList.add("hidden");


}

function hiddenChild(childId) {
    const childList = document.getElementById(childId);
    childList.classList.remove("hidden");

}

function isOpened(childId) {
    const childList = document.getElementById(childId);

    const contains = childList.classList.contains("hidden");

    if (contains) {
        return true;
    }
    else {
        return false;
    }

}