<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusat Referensi - Lawyer Portal</title>
    <!-- Font Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/lawyer/pusatreferensi/pusatreferensi.css') }}">
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
                    <h2 class="brand-name">KETUT SURYA PUTRA<br>& PARTNERS</h2>
                    <p class="brand-sub">Legal Client Portal</p>
                </div>
            </div>

            <div class="sidebar-menu">
                <p class="menu-label">RUANG Lawyer</p>
                <nav class="nav-links">
                    <a href="{{ route('lawyer.index') }}" class="nav-item">
                        <i class='bx bx-grid-alt'></i>
                        <span>Overview</span>
                    </a>
                    <a href="#" class="nav-item">
                        <i class='bx bx-briefcase'></i>
                        <span>Kelola Perkara</span>
                    </a>
                    <a href="#" class="nav-item">
                        <i class='bx bx-calendar-event'></i>
                        <span>Jadwal</span>
                    </a>
                    <a href="#" class="nav-item active">
                        <i class='bx bx-folder-open'></i>
                        <span>Pusat Refrensi</span>
                    </a>
                </nav>
            </div>

            <div class="sidebar-footer">
                <a href="#" class="nav-item">
                    <i class='bx bx-cog'></i>
                    <span>Pengaturan akun</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <!-- Header -->
            <header class="top-header">
                <div class="header-actions">
                    <button class="btn-icon notif-btn">
                        <i class='bx bx-bell'></i>
                        <span class="notif-dot"></span>
                    </button>
                    <div class="user-profile">
                        <img src="{{ asset('images/avatar-lawyer.jpg') }}" alt="Adv. Adi Pratama" class="avatar">
                        <div class="user-info">
                            <span class="user-name">Adv. Adi Pratama</span>
                            <span class="user-role">Lawyer</span>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <div class="page-content">
                <div class="page-header-row">
                    <div class="page-title-group">
                        <h2>Pusat Referensi</h2>
                        <p>Arsip dan kumpulan dokumen yang diklasifikasikan berdasarkan perkara. Anda dapat mencari, memfilter, dan mengunggah dokumen baru.</p>
                    </div>
                    <button class="btn-primary">
                        <i class='bx bx-plus'></i> Upload Dokumen
                    </button>
                </div>

                <!-- Category Cards -->
                <div class="category-grid">
                    <div class="cat-card active">
                        <div class="cat-icon-wrapper">
                            <i class='bx bx-folder'></i>
                        </div>
                        <div class="cat-info">
                            <h3>Semua Perkara</h3>
                            <p>124 Dokumen</p>
                        </div>
                        <i class='bx bx-right-arrow-alt cat-arrow'></i>
                    </div>
                    
                    <div class="cat-card">
                        <div class="cat-icon-wrapper blue">
                            <i class='bx bx-home-alt'></i>
                        </div>
                        <div class="cat-info">
                            <h3>Sengketa Tanah</h3>
                            <p>28 Dokumen</p>
                        </div>
                        <i class='bx bx-right-arrow-alt cat-arrow'></i>
                    </div>

                    <div class="cat-card">
                        <div class="cat-icon-wrapper purple">
                            <i class='bx bx-file-blank'></i>
                        </div>
                        <div class="cat-info">
                            <h3>Perjanjian Kontrak</h3>
                            <p>18 Dokumen</p>
                        </div>
                        <i class='bx bx-right-arrow-alt cat-arrow'></i>
                    </div>

                    <div class="cat-card">
                        <div class="cat-icon-wrapper light-blue">
                            <i class='bx bx-gavel'></i>
                        </div>
                        <div class="cat-info">
                            <h3>Gugatan Perkara</h3>
                            <p>15 Dokumen</p>
                        </div>
                        <i class='bx bx-right-arrow-alt cat-arrow'></i>
                    </div>

                    <div class="cat-card">
                        <div class="cat-icon-wrapper green">
                            <i class='bx bx-group'></i>
                        </div>
                        <div class="cat-info">
                            <h3>Sengketa Waris</h3>
                            <p>12 Dokumen</p>
                        </div>
                        <i class='bx bx-right-arrow-alt cat-arrow'></i>
                    </div>

                    <div class="cat-card">
                        <div class="cat-icon-wrapper gray">
                            <i class='bx bx-dots-horizontal-rounded'></i>
                        </div>
                        <div class="cat-info">
                            <h3>Lainnya</h3>
                            <p>8 Dokumen</p>
                        </div>
                        <i class='bx bx-right-arrow-alt cat-arrow'></i>
                    </div>
                </div>

                <!-- Table Section -->
                <div class="table-container">
                    <div class="table-toolbar">
                        <div class="search-box">
                            <i class='bx bx-search'></i>
                            <input type="text" placeholder="Cari dokumen...">
                        </div>
                        <button class="btn-outline">
                            <i class='bx bx-filter'></i> Filter
                        </button>
                    </div>

                    <table class="data-table">
                        <thead>
                            <tr>
                                <th><input type="checkbox"></th>
                                <th>CASE ID</th>
                                <th>NAMA DOKUMEN</th>
                                <th>TANGGAL UPLOAD</th>
                                <th>DIUNGGAH OLEH</th>
                                <th>STATUS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Row 1 -->
                            <tr>
                                <td><input type="checkbox"></td>
                                <td class="text-gray">CASE-001</td>
                                <td>
                                    <div class="doc-name">
                                        <span class="file-icon pdf">PDF</span>
                                        <div>
                                            <p class="title">Surat-gugatan.pdf</p>
                                            <p class="size">532 KB</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="date">16 Oktober 2026</p>
                                    <p class="time">15:55</p>
                                </td>
                                <td>Andi Pratama</td>
                                <td><span class="badge badge-proses">Dalam Proses</span></td>
                                <td><button class="btn-icon"><i class='bx bx-dots-vertical-rounded'></i></button></td>
                            </tr>
                            
                            <!-- Row 2 -->
                            <tr>
                                <td><input type="checkbox"></td>
                                <td class="text-gray">CASE-001</td>
                                <td>
                                    <div class="doc-name">
                                        <span class="file-icon doc">DOC</span>
                                        <div>
                                            <p class="title">Jawaban-tergugat.docx</p>
                                            <p class="size">245 KB</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="date">12 Oktober 2026</p>
                                    <p class="time">10:20</p>
                                </td>
                                <td>Andi Pratama</td>
                                <td><span class="badge badge-proses">Dalam Proses</span></td>
                                <td><button class="btn-icon"><i class='bx bx-dots-vertical-rounded'></i></button></td>
                            </tr>

                            <!-- Row 3 -->
                            <tr>
                                <td><input type="checkbox"></td>
                                <td class="text-gray">CASE-001</td>
                                <td>
                                    <div class="doc-name">
                                        <span class="file-icon xls">XLS</span>
                                        <div>
                                            <p class="title">Bukti-transaksi.xlsx</p>
                                            <p class="size">120 KB</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="date">8 Oktober 2026</p>
                                    <p class="time">14:30</p>
                                </td>
                                <td>Andi Pratama</td>
                                <td><span class="badge badge-selesai">Selesai</span></td>
                                <td><button class="btn-icon"><i class='bx bx-dots-vertical-rounded'></i></button></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="table-pagination">
                        <p>Menampilkan <strong>1-5</strong> dari <strong>28</strong> dokumen</p>
                        <div class="pagination-controls">
                            <button class="page-btn"><i class='bx bx-chevron-left'></i></button>
                            <button class="page-btn active">1</button>
                            <button class="page-btn">2</button>
                            <button class="page-btn">3</button>
                            <button class="page-btn"><i class='bx bx-chevron-right'></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>