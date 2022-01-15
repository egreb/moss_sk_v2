document.addEventListener("DOMContentLoaded", function (event) {
    const top_level_menu = document.querySelectorAll(
        '.nav-item'
    );
    console.log({top_level_menu})
    top_level_menu.forEach(function (item) {
        console.log({item})
        item.addEventListener("click", function (event) {
            event.preventDefault();
            event.stopPropagation();

            const menu = this.querySelector("ul");
            if (menu.classList.contains("hidden")) {
                const already_active = document.querySelector(
                    ".nav-item__menu:not(.hidden)"
                );
                console.log({already_active, this:this, equal: already_active && already_active.isEqualNode(this)})
                if (already_active && already_active.isEqualNode(this)) {
                    already_active.classList.toggle("hidden");
                }
            }

            menu.classList.toggle("hidden");
        });
    });

    const submenu_items = document.querySelectorAll("li.toggle-menu.menu-item");
    if (submenu_items) {
        submenu_items.forEach(function (menu) {
            menu.addEventListener("click", function (event) {
                event.stopPropagation();
                this.querySelector("ul").classList.toggle("hidden");
            });
        });
    }

    const toggleMenuButton = document.getElementById("toggle-menu");
    if (toggleMenuButton) {
        toggleMenuButton.addEventListener("click", function (event) {
            event.stopPropagation();
            const menu = document.querySelector("#menu");
            if (menu) {
                menu.classList.toggle("hidden");
            }
        });
    }

    function closeMenuIfClickedOutside() {
        if (toggleMenuButton) {
            document.querySelector("#menu").classList.add("hidden");
        }

        document.querySelectorAll("ul.submenu").forEach(function (menuItem) {
            menuItem.classList.add("hidden");

            menuItem.querySelectorAll("ul").forEach(function (subMenuItem) {
                subMenuItem.classList.add("hidden");
            });
        });
    }

    window.addEventListener("click", closeMenuIfClickedOutside);
});
