<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perkara Baru - Ketut Surya Putra & Partners</title>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS Utama & CSS Form Perkara Baru -->
    <link rel="stylesheet" href="{{ asset('css/customer/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/buatkonsultasi/buatkonsultasi.css') }}">
    
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="app-container">
        
        <!-- SIDEBAR -->
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
                <ul>
                    <li><a href="{{ route('customer.index') }}"><i class='bx bx-grid-alt'></i> Overview</a></li>
                    <li><a href="{{ route('customer.perkaralama.index') }}"><i class='bx bx-git-pull-request'></i> Perkara Saya</a></li>
                    <li class="active-blue"><a href="{{ route('customer.buatkonsultasi.index') }}"><i class='bx bx-copy'></i> Perkara Baru</a></li>
                    <li><a href="{{ route('customer.tracking.index') }}"><i class='bx bx-message'></i> Track Your Case</a></li>
                </ul>
            </div>

            <div class="sidebar-footer">
                <a href="{{ route('customer.akun.index') }}" class="settings-link"><i class='bx bx-cog'></i> Pengaturan akun</a>
            </div>
        </aside>

        <!-- MAIN CONTENT -->
        <main class="main-wrapper">
            
            <!-- TOP NAVBAR -->
            <header class="topbar">
                <div class="topbar-left" style="display: flex; align-items: center; gap: 15px;">
                    <button class="mobile-toggle-btn" id="mobileMenuBtn">
                        <i class='bx bx-menu'></i>
                    </button>
                    <div class="breadcrumbs">
                        <span>Portal Klien</span> / <span class="current">Perkara Baru</span>
                    </div>
                </div>
                <div class="topbar-right">
                    <button class="icon-btn"><i class='bx bx-bell'></i></button>
                    <div class="user-profile">
                        <div class="avatar">
                            <i class='bx bx-user'></i>
                        </div>
                        <div class="user-info">
                            <span class="user-name">{{ $customer['full_name'] ?? 'Akun Anda' }}</span>
                            <span class="user-role">Klien</span>
                        </div>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                </div>
            </header>

            <!-- PAGE CONTENT -->
            <div class="content-area">
                <div class="welcome-section mb-4">
                    <h1 id="pageMainHeading">Perkara Baru</h1>
                    <p id="pageMainSubheading">Lengkapi data dan dokumen untuk mengajukan perkara baru.</p>
                </div>

                @if (session('success'))
                    <div class="alert-success" role="alert">
                        <i class='bx bx-check-circle'></i> {{ session('success') }}
                    </div>
                @endif

                <div class="grid-layout">
                    <!-- LEFT COLUMN (Form & Wizard Area) -->
                    <div class="left-wizard-wrapper">

                        <!-- PROGRESS STEPPER CARD -->
                        <div class="wizard-card" id="wizardHeaderCard">
                            <div class="wizard-header" id="wizardTopRow">
                                <h4>Tahapan Pengajuan</h4>
                                <span class="wizard-counter">Tahap 1 dari 4</span>
                            </div>

                            <div class="wizard-progress">
                                <div class="wizard-line">
                                    <div class="wizard-line-active" id="wizardLineActive"></div>
                                </div>

                                <div class="wizard-step active" data-step="1">
                                    <div class="wizard-circle current">1</div>
                                    <span class="wizard-label">Informasi Dasar</span>
                                </div>

                                <div class="wizard-step" data-step="2">
                                    <div class="wizard-circle">2</div>
                                    <span class="wizard-label">Detail Perkara</span>
                                </div>

                                <div class="wizard-step" data-step="3">
                                    <div class="wizard-circle">3</div>
                                    <span class="wizard-label">Dokumen Pendukung</span>
                                </div>

                                <div class="wizard-step" data-step="4">
                                    <div class="wizard-circle">4</div>
                                    <span class="wizard-label">Review &amp; Kirim</span>
                                </div>
                            </div>
                        </div>

                        <!-- FORM AREA -->
                        <form action="{{ route('customer.buatkonsultasi.store') }}" method="POST" enctype="multipart/form-data" id="consultationForm">
                            @csrf

                            <!-- ==========================================
                                 TAHAP 1: INFORMASI DASAR
                                 ========================================== -->
                            <div class="form-card step-content active" id="step-1">
                                <h4 class="form-section-title">1. Informasi Dasar</h4>
                                <p class="form-section-desc">Lengkapi data diri untuk memulai pengajuan perkara baru.</p>

                                <div class="form-group">
                                    <label for="applicant_name" class="form-label">Nama lengkap</label>
                                    <input type="text" id="applicant_name" name="applicant_name" class="form-control"
                                           value="{{ old('applicant_name', $draft['applicant_name'] ?? '') }}"
                                           placeholder="Masukkan nama lengkap sesuai KTP">
                                </div>

                                <div class="form-group">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="text" id="nik" name="nik" maxlength="16" class="form-control"
                                           value="{{ old('nik', $draft['nik'] ?? '') }}"
                                           placeholder="Masukkan 16 digit NIK">
                                </div>

                                <div class="form-group">
                                    <label for="phone" class="form-label">No. telepon / WhatsApp</label>
                                    <input type="text" id="phone" name="phone" class="form-control"
                                           value="{{ old('phone', $draft['phone'] ?? '') }}"
                                           placeholder="Masukkan nomor telepon / WhatsApp">
                                </div>

                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" id="email" name="email" class="form-control"
                                           value="{{ old('email', $draft['email'] ?? '') }}"
                                           placeholder="Masukkan alamat email">
                                </div>

                                <div class="form-group">
                                    <label for="address" class="form-label">Alamat</label>
                                    <textarea id="address" name="address" rows="3" class="form-control"
                                              placeholder="Masukkan alamat lengkap">{{ old('address', $draft['address'] ?? '') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="birth_place_date" class="form-label">Tanggal lahir</label>
                                    <input type="text" id="birth_place_date" name="birth_place_date" class="form-control"
                                           value="{{ old('birth_place_date', $draft['birth_place_date'] ?? '') }}"
                                           placeholder="DD / MM / YYYY">
                                </div>

                                <div class="form-group">
                                    <label for="occupation" class="form-label">Pekerjaan</label>
                                    <input type="text" id="occupation" name="occupation" class="form-control"
                                           value="{{ old('occupation', $draft['occupation'] ?? '') }}"
                                           placeholder="Masukkan pekerjaan">
                                </div>

                                <div class="form-actions">
                                    <button type="button" class="btn btn-outline-gray btn-save-draft">
                                        <i class='bx bx-save'></i> Simpan Draft
                                    </button>
                                    <div class="action-right">
                                        <button type="button" class="btn btn-primary btn-next" data-next="2">
                                            Lanjut ke Detail <i class='bx bx-right-arrow-alt'></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- ==========================================
                                 TAHAP 2: DETAIL PERKARA
                                 ========================================== -->
                            <div class="form-card step-content" id="step-2" style="display: none;">
                                <h4 class="form-section-title">2. Detail Perkara</h4>
                                <p class="form-section-desc">Jelaskan kronologi dan detail perkara agar kami dapat meninjau pengajuan Anda.</p>

                                <div class="form-row">
                                    <div class="form-group half-width">
                                        <label for="category_id" class="form-label">Kategori Perkara</label>
                                        <select id="category_id" name="category_id" class="form-control">
                                            <option value="">Pilih kategori perkara</option>
                                            @foreach ($problemCategories as $category)
                                                <option value="{{ $category['category_id'] }}"
                                                    data-label="{{ $category['category_name'] }}"
                                                    {{ old('category_id', $draft['category_id'] ?? '') == $category['category_id'] ? 'selected' : '' }}>
                                                    {{ $category['category_name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group half-width">
                                        <label for="legal_field_id" class="form-label">Bidang Hukum</label>
                                        <select id="legal_field_id" name="legal_field_id" class="form-control">
                                            <option value="">Pilih bidang hukum</option>
                                            @foreach ($legalFields as $field)
                                                <option value="{{ $field['legal_field_id'] }}"
                                                    data-label="{{ $field['field_name'] }}"
                                                    {{ old('legal_field_id', $draft['legal_field_id'] ?? '') == $field['legal_field_id'] ? 'selected' : '' }}>
                                                    {{ $field['field_name'] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="consultation_title" class="form-label">Judul Perkara</label>
                                    <input type="text" id="consultation_title" name="consultation_title" class="form-control"
                                           value="{{ old('consultation_title', $draft['consultation_title'] ?? '') }}"
                                           placeholder="Masukkan judul perkara Anda">
                                </div>

                                <div class="form-group">
                                    <label for="case_summary" class="form-label">Ringkasan Perkara</label>
                                    <textarea id="case_summary" name="case_summary" rows="5" maxlength="500" class="form-control"
                                              placeholder="Ceritakan kronologi dan detail perkara Anda">{{ old('case_summary', $draft['case_summary'] ?? '') }}</textarea>
                                    <div class="char-count" id="summaryCharCount">0/500</div>
                                </div>

                                <div class="form-actions">
                                    <button type="button" class="btn btn-outline-gray btn-save-draft">
                                        <i class='bx bx-save'></i> Simpan Draft
                                    </button>
                                    <div class="action-right">
                                        <button type="button" class="btn btn-light-muted btn-prev" data-prev="1">Kembali</button>
                                        <button type="button" class="btn btn-primary btn-next" data-next="3">
                                            Lanjut ke Dokumen <i class='bx bx-right-arrow-alt'></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- ==========================================
                                 TAHAP 3: DOKUMEN PENDUKUNG
                                 ========================================== -->
                            <div class="form-card step-content" id="step-3" style="display: none;">
                                <h4 class="form-section-title">3. Dokumen Pendukung</h4>
                                <p class="form-section-desc">Unggah dokumen pendukung untuk melengkapi pengajuan perkara Anda.</p>

                                <div class="upload-drag-area" id="dropZoneArea">
                                    <div class="upload-icon"><i class='bx bx-cloud-upload'></i></div>
                                    <h5>Drag &amp; drop files or <span class="browse-link" id="browseFileBtn">Browse</span></h5>
                                    <p class="upload-hint">Supported formates: PDF, PNG, JPG, JPEG, DOCX</p>
                                    <input type="file" id="fileUpload" name="documents[]" accept=".pdf,.png,.jpg,.jpeg,.docx" hidden multiple>
                                </div>

                                <!-- List File Terunggah -->
                                <div class="uploaded-files-list" id="uploadedFilesList">
                                    <!-- Diisi oleh JS -->
                                </div>

                                <p class="naming-convention-note">
                                    Penamaan dokumen: DOKUMEN_SIDANG (huruf kapital, pisahkan kata dengan _).
                                </p>

                                <div class="form-actions">
                                    <button type="button" class="btn btn-outline-gray btn-save-draft">
                                        <i class='bx bx-save'></i> Simpan Draft
                                    </button>
                                    <div class="action-right">
                                        <button type="button" class="btn btn-light-muted btn-prev" data-prev="2">Kembali</button>
                                        <button type="button" class="btn btn-primary btn-next" data-next="4">
                                            Review &amp; Kirim <i class='bx bx-right-arrow-alt'></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- ==========================================
                                 TAHAP 4: REVIEW DAN KIRIM
                                 ========================================== -->
                            <div class="step-content step-4-wrapper" id="step-4" style="display: none;">
                                <h4 class="form-section-title mb-3">4. Review dan Kirim</h4>

                                <!-- Review Card 1: Informasi Dasar -->
                                <div class="review-card">
                                    <div class="review-header">
                                        <div class="review-title-group">
                                            <span class="status-dot-green"></span>
                                            <h5>1. Informasi Dasar</h5>
                                        </div>
                                        <button type="button" class="btn-edit-pill btn-jump" data-target="1">
                                            <i class='bx bx-pencil'></i> Edit
                                        </button>
                                    </div>
                                    <div class="review-body grid-2">
                                        <div>
                                            <div class="review-label">Nama Lengkap</div>
                                            <div class="review-value" id="rev_applicant_name">—</div>
                                        </div>
                                        <div>
                                            <div class="review-label">Email</div>
                                            <div class="review-value" id="rev_email">—</div>
                                        </div>
                                        <div>
                                            <div class="review-label">Nomor WhatsApp</div>
                                            <div class="review-value" id="rev_phone">—</div>
                                        </div>
                                        <div>
                                            <div class="review-label">NIK</div>
                                            <div class="review-value" id="rev_nik">—</div>
                                        </div>
                                        <div>
                                            <div class="review-label">Alamat</div>
                                            <div class="review-value" id="rev_address">—</div>
                                        </div>
                                        <div>
                                            <div class="review-label">Tanggal Lahir</div>
                                            <div class="review-value" id="rev_birth_place_date">—</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Review Card 2: Detail Perkara -->
                                <div class="review-card">
                                    <div class="review-header">
                                        <div class="review-title-group">
                                            <span class="status-dot-green"></span>
                                            <h5>2. Detail Perkara</h5>
                                        </div>
                                        <button type="button" class="btn-edit-pill btn-jump" data-target="2">
                                            <i class='bx bx-pencil'></i> Edit
                                        </button>
                                    </div>
                                    <div class="review-body">
                                        <div class="grid-2 mb-3">
                                            <div>
                                                <div class="review-label">Kategori Perkara</div>
                                                <div>
                                                    <span class="review-badge-green" id="rev_category_name">—</span>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="review-label">Bidang Hukum</div>
                                                <div class="review-value" id="rev_legal_field_name">—</div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="review-label">Judul Perkara</div>
                                            <div class="review-value" id="rev_consultation_title">—</div>
                                        </div>

                                        <div>
                                            <div class="review-label">Ringkasan Perkara</div>
                                            <div class="review-summary-box" id="rev_case_summary">—</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Review Card 3: Dokumen Pendukung -->
                                <div class="review-card">
                                    <div class="review-header">
                                        <div class="review-title-group">
                                            <span class="status-dot-green"></span>
                                            <h5>3. Dokumen Pendukung</h5>
                                        </div>
                                        <button type="button" class="btn-edit-pill btn-jump" data-target="3">
                                            <i class='bx bx-pencil'></i> Edit
                                        </button>
                                    </div>
                                    <div class="review-body" id="rev_documents_list">
                                        <!-- Diisi dinamis oleh JS -->
                                    </div>
                                </div>

                                <div class="review-footer-actions">
                                    <button type="button" class="btn btn-outline-gray btn-prev" data-prev="3">Kembali</button>
                                    <button type="submit" class="btn btn-primary">
                                        Kirim Perkara <i class='bx bx-right-arrow-alt'></i>
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>

                    <!-- RIGHT COLUMN -->
                    <div class="right-col">
                        <div class="card right-info-wrapper">
                            <!-- Info Card -->
                            <div class="card info-card bg-light-blue">
                                <div class="card-icon"><i class='bx bx-info-circle'></i></div>
                                <div class="card-text">
                                    <h4>Informasi Penting</h4>
                                    <p>Lengkapi data diri, detail perkara, dan dokumen pendukung agar kami dapat meninjau pengajuan Anda.</p>
                                </div>
                            </div>

                            <!-- Info List Card -->
                            <div class="card bg-light-green border-green mb-0">
                                <div class="card-header-inline mb-3">
                                    <i class='bx bx-diamond'></i>
                                    <h4>Apa yang terjadi selanjutnya?</h4>
                                </div>
                                
                                <div class="info-list-item">
                                    <div class="list-icon"><i class='bx bx-spreadsheet'></i></div>
                                    <div>
                                        <h5>1. Kami meninjau pengajuan Anda</h5>
                                        <p>Tim kami mempelajari detail perkara dan dokumen pendukung Anda.</p>
                                    </div>
                                </div>
                                <div class="info-list-item">
                                    <div class="list-icon"><i class='bx bx-search-alt-2'></i></div>
                                    <div>
                                        <h5>2. Lawyer yang sesuai dipilih</h5>
                                        <p>Berdasarkan keahlian, bidang hukum, dan ketersediaan.</p>
                                    </div>
                                </div>
                                <div class="info-list-item">
                                    <div class="list-icon"><i class='bx bx-bell'></i></div>
                                    <div>
                                        <h5>3. Konfirmasi pengajuan dikirim</h5>
                                        <p>Melalui email atau notifikasi di portal.</p>
                                    </div>
                                </div>
                                <div class="info-list-item">
                                    <div class="list-icon"><i class='bx bx-message-rounded-dots'></i></div>
                                    <div>
                                        <h5>4. Penanganan perkara dimulai</h5>
                                        <p>Setelah lawyer menerima pengajuan Anda.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- WhatsApp Contact Card -->
                        <div class="card contact-card">
                            <div class="contact-header">
                                <div class="contact-icon"><i class='bx bx-message-rounded-dots'></i></div>
                                <div>
                                    <h4>Butuh informasi lebih lanjut?</h4>
                                    <p>Anda dapat menghubungi tim pendamping perkara melalui WhatsApp.</p>
                                </div>
                            </div>
                            <button type="button" class="btn btn-whatsapp"><i class='bx bxl-whatsapp'></i> Chat via WhatsApp <i class='bx bx-chevron-right'></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="{{ asset('js/customer/buatkonsultasi.js') }}"></script>
</body>
</html>