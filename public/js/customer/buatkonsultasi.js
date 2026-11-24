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

    // 2. Character Counter Ringkasan Perkara
    const summaryTextarea = document.getElementById('case_summary');
    const summaryCounter = document.getElementById('summaryCharCount');

    if (summaryTextarea && summaryCounter) {
        const updateCounter = () => {
            summaryCounter.textContent = `${summaryTextarea.value.length}/500`;
        };
        summaryTextarea.addEventListener('input', updateCounter);
        updateCounter();
    }

    // 3. File Upload Drag & Drop + Preview List
    const dropZone = document.getElementById('dropZoneArea');
    const fileInput = document.getElementById('fileUpload');
    const uploadedList = document.getElementById('uploadedFilesList');
    let selectedFiles = [];

    function formatBytes(bytes) {
        if (bytes === 0) return '0 B';
        const k = 1024;
        const sizes = ['B', 'KB', 'MB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(1)) + ' ' + sizes[i];
    }

    function syncInputFiles() {
        const dataTransfer = new DataTransfer();
        selectedFiles.forEach(file => dataTransfer.items.add(file));
        fileInput.files = dataTransfer.files;
    }

    function renderUploadedFiles() {
        if (!uploadedList) return;
        uploadedList.innerHTML = '';

        selectedFiles.forEach((file, index) => {
            const item = document.createElement('div');
            item.className = 'file-item-box';
            item.innerHTML = `
                <div class="file-item-info">
                    <div class="file-badge-icon"><i class='bx bxs-file-pdf'></i></div>
                    <div>
                        <span class="file-name">${file.name}</span>
                        <span class="file-size">${formatBytes(file.size)}</span>
                    </div>
                </div>
                <button type="button" class="btn-icon-delete" data-index="${index}" title="Hapus berkas">
                    <i class='bx bx-trash'></i>
                </button>
            `;
            uploadedList.appendChild(item);
        });

        uploadedList.querySelectorAll('.btn-icon-delete').forEach(btn => {
            btn.addEventListener('click', function () {
                const idx = Number(this.getAttribute('data-index'));
                selectedFiles.splice(idx, 1);
                syncInputFiles();
                renderUploadedFiles();
            });
        });
    }

    function addFiles(fileList) {
        Array.from(fileList).forEach(file => {
            selectedFiles.push(file);
        });
        syncInputFiles();
        renderUploadedFiles();
    }

    if (dropZone && fileInput) {
        dropZone.addEventListener('click', () => fileInput.click());

        fileInput.addEventListener('change', function () {
            addFiles(this.files);
        });

        dropZone.addEventListener('dragover', function (e) {
            e.preventDefault();
            dropZone.classList.add('drag-over');
        });

        dropZone.addEventListener('dragleave', function () {
            dropZone.classList.remove('drag-over');
        });

        dropZone.addEventListener('drop', function (e) {
            e.preventDefault();
            dropZone.classList.remove('drag-over');
            if (e.dataTransfer.files.length > 0) {
                addFiles(e.dataTransfer.files);
            }
        });
    }

    // 4. Populate Review Data pada Tahap 4
    function populateReviewStep() {
        const getVal = (id) => {
            const el = document.getElementById(id);
            return el && el.value.trim() !== '' ? el.value.trim() : '—';
        };

        document.getElementById('rev_applicant_name').textContent = getVal('applicant_name');
        document.getElementById('rev_email').textContent = getVal('email');
        document.getElementById('rev_phone').textContent = getVal('phone');
        document.getElementById('rev_nik').textContent = getVal('nik');
        document.getElementById('rev_address').textContent = getVal('address');
        document.getElementById('rev_birth_place_date').textContent = getVal('birth_place_date');

        const categorySelect = document.getElementById('category_id');
        const selectedCategory = categorySelect.options[categorySelect.selectedIndex];
        document.getElementById('rev_category_name').textContent =
            selectedCategory && selectedCategory.value ? selectedCategory.text : '—';

        const legalFieldSelect = document.getElementById('legal_field_id');
        const selectedField = legalFieldSelect.options[legalFieldSelect.selectedIndex];
        document.getElementById('rev_legal_field_name').textContent =
            selectedField && selectedField.value ? selectedField.text : '—';

        document.getElementById('rev_consultation_title').textContent = getVal('consultation_title');
        document.getElementById('rev_case_summary').textContent = getVal('case_summary');

        const revDocContainer = document.getElementById('rev_documents_list');
        revDocContainer.innerHTML = '';

        if (selectedFiles.length === 0) {
            revDocContainer.innerHTML = '<p class="review-label">Belum ada dokumen pendukung yang diunggah.</p>';
        } else {
            selectedFiles.forEach(file => {
                const row = document.createElement('div');
                row.className = 'review-doc-row';
                row.innerHTML = `
                    <div class="file-item-info">
                        <div class="file-badge-icon"><i class='bx bxs-file-pdf'></i></div>
                        <div>
                            <span class="file-name">${file.name}</span>
                            <span class="file-size">${formatBytes(file.size)}</span>
                        </div>
                    </div>
                    <i class='bx bx-download' style="font-size: 18px; color: #6b7280;"></i>
                `;
                revDocContainer.appendChild(row);
            });
        }
    }

    // 5. Wizard Step Navigation (Tahap 1 - 4)
    const steps = document.querySelectorAll('.step-content');
    const wizardSteps = document.querySelectorAll('.wizard-step');
    const wizardLineActive = document.getElementById('wizardLineActive');
    const wizardCounter = document.querySelector('.wizard-counter');
    const wizardTopRow = document.getElementById('wizardTopRow');
    const pageSubheading = document.getElementById('pageMainSubheading');
    const totalSteps = wizardSteps.length;

    function goToStep(targetStepNum) {
        const currentStep = Number(targetStepNum);
        if (currentStep < 1 || currentStep > totalSteps) return;

        // Tampilkan konten tahap aktif
        steps.forEach(step => {
            const stepId = Number(step.id.replace('step-', ''));
            step.style.display = stepId === currentStep ? 'block' : 'none';
        });

        // Update subheading & header wizard khusus Tahap 4 sesuai mockup
        if (currentStep === 4) {
            populateReviewStep();
            if (wizardTopRow) wizardTopRow.style.display = 'none';
            if (pageSubheading) {
                pageSubheading.textContent = 'Periksa kembali data dan dokumen sebelum mengirim pengajuan perkara baru.';
            }
        } else {
            if (wizardTopRow) wizardTopRow.style.display = 'flex';
            if (pageSubheading) {
                pageSubheading.textContent = 'Lengkapi data dan dokumen untuk mengajukan perkara baru.';
            }
        }

        // Update lingkaran stepper
        wizardSteps.forEach((step, index) => {
            const stepNum = index + 1;
            const circle = step.querySelector('.wizard-circle');

            step.classList.remove('active', 'completed');
            circle.classList.remove('current', 'completed');

            if (stepNum < currentStep) {
                step.classList.add('completed');
                circle.classList.add('completed');
                circle.innerHTML = "<i class='bx bx-check'></i>";
            } else if (stepNum === currentStep) {
                step.classList.add('active');
                circle.classList.add('current');
                circle.textContent = stepNum;
            } else {
                circle.textContent = stepNum;
            }
        });

        // Update garis progres hijau
        const progressPercent = ((currentStep - 1) / (totalSteps - 1)) * 100;
        if (wizardLineActive) {
            wizardLineActive.style.width = `${progressPercent}%`;
        }

        if (wizardCounter) {
            wizardCounter.textContent = `Tahap ${currentStep} dari ${totalSteps}`;
        }
    }

    document.querySelectorAll('.btn-next').forEach(btn => {
        btn.addEventListener('click', function () {
            goToStep(this.dataset.next);
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    });

    document.querySelectorAll('.btn-prev').forEach(btn => {
        btn.addEventListener('click', function () {
            goToStep(this.dataset.prev);
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    });

    document.querySelectorAll('.btn-jump').forEach(btn => {
        btn.addEventListener('click', function () {
            goToStep(this.dataset.target);
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    });

    // Simpan draft ke session/localStorage sementara
    document.querySelectorAll('.btn-save-draft').forEach(btn => {
        btn.addEventListener('click', function () {
            alert('Draft pengajuan perkara berhasil disimpan sementara.');
        });
    });

    // Inisialisasi tahap 1
    goToStep(1);
});