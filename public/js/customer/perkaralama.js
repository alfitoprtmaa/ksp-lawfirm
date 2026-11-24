document.addEventListener('DOMContentLoaded', function () {
    // 1. Toggle Sidebar Mobile
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const sidebar = document.querySelector('.sidebar');

    if (mobileMenuBtn && sidebar) {
        mobileMenuBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            sidebar.classList.toggle('active');
        });

        document.addEventListener('click', function (e) {
            if (window.innerWidth <= 768) {
                if (!sidebar.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                    sidebar.classList.remove('active');
                }
            }
        });
    }

    // 2. Modal Detail & Edit Perkara
    const modalBackdrop = document.getElementById('caseModalBackdrop');
    const closeModalBtn = document.getElementById('closeCaseModalBtn');
    const openButtons = document.querySelectorAll('.open-case-modal-btn');
    const btnAddDoc = document.getElementById('btnToggleUploadDoc');
    const uploadDocForm = document.getElementById('uploadDocumentForm');
    const docListContainer = document.getElementById('modalDocumentList');

    // Toggle form unggah dokumen saat tombol "+ Tambah Dokumen" diklik
    if (btnAddDoc && uploadDocForm) {
        btnAddDoc.addEventListener('click', function () {
            uploadDocForm.classList.toggle('hidden');
        });
    }

    // Buka modal & populate data perkara
    openButtons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            const mode = this.getAttribute('data-mode'); // 'edit' atau 'detail'
            const caseData = JSON.parse(this.getAttribute('data-case'));

            // Header Modal
            document.getElementById('modalRegNumber').textContent = caseData.registration_number || caseData.case_number;

            // Bagian 1: Data Diri Klien (dari tabel BOOKING)
            document.getElementById('modalApplicantName').textContent = caseData.applicant_name || '-';
            document.getElementById('modalNik').textContent = caseData.nik || '-';
            document.getElementById('modalPhone').textContent = caseData.phone || '-';
            document.getElementById('modalEmail').textContent = caseData.email || '-';
            document.getElementById('modalOccupation').textContent = caseData.occupation || '-';
            document.getElementById('modalBirthPlaceDate').textContent = caseData.birth_place_date || '-';
            document.getElementById('modalAddress').textContent = caseData.address || '-';

            // Bagian 2: Detail Informasi Perkara (BOOKING + PROBLEM_CATEGORY + LEGAL_FIELD)
            document.getElementById('modalCategoryName').textContent = caseData.category_name || '-';
            document.getElementById('modalLegalFieldName').textContent = caseData.legal_field_name || '-';
            document.getElementById('modalDefendant').textContent = caseData.defendant_name || '-';
            document.getElementById('modalConsultationTitle').textContent = caseData.consultation_title || '-';
            document.getElementById('modalCaseSummary').textContent = caseData.case_summary || '-';

            // Bagian 3: Dokumen Perkara Awal (BOOKING_DOCUMENT)
            const docs = caseData.documents || [];
            document.getElementById('modalDocCount').textContent = `${docs.length} Berkas Tersedia`;

            // Set action form upload sesuai booking_id
            if (uploadDocForm) {
                uploadDocForm.action = `/customer/perkara-saya/${caseData.booking_id}/dokumen`;
                uploadDocForm.classList.add('hidden');
            }

            // Atur visibilitas tombol "+ Tambah Dokumen" berdasarkan mode
            if (btnAddDoc) {
                if (mode === 'edit') {
                    btnAddDoc.classList.remove('hidden');
                } else {
                    btnAddDoc.classList.add('hidden');
                }
            }

            // Render list dokumen
            docListContainer.innerHTML = '';
            if (docs.length === 0) {
                docListContainer.innerHTML = '<p class="text-sm text-muted">Belum ada berkas yang diunggah.</p>';
            } else {
                docs.forEach(function (doc) {
                    const card = document.createElement('div');
                    card.className = 'document-card';
                    card.innerHTML = `
                        <div class="doc-card-left">
                            <div class="doc-type-badge">${doc.document_type || 'PDF'}</div>
                            <div>
                                <div class="doc-info-title">${doc.document_name}</div>
                                <div class="doc-info-meta">${(doc.document_type || 'PDF').toUpperCase()} • ${doc.file_size || '1.5 MB'} • Diunggah ${doc.uploaded_at_formatted}</div>
                            </div>
                        </div>
                        <div class="doc-card-actions">
                            <a href="${doc.file_url || '#'}" target="_blank" class="doc-link-btn">
                                <i class='bx bx-show'></i> Lihat
                            </a>
                            <a href="${doc.file_url || '#'}" download class="doc-link-btn">
                                <i class='bx bx-download'></i> Unduh
                            </a>
                        </div>
                    `;
                    docListContainer.appendChild(card);
                });
            }

            modalBackdrop.classList.add('show');
            modalBackdrop.setAttribute('aria-hidden', 'false');
        });
    });

    // Tutup Modal
    function closeModal() {
        modalBackdrop.classList.remove('show');
        modalBackdrop.setAttribute('aria-hidden', 'true');
        if (uploadDocForm) {
            uploadDocForm.classList.add('hidden');
        }
    }

    if (closeModalBtn) {
        closeModalBtn.addEventListener('click', closeModal);
    }

    if (modalBackdrop) {
        modalBackdrop.addEventListener('click', function (e) {
            if (e.target === modalBackdrop) {
                closeModal();
            }
        });
    }

    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && modalBackdrop && modalBackdrop.classList.contains('show')) {
            closeModal();
        }
    });
});