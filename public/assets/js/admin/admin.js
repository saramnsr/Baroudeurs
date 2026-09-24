(function () {
    'use strict';

    // ===== Afficher / masquer le mot de passe =====
    document.querySelectorAll('[data-password-toggle]').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var input = document.getElementById(btn.getAttribute('data-password-toggle'));
            if (!input) return;

            var show = input.type === 'password';
            input.type = show ? 'text' : 'password';
            btn.setAttribute('aria-pressed', String(show));
            btn.setAttribute('aria-label', show ? 'Masquer le mot de passe' : 'Afficher le mot de passe');
            btn.querySelector('.icon-show').hidden = show;
            btn.querySelector('.icon-hide').hidden = !show;
        });
    });

    // ===== Sidebar mobile =====
    var sidebar = document.getElementById('admin-sidebar');
    var overlay = document.querySelector('.admin-overlay');
    var toggle = document.querySelector('[data-sidebar-toggle]');

    if (!sidebar) return; // Page sans sidebar (connexion)

    function setSidebar(open) {
        sidebar.classList.toggle('is-open', open);
        document.body.classList.toggle('admin-sidebar-open', open);
        if (overlay) overlay.hidden = !open;
        if (toggle) toggle.setAttribute('aria-expanded', String(open));
    }

    // Ouvrir / fermer avec le bouton menu
    if (toggle) {
        toggle.addEventListener('click', function () {
            setSidebar(!sidebar.classList.contains('is-open'));
        });
    }

    // Fermer : bouton X ou clic sur le fond sombre
    document.querySelectorAll('[data-sidebar-close]').forEach(function (el) {
        el.addEventListener('click', function () { setSidebar(false); });
    });

    // Fermer avec Échap
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && sidebar.classList.contains('is-open')) setSidebar(false);
    });

    // Retour en desktop : on réinitialise
    window.matchMedia('(min-width: 992px)').addEventListener('change', function (e) {
        if (e.matches) setSidebar(false);
    });
})();