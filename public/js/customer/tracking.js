document.addEventListener('DOMContentLoaded', function () {
    // 1. Mobile Sidebar Toggle
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

    // 2. Stepper & Tabs Logic (Tahap 1 - 4)
    const tabs = document.querySelectorAll('.tab-content');
    const wizardSteps = document.querySelectorAll('.wizard-step');
    const wizardLineActive = document.querySelector('.wizard-line-active');
    const wizardCounter = document.querySelector('.wizard-counter');
    const totalSteps = wizardSteps.length;

    function goToTab(targetIndex) {
        const stepNumber = targetIndex + 1;

        tabs.forEach((tab, index) => {
            tab.style.display = index === targetIndex ? 'block' : 'none';
        });

        wizardSteps.forEach((step, index) => {
            const circle = step.querySelector('.wizard-circle');
            const label = step.querySelector('.wizard-label');
            const currentStepNum = index + 1;

            circle.classList.remove('active-completed', 'bg-blue', 'text-white');
            label.classList.remove('text-dark', 'font-medium', 'text-blue-active');
            circle.innerHTML = currentStepNum;

            if (currentStepNum < stepNumber) {
                circle.classList.add('active-completed');
                circle.innerHTML = "<i class='bx bx-check'></i>";
                label.classList.add('text-dark', 'font-medium');
            } else if (currentStepNum === stepNumber) {
                circle.classList.add('bg-blue', 'text-white');
                label.classList.add('text-blue-active');
            }
        });

        if (stepNumber === totalSteps) {
            wizardLineActive.style.width = '100%';
        } else {
            const activeStepElement = wizardSteps[targetIndex];
            const targetWidth = activeStepElement.offsetLeft + (activeStepElement.offsetWidth / 2);
            wizardLineActive.style.width = targetWidth + 'px';
        }

        if (wizardCounter) {
            wizardCounter.textContent = `Tahap ${stepNumber} dari ${totalSteps}`;
        }
    }

    wizardSteps.forEach((step, index) => {
        step.addEventListener('click', function () {
            goToTab(index);
        });
    });

    goToTab(0);

    // 3. Modal 1: Detail Perkembangan Perkara (Tahap 3 - Proses Perkara)
    const execModal = document.getElementById('execModalBackdrop');
    document.querySelectorAll('.open-exec-modal-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const execData = JSON.parse(this.getAttribute('data-exec'));
            const caseNumber = this.getAttribute('data-case-number');
            const category = this.getAttribute('data-category');

            document.getElementById('execCaseNumber').textContent = caseNumber;
            document.getElementById('execCategoryName').textContent = category;
            document.getElementById('execStatusLabel').textContent = execData.status_label || 'Dalam Proses';
            document.getElementById('execFullDate').textContent = execData.execution_date_full;
            document.getElementById('execFullTime').textContent = `${execData.execution_time} WIB`;
            document.getElementById('execLawyerInitials').textContent = execData.lawyer_initials || 'AS';
            document.getElementById('execLawyerName').textContent = execData.lawyer_name;
            document.getElementById('execLawyerRole').textContent = execData.lawyer_role || 'Litigation Associate';
            document.getElementById('execDescBox').textContent = execData.desc_box;

            const grid = document.getElementById('execAttachmentsGrid');
            grid.innerHTML = '';
            const attachments = execData.attachments || [];

            if (attachments.length === 0) {
                grid.innerHTML = '<p class="text-xs text-muted">Tidak ada lampiran dokumen.</p>';
            } else {
                attachments.forEach(file => {
                    const card = document.createElement('div');
                    card.className = 'exec-doc-card';
                    card.innerHTML = `
                        <div class="doc-card-info">
                            <div class="doc-pdf-icon"><i class='bx bxs-file-pdf'></i></div>
                            <div>
                                <div class="doc-name-text">${file.name}</div>
                                <div class="doc-meta-text">${file.size} &bull; PDF Dokumen</div>
                            </div>
                        </div>
                        <a href="${file.url || '#'}" download class="doc-dl-btn" title="Unduh Berkas">
                            <i class='bx bx-download'></i>
                        </a>
                    `;
                    grid.appendChild(card);
                });
            }

            execModal.classList.add('show');
            execModal.setAttribute('aria-hidden', 'false');
        });
    });

    // 4. Modal 2: Detail Perkembangan Perkara (Tahap 4 - Perkara Selesai)
    const finalModal = document.getElementById('finalModalBackdrop');
    document.querySelectorAll('.open-final-modal-btn').forEach(btn => {
        btn.addEventListener('click', function () {
            const data = JSON.parse(this.getAttribute('data-milestone'));

            document.getElementById('finalTitleVal').textContent = data.title;
            document.getElementById('finalDateVal').textContent = data.datetime_full;
            document.getElementById('finalDescVal').textContent = data.full_description;

            const list = document.getElementById('finalAttachmentsList');
            list.innerHTML = '';
            const attachments = data.attachments || [];

            if (attachments.length === 0) {
                list.innerHTML = '<p class="text-xs text-muted">Tidak ada lampiran.</p>';
            } else {
                attachments.forEach(file => {
                    const row = document.createElement('div');
                    row.className = 'exec-doc-card';
                    row.innerHTML = `
                        <div class="doc-card-info">
                            <div class="doc-pdf-icon"><i class='bx bxs-file-pdf'></i></div>
                            <div>
                                <div class="doc-name-text">${file.name}</div>
                                <div class="doc-meta-text">${file.size}</div>
                            </div>
                        </div>
                        <a href="${file.url || '#'}" download class="doc-dl-btn" title="Unduh Berkas">
                            <i class='bx bx-download'></i>
                        </a>
                    `;
                    list.appendChild(row);
                });
            }

            finalModal.classList.add('show');
            finalModal.setAttribute('aria-hidden', 'false');
        });
    });

    // 5. Tutup Semua Modal
    document.querySelectorAll('[data-close-modal]').forEach(btn => {
        btn.addEventListener('click', function () {
            const modalId = this.getAttribute('data-close-modal');
            const targetModal = document.getElementById(modalId);
            if (targetModal) {
                targetModal.classList.remove('show');
                targetModal.setAttribute('aria-hidden', 'true');
            }
        });
    });

    [execModal, finalModal].forEach(modal => {
        if (!modal) return;
        modal.addEventListener('click', function (e) {
            if (e.target === modal) {
                modal.classList.remove('show');
                modal.setAttribute('aria-hidden', 'true');
            }
        });
    });
});