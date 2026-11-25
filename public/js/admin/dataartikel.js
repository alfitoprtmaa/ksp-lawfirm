document.addEventListener('DOMContentLoaded', function () {
    // 1. SIDEBAR DROPDOWN & TOGGLE
    document.querySelectorAll('.nav-item.has-dropdown').forEach(trigger => {
        trigger.addEventListener('click', function () {
            const group = this.closest('.nav-group');
            if (group) group.classList.toggle('open');
        });
    });

    const menuToggle = document.querySelector('.menu-toggle');
    if (menuToggle) {
        menuToggle.addEventListener('click', function () {
            if (window.innerWidth <= 768) {
                document.body.classList.toggle('sidebar-mobile-open');
            } else {
                document.body.classList.toggle('sidebar-collapsed');
            }
        });
    }

    // 2. HALAMAN 1: FILTER & PRATINJAU ARTIKEL
    const searchInput = document.getElementById('searchArticleInput');
    const catSelect = document.getElementById('filterCategorySelect');
    const statusSelect = document.getElementById('filterStatusSelect');
    const btnReset = document.getElementById('btnResetArticleFilter');
    const tbody = document.getElementById('articlesTableBody');
    const showingText = document.getElementById('articleShowingText');

    function filterArticlesTable() {
        if (!tbody) return;
        const kw = (searchInput?.value || '').trim().toLowerCase();
        const cat = catSelect?.value || 'all';
        const st = statusSelect?.value || 'all';
        const rows = tbody.querySelectorAll('tr');
        let visible = 0;

        rows.forEach(row => {
            const text = row.getAttribute('data-search') || '';
            const rowCat = row.getAttribute('data-category') || '';
            const rowStatus = row.getAttribute('data-status') || '';

            const matchKw = !kw || text.includes(kw);
            const matchCat = cat === 'all' || rowCat === cat;
            const matchSt = st === 'all' || rowStatus === st;

            if (matchKw && matchCat && matchSt) {
                row.style.display = '';
                visible++;
            } else {
                row.style.display = 'none';
            }
        });

        if (showingText) {
            showingText.textContent = visible > 0
                ? `Menampilkan 1–${visible} dari 32 artikel`
                : 'Tidak ada artikel yang sesuai filter';
        }
    }

    [searchInput, catSelect, statusSelect].forEach(el => {
        if (el) {
            el.addEventListener('input', filterArticlesTable);
            el.addEventListener('change', filterArticlesTable);
        }
    });

    if (btnReset) {
        btnReset.addEventListener('click', () => {
            if (searchInput) searchInput.value = '';
            if (catSelect) catSelect.value = 'all';
            if (statusSelect) statusSelect.value = 'all';
            filterArticlesTable();
        });
    }

    // Modal Pratinjau
    const previewModal = document.getElementById('previewArticleModal');
    document.querySelectorAll('.btn-preview-article').forEach(btn => {
        btn.addEventListener('click', function () {
            const data = JSON.parse(this.getAttribute('data-article') || '{}');
            if (!previewModal || !data.title) return;

            document.getElementById('prevArtCategory').textContent = data.category || 'Artikel';
            document.getElementById('prevArtTitle').textContent = data.title;
            document.getElementById('prevArtMeta').textContent = `${data.published_date} • ${data.updated_note} • Status: ${data.status}`;
            document.getElementById('prevArtSummary').textContent = data.summary || '-';
            document.getElementById('prevArtBody').innerHTML = data.article_body || '<p>Belum ada isi artikel.</p>';

            previewModal.classList.add('show');
            document.body.classList.add('modal-open');
        });
    });

    ['btnClosePreviewModal', 'btnOkPreviewModal'].forEach(id => {
        document.getElementById(id)?.addEventListener('click', () => {
            previewModal?.classList.remove('show');
            document.body.classList.remove('modal-open');
        });
    });

    // 3. HALAMAN 2: TAMBAH ARTIKEL (COUNTER, EDITOR, UPLOAD SAMPUL)
    const summaryInput = document.getElementById('article_summary');
    const summaryCounter = document.getElementById('summaryCharCounter');

    if (summaryInput && summaryCounter) {
        const updateSummaryCount = () => {
            summaryCounter.textContent = `${summaryInput.value.length} / 160`;
        };
        summaryInput.addEventListener('input', updateSummaryCount);
        updateSummaryCount();
    }

    const editorArea = document.getElementById('articleBodyEditor');
    const hiddenBody = document.getElementById('articleBodyHidden');
    const wordCounter = document.getElementById('editorWordCounter');
    const formatSelect = document.getElementById('editorFormatBlock');

    function syncEditorContent() {
        if (!editorArea) return;
        const plainText = (editorArea.innerText || '').trim();
        const words = plainText ? plainText.split(/\s+/).length : 0;
        if (wordCounter) wordCounter.textContent = `${words} kata`;
        if (hiddenBody) hiddenBody.value = editorArea.innerHTML.trim();
    }

    if (editorArea) {
        editorArea.addEventListener('input', syncEditorContent);
        syncEditorContent();

        document.querySelectorAll('.toolbar-btn[data-cmd]').forEach(btn => {
            btn.addEventListener('click', function () {
                const cmd = this.getAttribute('data-cmd');
                editorArea.focus();
                document.execCommand(cmd, false, null);
                syncEditorContent();
            });
        });

        document.getElementById('btnInsertLink')?.addEventListener('click', function () {
            const url = prompt('Masukkan tautan (URL):', 'https://');
            if (url) {
                editorArea.focus();
                document.execCommand('createLink', false, url);
                syncEditorContent();
            }
        });

        formatSelect?.addEventListener('change', function () {
            editorArea.focus();
            document.execCommand('formatBlock', false, this.value);
            syncEditorContent();
        });
    }

    // Waktu Publikasi -> Tampilkan input tanggal jika pilih "Jadwalkan publikasi"
    const publishModeSelect = document.getElementById('publish_mode');
    const scheduledDateGroup = document.getElementById('scheduledDateGroup');
    const scheduledDateInput = document.getElementById('scheduled_date');

    if (publishModeSelect && scheduledDateGroup) {
        publishModeSelect.addEventListener('change', function () {
            const isScheduled = this.value === 'schedule';
            scheduledDateGroup.style.display = isScheduled ? 'block' : 'none';
            if (scheduledDateInput) scheduledDateInput.required = isScheduled;
        });
    }

    // Simpan Draf vs Publikasikan Artikel
    const actionTypeInput = document.getElementById('articleActionType');
    document.getElementById('btnSaveDraft')?.addEventListener('click', () => {
        syncEditorContent();
        if (actionTypeInput) actionTypeInput.value = 'draft';
    });
    document.getElementById('btnPublishArticle')?.addEventListener('click', () => {
        syncEditorContent();
        if (actionTypeInput) actionTypeInput.value = 'publish';
    });

    // Unggah & Drag-and-Drop Sampul Artikel
    const uploadZone = document.getElementById('coverUploadZone');
    const coverInput = document.getElementById('coverImageInput');
    const uploadPlaceholder = document.getElementById('uploadPlaceholder');
    const coverPreview = document.getElementById('coverPreviewImg');

    function handleCoverFile(file) {
        if (!file || !file.type.startsWith('image/')) return;
        const reader = new FileReader();
        reader.onload = function (e) {
            if (coverPreview) {
                coverPreview.src = e.target.result;
                coverPreview.style.display = 'block';
            }
            if (uploadPlaceholder) uploadPlaceholder.style.display = 'none';
        };
        reader.readAsDataURL(file);
    }

    if (coverInput) {
        coverInput.addEventListener('change', function () {
            handleCoverFile(this.files?.[0]);
        });
    }

    if (uploadZone) {
        ['dragenter', 'dragover'].forEach(ev => {
            uploadZone.addEventListener(ev, (e) => {
                e.preventDefault();
                uploadZone.classList.add('drag-over');
            });
        });

        ['dragleave', 'drop'].forEach(ev => {
            uploadZone.addEventListener(ev, (e) => {
                e.preventDefault();
                uploadZone.classList.remove('drag-over');
            });
        });

        uploadZone.addEventListener('drop', (e) => {
            const file = e.dataTransfer?.files?.[0];
            if (file && coverInput) {
                const dt = new DataTransfer();
                dt.items.add(file);
                coverInput.files = dt.files;
                handleCoverFile(file);
            }
        });
    }
});