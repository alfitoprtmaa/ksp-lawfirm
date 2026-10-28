<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Your Case - Ketut Surya Putra & Partners</title>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Memuat file CSS eksternal -->
    <link rel="stylesheet" href="{{ asset('css/customer/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/tracking/tracking.css') }}">
    <!-- Memuat Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="app-container">
        
        <!-- SIDEBAR (Sticky) -->
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
                    <li><a href="{{ route('customer.buatkonsultasi.index') }}"><i class='bx bx-file-blank'></i> New Consultation</a></li>
                    <!-- Menu ini sekarang Active -->
                    <li class="active"><a href="#"><i class='bx bx-search-alt-2'></i> Track Your Case</a></li>
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
                        <h1>Track Your Case</h1>
                        <p>Pantau status dan timeline perkara Anda.</p>
                    </div>
                    <button class="btn btn-outline case-selector">
                        <i class='bx bx-folder'></i> KP-2026-001 <i class='bx bx-chevron-down'></i>
                    </button>
                </div>

                <!-- Case Overview Card -->
                <div class="card case-overview">
                    <div class="case-overview-left">
                        <div class="case-icon-box">
                            <i class='bx bx-scale'></i>
                        </div>
                        <div class="case-details">
                            <h3>Konsultasi Permasalahan Perdata</h3>
                            <div class="case-meta">
                                <span><i class='bx bx-file'></i> KP-2026-001</span>
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

                <div class="grid-layout tracking-grid">
                    <!-- LEFT COLUMN (Timeline) -->
                    <div class="left-col">
                        <div class="card">
                            <div class="card-header-between">
                                <h3>Tahapan Perkara</h3>
                                <span class="text-muted text-sm">Tahap 3 dari 6</span>
                            </div>

                            <!-- Horizontal Timeline -->
                            <div class="timeline-scroll-wrapper">
                                <div class="timeline-horizontal">
                                    <div class="timeline-line"></div>
                                    <div class="timeline-progress" style="width: 40%;"></div> <!-- Progress Line -->
                                    
                                    <div class="step">
                                        <div class="step-circle completed"><i class='bx bx-check'></i></div>
                                        <div class="step-text">Pengajuan<br>Permohonan</div>
                                        <div class="step-date">8 Okt 2026</div>
                                    </div>
                                    <div class="step">
                                        <div class="step-circle completed"><i class='bx bx-check'></i></div>
                                        <div class="step-text">Lawyer<br>Assignment</div>
                                        <div class="step-date">9 Okt 2026</div>
                                    </div>
                                    <div class="step">
                                        <div class="step-circle active"><i class='bx bx-search-alt-2'></i></div>
                                        <div class="step-text">Cek<br>Analisis</div>
                                        <div class="step-badge">Sedang berlangsung</div>
                                    </div>
                                    <div class="step">
                                        <div class="step-circle pending"></div>
                                        <div class="step-text">Tindakan<br>lanjutan</div>
                                    </div>
                                    <div class="step">
                                        <div class="step-circle pending"></div>
                                        <div class="step-text">Persidangan<br>mediasi</div>
                                    </div>
                                    <div class="step">
                                        <div class="step-circle pending"></div>
                                        <div class="step-text">Perkara<br>selesai</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Current Stage Box -->
                            <div class="current-stage-box">
                                <div class="stage-header">
                                    <div class="stage-icon"><i class='bx bx-search-alt-2'></i></div>
                                    <div>
                                        <h4>C. Analisis Perkara</h4>
                                        <span class="text-blue text-sm">Sedang berlangsung</span>
                                    </div>
                                </div>
                                <p class="stage-desc">Lawyer sedang meninjau informasi dan dokumen yang diberikan oleh Anda.<br>Tim kami akan menghubungi Anda jika diperlukan informasi tambahan.</p>
                                
                                <div class="divider"></div>

                                <h5>Perkembangan Dokumen</h5>
                                
                                <!-- Document List -->
                                <div class="doc-timeline">
                                    <!-- Item 1 -->
                                    <div class="doc-item">
                                        <div class="doc-icon-left"><i class='bx bx-file'></i></div>
                                        <div class="doc-content">
                                            <h6>SOMASI KEDUA</h6>
                                            <span class="doc-date"><i class='bx bx-calendar'></i> 11 Oktober 2026, 15:42</span>
                                            <p>Peringatan dan pemberitahuan kepada pihak terkait.</p>
                                            
                                            <div class="file-attachment">
                                                <div class="file-info">
                                                    <i class='bx bxs-file-pdf text-red'></i>
                                                    <div>
                                                        <span class="file-name">surat-somasi.pdf</span>
                                                        <span class="file-size">248.2 KB</span>
                                                    </div>
                                                </div>
                                                <button class="btn-download"><i class='bx bx-download'></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Item 2 -->
                                    <div class="doc-item">
                                        <div class="doc-icon-left"><i class='bx bx-file'></i></div>
                                        <div class="doc-content">
                                            <h6>MEDIASI</h6>
                                            <span class="doc-date"><i class='bx bx-calendar'></i> 13 Oktober 2026, 14:45</span>
                                            <p>Informasi terkait proses mediasi.</p>
                                            
                                            <div class="file-attachment">
                                                <div class="file-info">
                                                    <i class='bx bxs-file-pdf text-red'></i>
                                                    <div>
                                                        <span class="file-name">Ringkasan_Mediasi.pdf</span>
                                                        <span class="file-size">187.5 KB</span>
                                                    </div>
                                                </div>
                                                <button class="btn-download"><i class='bx bx-download'></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- RIGHT COLUMN -->
                    <div class="right-col">
                        <!-- Informasi Perkara Card -->
                        <div class="card">
                            <div class="card-header-inline mb-4">
                                <div class="icon-box-sm bg-light-green text-green"><i class='bx bx-grid-alt'></i></div>
                                <h4>Informasi Perkara</h4>
                            </div>
                            
                            <table class="info-table">
                                <tr>
                                    <td class="text-muted">Nomor Perkara</td>
                                    <td class="font-medium">KP-2026-001</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Status Saat Ini</td>
                                    <td><span class="status-badge badge-blue"><i class='bx bxs-circle'></i> Dalam Proses</span></td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Tanggal Dibuat</td>
                                    <td class="font-medium">8 Oktober 2026</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Bidang Hukum</td>
                                    <td class="font-medium">Perdata</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Lawyer</td>
                                    <td>
                                        <div class="lawyer-profile">
                                            <div class="avatar-sm"><i class='bx bx-user'></i></div>
                                            <div>
                                                <div class="font-medium text-sm">Dr. Alfito Pratama, S.H., M.H.</div>
                                                <div class="text-muted text-xs">Advokat / Pengacara</div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <!-- Langkah Berikutnya Card -->
                        <div class="card bg-white border-green">
                            <div class="card-header-inline mb-3">
                                <div class="icon-box-sm bg-light-green text-green"><i class='bx bx-time-five'></i></div>
                                <h4 class="text-green">Langkah Berikutnya</h4>
                            </div>
                            <h5 class="mb-2">Tindakan Lanjutan</h5>
                            <p class="text-muted text-sm line-height-15">Tahap ini mencakup konsultasi, strategi, dan tindakan penanganan yang sesuai kebutuhan perkara.</p>
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

            // Toggle Sidebar saat tombol hamburger diklik
            mobileMenuBtn.addEventListener('click', function(e) {
                e.stopPropagation(); // Mencegah event klik menjalar ke dokumen
                sidebar.classList.toggle('active');
            });

            // Otomatis menutup sidebar jika user mengklik area di luar sidebar
            document.addEventListener('click', function(e) {
                if (window.innerWidth <= 768) {
                    if (!sidebar.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                        sidebar.classList.remove('active');
                    }
                }
            });
        });
    </script>
</body>
</html>