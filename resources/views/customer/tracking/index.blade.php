<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Perkara - Ketut Surya Putra & Partners</title>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS Utama & CSS Tracking -->
    <link rel="stylesheet" href="{{ asset('css/customer/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/tracking/tracking.css') }}">
    
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
                    <li><a href="#"><i class='bx bx-hive'></i> Perkara Lama</a></li>
                    <li><a href="{{ route('customer.buatkonsultasi.index') }}"><i class='bx bx-file-blank'></i> Perkara Baru</a></li>
                    <!-- Menu Active -->
                    <li class="active"><a href="#"><i class='bx bx-message-square-detail'></i> Track Your Case</a></li>
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
                <div class="topbar-left d-flex align-center gap-3">
                    <button class="mobile-toggle-btn" id="mobileMenuBtn">
                        <i class='bx bx-menu'></i>
                    </button>
                    <div class="breadcrumbs">
                        <span>Portal Klien</span> / <span class="current">Tracking Perkara</span>
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
                
                <!-- Page Header -->
                <div class="page-header-flex">
                    <div class="welcome-section mb-0">
                        <h1 class="page-title">Track Perkara</h1>
                        <p class="page-subtitle">Pantau status dan timeline perkara Anda.</p>
                    </div>
                    <button class="btn btn-outline case-selector">
                        <i class='bx bx-folder'></i> KP-2026-001 <i class='bx bx-chevron-down'></i>
                    </button>
                </div>

                <!-- Case Overview Card -->
                <div class="card case-overview-card mb-4">
                    <div class="case-overview-left">
                        <div class="case-icon-box">
                            <div class="logo">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 16l3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/>
                                    <path d="M2 16l3-8 3 8c-.87.65-1.92 1-3 1s-2.13-.35-3-1Z"/>
                                    <path d="M7 21h10"/>
                                    <path d="M12 3v18"/>
                                    <path d="M3 7h2c2 0 5-1 7-2 2 1 5 2 7 2h2"/>
                                </svg>
                            </div>
                        </div>

                        <div class="case-details">
                            <h3>KP-2026-001</h3>
                            <div class="case-meta">
                                <span><i class='bx bx-file'></i> Sengketa Tanah</span>
                                <span><i class='bx bx-calendar'></i> Dibuat pada 8 Oktober 2026</span>
                                <span><i class='bx bx-purchase-tag-alt'></i> Bidang Hukum: <strong>Perdata</strong></span>
                            </div>
                        </div>
                    </div>
                    <div class="case-overview-right">
                        <div class="status-box">
                            <span class="status-label">Status Saat Ini</span>
                            <span class="status-badge badge-blue"><i class='bx bxs-circle'></i> Dalam Proses</span>
                        </div>
                        <button class="btn-icon-outline"><i class='bx bx-dots-vertical-rounded'></i></button>
                    </div>
                </div>

                <!-- Tracking Area Card -->
                <div class="card tracking-main-card p-0">
                    
                    <!-- Stepper Header -->
                    <div class="tracking-header p-4 border-bottom">
                        <div class="card-header-between mb-4">
                            <h4>Tahapan Perkara</h4>
                            <span class="text-muted text-sm wizard-counter">Tahap 1 dari 4</span>
                        </div>
                        
                        <!-- Horizontal Stepper -->
                        <div class="wizard-stepper">
                            <div class="wizard-line"></div>
                            <div class="wizard-line-active" style="width: 0%;"></div>
                            
                            <!-- Tab 1 -->
                            <div class="wizard-step tab-trigger" data-target="tab-1">
                                <div class="wizard-circle">1</div>
                                <div class="wizard-label">Pengajuan<br>Permohonan</div>
                            </div>
                            <!-- Tab 2 -->
                            <div class="wizard-step tab-trigger" data-target="tab-2">
                                <div class="wizard-circle">2</div>
                                <div class="wizard-label">Lawyer<br>Assignment</div>
                            </div>
                            <!-- Tab 3 -->
                            <div class="wizard-step tab-trigger" data-target="tab-3">
                                <div class="wizard-circle">3</div>
                                <div class="wizard-label">Eksekusi<br>Perkara</div>
                            </div>
                            <!-- Tab 4 -->
                            <div class="wizard-step tab-trigger" data-target="tab-4">
                                <div class="wizard-circle">4</div>
                                <div class="wizard-label">Perkara Selesai</div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab Contents Area -->
                    <div class="tracking-body p-4 bg-white">
                        
                        <!-- TAB 1: OVERVIEW PERMASALAHAN (Gambar Tracking Perkara_2.png) -->
                        <div class="tab-content" id="tab-1" style="display: none;">
                            <div class="content-box bg-light-blue rounded-lg p-4">
                                <div class="d-flex align-center gap-3 mb-4">
                                    <div class="icon-box-md bg-light-blue text-blue rounded-md"><i class='bx bx-search-alt-2'></i></div>
                                    <div>
                                        <h5 class="text-lg font-semibold m-0">Overview Permasalahan</h5>
                                        <span class="text-blue text-sm">Sedang berlangsung</span>
                                    </div>
                                </div>
                                
                                <div class="overview-details-container border rounded-lg p-4">
                                    <table class="overview-table">
                                        <tr>
                                            <td class="label-col font-semibold text-dark">Nomor Perkara</td>
                                            <td class="text-dark">KP-2026-001</td>
                                        </tr>
                                        <tr>
                                            <td class="label-col font-semibold text-dark">Judul Perkara</td>
                                            <td class="text-dark">Sengketa Kepemilikan Tanah dan Sertifikat Tumpang Tindih</td>
                                        </tr>
                                        <tr>
                                            <td class="label-col font-semibold text-dark">Kategori</td>
                                            <td class="text-dark">Sengketa Tanah</td>
                                        </tr>
                                        <tr>
                                            <td class="label-col font-semibold text-dark">Bidang Hukum</td>
                                            <td class="text-dark">Hukum Perdata</td>
                                        </tr>
                                        <tr>
                                            <td class="label-col font-semibold text-dark">Tanggal Pengajuan</td>
                                            <td class="text-dark">10 Oktober 2026</td>
                                        </tr>
                                        <tr>
                                            <td class="label-col font-semibold text-dark">Status Perkara</td>
                                            <td class="text-dark"></td> <!-- Dikosongkan sesuai gambar -->
                                        </tr>
                                        
                                        <!-- Baris Ringkasan (Ada jarak di atasnya) -->
                                        <tr>
                                            <td class="label-col font-semibold text-dark align-top pt-4">Ringkasan Permasalahan</td>
                                            <td class="pt-4">
                                                <div class="summary-box bg-gray-50 rounded-md p-3 text-dark line-height-16">
                                                    Klien mengalami sengketa kepemilikan tanah dengan pihak lain akibat dugaan tumpang tindih sertifikat. Klien membutuhkan pendampingan hukum untuk memastikan status kepemilikan tanah dan menentukan langkah penyelesaian yang sesuai.
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- TAB 2: LAWYER ASSIGNMENT (Gambar Tracking Perkara (1).png) -->
                        <div class="tab-content" id="tab-2" style="display: none;">
                            <div class="content-box bg-light-blue rounded-lg p-4">
                                <div class="d-flex align-center gap-3 mb-4">
                                    <div class="icon-box-md bg-light-blue text-blue rounded-md"><i class='bx bx-search-alt-2'></i></div>
                                    <h5 class="text-lg font-semibold m-0">Lawyer yang diTugaskan</h5>
                                </div>
                                
                                <div class="lawyer-profile-box border bg-white rounded-lg p-4 d-flex gap-4">
                                    <img src="https://via.placeholder.com/150" alt="Lawyer" class="lawyer-img rounded-circle">
                                    <div class="lawyer-info">
                                        <h4 class="text-xl font-bold mb-1">Adv. Adi Pratama</h4>
                                        <p class="text-muted mb-3">Lawyer</p>
                                        <p class="text-sm line-height-16 mb-4">Klien mengalami sengketa kepemilikan tanah dengan pihak lain akibat dugaan tumpang tindih sertifikat. Klien membutuhkan pendampingan hukum untuk memastikan status kepemilikan tanah dan menentukan langkah penyelesaian yang sesuai. Klien mengalami sengketa kepemilikan tanah dengan pihak lain akibat dugaan tumpang tindih sertifikat. Klien membutuhkan pendampingan hukum untuk memastikan status kepemilikan tanah dan menentukan langkah penyelesaian yang sesuai.</p>
                                        
                                        <div class="social-links d-flex gap-2 text-lg">
                                            <a href="#" class="text-dark"><i class='bx bxl-linkedin-square'></i></a>
                                            <a href="#" class="text-dark"><i class='bx bx-envelope'></i></a>
                                            <a href="#" class="text-dark"><i class='bx bxl-whatsapp'></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- TAB 3: PERKEMBANGAN PERKARA -->
                        <div class="tab-content" id="tab-3" style="display: none;">
                            <div class="content-box bg-light-blue rounded-lg p-4">
                                
                                <!-- Header Tab 3 -->
                                <div class="d-flex align-center gap-3 mb-4">
                                    <div class="icon-box-md bg-light-blue text-blue rounded-md" style="width: 48px; height: 48px; font-size: 24px;">
                                        <i class='bx bx-file-find'></i>
                                    </div>
                                    <h5 class="text-lg font-semibold m-0 text-dark">Perkembangan Perkara</h5>
                                </div>
                                
                                <!-- List Perkembangan Perkara -->
                                <div class="development-timeline bg-white mt-4 pt-2">
                                    
                                    <!-- Item 1 -->
                                    <div class="dev-item">
                                        <div class="dev-marker"></div>
                                        <div class="dev-datetime">
                                            <div class="text-md">20 Okt 2026</div>
                                            <div class="text-md">19:27</div>
                                        </div>
                                        <div class="dev-content">
                                            Lawyer telah ditugaskan untuk menangani perkara dan mulai melakukan peninjauan awal terhadap informasi yang disampaikan klien.
                                        </div>
                                        <div class="dev-person">
                                            Alfito Spea M/Kom
                                        </div>
                                    </div>

                                    <!-- Item 2 -->
                                    <div class="dev-item">
                                        <div class="dev-marker"></div>
                                        <div class="dev-datetime">
                                            <div class="text-md">20 Okt 2026</div>
                                            <div class="text-md">19:27</div>
                                        </div>
                                        <div class="dev-content">
                                            Lawyer telah ditugaskan untuk menangani perkara dan mulai melakukan peninjauan awal terhadap informasi yang disampaikan klien.
                                        </div>
                                        <div class="dev-person">
                                            Alfito Spea M/Kom
                                        </div>
                                    </div>

                                    <!-- Item 3 -->
                                    <div class="dev-item">
                                        <div class="dev-marker"></div>
                                        <div class="dev-datetime">
                                            <div class="text-md">20 Okt 2026</div>
                                            <div class="text-md">19:27</div>
                                        </div>
                                        <div class="dev-content">
                                            Lawyer telah ditugaskan untuk menangani perkara dan mulai melakukan peninjauan awal terhadap informasi yang disampaikan klien.
                                        </div>
                                        <div class="dev-person">
                                            Alfito Spea M/Kom
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- TAB 4: PERKEMBANGAN PERKARA (Gambar Tracking Perkara (3).png & (2).png) -->
                        <div class="tab-content" id="tab-4" style="display: none;">
                            <div class="content-box bg-light-blue rounded-lg p-4">
                                <div class="d-flex align-center gap-3 mb-4">
                                    <div class="icon-box-md bg-light-blue text-blue rounded-md"><i class='bx bx-message-rounded-dots'></i></div>
                                    <h5 class="text-lg font-semibold m-0">Perkembangan Perkara</h5>
                                </div>
                                
                                <!-- Vertical Timeline -->
                                <div class="vertical-timeline bg-white pl-2">
                                    
                                    <!-- Timeline Item 1 -->
                                    <div class="timeline-item">
                                        <div class="timeline-marker bg-blue"></div>
                                        <div class="timeline-content">
                                            <div class="d-flex justify-between align-start">
                                                <div>
                                                    <h6 class="text-md font-semibold mb-1">Peninjauan Dokumen Awal</h6>
                                                    <div class="text-xs text-muted mb-2 d-flex align-center gap-1"><i class='bx bx-calendar'></i> 20 Okt 2026, 19:27</div>
                                                    <p class="text-sm text-gray line-height-15">Lawyer telah meninjau dokumen awal yang diberikan oleh klien dan melakukan analisis awal terhadap informasi yang disampaikan.</p>
                                                </div>
                                                <button class="btn btn-outline-sm">Detail</button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Timeline Item 2 -->
                                    <div class="timeline-item">
                                        <div class="timeline-marker bg-blue"></div>
                                        <div class="timeline-content">
                                            <div class="d-flex justify-between align-start">
                                                <div>
                                                    <h6 class="text-md font-semibold mb-1">Verifikasi Berkas Perkara</h6>
                                                    <div class="text-xs text-muted mb-2 d-flex align-center gap-1"><i class='bx bx-calendar'></i> 16 Okt 2026, 14:21</div>
                                                    <p class="text-sm text-gray line-height-15">Lawyer telah melakukan verifikasi terhadap kelengkapan berkas perkara yang diberikan oleh klien.</p>
                                                </div>
                                                <button class="btn btn-outline-sm">Detail</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Timeline Item 3 -->
                                    <div class="timeline-item">
                                        <div class="timeline-marker bg-blue"></div>
                                        <div class="timeline-content border-none pb-0"> <!-- Item terakhir hapus border bottom -->
                                            <div class="d-flex justify-between align-start">
                                                <div>
                                                    <h6 class="text-md font-semibold mb-1">Koordinasi Penanganan Perkara</h6>
                                                    <div class="text-xs text-muted mb-2 d-flex align-center gap-1"><i class='bx bx-calendar'></i> 12 Okt 2026, 10:03</div>
                                                    <p class="text-sm text-gray line-height-15">Lawyer telah melakukan koordinasi internal untuk menentukan langkah penanganan perkara selanjutnya.</p>
                                                </div>
                                                <button class="btn btn-outline-sm">Detail</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Script JavaScript untuk Stepper Tab dan Toggle Mobile -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // 1. Mobile Sidebar Toggle
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

            // 2. Stepper & Tabs Logic (Bisa diklik maju-mundur bebas)
            const tabs = document.querySelectorAll('.tab-content');
            const wizardSteps = document.querySelectorAll('.wizard-step');
            const wizardLineActive = document.querySelector('.wizard-line-active');
            const wizardCounter = document.querySelector('.wizard-counter');
            const totalSteps = wizardSteps.length;

            function goToTab(targetIndex) { // targetIndex mulai dari 0 sampai 3
                const stepNumber = targetIndex + 1;

                // Tampilkan tab konten yang sesuai, sembunyikan yang lain
                tabs.forEach((tab, index) => {
                    tab.style.display = (index === targetIndex) ? 'block' : 'none';
                });

                // Update UI Bulatan Stepper
                wizardSteps.forEach((step, index) => {
                    const circle = step.querySelector('.wizard-circle');
                    const label = step.querySelector('.wizard-label');
                    const currentStepNum = index + 1;

                    // Reset styling
                    circle.classList.remove('active-completed', 'bg-blue');
                    circle.innerHTML = currentStepNum; // Kembalikan ke angka default
                    label.classList.remove('text-dark', 'font-medium');

                    if (currentStepNum < stepNumber) {
                        // Tahap yang sudah dilewati (Centang Hijau)
                        circle.classList.add('active-completed');
                        circle.innerHTML = "<i class='bx bx-check'></i>";
                        label.classList.add('text-dark', 'font-medium');
                    } else if (currentStepNum === stepNumber) {
                        // Tahap yang sedang AKTILF (Lingkaran Biru) sesuai gambar
                        circle.classList.add('bg-blue', 'text-white');
                        circle.style.border = 'none';
                        label.classList.add('text-dark', 'font-medium');
                    }
                });

                // Update Garis Progres Hijau Mentok Kanan-Kiri
                if (stepNumber === totalSteps) {
                    wizardLineActive.style.width = '100%';
                } else {
                    const activeStepElement = wizardSteps[targetIndex];
                    // Jarak dari kiri container + setengah lebar elemen
                    const targetWidth = activeStepElement.offsetLeft + (activeStepElement.offsetWidth / 2);
                    wizardLineActive.style.width = targetWidth + 'px';
                }

                // Update Text Counter
                wizardCounter.textContent = `Tahap ${stepNumber} dari ${totalSteps}`;
            }

            // Tambahkan event click pada setiap bulatan/teks stepper
            wizardSteps.forEach((step, index) => {
                step.addEventListener('click', function() {
                    goToTab(index);
                });
            });

            // Inisialisasi awal ke Tab 1 (seperti di gambar desain pertama)
            goToTab(0); 
        });
    </script>
</body>
</html>