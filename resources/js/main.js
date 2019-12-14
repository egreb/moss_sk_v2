document.addEventListener("DOMContentLoaded", function(event) {
    const toggable_menu_items = document.querySelectorAll('a[href="#toggle-menu"], li.submenu');

    console.log(toggable_menu_items);
    toggable_menu_items.forEach(function(item) {
        item.addEventListener('click', function(event) {
            event.preventDefault();
            event.stopPropagation();

            const menu = this.querySelector('ul');

            menu.classList.toggle('hidden')
        })
    })
});
