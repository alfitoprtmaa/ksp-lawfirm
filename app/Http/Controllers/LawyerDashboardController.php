<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LawyerDashboardController extends Controller
{
    public function index()
    {
        // Mengambil data advokat dari session login atau fallback dummy sesuai tabel LAWYER & ROLE
        $lawyer = session('lawyer_user', [
            'lawyer_id'        => 3,
            'role_id'          => 2,
            'role_name'        => 'Lawyer',
            'full_name'        => 'Adv. Adi Pratama',
            'email'            => 'adi.pratama@ksp-law.id',
            'specialization'   => 'Hukum Perdata & Sengketa Pertanahan',
            'self_description' => 'Advokat senior dengan pengalaman menangani sengketa pertanahan dan perdata.',
            'account_status'   => 'active',
            'photo_path'       => 'images/lawyer-adi.png',
        ]);

        // Simulasi agregasi count dari tabel BOOKING (where lawyer_id = $lawyer['lawyer_id']) & CASE_EXECUTION
        $stats = [
            'total_cases'       => 124,
            'in_progress'       => 56,
            'waiting_documents' => 23,
            'completed'         => 38,
        ];

        return view('lawyer.index', compact('lawyer', 'stats'));
    }
}