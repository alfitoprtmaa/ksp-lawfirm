<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Klien - Ketut Surya Putra & Partners</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Memuat file CSS eksternal dari folder public/css -->
    <link rel="stylesheet" href="{{ asset('css/customer/index.css') }}">
    <!-- Memuat Boxicons untuk Ikon -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="app-container">
        
        <!-- SIDEBAR -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    {{-- Tempat asset logo milikmu --}}
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
                    <li class="active"><a href="#"><i class='bx bx-grid-alt'></i> Overview</a></li>
                    <li><a href="{{ route('customer.perkaralama.index') }}"><i class='bx bx-git-pull-request'></i> Perkara Saya</a></li>
                    <li><a href="{{ route('customer.buatkonsultasi.index') }}"><i class='bx bx-copy'></i> Perkara Baru</a></li>
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
                        <span>Portal Klien</span> / <span class="current">Overview</span>
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
                <div class="welcome-section">
                    <h1>Selamat datang {{ explode(' ', $customer['full_name'] ?? 'Alfitok')[0] }}!</h1>
                    <p>Sampaikan permasalahan hukum Anda agar kami dapat membantu menemukan layanan dan lawyer yang sesuai.</p>
                </div>

                <div class="grid-layout">
                    <!-- LEFT COLUMN -->
                    <div class="left-col">
                        <!-- Hero Card -->
                        <div class="card hero-card">
                            <div class="hero-content">
                                <h2>Mulai pengajuan konsultasi sekarang!</h2>
                                <p>Sampaikan permasalahan hukum anda, kami mencarikan Lawyer yang cocok dengan permasalahan hukum anda !</p>
                                <a href="{{ route('customer.buatkonsultasi.index') }}" class="btn btn-primary">
                                    Buat Konsultasi Baru <i class='bx bx-right-arrow-alt'></i>
                                </a>
                            </div>
                            <div class="hero-image">
                                <img src="{{ asset('images/svg/morning_news.svg') }}" alt="Ilustrasi Konsultasi">
                            </div>
                        </div>

                        <!-- Card Perkara Saya (Otomatis menyesuaikan kondisi kosong / berisi data) -->
                        <div class="card cases-card">
                            <div class="card-header-row">
                                <div class="card-header">
                                    <i class='bx bx-spreadsheet'></i>
                                    <h3>Perkara Saya</h3>
                                </div>
                                @if (count($bookings) > 0)
                                    <a href="{{ route('customer.perkaralama.index') }}" class="view-all-link">
                                        Lihat Semua <i class='bx bx-right-arrow-alt'></i>
                                    </a>
                                @endif
                            </div>

                            @if (count($bookings) > 0)
                                <div class="table-responsive">
                                    <table class="cases-table">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nomor Perkara</th>
                                                <th>Jenis Perkara</th>
                                                <th>Status</th>
                                                <th>Tanggal Masuk</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($bookings as $index => $item)
                                                <tr>
                                                    <td class="col-no">{{ $index + 1 }}.</td>
                                                    <td class="col-case-id">{{ $item['case_number'] }}</td>
                                                    <td class="col-case-type">{{ $item['legal_field_name'] }}</td>
                                                    <td>
                                                        @if ($item['display_status'] === 'Dalam Proses')
                                                            <span class="status-badge status-process">
                                                                <span class="status-dot"></span> Dalam Proses
                                                            </span>
                                                        @elseif ($item['display_status'] === 'Selesai')
                                                            <span class="status-badge status-done">
                                                                <span class="status-dot"></span> Selesai
                                                            </span>
                                                        @else
                                                            <span class="status-badge status-pending">
                                                                <span class="status-dot"></span> {{ $item['display_status'] }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td class="col-date">{{ $item['formatted_date'] }}</td>
                                                    <td class="col-action">
                                                        <a href="{{ route('customer.tracking.index', ['booking_id' => $item['booking_id']]) }}" class="action-dots-btn" title="Detail Perkara">
                                                            <i class='bx bx-dots-horizontal-rounded'></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p class="subtitle">Daftar pengajuan konsultasi anda yang terbaru</p>
                                <div class="empty-state-content">
                                    <img src="{{ asset('images/svg/file_search.svg') }}" alt="Dokumen Kosong" class="empty-img">
                                    <p>Mulai pengajuan pertama anda untuk mendapatkan pendampingan hukum dari kami !</p>
                                    <a href="{{ route('customer.buatkonsultasi.index') }}" class="btn btn-primary">
                                        Buat Konsultasi Baru <i class='bx bx-right-arrow-alt'></i>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- RIGHT COLUMN -->
                    <div class="right-col">
                        <div class="card right-info-wrapper">
                            <!-- Info Card -->
                            <div class="card info-card bg-light-blue">
                                <div class="card-icon"><i class='bx bx-info-circle'></i></div>
                                <div class="card-text">
                                    <h4>Informasi Penting</h4>
                                    <p>Semakin lengkap informasi yang Anda berikan, semakin tepat kami mencarikan lawyer yang sesuai dengan kebutuhan Anda.</p>
                                </div>
                            </div>

                            <!-- Steps Card -->
                            <div class="card steps-card bg-light-green">
                                <div class="card-header-inline">
                                    <i class='bx bx-diamond'></i>
                                    <h4>Alur Pengajuan Konsultasi</h4>
                                </div>
                                <div class="step-item">
                                    <h5>1. Kami meninjau informasi Anda</h5>
                                    <p>Tim kami akan mempelajari permasalahan hukum Anda.</p>
                                </div>
                                <div class="step-item">
                                    <h5>2. Sistem mencarikan lawyer yang sesuai</h5>
                                    <p>Berdasarkan keahlian, bidang hukum, dan ketersediaan.</p>
                                </div>
                                <div class="step-item">
                                    <h5>3. Anda akan mendapatkan konfirmasi</h5>
                                    <p>Melalui email atau notifikasi di portal.</p>
                                </div>
                                <div class="step-item">
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
        });
    </script>
</body>
</html>