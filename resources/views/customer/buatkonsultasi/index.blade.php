<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Consultation - Ketut Surya Putra & Partners</title>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
     <!-- Memuat file CSS eksternal -->
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
                    <h2 class="brand-name">KETUT SURYA PUTRA<br>& PARTNERS</h2>
                    <p class="brand-sub">Legal Client Portal</p>
                </div>
            </div>

            <div class="sidebar-menu">
                <p class="menu-label">RUANG KLIEN</p>
                <ul>
                    <li><a href="{{ route('customer.index') }}"><i class='bx bx-grid-alt'></i> Overview</a></li>
                    <li><a href="#"><i class='bx bx-message-square-detail'></i> My Consultations</a></li>
                    <!-- Menu Active -->
                    <li class="active"><a href="#"><i class='bx bx-file-blank'></i> New Consultation</a></li>
                    <li><a href="{{ route('customer.tracking.index') }}"><i class='bx bx-search-alt-2'></i> Track Your Case</a></li>
                    <li><a href="#"><i class='bx bx-user'></i> My Profile</a></li>
                </ul>
            </div>

            <div class="sidebar-footer">
                <div class="help-box">
                    <i class='bx bx-headphone'></i>
                    <h4>Butuh bantuan?</h4>
                    <p>Tim kami siap membantu penggunaan portal Anda.</p>
                    <a href="#" class="help-link">Pusat bantuan <i class='bx bx-top-right-arrow'></i></a>
                </div>
                <a href="#" class="settings-link"><i class='bx bx-cog'></i> Pengaturan akun</a>
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
                        <span>Portal Klien</span> / <span class="current">New Consultation</span>
                    </div>
                </div>
                <div class="topbar-right">
                    <button class="icon-btn"><i class='bx bx-bell'></i></button>
                    <div class="user-profile">
                        <div class="avatar">
                            <i class='bx bx-user'></i>
                        </div>
                        <div class="user-info">
                            <span class="user-name">Akun Anda</span>
                            <span class="user-role">Klien</span>
                        </div>
                        <i class='bx bx-chevron-down'></i>
                    </div>
                </div>
            </header>

            <!-- PAGE CONTENT -->
            <div class="content-area">
                <div class="welcome-section mb-4">
                    <h1>New Consultation</h1>
                    <p>Sampaikan permasalahan hukum Anda agar kami dapat membantu menemukan layanan dan lawyer yang sesuai.</p>
                </div>

                <div class="grid-layout">
                    <!-- LEFT COLUMN (Form Area) -->
                    <div class="form-content-area">

                        <!-- PROGRESS STEPPER -->
                        <div class="wizard-container">
                            <div class="wizard-header">
                                <h4>Tahapan Perkara</h4>
                                <span class="wizard-counter">Tahap 1 dari 4</span>
                            </div>

                            <div class="wizard-progress">
                                <div class="wizard-line">
                                    <div class="wizard-line-active"></div>
                                </div>

                                <div class="wizard-step">
                                    <div class="wizard-circle active-completed">
                                        <i class='bx bx-check'></i>
                                    </div>
                                    <span class="wizard-label">Informasi Dasar</span>
                                </div>

                                <div class="wizard-step">
                                    <div class="wizard-circle">2</div>
                                    <span class="wizard-label">Detail Permasalahan</span>
                                </div>

                                <div class="wizard-step">
                                    <div class="wizard-circle">3</div>
                                    <span class="wizard-label">Dokumen Pendukung</span>
                                </div>

                                <div class="wizard-step">
                                    <div class="wizard-circle">4</div>
                                    <span class="wizard-label">Review &amp; Kirim</span>
                                </div>
                            </div>
                        </div>

                        <form action="#" id="consultationForm">
                            <!-- ==========================================
                                TAHAP 1: INFORMASI DASAR
                                ========================================== -->
                            <div class="step-content active" id="step-1">
                                <h4 class="form-section-title">1. Informasi Dasar</h4>
                                <p class="form-section-desc">Lengkapi informasi diri Anda untuk memulai pengajuan konsultasi.</p>

                                <div class="form-group">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" placeholder="Masukkan nama lengkap Anda">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Nomor Induk Kependudukan (NIK)</label>
                                    <input type="text" class="form-control" placeholder="Masukkan 16 digit NIK">
                                </div>
                                <div class="form-row">
                                    <div class="form-group half-width">
                                        <label class="form-label">No Telp / Whatsapp</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <img src="https://flagcdn.com/w20/id.png" alt="ID" width="20">
                                                <span>+62</span>
                                            </div>
                                            <input type="text" class="form-control input-with-prepend" placeholder="Masukkan nomor WhatsApp">
                                        </div>
                                    </div>
                                    <div class="form-group half-width">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" placeholder="Masukkan alamat email aktif">
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="button" class="btn btn-outline-gray"><i class='bx bx-save'></i> Simpan Draft</button>
                                    <div class="action-right">
                                        <button type="button" class="btn btn-primary btn-next" data-next="2">Lanjut ke Detail <i class='bx bx-right-arrow-alt'></i></button>
                                    </div>
                                </div>
                            </div>

                            <!-- ==========================================
                                TAHAP 2: DETAIL PERMASALAHAN
                                ========================================== -->
                            <div class="step-content" id="step-2" style="display: none;">
                                <h4 class="form-section-title">2. Detail Permasalahan</h4>
                                <p class="form-section-desc">Jelaskan permasalahan hukum yang ingin Anda konsultasikan agar kami dapat memahami kebutuhan Anda.</p>

                                <div class="form-row">
                                    <div class="form-group half-width">
                                        <label class="form-label">Kategori Permasalahan</label>
                                        <select class="form-control">
                                            <option value="">Pilih kategori permasalahan</option>
                                            <option value="1">Konsultasi Hukum</option>
                                            <option value="2">Pendampingan Kasus</option>
                                        </select>
                                    </div>
                                    <div class="form-group half-width">
                                        <label class="form-label">Bidang Hukum</label>
                                        <select class="form-control">
                                            <option value="">Pilih bidang hukum</option>
                                            <option value="1">Perdata</option>
                                            <option value="2">Pidana</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Judul Konsultasi</label>
                                    <input type="text" class="form-control" placeholder="Masukkan judul konsultasi Anda">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Ringkasan Permasalahan</label>
                                    <textarea class="form-control" rows="5" placeholder="Ceritakan kronologi dan detail permasalahan Anda"></textarea>
                                    <div class="char-count text-muted text-xs mt-1">0/500</div>
                                </div>

                                <div class="form-actions">
                                    <button type="button" class="btn btn-outline-gray"><i class='bx bx-save'></i> Simpan Draft</button>
                                    <div class="action-right">
                                        <button type="button" class="btn btn-light btn-prev" data-prev="1">Kembali</button>
                                        <button type="button" class="btn btn-primary btn-next" data-next="3">Lanjut ke Dokumen <i class='bx bx-right-arrow-alt'></i></button>
                                    </div>
                                </div>
                            </div>

                            <!-- ==========================================
                                TAHAP 3: DOKUMEN PENDUKUNG
                                ========================================== -->
                            <div class="step-content" id="step-3" style="display: none;">
                                <h4 class="form-section-title">3. Dokumen Pendukung</h4>
                                <p class="form-section-desc">Berikan informasi tentang bidang hukum yang ingin anda konsultasikan.</p>

                                <div class="upload-drag-area">
                                    <div class="upload-icon"><i class='bx bx-cloud-upload'></i></div>
                                    <h5>Drag & drop files or <span class="text-blue cursor-pointer">Browse</span></h5>
                                    <p class="text-muted text-xs">Supported formats: PDF, PNG, JPG, JPEG, DOCX</p>
                                    <input type="file" id="fileUpload" hidden multiple>
                                </div>

                                <!-- List File Terunggah -->
                                <div class="uploaded-files-list mt-4">
                                    <div class="file-item-box">
                                        <div class="file-item-info">
                                            <i class='bx bxs-file-pdf text-red file-type-icon'></i>
                                            <div>
                                                <span class="file-name">surat-somasi.pdf</span>
                                                <span class="file-size text-muted text-xs">248.2 KB</span>
                                            </div>
                                        </div>
                                        <button type="button" class="btn-icon-delete"><i class='bx bx-trash'></i></button>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button type="button" class="btn btn-outline-gray"><i class='bx bx-save'></i> Simpan Draft</button>
                                    <div class="action-right">
                                        <button type="button" class="btn btn-light btn-prev" data-prev="2">Kembali</button>
                                        <button type="button" class="btn btn-primary btn-next" data-next="4">Lanjut ke Detail <i class='bx bx-right-arrow-alt'></i></button>
                                    </div>
                                </div>
                            </div>

                            <!-- ==========================================
                                TAHAP 4: REVIEW
                                ========================================== -->
                            <div class="step-content" id="step-4" style="display: none;">
                                <h4 class="form-section-title">4. Review</h4>
                                <p class="form-section-desc">Periksa kembali seluruh data yang telah anda isi sebelum dikirim</p>

                                <!-- Review Card 1 -->
                                <div class="review-card">
                                    <div class="review-header">
                                        <div class="d-flex align-center gap-2">
                                            <div class="icon-box-sm bg-light-gray"><i class='bx bx-user'></i></div>
                                            <h5>1. Data Diri</h5>
                                        </div>
                                        <button type="button" class="btn-edit-link btn-jump" data-target="1"><i class='bx bx-pencil'></i> Edit Data Diri</button>
                                    </div>
                                    <div class="review-body grid-3">
                                        <div>
                                            <div class="review-label">Nama Lengkap</div>
                                            <div class="review-value">Alfito Septa Pratama</div>
                                        </div>
                                        <div>
                                            <div class="review-label">Email</div>
                                            <div class="review-value">alfito.23081@mhs.unesa.ac.id</div>
                                        </div>
                                        <div>
                                            <div class="review-label">No Telp/Whatsapp</div>
                                            <div class="review-value">0838-3244-2344</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Review Card 2 -->
                                <div class="review-card">
                                    <div class="review-header">
                                        <div class="d-flex align-center gap-2">
                                            <div class="icon-box-sm bg-light-gray"><i class='bx bx-user'></i></div>
                                            <h5>2. Detail Permasalahan</h5>
                                        </div>
                                        <button type="button" class="btn-edit-link btn-jump" data-target="2"><i class='bx bx-pencil'></i> Edit Detail Masalah</button>
                                    </div>
                                    <div class="review-body grid-3">
                                        <div>
                                            <div class="review-label">Jenis Layanan</div>
                                            <div class="review-value">Konsultasi Hukum</div>
                                        </div>
                                        <div>
                                            <div class="review-label">Bidang Hukum</div>
                                            <div class="review-value">Perdata</div>
                                        </div>
                                        <div>
                                            <div class="review-label">Judul Permasalahan</div>
                                            <div class="review-value">Alfito suka mendaki, Brian smbg</div>
                                        </div>
                                    </div>
                                    <div class="review-body pt-0 mt-3">
                                        <div class="review-label">Deskripsi Permasalahan</div>
                                        <div class="review-value line-height-15">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</div>
                                    </div>
                                </div>

                                <!-- Review Card 3 -->
                                <div class="review-card mb-0">
                                    <div class="review-header">
                                        <div class="d-flex align-center gap-2">
                                            <div class="icon-box-sm bg-light-gray"><i class='bx bx-user'></i></div>
                                            <h5>3. Dokumen Pendukung</h5>
                                        </div>
                                        <button type="button" class="btn-edit-link btn-jump" data-target="3"><i class='bx bx-pencil'></i> Edit Dokumen</button>
                                    </div>
                                    <div class="review-body p-0">
                                        <div class="file-item-box border-none border-bottom rounded-0">
                                            <div class="file-item-info">
                                                <i class='bx bxs-file-pdf text-red file-type-icon'></i>
                                                <div>
                                                    <span class="file-name">Surat Perjanjian Fitok Brian.pdf</span>
                                                    <span class="file-size text-muted text-xs">60 KB of 18MB</span>
                                                </div>
                                            </div>
                                            <button type="button" class="btn-icon-download"><i class='bx bx-download'></i></button>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions mt-4 pt-4 border-top">
                                    <button type="button" class="btn btn-light btn-prev" data-prev="3">Kembali</button>
                                    <button type="submit" class="btn btn-primary">Kirim Pengajuan <i class='bx bx-right-arrow-alt'></i></button>
                                </div>
                            </div>

                        </form>
                    </div>

                    <!-- RIGHT COLUMN -->
                    <div class="right-col">
                        <!-- Info Card -->
                        <div class="card info-card bg-light-blue mb-4">
                            <div class="card-icon"><i class='bx bx-info-circle'></i></div>
                            <div class="card-text">
                                <h4>Informasi Penting</h4>
                                <p>Semakin lengkap informasi yang Anda berikan, semakin tepat kami mencarikan lawyer yang sesuai dengan kebutuhan Anda.</p>
                            </div>
                        </div>

                        <!-- Info List Card -->
                        <div class="card bg-light-green border-green mb-4">
                            <div class="card-header-inline mb-3">
                                <div class="icon-box-sm text-green"><i class='bx bx-diamond'></i></div>
                                <h4 class="text-green">Apa yang terjadi selanjutnya?</h4>
                            </div>
                            
                            <div class="info-list-item">
                                <div class="list-icon"><i class='bx bx-spreadsheet'></i></div>
                                <div>
                                    <h5>1. Kami meninjau informasi Anda</h5>
                                    <p>Tim kami akan mempelajari permasalahan hukum Anda.</p>
                                </div>
                            </div>
                            <div class="info-list-item">
                                <div class="list-icon"><i class='bx bx-search-alt-2'></i></div>
                                <div>
                                    <h5>2. Sistem mencarikan lawyer yang sesuai</h5>
                                    <p>Berdasarkan keahlian, bidang hukum, dan ketersediaan.</p>
                                </div>
                            </div>
                            <div class="info-list-item">
                                <div class="list-icon"><i class='bx bx-bell'></i></div>
                                <div>
                                    <h5>3. Anda akan mendapatkan konfirmasi</h5>
                                    <p>Melalui email atau notifikasi di portal.</p>
                                </div>
                            </div>
                            <div class="info-list-item">
                                <div class="list-icon"><i class='bx bx-message-rounded-dots'></i></div>
                                <div>
                                    <h5>4. Konsultasi dapat dimulai</h5>
                                    <p>Setelah lawyer menerima permintaan Anda.</p>
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
                            <button class="btn btn-whatsapp"><i class='bx bxl-whatsapp'></i> Chat via WhatsApp <i class='bx bx-chevron-right'></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const sidebar = document.querySelector('.sidebar');
            if(mobileMenuBtn && sidebar) {
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
        });

        document.addEventListener('DOMContentLoaded', function () {
            const steps = document.querySelectorAll('.step-content');
            const wizardSteps = document.querySelectorAll('.wizard-step');
            const wizardCircles = document.querySelectorAll('.wizard-circle');
            const wizardLineActive = document.querySelector('.wizard-line-active');
            const wizardCounter = document.querySelector('.wizard-counter');

            const totalSteps = wizardSteps.length;
            let currentStep = 1;

            function goToStep(targetStepNum) {
                const targetStep = Number(targetStepNum);

                if (targetStep < 1 || targetStep > totalSteps) return;

                currentStep = targetStep;

                // Tampilkan form sesuai tahap yang dipilih
                steps.forEach(step => {
                    step.style.display =
                        Number(step.id.replace('step-', '')) === currentStep
                            ? 'block'
                            : 'none';
                });

                // Perbarui lingkaran dan label setiap tahap
                wizardSteps.forEach((step, index) => {
                    const stepNumber = index + 1;
                    const circle = step.querySelector('.wizard-circle');

                    step.classList.remove('active', 'completed');
                    circle.classList.remove('active-completed');

                    if (stepNumber < currentStep) {
                        step.classList.add('completed');
                        circle.classList.add('active-completed');
                        circle.innerHTML = "<i class='bx bx-check'></i>";
                    } else if (stepNumber === currentStep) {
                        step.classList.add('active', 'completed');
                        circle.classList.add('active-completed');
                        circle.innerHTML = "<i class='bx bx-check'></i>";
                    } else {
                        circle.textContent = stepNumber;
                    }
                });

                // Perbarui panjang garis progres
                if (currentStep === totalSteps) {
                    // Jika di tahap terakhir, penuhi garis 100% sampai ujung kanan
                    wizardLineActive.style.width = '100%';
                } else {
                    // Ambil elemen step yang sedang aktif
                    const activeStepElement = wizardSteps[currentStep - 1];
                    
                    // Hitung jarak dari ujung kiri ke titik tengah bulatan aktif
                    const targetWidth = activeStepElement.offsetLeft + (activeStepElement.offsetWidth / 2);
                    
                    // Set lebar garis menggunakan pixel (px)
                    wizardLineActive.style.width = targetWidth + 'px';
                }

                // Perbarui teks tahapan
                wizardCounter.textContent =
                    `Tahap ${currentStep} dari ${totalSteps}`;
            }

            // Tombol lanjut
            document.querySelectorAll('.btn-next').forEach(button => {
                button.addEventListener('click', function () {
                    goToStep(this.dataset.next);
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                });
            });

            // Tombol kembali
            document.querySelectorAll('.btn-prev').forEach(button => {
                button.addEventListener('click', function () {
                    goToStep(this.dataset.prev);
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                });
            });

            // Tombol edit pada bagian review
            document.querySelectorAll('.btn-jump').forEach(button => {
                button.addEventListener('click', function () {
                    goToStep(this.dataset.target);
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                });
            });

            // Tampilkan tahap pertama saat halaman dibuka
            goToStep(1);
        });
    </script>
</body>
</html>