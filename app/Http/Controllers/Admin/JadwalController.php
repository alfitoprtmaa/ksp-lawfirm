<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    private function getLawyers(): array
    {
        return [
            [
                'lawyer_id'      => 1,
                'full_name'      => 'Andi Pratama, S.H., M.H.',
                'short_name'     => 'Andi Pratama',
                'specialization' => 'Hukum Perdata',
                'photo_path'     => 'images/lawyer-andi.png',
                'is_conflict'    => false,
            ],
            [
                'lawyer_id'      => 2,
                'full_name'      => 'Siti Rahma, S.H.',
                'short_name'     => 'Siti Rahma',
                'specialization' => 'Hukum Pidana',
                'photo_path'     => 'images/lawyer-siti.png',
                'is_conflict'    => false,
            ],
            [
                'lawyer_id'      => 3,
                'full_name'      => 'Budi Santoso, S.H., M.Kn.',
                'short_name'     => 'Budi Santoso',
                'specialization' => 'Hukum Tata Usaha Negara',
                'photo_path'     => 'images/lawyer-budi.png',
                'is_conflict'    => true,
            ],
            [
                'lawyer_id'      => 4,
                'full_name'      => 'Rizky Maulana, S.H.',
                'short_name'     => 'Rizky Maulana',
                'specialization' => 'Hukum Bisnis',
                'photo_path'     => 'images/lawyer-rizky.png',
                'is_conflict'    => false,
            ],
        ];
    }

    private function getBookings(): array
    {
        return [
            ['booking_id' => 1, 'case_code' => 'CASE-001', 'consultation_title' => 'Sengketa Tanah'],
            ['booking_id' => 2, 'case_code' => 'CASE-002', 'consultation_title' => 'Perselisihan Kontrak'],
            ['booking_id' => 3, 'case_code' => 'CASE-004', 'consultation_title' => 'Sengketa Waris'],
            ['booking_id' => 4, 'case_code' => 'CASE-008', 'consultation_title' => 'Kasus KDRT'],
            ['booking_id' => 5, 'case_code' => 'CASE-009', 'consultation_title' => 'Pelanggaran Hak Cipta'],
        ];
    }

    private function getDefaultSchedules(): array
    {
        return [
            [
                'calendar_id'      => 1,
                'admin_id'         => 1,
                'lawyer_id'        => 1,
                'lawyer_name'      => 'Andi Pratama, S.H., M.H.',
                'lawyer_short'     => 'Andi Pratama',
                'date'             => '2026-10-01',
                'event_title'      => 'Sidang gugatan perdata',
                'event_type'       => 'Sidang',
                'case_code'        => 'CASE-001',
                'sub_info'         => 'CASE-001 · PN Denpasar',
                'start_time_label' => '09:00',
                'end_time_label'   => '11:00',
                'location'         => 'PN Denpasar',
                'description'      => 'Pembacaan gugatan dan verifikasi berkas perkara.',
                'calendar_status'  => 'scheduled',
            ],
            [
                'calendar_id'      => 2,
                'admin_id'         => 1,
                'lawyer_id'        => null,
                'lawyer_name'      => 'Seluruh tim',
                'lawyer_short'     => 'Seluruh tim',
                'date'             => '2026-10-05',
                'event_title'      => 'Rapat koordinasi mingguan',
                'event_type'       => 'Internal',
                'case_code'        => '-',
                'sub_info'         => 'Ruang Rapat Utama',
                'start_time_label' => '10:00',
                'end_time_label'   => '11:30',
                'location'         => 'Ruang Rapat Utama',
                'description'      => 'Evaluasi progres penanganan perkara bulan berjalan.',
                'calendar_status'  => 'scheduled',
            ],
            [
                'calendar_id'      => 3,
                'admin_id'         => 1,
                'lawyer_id'        => 2,
                'lawyer_name'      => 'Siti Rahma, S.H.',
                'lawyer_short'     => 'Siti Rahma',
                'date'             => '2026-10-07',
                'event_title'      => 'Sidang lanjutan pidana',
                'event_type'       => 'Sidang',
                'case_code'        => 'CASE-008',
                'sub_info'         => 'CASE-008 · PN Denpasar',
                'start_time_label' => '13:00',
                'end_time_label'   => '15:00',
                'location'         => 'PN Denpasar',
                'description'      => 'Agenda pembacaan eksepsi penasihat hukum.',
                'calendar_status'  => 'scheduled',
            ],
            [
                'calendar_id'      => 4,
                'admin_id'         => 1,
                'lawyer_id'        => 3,
                'lawyer_name'      => 'Budi Santoso, S.H., M.Kn.',
                'lawyer_short'     => 'Budi Santoso',
                'date'             => '2026-10-10',
                'event_title'      => 'Konsultasi sengketa waris',
                'event_type'       => 'Konsultasi',
                'case_code'        => 'CASE-004',
                'sub_info'         => 'CASE-004 · Kantor',
                'start_time_label' => '11:00',
                'end_time_label'   => '12:00',
                'location'         => 'Kantor',
                'description'      => 'Pemeriksaan akta hibah dan silsilah ahli waris.',
                'calendar_status'  => 'scheduled',
            ],
            [
                'calendar_id'      => 5,
                'admin_id'         => 1,
                'lawyer_id'        => 1,
                'lawyer_name'      => 'Andi Pratama, S.H., M.H.',
                'lawyer_short'     => 'Andi Pratama',
                'date'             => '2026-10-12',
                'event_title'      => 'Sidang pembuktian surat',
                'event_type'       => 'Sidang',
                'case_code'        => 'CASE-001',
                'sub_info'         => 'CASE-001 · PN Denpasar',
                'start_time_label' => '09:00',
                'end_time_label'   => '11:00',
                'location'         => 'PN Denpasar',
                'description'      => 'Penyerahan bukti tertulis P-1 sampai P-12.',
                'calendar_status'  => 'scheduled',
            ],
            [
                'calendar_id'      => 6,
                'admin_id'         => 1,
                'lawyer_id'        => 4,
                'lawyer_name'      => 'Rizky Maulana, S.H.',
                'lawyer_short'     => 'Rizky Maulana',
                'date'             => '2026-10-14',
                'event_title'      => 'Konsultasi kontrak bisnis',
                'event_type'       => 'Konsultasi',
                'case_code'        => 'CASE-002',
                'sub_info'         => 'CASE-002 · Online',
                'start_time_label' => '15:00',
                'end_time_label'   => '16:00',
                'location'         => 'Online (Zoom)',
                'description'      => 'Review klausul wanprestasi perjanjian vendor.',
                'calendar_status'  => 'scheduled',
            ],
            [
                'calendar_id'      => 7,
                'admin_id'         => 1,
                'lawyer_id'        => 2,
                'lawyer_name'      => 'Siti Rahma, S.H.',
                'lawyer_short'     => 'Siti Rahma',
                'date'             => '2026-10-17',
                'event_title'      => 'Mediasi sengketa konsumen',
                'event_type'       => 'Mediasi',
                'case_code'        => 'CASE-009',
                'sub_info'         => 'CASE-009 · Kantor',
                'start_time_label' => '10:00',
                'end_time_label'   => '12:00',
                'location'         => 'Kantor',
                'description'      => 'Pertemuan mediasi tahap kedua antara para pihak.',
                'calendar_status'  => 'scheduled',
            ],
            // 3 Agenda pada Selasa, 20 Oktober 2026 sesuai tampilan mockup
            [
                'calendar_id'      => 8,
                'admin_id'         => 1,
                'lawyer_id'        => 1,
                'lawyer_name'      => 'Andi Pratama, S.H., M.H.',
                'lawyer_short'     => 'Andi Pratama',
                'date'             => '2026-10-20',
                'event_title'      => 'Sidang pemeriksaan saksi',
                'event_type'       => 'Sidang',
                'case_code'        => 'CASE-001',
                'sub_info'         => 'CASE-001 · PN Denpasar',
                'start_time_label' => '09:00',
                'end_time_label'   => '11:00',
                'location'         => 'PN Denpasar',
                'description'      => 'Pemeriksaan 2 saksi fakta dari pihak penggugat.',
                'calendar_status'  => 'scheduled',
            ],
            [
                'calendar_id'      => 9,
                'admin_id'         => 1,
                'lawyer_id'        => 2,
                'lawyer_name'      => 'Siti Rahma, S.H.',
                'lawyer_short'     => 'Siti Rahma',
                'date'             => '2026-10-20',
                'event_title'      => 'Konsultasi dengan klien',
                'event_type'       => 'Konsultasi',
                'case_code'        => 'CASE-008',
                'sub_info'         => 'CV Maju Mandiri · Kantor',
                'start_time_label' => '13:00',
                'end_time_label'   => '14:00',
                'location'         => 'Kantor',
                'description'      => 'Pembahasan draf kesepakatan damai dengan perwakilan CV Maju Mandiri.',
                'calendar_status'  => 'scheduled',
            ],
            [
                'calendar_id'      => 10,
                'admin_id'         => 1,
                'lawyer_id'        => 3,
                'lawyer_name'      => 'Budi Santoso, S.H., M.Kn.',
                'lawyer_short'     => 'Budi Santoso',
                'date'             => '2026-10-20',
                'event_title'      => 'Pembahasan berkas perkara',
                'event_type'       => 'Internal',
                'case_code'        => 'CASE-009',
                'sub_info'         => 'CASE-009 · Ruang rapat',
                'start_time_label' => '15:00',
                'end_time_label'   => '16:00',
                'location'         => 'Ruang rapat',
                'description'      => 'Finalisasi bundel berkas perkara hak cipta sebelum pendaftaran.',
                'calendar_status'  => 'scheduled',
            ],
            [
                'calendar_id'      => 11,
                'admin_id'         => 1,
                'lawyer_id'        => null,
                'lawyer_name'      => 'Seluruh tim',
                'lawyer_short'     => 'Seluruh tim',
                'date'             => '2026-10-22',
                'event_title'      => 'Rapat tim advokat',
                'event_type'       => 'Internal',
                'case_code'        => '-',
                'sub_info'         => 'Ruang Rapat',
                'start_time_label' => '10:00',
                'end_time_label'   => '11:30',
                'location'         => 'Ruang Rapat',
                'description'      => 'Pembagian jadwal piket konsultasi hukum bulan November.',
                'calendar_status'  => 'scheduled',
            ],
            [
                'calendar_id'      => 12,
                'admin_id'         => 1,
                'lawyer_id'        => 3,
                'lawyer_name'      => 'Budi Santoso, S.H., M.Kn.',
                'lawyer_short'     => 'Budi Santoso',
                'date'             => '2026-10-24',
                'event_title'      => 'Sidang putusan sela',
                'event_type'       => 'Sidang',
                'case_code'        => 'CASE-004',
                'sub_info'         => 'CASE-004 · PTUN',
                'start_time_label' => '14:00',
                'end_time_label'   => '15:30',
                'location'         => 'PTUN Denpasar',
                'description'      => 'Sidang pembacaan putusan sela sengketa tata usaha negara.',
                'calendar_status'  => 'scheduled',
            ],
            [
                'calendar_id'      => 13,
                'admin_id'         => 1,
                'lawyer_id'        => 2,
                'lawyer_name'      => 'Siti Rahma, S.H.',
                'lawyer_short'     => 'Siti Rahma',
                'date'             => '2026-10-28',
                'event_title'      => 'Konsultasi hukum keluarga',
                'event_type'       => 'Konsultasi',
                'case_code'        => 'CASE-008',
                'sub_info'         => 'CASE-008 · Kantor',
                'start_time_label' => '09:00',
                'end_time_label'   => '10:30',
                'location'         => 'Kantor',
                'description'      => 'Pendampingan psikologis dan hukum klien.',
                'calendar_status'  => 'scheduled',
            ],
            [
                'calendar_id'      => 14,
                'admin_id'         => 1,
                'lawyer_id'        => 4,
                'lawyer_name'      => 'Rizky Maulana, S.H.',
                'lawyer_short'     => 'Rizky Maulana',
                'date'             => '2026-10-30',
                'event_title'      => 'Sidang mediasi pengadilan',
                'event_type'       => 'Sidang',
                'case_code'        => 'CASE-002',
                'sub_info'         => 'CASE-002 · PN Denpasar',
                'start_time_label' => '11:00',
                'end_time_label'   => '12:30',
                'location'         => 'PN Denpasar',
                'description'      => 'Penandatanganan akta perdamaian di hadapan hakim mediator.',
                'calendar_status'  => 'scheduled',
            ],
        ];
    }

    public function index()
    {
        $admin = [
            'admin_id'  => 1,
            'full_name' => 'Admin',
            'initial'   => 'A',
        ];

        $lawyers  = $this->getLawyers();
        $sessionSchedules = session('admin_custom_schedules', []);
        $schedules = array_merge($this->getDefaultSchedules(), $sessionSchedules);

        // Default tanggal terpilih = 2026-10-20 agar sesuai tampilan mockup,
        // atau gunakan Carbon::now('Asia/Jakarta')->format('Y-m-d') untuk realtime
        $todayDate = '2026-10-20';

        $stats = [
            'monthly_count'   => 18,
            'today_count'     => count(array_filter($schedules, fn($s) => $s['date'] === $todayDate)),
            'today_label'     => 'Selasa, 20 Oktober 2026',
            'scheduled_lawyers' => 8,
        ];

        return view('admin.jadwal.index', compact(
            'admin',
            'lawyers',
            'schedules',
            'todayDate',
            'stats'
        ));
    }

    public function create()
    {
        $admin = [
            'admin_id'  => 1,
            'full_name' => 'Admin',
            'initial'   => 'A',
        ];

        $lawyers  = $this->getLawyers();
        $bookings = $this->getBookings();

        return view('admin.jadwal.create', compact('admin', 'lawyers', 'bookings'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_title'   => ['required', 'string', 'max:255'],
            'event_type'    => ['required', 'string', 'max:100'],
            'case_code'     => ['nullable', 'string', 'max:50'],
            'schedule_date' => ['required', 'date'],
            'start_time'    => ['required', 'string'],
            'end_time'      => ['required', 'string'],
            'location'      => ['required', 'string', 'max:255'],
            'description'   => ['nullable', 'string'],
            'lawyer_ids'    => ['required', 'array', 'min:1'],
            'lawyer_ids.*'  => ['integer'],
        ], [
            'lawyer_ids.required' => 'Pilih minimal satu lawyer yang bertugas.',
        ]);

        $lawyersMap = collect($this->getLawyers())->keyBy('lawyer_id');
        $existing   = session('admin_custom_schedules', []);
        $caseCode   = $validated['case_code'] ?: '-';

        foreach ($validated['lawyer_ids'] as $lawyerId) {
            $lawyerInfo = $lawyersMap->get((int) $lawyerId);
            $fullName   = $lawyerInfo['full_name'] ?? 'Advokat';
            $shortName  = $lawyerInfo['short_name'] ?? 'Advokat';

            $existing[] = [
                'calendar_id'      => rand(100, 999),
                'admin_id'         => 1,
                'lawyer_id'        => (int) $lawyerId,
                'lawyer_name'      => $fullName,
                'lawyer_short'     => $shortName,
                'date'             => $validated['schedule_date'],
                'event_title'      => $validated['event_title'],
                'event_type'       => $validated['event_type'],
                'case_code'        => $caseCode,
                'sub_info'         => ($caseCode !== '-' ? "{$caseCode} · " : '') . $validated['location'],
                'start_time_label' => $validated['start_time'],
                'end_time_label'   => $validated['end_time'],
                'location'         => $validated['location'],
                'description'      => $validated['description'] ?: 'Tidak ada catatan tambahan.',
                'calendar_status'  => 'scheduled',
            ];
        }

        session(['admin_custom_schedules' => $existing]);

        $totalSelected = count($validated['lawyer_ids']);
        return redirect()
            ->route('admin.jadwal.index')
            ->with('success', "Jadwal \"{$validated['event_title']}\" berhasil ditambahkan untuk {$totalSelected} lawyer.");
    }
}