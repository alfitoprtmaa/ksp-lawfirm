<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perkara Lama - Ketut Surya Putra & Partners</title>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- CSS Utama & CSS Tabel -->
    <link rel="stylesheet" href="{{ asset('css/customer/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer/perkaralama/perkaralama.css') }}">
    
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
                    <!-- Menu Active dengan style biru terang sesuai gambar -->
                    <li class="active-blue"><a href="#"><i class='bx bx-hive'></i> Perkara Lama</a></li>
                    <li><a href="{{ route('customer.buatkonsultasi.index') }}"><i class='bx bx-file-blank'></i> Perkara Baru</a></li>
                    <li><a href="{{ route('customer.tracking.index') }}"><i class='bx bx-message-square-detail'></i> Track Your Case</a></li>
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
                        <span>Portal Klien</span> / <span class="current">Perkara Lama</span>
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
                <div class="welcome-section mb-4">
                    <h1 class="page-title text-dark">Perkara Lama</h1>
                    <p class="page-subtitle">Pantau status dan timeline perkara Anda.</p>
                </div>

                <!-- Main Card untuk Tabel -->
                <div class="card p-0 bg-white border-none rounded-lg shadow-sm">
                    
                    <!-- Card Header -->
                    <div class="card-header-table d-flex justify-between align-center px-4 py-4 border-bottom">
                        <div class="d-flex align-center gap-2">
                            <div class="icon-box-sm bg-light-blue text-blue rounded-md"><i class='bx bx-file'></i></div>
                            <h3 class="text-lg font-bold text-dark m-0">Perkara Saya</h3>
                        </div>
                        <a href="#" class="text-blue font-medium text-sm text-decoration-none d-flex align-center gap-1 hover-underline">
                            Lihat Semua <i class='bx bx-right-arrow-alt text-lg'></i>
                        </a>
                    </div>

                    <!-- Table Container -->
                    <div class="table-responsive">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th width="5%">No.</th>
                                    <th width="20%">Nomor Perkara</th>
                                    <th width="30%">Jenis Perkara</th>
                                    <th width="20%">Status</th>
                                    <th width="25%">Tanggal Masuk</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td class="font-medium text-dark">CASEID-666</td>
                                    <td>Sengketa Tanah</td>
                                    <td><span class="status-badge badge-blue"><i class='bx bxs-circle'></i> Dalam Proses</span></td>
                                    <td>September 28, 2022</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td class="font-medium text-dark">CASEID-667</td>
                                    <td>Perjanjian Kontrak</td>
                                    <td><span class="status-badge badge-green"><i class='bx bxs-circle'></i> Selesai</span></td>
                                    <td>September 26, 2022</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td class="font-medium text-dark">CASEID-702</td>
                                    <td>Wanprestasi Bisnis</td>
                                    <td><span class="status-badge badge-blue"><i class='bx bxs-circle'></i> Dalam Proses</span></td>
                                    <td>Oktober 05, 2022</td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td class="font-medium text-dark">CASEID-715</td>
                                    <td>Hak Waris & Hibah</td>
                                    <td><span class="status-badge badge-green"><i class='bx bxs-circle'></i> Selesai</span></td>
                                    <td>Oktober 14, 2022</td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td class="font-medium text-dark">CASEID-730</td>
                                    <td>Sengketa Ketenagakerjaan</td>
                                    <td><span class="status-badge badge-blue"><i class='bx bxs-circle'></i> Dalam Proses</span></td>
                                    <td>November 02, 2022</td>
                                </tr>
                                <tr>
                                    <td>6.</td>
                                    <td class="font-medium text-dark">CASEID-744</td>
                                    <td>Kepailitan Usaha</td>
                                    <td><span class="status-badge badge-green"><i class='bx bxs-circle'></i> Selesai</span></td>
                                    <td>November 19, 2022</td>
                                </tr>
                                <tr>
                                    <td>7.</td>
                                    <td class="font-medium text-dark">CASEID-780</td>
                                    <td>Perlindungan Merek / HAKI</td>
                                    <td><span class="status-badge badge-blue"><i class='bx bxs-circle'></i> Dalam Proses</span></td>
                                    <td>Desember 03, 2022</td>
                                </tr>
                                <tr>
                                    <td>8.</td>
                                    <td class="font-medium text-dark">CASEID-812</td>
                                    <td>Perbuatan Melawan Hukum</td>
                                    <td><span class="status-badge badge-blue"><i class='bx bxs-circle'></i> Dalam Proses</span></td>
                                    <td>Desember 18, 2022</td>
                                </tr>
                                <tr>
                                    <td>9.</td>
                                    <td class="font-medium text-dark">CASEID-845</td>
                                    <td>Konsultasi Akuisisi</td>
                                    <td><span class="status-badge badge-green"><i class='bx bxs-circle'></i> Selesai</span></td>
                                    <td>Januari 08, 2023</td>
                                </tr>
                                <tr>
                                    <td>10.</td>
                                    <td class="font-medium text-dark">CASEID-890</td>
                                    <td>Sengketa Sewa Properti</td>
                                    <td><span class="status-badge badge-blue"><i class='bx bxs-circle'></i> Dalam Proses</span></td>
                                    <td>Januari 21, 2023</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination Footer -->
                    <div class="pagination-footer d-flex justify-between align-center px-4 py-3 border-top">
                        <div class="pagination-info text-sm text-muted">
                            Menampilkan <span class="font-semibold text-dark">1-10</span> dari <span class="font-semibold text-dark">42</span> perkara
                        </div>
                        <div class="pagination-controls d-flex align-center gap-1">
                            <button class="btn-page btn-page-nav text-muted" disabled><i class='bx bx-chevron-left'></i> Sebelumnya</button>
                            <button class="btn-page active">1</button>
                            <button class="btn-page">2</button>
                            <button class="btn-page">3</button>
                            <button class="btn-page">4</button>
                            <span class="page-dots text-muted">...</span>
                            <button class="btn-page">5</button>
                            <button class="btn-page btn-page-nav text-dark">Selanjutnya <i class='bx bx-chevron-right'></i></button>
                        </div>
                    </div>

                </div>
            </div>
        </main>
    </div>

    <!-- Script Sidebar Mobile -->
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
    </script>
</body>
</html>