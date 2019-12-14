document.addEventListener("DOMContentLoaded", function(event) {
    const toggable_menu_items = document.querySelectorAll('a[href="#toggle-menu"], li.submenu');

    toggable_menu_items.forEach(function(item) {
        item.addEventListener('click', function(event) {
            event.preventDefault();
            event.stopPropagation();

            const menu = this.querySelector('ul');

            menu.classList.toggle('hidden')
        })
    });

    const toggleMenuButton = document.getElementById("toggle-menu");
    if (toggleMenuButton) {
        toggleMenuButton.addEventListener("click", function () {
            const menu = document.querySelector("#menu");
            if (menu) {
                menu.classList.toggle("hidden");
            }
        });
    }
});
