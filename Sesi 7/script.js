(() => {
  // ── Image preview (FileReader) ────────────────────────
  const fileInput  = document.getElementById('productImage');
  const imgPreview = document.getElementById('imagePreview');
  const imgWrap    = document.getElementById('imagePreviewWrap');

  if (fileInput) {
    fileInput.addEventListener('change', () => {
      const file = fileInput.files[0];
      if (!file) {
        imgWrap.style.display = 'none';
        imgPreview.src = '';
        return;
      }
      const reader = new FileReader();
      reader.onload = (e) => {
        imgPreview.src = e.target.result;
        imgWrap.style.display = 'block';
      };
      reader.readAsDataURL(file);
    });
  }

  // ── Client-side search ────────────────────────────────
  const searchInput = document.getElementById('searchInput');
  const tableBody   = document.getElementById('productTableBody');
  const countEl     = document.getElementById('productCount');
  const emptySearch = document.getElementById('emptySearch');

  if (searchInput && tableBody) {
    searchInput.addEventListener('input', () => {
      const q    = searchInput.value.toLowerCase().trim();
      const rows = tableBody.querySelectorAll('tr');
      let visible = 0;

      rows.forEach(row => {
        const match = !q
          || (row.dataset.name     ?? '').includes(q)
          || (row.dataset.category ?? '').includes(q);
        row.style.display = match ? '' : 'none';
        if (match) visible++;
      });

      if (countEl) countEl.textContent = visible + ' produk';
      if (emptySearch) emptySearch.style.display = visible > 0 ? 'none' : 'block';
    });
  }
})();
