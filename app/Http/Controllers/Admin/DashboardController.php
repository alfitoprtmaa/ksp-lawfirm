<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $admin = [
            'admin_id' => 1,
            'full_name' => 'Admin',
            'initial' => 'A',
        ];

        // Daftar pilihan bulan untuk filter tanggal
        $availableMonths = [
            '2026-11' => 'November 2026',
            '2026-10' => 'Oktober 2026',
            '2026-09' => 'September 2026',
            '2026-08' => 'Agustus 2026',
        ];

        $selectedMonth = $request->query('month', '2026-11');
        if (!array_key_exists($selectedMonth, $availableMonths)) {
            $selectedMonth = '2026-11';
        }
        $selectedMonthLabel = $availableMonths[$selectedMonth];

        // Simulasi perubahan data berdasarkan bulan yang dipilih
        $monthlyPresets = [
            '2026-11' => [
                'metrics' => [
                    'total_lawyers' => 42,
                    'active_lawyers' => 38,
                    'monthly_consultations' => 128,
                    'consultation_growth' => '↑ 11,3% dari Oktober',
                    'growth_positive' => true,
                    'pending_confirmations' => 8,
                    'completed_consultations' => 96,
                    'completion_rate' => '75% dari total konsultasi',
                ],
                'schedule_date' => 'Selasa, 10 November 2026',
                'schedules' => [
                    ['calendar_id' => 101, 'time' => '09.00', 'event_title' => 'Konsultasi Hukum Perdata', 'lawyer_name' => 'Andi Pratama', 'event_type' => 'Online'],
                    ['calendar_id' => 102, 'time' => '11.00', 'event_title' => 'Mediasi Sengketa Bisnis', 'lawyer_name' => 'Siti Rahma', 'event_type' => 'Tatap muka'],
                    ['calendar_id' => 103, 'time' => '14.00', 'event_title' => 'Konsultasi Ketenagakerjaan', 'lawyer_name' => 'Dewi Anggraini', 'event_type' => 'Online'],
                ],
            ],
            '2026-10' => [
                'metrics' => [
                    'total_lawyers' => 42,
                    'active_lawyers' => 37,
                    'monthly_consultations' => 115,
                    'consultation_growth' => '↑ 12,7% dari September',
                    'growth_positive' => true,
                    'pending_confirmations' => 4,
                    'completed_consultations' => 102,
                    'completion_rate' => '88,6% dari total konsultasi',
                ],
                'schedule_date' => 'Kamis, 22 Oktober 2026',
                'schedules' => [
                    ['calendar_id' => 91, 'time' => '10.00', 'event_title' => 'Konsultasi Hukum Waris', 'lawyer_name' => 'Budi Santoso', 'event_type' => 'Tatap muka'],
                    ['calendar_id' => 92, 'time' => '13.30', 'event_title' => 'Review Kontrak Kerjasama', 'lawyer_name' => 'Siti Rahma', 'event_type' => 'Online'],
                    ['calendar_id' => 93, 'time' => '15.30', 'event_title' => 'Pendampingan Perkara Pidana', 'lawyer_name' => 'Andi Pratama', 'event_type' => 'Tatap muka'],
                ],
            ],
            '2026-09' => [
                'metrics' => [
                    'total_lawyers' => 40,
                    'active_lawyers' => 35,
                    'monthly_consultations' => 102,
                    'consultation_growth' => '↑ 30,7% dari Agustus',
                    'growth_positive' => true,
                    'pending_confirmations' => 2,
                    'completed_consultations' => 95,
                    'completion_rate' => '93,1% dari total konsultasi',
                ],
                'schedule_date' => 'Senin, 14 September 2026',
                'schedules' => [
                    ['calendar_id' => 81, 'time' => '09.30', 'event_title' => 'Konsultasi Perceraian', 'lawyer_name' => 'Dewi Anggraini', 'event_type' => 'Online'],
                    ['calendar_id' => 82, 'time' => '13.00', 'event_title' => 'Sengketa Lahan Pertanian', 'lawyer_name' => 'Andi Pratama', 'event_type' => 'Tatap muka'],
                    ['calendar_id' => 83, 'time' => '16.00', 'event_title' => 'Konsultasi Hak Cipta', 'lawyer_name' => 'Siti Rahma', 'event_type' => 'Online'],
                ],
            ],
            '2026-08' => [
                'metrics' => [
                    'total_lawyers' => 40,
                    'active_lawyers' => 34,
                    'monthly_consultations' => 78,
                    'consultation_growth' => '↓ 7,1% dari Juli',
                    'growth_positive' => false,
                    'pending_confirmations' => 0,
                    'completed_consultations' => 78,
                    'completion_rate' => '100% dari total konsultasi',
                ],
                'schedule_date' => 'Rabu, 19 Agustus 2026',
                'schedules' => [
                    ['calendar_id' => 71, 'time' => '09.00', 'event_title' => 'Konsultasi Utang Piutang', 'lawyer_name' => 'Budi Santoso', 'event_type' => 'Online'],
                    ['calendar_id' => 72, 'time' => '11.30', 'event_title' => 'Mediasi Ketenagakerjaan', 'lawyer_name' => 'Dewi Anggraini', 'event_type' => 'Tatap muka'],
                    ['calendar_id' => 73, 'time' => '14.30', 'event_title' => 'Perizinan Badan Usaha', 'lawyer_name' => 'Siti Rahma', 'event_type' => 'Online'],
                ],
            ],
        ];

        $currentData = $monthlyPresets[$selectedMonth];
        $metrics = $currentData['metrics'];
        $scheduleDate = $currentData['schedule_date'];
        $upcomingSchedules = $currentData['schedules'];

        // Grafik Tren 6 Bulan (Batang yang aktif mengikuti bulan terpilih)
        $rawTrends = [
            ['key' => '2026-06', 'month' => 'Jun', 'full_month' => 'Juni', 'count' => 72],
            ['key' => '2026-07', 'month' => 'Jul', 'full_month' => 'Juli', 'count' => 84],
            ['key' => '2026-08', 'month' => 'Agu', 'full_month' => 'Agustus', 'count' => 78],
            ['key' => '2026-09', 'month' => 'Sep', 'full_month' => 'September', 'count' => 102],
            ['key' => '2026-10', 'month' => 'Okt', 'full_month' => 'Oktober', 'count' => 115],
            ['key' => '2026-11', 'month' => 'Nov', 'full_month' => 'November', 'count' => 128],
        ];

        $selectedTrendNote = '128 konsultasi pada November';
        $consultationTrends = array_map(function ($item) use ($selectedMonth, &$selectedTrendNote) {
            $isCurrent = $item['key'] === $selectedMonth;
            if ($isCurrent) {
                $selectedTrendNote = "{$item['count']} konsultasi pada {$item['full_month']}";
            }
            return [
                'month' => $item['month'],
                'count' => $item['count'],
                'percentage' => round(($item['count'] / 160) * 100, 2),
                'is_current' => $isCurrent,
            ];
        }, $rawTrends);

        // Perkara Terbaru (Relasi BOOKING & PROBLEM_CATEGORY)
        $recentCases = [
            ['case_code' => 'CASE-010', 'consultation_title' => 'Sengketa Lahan', 'applicant_name' => 'Agus Salim', 'category_name' => 'Perdata', 'booking_status' => 'Dalam Proses', 'created_at' => '12 Mei 2025'],
            ['case_code' => 'CASE-009', 'consultation_title' => 'Pelanggaran Hak Cipta', 'applicant_name' => 'CV Kreatif Indo', 'category_name' => 'Bisnis', 'booking_status' => 'Dalam Proses', 'created_at' => '2 Mei 2025'],
            ['case_code' => 'CASE-006', 'consultation_title' => 'Perizinan Usaha', 'applicant_name' => 'PT Maju Jaya', 'category_name' => 'Bisnis', 'booking_status' => 'Dalam Proses', 'created_at' => '22 Apr 2025'],
            ['case_code' => 'CASE-008', 'consultation_title' => 'Kasus KDRT', 'applicant_name' => 'Dewi Lestari', 'category_name' => 'Keluarga', 'booking_status' => 'Dalam Proses', 'created_at' => '18 Apr 2025'],
            ['case_code' => 'CASE-007', 'consultation_title' => 'Sengketa Utang', 'applicant_name' => 'Rina Wati', 'category_name' => 'Perdata', 'booking_status' => 'Dalam Proses', 'created_at' => '5 Apr 2025'],
            ['case_code' => 'CASE-005', 'consultation_title' => 'Tindak Pidana Ringan', 'applicant_name' => 'Dimas Adi', 'category_name' => 'Pidana', 'booking_status' => 'Dalam Proses', 'created_at' => '18 Mar 2025'],
            ['case_code' => 'CASE-003', 'consultation_title' => 'Perceraian', 'applicant_name' => 'Siti Rahayu', 'category_name' => 'Keluarga', 'booking_status' => 'Dalam Proses', 'created_at' => '10 Mar 2025'],
            ['case_code' => 'CASE-004', 'consultation_title' => 'Sengketa Waris', 'applicant_name' => 'Ahmad Fauzi', 'category_name' => 'Keluarga', 'booking_status' => 'Dalam Proses', 'created_at' => '2 Mar 2025'],
            ['case_code' => 'CASE-002', 'consultation_title' => 'Perselisihan Kontrak', 'applicant_name' => 'Budi Santoso', 'category_name' => 'Bisnis', 'booking_status' => 'Dalam Proses', 'created_at' => '5 Feb 2025'],
            ['case_code' => 'CASE-001', 'consultation_title' => 'Sengketa Tanah', 'applicant_name' => 'Andi Pratama', 'category_name' => 'Perdata', 'booking_status' => 'Dalam Proses', 'created_at' => '12 Jan 2025'],
        ];

        return view('admin.dashboard', compact(
            'admin',
            'availableMonths',
            'selectedMonth',
            'selectedMonthLabel',
            'metrics',
            'consultationTrends',
            'selectedTrendNote',
            'scheduleDate',
            'upcomingSchedules',
            'recentCases'
        ));
    }
}