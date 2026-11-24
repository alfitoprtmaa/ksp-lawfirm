<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail {{ $case['booking_status'] === 'Selesai' ? 'Perkara Selesai' : 'Perkara Dikerjakan' }} - Lawyer Portal</title>
    <!-- Font Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.boxicons.com/3.0.8/fonts/basic/boxicons.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/lawyer/kelolaperkara/kelolaperkara.css') }}">
</head>
<body>
    <div class="layout-wrapper">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <img src="{{ asset('images/logo.png') }}" alt="KSP Logo" class="logo-img">
                </div>
                <div class="brand-info">
                    <h2 class="brand-name">KETUT SURYA PUTRA<br>&amp; PARTNERS</h2>
                    <p class="brand-sub">Legal Client Portal</p>
                </div>
            </div>

            <div class="sidebar-menu">
                <p class="menu-label">RUANG KLIEN</p>
                <nav class="nav-links">
                    <a href="{{ route('lawyer.index') }}" class="nav-item">
                        <i class='bx bx-grid-alt'></i>
                        <span>Overview</span>
                    </a>

                    <div class="nav-group open">
                        <button type="button" class="nav-item nav-dropdown-toggle active" id="kelolaPerkaraToggle">
                            <div class="nav-item-left">
                                <i class='bx bx-shopping-bag'></i>
                                <span>Kelola Perkara</span>
                            </div>
                            <i class='bx bx-chevron-up dropdown-chevron'></i>
                        </button>
                        <div class="nav-submenu">
                            <a href="{{ route('lawyer.kelolaperkara.dikerjakan') }}" class="submenu-item {{ $activeTab === 'dikerjakan' ? 'active' : '' }}">
                                <span class="submenu-dash">—</span>
                                <span>Perkara Dikerjakan</span>
                            </a>
                            <a href="{{ route('lawyer.kelolaperkara.selesai') }}" class="submenu-item {{ $activeTab === 'selesai' ? 'active' : '' }}">
                                <span class="submenu-dash">—</span>
                                <span>Perkara Selesai</span>
                            </a>
                        </div>
                    </div>

                    <a href="{{ route('lawyer.jadwal.index') }}" class="nav-item">
                        <i class='bx bx-calendar-event'></i>
                        <span>Jadwal</span>
                    </a>
                    <a href="{{ route('lawyer.pusatreferensi.index') }}" class="nav-item">
                        <i class='bx bx-message-square-detail'></i>
                        <span>Pusat Referensi</span>
                    </a>
                </nav>
            </div>

            <div class="sidebar-footer">
                <a href="{{ route('lawyer.akun.index') }}" class="nav-item">
                    <i class='bx bx-cog'></i>
                    <span>Pengaturan akun</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <header class="topbar">
                <div class="topbar-left">
                    <button class="mobile-toggle-btn" id="mobileMenuBtn">
                        <i class='bx bx-menu'></i>
                    </button>
                    <div class="breadcrumbs">
                        <span>{{ $case['booking_status'] === 'Selesai' ? 'Perkara Selesai' : 'Perkara Dikerjakan' }}</span>
                        <i class='bx bx-chevron-right breadcrumb-sep'></i>
                        <span>{{ $case['case_code'] }}</span>
                        <i class='bx bx-chevron-right breadcrumb-sep'></i>
                        <span class="current">Detail Perkara</span>
                    </div>
                </div>

                <div class="topbar-right">
                    <button class="icon-btn notif-btn" title="Notifikasi">
                        <i class='bx bx-bell'></i>
                        <span class="notif-dot"></span>
                    </button>
                    <div class="user-profile">
                        <div class="avatar">
                            <img src="{{ asset($lawyer['photo_path'] ?? 'images/lawyer-default.png') }}" alt="{{ $lawyer['full_name'] }}">
                        </div>
                        <div class="user-info">
                            <span class="user-name">{{ $lawyer['full_name'] }}</span>
                            <span class="user-role">{{ $lawyer['role_name'] ?? 'Lawyer' }}</span>
                        </div>
                        <i class='bx bx-chevron-down dropdown-arrow'></i>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="page-content">
                @if (session('success'))
                    <div class="alert alert-success">
                        <i class='bx bx-check-circle'></i>
                        <span>{{ session('success') }}</span>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <i class='bx bx-error-circle'></i>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Back Button & Page Heading -->
                <div class="detail-top-header">
                    <a href="{{ $case['booking_status'] === 'Selesai' ? route('lawyer.kelolaperkara.selesai') : route('lawyer.kelolaperkara.dikerjakan') }}" class="btn-back" title="Kembali">
                        <i class='bx bx-arrow-back'></i>
                    </a>
                    <div>
                        <h1 class="detail-page-title">
                            Detail {{ $case['booking_status'] === 'Selesai' ? 'Perkara Selesai' : 'Perkara Dikerjakan' }}
                        </h1>
                        <p class="detail-page-subtitle">Kelola informasi, dokumen, dan perkembangan perkara yang Anda tangani.</p>
                    </div>
                </div>

                <!-- Card 1: Case Header Summary -->
                <div class="detail-card case-summary-card">
                    <div class="case-scale-icon">
                        <i class='bx bx-law'></i>
                    </div>
                    <div class="case-summary-info">
                        <h2>{{ $case['case_code'] }}</h2>
                        <div class="case-meta-row">
                            <span><i class='bx bx-file-blank'></i> {{ $case['consultation_title'] }}</span>
                            <span><i class='bx bx-purchase-tag-alt'></i> Bidang Hukum: <strong>{{ $case['field_name'] }}</strong></span>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Tahapan Perkara (4-Step Stepper) -->
                <div class="detail-card">
                    @php
                        $steps = [
                            1 => "Pengajuan\nPermohonan",
                            2 => "Lawyer\nAssignment",
                            3 => "Proses\nPerkara",
                            4 => "Perkara Selesai",
                        ];
                        $isAllDone   = ($case['booking_status'] === 'Selesai');
                        $currentStep = $isAllDone ? 4 : $case['current_step'];
                        // 0% (step 1), 33.33% (step 2), 66.67% (step 3), 100% (step 4 / Selesai)
                        $linePercent = $isAllDone ? 100 : (($currentStep - 1) / 3) * 100;
                    @endphp

                    <div class="card-header-between">
                        <h3 class="section-card-title">Tahapan Perkara</h3>
                        <span class="wizard-counter">Tahap {{ $currentStep }} dari 4</span>
                    </div>

                    <div class="wizard-stepper">
                        <div class="wizard-line"></div>
                        <div class="wizard-line-active" style="width: {{ $linePercent }}%;"></div>

                        @foreach ($steps as $stepNum => $stepLabel)
                            @php
                                $isCompleted = $isAllDone || ($stepNum < $currentStep);
                                $isCurrent   = !$isAllDone && ($stepNum === $currentStep);
                            @endphp

                            <div class="wizard-step">
                                <div class="wizard-circle {{ $isCompleted ? 'active-completed' : ($isCurrent ? 'active-current' : '') }}">
                                    @if ($isCompleted)
                                        <i class='bx bx-check'></i>
                                    @else
                                        {{ $stepNum }}
                                    @endif
                                </div>
                                <div class="wizard-label {{ $isCurrent ? 'text-blue-active' : ($isCompleted ? 'text-dark-active' : '') }}">
                                    {!! nl2br(e($stepLabel)) !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Card 3: Perkembangan Perkara (CASE_EXECUTION) -->
                <div class="detail-card">
                    <div class="card-header-flex">
                        <div class="card-title-with-icon">
                            <i class='bx {{ $case['booking_status'] === 'Selesai' ? 'bx-link-alt' : 'bx-layer' }}'></i>
                            <h3>Perkembangan Perkara</h3>
                        </div>

                        @if ($case['booking_status'] === 'Selesai')
                            <span class="report-count-pill">{{ count($case['executions']) }} Laporan</span>
                        @else
                            <div class="card-header-actions">
                                <button type="button" class="btn-blue-primary" id="openProgressModalBtn">
                                    <i class='bx bx-plus'></i> Tambah Perkembangan
                                </button>
                                <button type="button" class="btn-icon-square" title="Filter Perkembangan">
                                    <i class='bx bx-filter-alt'></i>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="timeline-list">
                        @forelse ($case['executions'] as $exec)
                            <div class="timeline-item">
                                <div class="timeline-marker">
                                    <span class="timeline-check"><i class='bx bx-check'></i></span>
                                    @if (!$loop->last)
                                        <span class="timeline-connector"></span>
                                    @endif
                                </div>

                                <div class="timeline-content">
                                    <div class="timeline-top-row">
                                        <div>
                                            <h4>{{ $exec['title'] }}</h4>
                                            <div class="timeline-meta">
                                                <span><i class='bx bx-calendar'></i> {{ $exec['execution_date'] }}, {{ $exec['execution_time'] }}</span>
                                                <span><i class='bx bx-user'></i> {{ $exec['lawyer_name'] }}</span>
                                            </div>
                                        </div>

                                        @if ($case['booking_status'] === 'Selesai')
                                            <div class="timeline-right-actions">
                                                <span class="status-pill-green">Selesai</span>
                                                <button type="button" class="btn-dots"><i class='bx bx-dots-vertical-rounded'></i></button>
                                            </div>
                                        @else
                                            <div class="timeline-right-actions">
                                                <button type="button" class="btn-detail-outline">Detail</button>
                                                <button type="button" class="btn-trash" title="Hapus"><i class='bx bx-trash'></i></button>
                                            </div>
                                        @endif
                                    </div>

                                    @if ($case['booking_status'] === 'Selesai')
                                        <p class="timeline-desc-plain">{{ $exec['desc_box'] }}</p>
                                    @else
                                        <div class="timeline-desc-box">
                                            {{ $exec['desc_box'] }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <p class="empty-timeline">Belum ada catatan perkembangan untuk perkara ini.</p>
                        @endforelse
                    </div>
                </div>

                <!-- Card 4: Aksi Lanjutan (Khusus Perkara Dikerjakan) -->
                @if ($case['booking_status'] !== 'Selesai')
                    <div class="detail-card action-footer-card">
                        <div class="card-title-with-icon">
                            <i class='bx bx-shopping-bag'></i>
                            <h3>Aksi Lanjutan</h3>
                        </div>

                        <div class="action-footer-buttons">
                            <form action="{{ route('lawyer.kelolaperkara.archive', $case['booking_id']) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn-outline-action" onclick="return confirm('Arsipkan perkara ini?')">
                                    <i class='bx bx-archive'></i> Arsipkan Perkara
                                </button>
                            </form>

                            <form action="{{ route('lawyer.kelolaperkara.complete', $case['booking_id']) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn-blue-primary" onclick="return confirm('Tandai perkara ini selesai dan tutup perkara?')">
                                    <i class='bx bx-check'></i> Selesaikan &amp; Tutup Perkara
                                </button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </main>
    </div>

    <!-- Modal Tambah Perkembangan Perkara (Khusus Perkara Dikerjakan) -->
    @if ($case['booking_status'] !== 'Selesai')
        <div class="modal-overlay" id="progressModal">
            <div class="modal-box">
                <div class="modal-top-accent"></div>
                <div class="modal-header">
                    <div>
                        <h3 class="modal-title">Tambah Perkembangan Perkara</h3>
                        <p class="modal-subtitle">
                            Catat progres tindakan atau tahapan penanganan perkara
                            <span class="kp-badge">{{ $case['kp_code'] }}</span>
                        </p>
                    </div>
                    <button type="button" class="modal-close" id="closeProgressModalBtn">
                        <i class='bx bx-x'></i>
                    </button>
                </div>

                <form action="{{ route('lawyer.kelolaperkara.execution.store', $case['booking_id']) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Judul Perkembangan <span class="req">*</span></label>
                            <input type="text" id="title" name="title" placeholder="Koordinasi dengan saksi ahli pertanahan" required>
                        </div>

                        <div class="form-row-2">
                            <div class="form-group">
                                <label for="execution_date">Tanggal Pelaksanaan <span class="req">*</span></label>
                                <input type="date" id="execution_date" name="execution_date" value="2026-10-24" required>
                            </div>
                            <div class="form-group">
                                <label for="execution_time">Waktu Pelaksanaan (WIB) <span class="req">*</span></label>
                                <input type="time" id="execution_time" name="execution_time" value="10:30" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="label-with-counter">
                                <label for="desc_box">Uraian &amp; Catatan Progres <span class="req">*</span></label>
                                <span class="char-counter" id="charCounter">0 / 500</span>
                            </div>
                            <textarea id="desc_box" name="desc_box" rows="4" maxlength="500" placeholder="Tuliskan uraian progres tindakan atau tahapan penanganan perkara..." required></textarea>
                        </div>

                        <div class="form-group">
                            <div class="label-with-counter">
                                <label>Unggah Lampiran / Dokumen Pendukung</label>
                                <span class="file-hint-right">PDF, DOC, JPG (Maks. 10 MB)</span>
                            </div>
                            <p class="naming-rule">Penamaan dokumen: DOKUMEN_SIDANG (huruf kapital, pisahkan kata dengan _).</p>

                            <div class="upload-dropzone" id="uploadDropzone">
                                <input type="file" name="attachment_file" id="attachmentInput" accept=".pdf,.doc,.docx,.jpg,.jpeg" hidden>
                                <div class="dropzone-icon">
                                    <i class='bx bx-cloud-upload'></i>
                                </div>
                                <p class="dropzone-text"><span>Klik untuk unggah</span> atau seret file ke sini</p>
                                <p class="dropzone-sub">Format didukung: PDF, DOC, DOCX, JPG (Maks. 10 MB)</p>
                            </div>

                            <!-- Preview File Terlampir -->
                            <div class="attached-file-card" id="attachedFileCard" style="display: none;">
                                <div class="attached-file-left">
                                    <span class="attached-badge">PDF</span>
                                    <div>
                                        <p class="attached-name" id="attachedFileName">Dokumen.pdf</p>
                                        <p class="attached-meta" id="attachedFileSize">0 MB • Terlampir</p>
                                    </div>
                                </div>
                                <button type="button" class="btn-trash" id="removeAttachedFileBtn" title="Hapus file">
                                    <i class='bx bx-trash'></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn-outline-action" id="cancelProgressModalBtn">Batal</button>
                        <button type="submit" class="btn-blue-primary">
                            <i class='bx bx-check'></i> Simpan Perkembangan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const sidebar = document.querySelector('.sidebar');

            if (mobileMenuBtn && sidebar) {
                mobileMenuBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    sidebar.classList.toggle('active');
                });

                document.addEventListener('click', function(e) {
                    if (window.innerWidth <= 768) {
                        if (!sidebar.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                            sidebar.classList.remove('active');
                        }
                    }
                });
            }

            // Toggle Submenu Sidebar
            const kelolaToggle = document.getElementById('kelolaPerkaraToggle');
            if (kelolaToggle) {
                kelolaToggle.addEventListener('click', function() {
                    this.closest('.nav-group').classList.toggle('open');
                });
            }

            // Modal Tambah Perkembangan
            const progressModal = document.getElementById('progressModal');
            const openBtn = document.getElementById('openProgressModalBtn');
            const closeBtn = document.getElementById('closeProgressModalBtn');
            const cancelBtn = document.getElementById('cancelProgressModalBtn');

            function closeProgressModal() {
                if (progressModal) progressModal.classList.remove('active');
            }

            if (openBtn && progressModal) {
                openBtn.addEventListener('click', () => progressModal.classList.add('active'));
                closeBtn.addEventListener('click', closeProgressModal);
                cancelBtn.addEventListener('click', closeProgressModal);
                progressModal.addEventListener('click', (e) => {
                    if (e.target === progressModal) closeProgressModal();
                });
            }

            // Character Counter Textarea (0 / 500)
            const descBox = document.getElementById('desc_box');
            const charCounter = document.getElementById('charCounter');
            if (descBox && charCounter) {
                descBox.addEventListener('input', function() {
                    charCounter.textContent = `${this.value.length} / 500`;
                });
            }

            // Upload Dropzone & Preview File
            const dropzone = document.getElementById('uploadDropzone');
            const attachmentInput = document.getElementById('attachmentInput');
            const attachedCard = document.getElementById('attachedFileCard');
            const attachedName = document.getElementById('attachedFileName');
            const attachedSize = document.getElementById('attachedFileSize');
            const removeFileBtn = document.getElementById('removeAttachedFileBtn');

            if (dropzone && attachmentInput) {
                dropzone.addEventListener('click', () => attachmentInput.click());

                attachmentInput.addEventListener('change', function() {
                    const file = this.files[0];
                    if (file) {
                        const sizeMB = (file.size / (1024 * 1024)).toFixed(1);
                        attachedName.textContent = file.name;
                        attachedSize.textContent = `${sizeMB} MB • Terlampir`;
                        attachedCard.style.display = 'flex';
                    }
                });

                if (removeFileBtn) {
                    removeFileBtn.addEventListener('click', function() {
                        attachmentInput.value = '';
                        attachedCard.style.display = 'none';
                    });
                }
            }
        });
    </script>
</body>
</html>