<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil data customer dari session login atau fallback dummy sesuai tabel CUSTOMER
        $customer = session('customer_user', [
            'customer_id'    => 1,
            'full_name'      => 'Alfitok',
            'email'          => 'alfitok@email.com',
            'account_status' => 'active',
            'created_at'     => '2026-10-15 09:00:00',
        ]);

        // Simulasi join tabel BOOKING + LEGAL_FIELD + CASE_EXECUTION sesuai ERD
        // Ubah menjadi [] jika ingin mengetes tampilan empty state
        $bookings = [
            [
                'booking_id'         => 666,
                'case_number'        => 'CASEID-666',
                'customer_id'        => 1,
                'category_id'        => 2,
                'legal_field_id'     => 1,
                'legal_field_name'   => 'Sengketa Tanah',
                'lawyer_id'          => 3,
                'consultation_title' => 'Sengketa Batas Tanah Warisan Keluarga',
                'booking_status'     => 'verified',
                'execution_status'   => 'in_progress',
                'display_status'     => 'Dalam Proses',
                'created_at'         => '2022-09-28 10:15:00',
                'formatted_date'     => 'September 28, 2022',
            ],
            [
                'booking_id'         => 665,
                'case_number'        => 'CASEID-665',
                'customer_id'        => 1,
                'category_id'        => 1,
                'legal_field_id'     => 2,
                'legal_field_name'   => 'Perjanjian Kontrak',
                'lawyer_id'          => 2,
                'consultation_title' => 'Wanprestasi Kontrak Kerja Sama Proyek',
                'booking_status'     => 'verified',
                'execution_status'   => 'completed',
                'display_status'     => 'Selesai',
                'created_at'         => '2022-09-26 14:20:00',
                'formatted_date'     => 'September 26, 2022',
            ],
        ];

        return view('customer.index', compact('customer', 'bookings'));
    }
}