// Delegación única para submenús y dropdown de perfil
(function(){
    const footerDropdown = document.querySelector('.footer-dropdown');
    const sidebar = document.querySelector('.sidebar');
    const closeFooterDropdown = () => {
        if (!footerDropdown) return;
        footerDropdown.setAttribute('hidden','');
        const t = document.querySelector('.sidebar-profile');
        if (t) t.classList.remove('open');
    };

    document.addEventListener('click', (e) => {
        // 1) Acordeón de submenús
        const toggle = e.target.closest('.menu-toggle');
        if (toggle) {
            e.preventDefault();
            const current = toggle.closest('.menu-item-with-submenu');
            if (current) {
                document.querySelectorAll('.menu-item-with-submenu.open').forEach(li => {
                    if (li !== current) li.classList.remove('open');
                });
                current.classList.toggle('open');
            }
            return; // no propagar más acciones para este click
        }

        // 2) Toggle del dropdown desde el perfil
        const profile = e.target.closest('.sidebar-profile');
        if (profile && footerDropdown) {
            const willOpen = footerDropdown.hasAttribute('hidden');
            closeFooterDropdown();
            if (willOpen) {
                footerDropdown.removeAttribute('hidden');
                profile.classList.add('open');
            }
            return;
        }

        // 3) Cerrar si click fuera del dropdown o si el sidebar está oculto
        if (footerDropdown && (!e.target.closest('.footer-dropdown') || (sidebar && sidebar.classList.contains('hidden')))) {
            closeFooterDropdown();
        }
    });
})();
