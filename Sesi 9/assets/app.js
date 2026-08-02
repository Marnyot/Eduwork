(function () {
    "use strict";

    // Loading state pada tombol submit form: tombol dinonaktifkan + spinner
    // sementara permintaan dikirim, mencegah klik ganda.
    document.addEventListener('submit', function (e) {
        var form = e.target;
        if (!form || form.tagName !== 'FORM') return;

        var btn = form.querySelector('button[type="submit"]');
        if (!btn || btn.disabled) return;

        var skip = btn.closest('[data-no-loading]') || form.hasAttribute('data-no-loading');
        if (skip) return;

        btn.classList.add('is-loading');
        btn.disabled = true;
    });
})();
