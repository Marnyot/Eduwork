(function () {
    var input = document.getElementById('image');
    var preview = document.getElementById('imagePreview');
    var hint = document.getElementById('imageDropHint');
    if (!input || !preview) return;

    input.addEventListener('change', function () {
        var file = input.files && input.files[0];
        if (!file) return;

        var reader = new FileReader();
        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.classList.remove('d-none');
            if (hint) hint.classList.add('d-none');
        };
        reader.readAsDataURL(file);
    });
})();
