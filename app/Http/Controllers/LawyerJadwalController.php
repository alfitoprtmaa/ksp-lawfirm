<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class LawyerJadwalController extends Controller
{
    public function index()
    {
        $lawyer = session('lawyer_user', [
            'lawyer_id'  => 3,
            'role_name'  => 'Lawyer',
            'full_name'  => 'Adv. Adi Pratama',
            'photo_path' => 'images/lawyer-adi.png',
        ]);

        // Tanggal hari ini (default aktif di panel detail kanan)
        $todayDate = Carbon::now('Asia/Jakarta')->format('Y-m-d');

        // Simulasi data tabel SCHEDULE_CALENDAR sesuai ERD
        $schedules = [
            [
                'calendar_id'      => 1,
                'admin_id'         => 1,
                'lawyer_id'        => 3,
                'date'             => '2026-10-01',
                'event_title'      => 'Sidang Perdana Pemeriksaan Berkas',
                'event_type'       => 'Sidang',
                'agenda_label'     => 'Sidang Perdana',
                'short_sub'        => 'CASE-001',
                'case_code'        => 'CASE-001',
                'start_time'       => '2026-10-01 09:00:00',
                'end_time'         => '2026-10-01 11:00:00',
                'start_time_label' => '09:00',
                'end_time_label'   => '11:00',
                'location'         => 'Pengadilan Negeri Surabaya',
                'description'      => 'Pembacaan surat gugatan dan pemeriksaan legal standing para pihak.',
                'calendar_status'  => 'scheduled',
            ],
            [
                'calendar_id'      => 2,
                'admin_id'         => 1,
                'lawyer_id'        => 3,
                'date'             => '2026-10-03',
                'event_title'      => 'Konsultasi Awal Klien Budi Santoso',
                'event_type'       => 'Konsultasi',
                'agenda_label'     => 'Konsultasi Klien',
                'short_sub'        => 'Budi Santoso',
                'case_code'        => 'CASE-004',
                'start_time'       => '2026-10-03 14:00:00',
                'end_time'         => '2026-10-03 15:30:00',
                'start_time_label' => '14:00',
                'end_time_label'   => '15:30',
                'location'         => 'Kantor KSP & Partners',
                'description'      => 'Peninjauan kronologi sengketa dan kelengkapan sertifikat tanah.',
                'calendar_status'  => 'scheduled',
            ],
            [
                'calendar_id'      => 3,
                'admin_id'         => 1,
                'lawyer_id'        => 3,
                'date'             => '2026-10-20',
                'event_title'      => 'Sidang Pemeriksaan Saksi',
                'event_type'       => 'Sidang',
                'agenda_label'     => 'Sidang Pemeriksaan',
                'short_sub'        => 'CASE-001',
                'case_code'        => 'CASE-001',
                'start_time'       => '2026-10-20 09:00:00',
                'end_time'         => '2026-10-20 11:00:00',
                'start_time_label' => '09:00',
                'end_time_label'   => '11:00',
                'location'         => 'Pengadilan Negeri',
                'description'      => 'Harap membawa seluruh dokumen pendukung dan salinan bukti yang diperlukan.',
                'calendar_status'  => 'scheduled',
            ],
            [
                'calendar_id'      => 4,
                'admin_id'         => 1,
                'lawyer_id'        => 3,
                'date'             => '2026-10-20',
                'event_title'      => 'Konsultasi dengan Klien',
                'event_type'       => 'Konsultasi',
                'agenda_label'     => 'Konsultasi Lanjutan',
                'short_sub'        => 'CV Maju Mandiri',
                'case_code'        => 'CASE-008',
                'start_time'       => '2026-10-20 13:00:00',
                'end_time'         => '2026-10-20 14:00:00',
                'start_time_label' => '13:00',
                'end_time_label'   => '14:00',
                'location'         => 'Kantor',
                'description'      => 'Evaluasi draf perjanjian perdamaian bersama perwakilan CV Maju Mandiri.',
                'calendar_status'  => 'scheduled',
            ],
            [
                'calendar_id'      => 5,
                'admin_id'         => 1,
                'lawyer_id'        => 3,
                'date'             => '2026-11-24',
                'event_title'      => 'Koordinasi Persiapan Sidang',
                'event_type'       => 'Internal',
                'agenda_label'     => 'Rapat Internal Tim',
                'short_sub'        => 'CASE-001',
                'case_code'        => 'CASE-001',
                'start_time'       => '2026-11-24 10:00:00',
                'end_time'         => '2026-11-24 12:00:00',
                'start_time_label' => '10:00',
                'end_time_label'   => '12:00',
                'location'         => 'Ruang Rapat Utama KSP',
                'description'      => 'Koordinasi internal tim untuk menyusun strategi dan kelengkapan berkas sidang.',
                'calendar_status'  => 'scheduled',
            ],
        ];

        // Gabungkan jadwal baru yang disimpan sementara di session saat testing tanpa DB
        $sessionSchedules = session('lawyer_custom_schedules', []);
        $schedules = array_merge($schedules, $sessionSchedules);

        return view('lawyer.jadwal.index', compact('lawyer', 'schedules', 'todayDate'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_title'       => ['required', 'string', 'max:255'],
            'event_type'        => ['required', 'string', 'max:100'],
            'custom_event_type' => ['nullable', 'string', 'max:100'],
            'schedule_date'     => ['required', 'date'],
            'start_time'        => ['required', 'string'],
            'end_time'          => ['required', 'string'],
            'location'          => ['nullable', 'string', 'max:255'],
            'description'       => ['nullable', 'string'],
        ]);

        $finalEventType = $validated['event_type'] === 'Lainnya' && !empty($validated['custom_event_type'])
            ? $validated['custom_event_type']
            : $validated['event_type'];

        // Simulasi penyimpanan ke tabel SCHEDULE_CALENDAR sesuai ERD
        $newSchedule = [
            'calendar_id'      => rand(100, 999),
            'admin_id'         => 1,
            'lawyer_id'        => session('lawyer_user.lawyer_id', 3),
            'date'             => $validated['schedule_date'],
            'event_title'      => $validated['event_title'],
            'event_type'       => in_array($finalEventType, ['Sidang', 'Mediasi', 'Konsultasi', 'Internal']) ? $finalEventType : 'Lainnya',
            'agenda_label'     => $finalEventType,
            'short_sub'        => $validated['location'] ?: $finalEventType,
            'case_code'        => '-',
            'start_time'       => "{$validated['schedule_date']} {$validated['start_time']}:00",
            'end_time'         => "{$validated['schedule_date']} {$validated['end_time']}:00",
            'start_time_label' => $validated['start_time'],
            'end_time_label'   => $validated['end_time'],
            'location'         => $validated['location'] ?: 'Kantor KSP & Partners',
            'description'      => $validated['description'] ?: 'Tidak ada catatan tambahan.',
            'calendar_status'  => 'scheduled',
        ];

        $existing = session('lawyer_custom_schedules', []);
        $existing[] = $newSchedule;
        session(['lawyer_custom_schedules' => $existing]);

        return back()->with('success', "Jadwal \"{$validated['event_title']}\" berhasil ditambahkan.");
    }
}