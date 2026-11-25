<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KonsultasiOnlineController extends Controller
{
    public function index()
    {
        $admin = [
            'admin_id'  => 1,
            'full_name' => 'Admin',
            'initial'   => 'A',
        ];

        // Konfigurasi Ketersediaan Slot (Tersimpan di session sementara sebelum DB)
        $availability = session('admin_consultation_availability', [
            'start_date' => '2026-11-12',
            'end_date'   => '2026-11-30',
            'days'       => ['Sen', 'Sel', 'Rab', 'Kam', 'Jum'],
            'time_slots' => [
                ['start' => '09:00', 'end' => '11:00'],
                ['start' => '13:00', 'end' => '15:00'],
            ],
            'duration'   => 30, // menit
        ]);

        // Hitung total slot per hari dari rentang jam & durasi
        $dailySlots = 0;
        foreach ($availability['time_slots'] as $slot) {
            [$sh, $sm] = array_map('intval', explode(':', $slot['start']));
            [$eh, $em] = array_map('intval', explode(':', $slot['end']));
            $diffMinutes = (($eh * 60) + $em) - (($sh * 60) + $sm);
            if ($diffMinutes > 0 && $availability['duration'] > 0) {
                $dailySlots += intdiv($diffMinutes, $availability['duration']);
            }
        }

        // Ringkasan Statistik Atas
        $stats = [
            'scheduled_total' => 12,
            'today_sessions'  => 4,
            'available_slots' => $dailySlots > 0 ? $dailySlots : 8,
            'slot_duration'   => $availability['duration'],
            'completed_total' => 96,
            'period_label'    => 'Periode November 2026',
        ];

        // Data Dummy sesuai atribut tabel ONLINE_CONSULTATION pada ERD
        $consultations = [
            [
                'consultation_id'     => 101,
                'customer_id'         => 11,
                'calendar_id'         => 201,
                'title'               => 'Konsultasi hukum perdata',
                'client_name'         => 'Rina Wijaya',
                'email'               => 'rina.wijaya@email.com',
                'consultation_date'   => '12 Nov 2026',
                'consultation_time'   => '09.00–09.30 WIB',
                'duration'            => '30 menit',
                'email_status'        => 'Terkirim',
                'consultation_status' => 'scheduled',
                'meet_link'           => 'https://meet.google.com/ksp-law-0101',
                'description'         => 'Konsultasi awal terkait sengketa batas tanah warisan keluarga.',
            ],
            [
                'consultation_id'     => 102,
                'customer_id'         => 12,
                'calendar_id'         => 202,
                'title'               => 'Sengketa tanah keluarga',
                'client_name'         => 'Ahmad Fauzi',
                'email'               => 'ahmad.fauzi@email.com',
                'consultation_date'   => '12 Nov 2026',
                'consultation_time'   => '09.30–10.00 WIB',
                'duration'            => '30 menit',
                'email_status'        => 'Terkirim',
                'consultation_status' => 'scheduled',
                'meet_link'           => 'https://meet.google.com/ksp-law-0102',
                'description'         => 'Penjelasan prosedur balik nama sertifikat tanah dan pembagian hak ahli waris.',
            ],
            [
                'consultation_id'     => 103,
                'customer_id'         => 13,
                'calendar_id'         => 203,
                'title'               => 'Perjanjian kerja',
                'client_name'         => 'Dian Permata',
                'email'               => 'dian.permata@email.com',
                'consultation_date'   => '12 Nov 2026',
                'consultation_time'   => '10.00–10.30 WIB',
                'duration'            => '30 menit',
                'email_status'        => 'Terkirim',
                'consultation_status' => 'scheduled',
                'meet_link'           => 'https://meet.google.com/ksp-law-0103',
                'description'         => 'Review klausul pemutusan hubungan kerja sepihak pada kontrak PKWT.',
            ],
            [
                'consultation_id'     => 104,
                'customer_id'         => 14,
                'calendar_id'         => 204,
                'title'               => 'Pendirian badan usaha',
                'client_name'         => 'Bima Saputra',
                'email'               => 'bima.saputra@email.com',
                'consultation_date'   => '13 Nov 2026',
                'consultation_time'   => '13.00–13.30 WIB',
                'duration'            => '30 menit',
                'email_status'        => 'Terkirim',
                'consultation_status' => 'scheduled',
                'meet_link'           => 'https://meet.google.com/ksp-law-0104',
                'description'         => 'Konsultasi persyaratan pendirian PT persekutuan modal dan perizinan NIB.',
            ],
            [
                'consultation_id'     => 105,
                'customer_id'         => 15,
                'calendar_id'         => 205,
                'title'               => 'Wanprestasi kontrak vendor',
                'client_name'         => 'Surya Pratama',
                'email'               => 'surya.pratama@email.com',
                'consultation_date'   => '14 Nov 2026',
                'consultation_time'   => '13.30–14.00 WIB',
                'duration'            => '30 menit',
                'email_status'        => 'Terkirim',
                'consultation_status' => 'completed',
                'meet_link'           => 'https://meet.google.com/ksp-law-0105',
                'description'         => 'Langkah somasi pertama atas keterlambatan pengiriman barang proyek.',
            ],
            [
                'consultation_id'     => 106,
                'customer_id'         => 16,
                'calendar_id'         => 206,
                'title'               => 'Perlindungan hak cipta desain',
                'client_name'         => 'Nadia Putri',
                'email'               => 'nadia.putri@email.com',
                'consultation_date'   => '15 Nov 2026',
                'consultation_time'   => '14.00–14.30 WIB',
                'duration'            => '30 menit',
                'email_status'        => 'Menunggu',
                'consultation_status' => 'scheduled',
                'meet_link'           => 'https://meet.google.com/ksp-law-0106',
                'description'         => 'Pendaftaran HKI karya desain grafis komersial.',
            ],
        ];

        return view('admin.konsultasionline.index', compact(
            'admin',
            'stats',
            'availability',
            'consultations'
        ));
    }

    public function saveAvailability(Request $request)
    {
        $validated = $request->validate([
            'start_date'   => ['required', 'date'],
            'end_date'     => ['required', 'date', 'after_or_equal:start_date'],
            'days'         => ['required', 'array', 'min:1'],
            'days.*'       => ['string'],
            'start_times'  => ['required', 'array', 'min:1'],
            'end_times'    => ['required', 'array', 'min:1'],
            'duration'     => ['required', 'integer', 'in:15,30,45,60'],
        ], [
            'days.required' => 'Pilih minimal satu hari tersedia.',
        ]);

        $timeSlots = [];
        foreach ($validated['start_times'] as $idx => $start) {
            $end = $validated['end_times'][$idx] ?? null;
            if ($start && $end) {
                $timeSlots[] = [
                    'start' => $start,
                    'end'   => $end,
                ];
            }
        }

        session([
            'admin_consultation_availability' => [
                'start_date' => $validated['start_date'],
                'end_date'   => $validated['end_date'],
                'days'       => $validated['days'],
                'time_slots' => $timeSlots,
                'duration'   => (int) $validated['duration'],
            ],
        ]);

        return redirect()
            ->route('admin.konsultasionline.index')
            ->with('success', 'Pengaturan ketersediaan slot konsultasi online berhasil disimpan.');
    }
}