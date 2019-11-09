// require('./bootstrap');

(function() {
    const toggleMenuButton = document.getElementById('toggle-menu');
    if (toggleMenuButton) {
        toggleMenuButton.addEventListener('click', function() {
            const menu = document.querySelector('#menu');
            if (menu) {
                menu.classList.toggle('hidden');
            }
        });
    }
})();
