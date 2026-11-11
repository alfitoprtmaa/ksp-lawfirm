<?php

namespace App\Http\Controllers;

/**
 * DATA DUMMY untuk halaman Kontak. Backend: ganti dengan data dari database.
 *
 * 'url' => null berarti tombol membuka modal booking (untuk Online Meeting).
 */
class ContactController extends Controller
{
    public function index()
    {
        $whatsapp = '6281919044044';

        return view('contact', [
            'whatsapp' => $whatsapp,
            'areas' => array_map('trim', explode('|', 'Bankruptcy and Insolvency|Civil Litigation and Dispute Resolution|Criminal Defense Litigation|Administrative Litigation and Dispute Resolution|Medical and Healthcare|Arbitration|Corporate and Commerce|Customs and Excise|Banking and Finance|Property|Intellectual Property|Labour and Employment|Mining|Taxation|Licensing and Compliance|Media and Communication|Insurance')),
            'intro' => 'Setiap persoalan memiliki konteks yang berbeda. Pilih layanan yang sesuai dengan kebutuhan Anda, mulai dari penanganan sengketa hingga pendampingan hukum berkelanjutan.',
            'cards' => [
                ['color' => 'green', 'icon' => 'fa-brands fa-whatsapp', 'wide' => true,
                 'title' => 'WhatsApp Consultation',
                 'desc' => 'Connect directly with our legal team for a quick and convenient consultation. Get professional guidance wherever you are.',
                 'cta' => 'Selengkapnya', 'url' => 'https://wa.me/' . $whatsapp, 'external' => true],
                ['color' => 'rose', 'icon' => 'fa-regular fa-envelope', 'wide' => true,
                 'title' => 'Via Email',
                 'desc' => 'Have a legal question or need further assistance? Send us an email and our team will get back to you with the information you need.',
                 'cta' => 'Selengkapnya', 'url' => 'mailto:ketutsuryaputraandpartners@gmail.com', 'external' => false],
                ['color' => 'blue', 'icon' => 'fa-regular fa-calendar-check', 'wide' => false,
                 'title' => 'Online Meeting',
                 'desc' => 'Discuss your legal concerns with our experienced legal team through a convenient online meeting. Get professional advice, explore your legal options,',
                 'cta' => 'Lihat Lokasi', 'url' => null, 'external' => false],
            ],
            'offline' => [
                'icon' => 'fa-solid fa-location-dot',
                'title' => 'Offline',
                'desc' => 'Discuss your legal concerns with our experienced legal team through a convenient online meeting. Get professional advice, explore your legal options,',
                'cta' => 'Lihat Lokasi',
                'url' => 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode('Ketut Surya Putra & Partners'),
            ],
        ]);
    }
}