// ==========================================================
// Admin — Baroudeurs du Désert
// ==========================================================

// ===== Afficher / masquer le mot de passe =====
(function () {
    'use strict';

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
})();

// ===== Sidebar mobile =====
(function () {
    'use strict';

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

    if (toggle) {
        toggle.addEventListener('click', function () {
            setSidebar(!sidebar.classList.contains('is-open'));
        });
    }

    document.querySelectorAll('[data-sidebar-close]').forEach(function (el) {
        el.addEventListener('click', function () { setSidebar(false); });
    });

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && sidebar.classList.contains('is-open')) setSidebar(false);
    });

    window.matchMedia('(min-width: 992px)').addEventListener('change', function (e) {
        if (e.matches) setSidebar(false);
    });
})();

// ===== Itinéraire : ajouter / retirer un jour =====
(function () {
    'use strict';

    function renumber(collection) {
        var label = collection.getAttribute('data-item-label') || '';
        collection.querySelectorAll('[data-collection-num]').forEach(function (el, i) {
            el.textContent = label + ' ' + (i + 1);
        });
    }

    document.querySelectorAll('[data-collection]').forEach(function (collection) {
        var list = collection.querySelector('[data-collection-list]');

        collection.querySelector('[data-collection-add]').addEventListener('click', function () {
            var index = parseInt(collection.getAttribute('data-index'), 10) || 0;
            var item = document.createElement('div');
            item.className = 'admin-collection__item';
            item.setAttribute('data-collection-item', '');
            item.innerHTML =
                '<div class="admin-collection__head">' +
                    '<span class="admin-collection__num" data-collection-num></span>' +
                    '<button type="button" class="admin-btn admin-btn--danger-ghost admin-btn--sm" data-collection-remove>' +
                        '<i class="fas fa-trash-alt" aria-hidden="true"></i> Retirer' +
                    '</button>' +
                '</div>' +
                collection.getAttribute('data-prototype').replace(/__name__/g, String(index));

            list.appendChild(item);
            collection.setAttribute('data-index', String(index + 1));
            renumber(collection);

            var first = item.querySelector('input, textarea');
            if (first) first.focus();
        });

        collection.addEventListener('click', function (e) {
            var btn = e.target.closest('[data-collection-remove]');
            if (!btn) return;
            btn.closest('[data-collection-item]').remove();
            renumber(collection);
        });
    });
})();

// ===== Inclus / non inclus : liste déroulante à choix multiples =====
(function () {
    'use strict';

    function normalize(text) {
        return text.trim().toLowerCase();
    }

    function makeRemoveButton(label) {
        var btn = document.createElement('button');
        btn.type = 'button';
        btn.className = 'admin-chip__remove';
        btn.setAttribute('aria-label', 'Retirer ' + label);
        btn.innerHTML = '&times;';
        return btn;
    }

    document.querySelectorAll('[data-tag-picker]').forEach(function (picker) {
        var chips = picker.querySelector('[data-tag-chips]');
        var list = picker.querySelector('[data-tag-list]');
        var input = picker.querySelector('[data-tag-input]');
        var addBtn = picker.querySelector('[data-tag-add]');
        var summary = picker.querySelector('[data-tag-summary]');
        var placeholder = summary.textContent;
        var options = picker.querySelectorAll('.admin-multiselect__option input[type="checkbox"]');

        // Met à jour les étiquettes affichées + le texte du bouton
        function refresh() {
            chips.innerHTML = '';

            options.forEach(function (checkbox) {
                if (!checkbox.checked) return;

                var option = checkbox.closest('.admin-multiselect__option');
                var text = option.querySelector('[data-tag-text]').textContent.trim();
                var icon = option.querySelector('.admin-multiselect__icon i');

                var chip = document.createElement('span');
                chip.className = 'admin-chip';
                if (icon) {
                    var i = document.createElement('i');
                    i.className = icon.className;
                    i.setAttribute('aria-hidden', 'true');
                    chip.appendChild(i);
                }
                var span = document.createElement('span');
                span.textContent = text;
                chip.appendChild(span);

                var remove = makeRemoveButton(text);
                remove.addEventListener('click', function () {
                    checkbox.checked = false;
                    refresh();
                });
                chip.appendChild(remove);
                chips.appendChild(chip);
            });

            var count = chips.children.length + list.children.length;
            summary.textContent = count === 0
                ? placeholder
                : count + (count > 1 ? ' éléments sélectionnés' : ' élément sélectionné');
        }

        // Ajoute un nouvel élément saisi à la main
        function addTag() {
            var value = input.value.trim();
            if (!value) return;

            // Existe déjà dans la liste : on le coche
            var existing = Array.prototype.find.call(options, function (checkbox) {
                var text = checkbox.closest('.admin-multiselect__option').querySelector('[data-tag-text]').textContent;
                return normalize(text) === normalize(value);
            });
            if (existing) {
                existing.checked = true;
                input.value = '';
                refresh();
                return;
            }

            // Déjà ajouté à la main : on ignore le doublon
            var duplicate = Array.prototype.some.call(list.querySelectorAll('[data-tag-text]'), function (el) {
                return normalize(el.textContent) === normalize(value);
            });
            if (duplicate) {
                input.value = '';
                return;
            }

            var index = parseInt(picker.getAttribute('data-index'), 10) || 0;
            var chip = document.createElement('span');
            chip.className = 'admin-chip';
            chip.setAttribute('data-tag-item', '');
            chip.innerHTML = picker.getAttribute('data-prototype').replace(/__name__/g, String(index));
            chip.querySelector('input').value = value;

            var text = document.createElement('span');
            text.setAttribute('data-tag-text', '');
            text.textContent = value;
            chip.appendChild(text);

            var remove = makeRemoveButton(value);
            remove.setAttribute('data-tag-remove', '');
            chip.appendChild(remove);

            list.appendChild(chip);
            picker.setAttribute('data-index', String(index + 1));
            input.value = '';
            input.focus();
            refresh();
        }

        options.forEach(function (checkbox) {
            checkbox.addEventListener('change', refresh);
        });

        addBtn.addEventListener('click', addTag);

        // Entrée = ajouter (et ne pas envoyer le formulaire)
        input.addEventListener('keydown', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                addTag();
            }
        });

        list.addEventListener('click', function (e) {
            var btn = e.target.closest('[data-tag-remove]');
            if (!btn) return;
            btn.closest('[data-tag-item]').remove();
            refresh();
        });

        refresh();
    });

    // Fermer les listes : clic ailleurs ou touche Échap
    document.addEventListener('click', function (e) {
        document.querySelectorAll('[data-tag-dropdown][open]').forEach(function (dropdown) {
            if (!dropdown.contains(e.target)) dropdown.open = false;
        });
    });
    document.addEventListener('keydown', function (e) {
        if (e.key !== 'Escape') return;
        document.querySelectorAll('[data-tag-dropdown][open]').forEach(function (dropdown) {
            dropdown.open = false;
        });
    });
})();

// ===== Images : glisser-déposer, image principale, suppression =====
(function () {
    'use strict';

    var zone = document.querySelector('[data-dropzone]');
    var grid = document.querySelector('[data-gallery]');
    var mainInput = document.querySelector('[data-main-index]');
    if (!zone || !grid || !mainInput) return;

    var input = zone.querySelector('input[type="file"]');
    var MAX = 20;
    var files = [];
    var urls = [];

    // Recopie la liste JS dans le vrai champ fichier (ce qui sera envoyé)
    function sync() {
        var dt = new DataTransfer();
        files.forEach(function (f) { dt.items.add(f); });
        input.files = dt.files;
    }

    function positionLabel(i) {
        return (i + 1) + (i < 2 ? ' · En haut' : ' · Bandeau');
    }

    function render() {
        urls.forEach(function (u) { URL.revokeObjectURL(u); });
        urls = [];
        grid.innerHTML = '';

        var main = parseInt(mainInput.value, 10);
        if (isNaN(main) || main >= files.length) main = 0;
        mainInput.value = files.length ? String(main) : '';

        files.forEach(function (file, i) {
            var url = URL.createObjectURL(file);
            urls.push(url);
            var isMain = i === main;

            var item = document.createElement('div');
            item.className = 'admin-gallery__item' + (isMain ? ' is-main' : '');
            item.innerHTML =
                '<img alt="">' +
                (isMain ? '<span class="admin-gallery__badge">★ Principale</span>' : '') +
                '<span class="admin-gallery__pos"></span>' +
                '<div class="admin-gallery__actions">' +
                    '<button type="button" class="admin-gallery__btn' + (isMain ? ' is-active' : '') + '" data-set-main="' + i + '"' +
                        ' aria-pressed="' + isMain + '" title="Définir comme image principale">' +
                        '<i class="fas fa-star" aria-hidden="true"></i></button>' +
                    '<button type="button" class="admin-gallery__btn admin-gallery__btn--remove" data-remove="' + i + '"' +
                        ' title="Retirer cette image"><i class="fas fa-times" aria-hidden="true"></i></button>' +
                '</div>';

            var img = item.querySelector('img');
            img.src = url;
            img.alt = file.name;
            item.querySelector('.admin-gallery__pos').textContent = positionLabel(i);

            grid.appendChild(item);
        });

        zone.classList.toggle('has-files', files.length > 0);
    }

    // Nouvelles images (clic ou dépôt) : ajoutées à la suite
    input.addEventListener('change', function () {
        Array.prototype.forEach.call(input.files, function (file) {
            var isImage = file.type && file.type.indexOf('image/') === 0;
            var isDuplicate = files.some(function (f) { return f.name === file.name && f.size === file.size; });
            if (isImage && !isDuplicate && files.length < MAX) files.push(file);
        });
        sync();
        render();
    });

    // ★ image principale / ✕ retirer
    grid.addEventListener('click', function (e) {
        var mainBtn = e.target.closest('[data-set-main]');
        var removeBtn = e.target.closest('[data-remove]');

        if (mainBtn) {
            mainInput.value = mainBtn.getAttribute('data-set-main');
            render();
            return;
        }

        if (removeBtn) {
            var index = parseInt(removeBtn.getAttribute('data-remove'), 10);
            var main = parseInt(mainInput.value, 10) || 0;
            files.splice(index, 1);
            if (index === main) main = 0;
            else if (index < main) main -= 1;
            mainInput.value = String(main);
            sync();
            render();
        }
    });

    // Effet visuel pendant le glisser
    ['dragenter', 'dragover'].forEach(function (evt) {
        zone.addEventListener(evt, function () { zone.classList.add('is-dragover'); });
    });
    ['dragleave', 'drop'].forEach(function (evt) {
        zone.addEventListener(evt, function () { zone.classList.remove('is-dragover'); });
    });
})();

// ===== Photo du client : aperçu rond + retirer =====
(function () {
    'use strict';

    document.querySelectorAll('[data-avatar]').forEach(function (box) {
        var input = box.querySelector('input[type="file"]');
        var preview = box.querySelector('[data-avatar-preview]');
        var removeBtn = box.querySelector('[data-avatar-remove]');
        var title = box.querySelector('[data-avatar-title]');
        var placeholderHtml = preview.innerHTML;
        var placeholderTitle = title.textContent;
        var url = null;

        function reset() {
            if (url) URL.revokeObjectURL(url);
            url = null;
            preview.innerHTML = placeholderHtml;
            title.textContent = placeholderTitle;
            box.classList.remove('has-photo');
            removeBtn.hidden = true;
        }

        input.addEventListener('change', function () {
            var file = input.files[0];
            if (!file || !file.type || file.type.indexOf('image/') !== 0) {
                reset();
                return;
            }

            if (url) URL.revokeObjectURL(url);
            url = URL.createObjectURL(file);

            var img = document.createElement('img');
            img.src = url;
            img.alt = 'Photo du client';
            preview.innerHTML = '';
            preview.appendChild(img);

            title.textContent = 'Changer la photo';
            box.classList.add('has-photo');
            removeBtn.hidden = false;
        });

        removeBtn.addEventListener('click', function () {
            input.value = '';
            reset();
        });
    });
})();