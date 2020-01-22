document.addEventListener("DOMContentLoaded", function (event) {
    const top_level_menu = document.querySelectorAll('a[href="#toggle-menu"], li.toggle-menu:not(.menu-item)');
    top_level_menu.forEach(function (item) {
        item.addEventListener('click', function (event) {
            event.preventDefault();
            event.stopPropagation();

            const menu = this.querySelector('ul');

            if (menu.classList.contains('hidden')) {
                const already_active = document.querySelector('.submenu:not(.hidden)');
                if (already_active && already_active !== this) {
                    already_active.classList.toggle('hidden');
                }
            }

            menu.classList.toggle('hidden');
        })
    });

    const submenu_items = document.querySelectorAll('li.toggle-menu.menu-item');
    if (submenu_items) {
        submenu_items.forEach(function (menu) {
            menu.addEventListener('click', function (event) {
                event.stopPropagation();
                this.querySelector('ul').classList.toggle('hidden');
            })
        })
    }

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
