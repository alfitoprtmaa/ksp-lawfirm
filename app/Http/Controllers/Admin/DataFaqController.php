<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DataFaqController extends Controller
{
    private function getCategories(): array
    {
        return ['Konsultasi', 'Advokat', 'Dokumen', 'Pembayaran', 'Akun', 'Umum'];
    }

    private function getDefaultFaqs(): array
    {
        return [
            [
                'faq_id'        => 1,
                'admin_id'      => 1,
                'question'      => 'Bagaimana cara mengajukan konsultasi hukum?',
                'answer'        => 'Pilih layanan konsultasi, lalu lengkapi formulir pengajuan.',
                'category'      => 'Konsultasi',
                'display_order' => 1,
                'is_active'     => true,
                'status_label'  => 'Dipublikasikan',
                'updated_date'  => '10 Nov 2026',
                'updated_by'    => 'Oleh Admin',
            ],
            [
                'faq_id'        => 2,
                'admin_id'      => 1,
                'question'      => 'Bagaimana memilih advokat yang sesuai?',
                'answer'        => 'Sesuaikan spesialisasi advokat dengan kebutuhan hukum Anda.',
                'category'      => 'Advokat',
                'display_order' => 2,
                'is_active'     => true,
                'status_label'  => 'Dipublikasikan',
                'updated_date'  => '10 Nov 2026',
                'updated_by'    => 'Oleh Admin',
            ],
            [
                'faq_id'        => 3,
                'admin_id'      => 1,
                'question'      => 'Dokumen apa yang perlu disiapkan?',
                'answer'        => 'Siapkan identitas dan dokumen pendukung terkait perkara.',
                'category'      => 'Dokumen',
                'display_order' => 3,
                'is_active'     => true,
                'status_label'  => 'Dipublikasikan',
                'updated_date'  => '09 Nov 2026',
                'updated_by'    => 'Oleh Admin',
            ],
            [
                'faq_id'        => 4,
                'admin_id'      => 1,
                'question'      => 'Bagaimana cara mengetahui biaya konsultasi?',
                'answer'        => 'Biaya dikonfirmasi sesuai layanan dan kebutuhan konsultasi.',
                'category'      => 'Pembayaran',
                'display_order' => 4,
                'is_active'     => false,
                'status_label'  => 'Draf',
                'updated_date'  => '08 Nov 2026',
                'updated_by'    => 'Oleh Admin',
            ],
            [
                'faq_id'        => 5,
                'admin_id'      => 1,
                'question'      => 'Bagaimana menjaga keamanan akun saya?',
                'answer'        => 'Gunakan kata sandi yang kuat dan jangan bagikan data masuk.',
                'category'      => 'Akun',
                'display_order' => 5,
                'is_active'     => true,
                'status_label'  => 'Dipublikasikan',
                'updated_date'  => '08 Nov 2026',
                'updated_by'    => 'Oleh Admin',
            ],
        ];
    }

    private function getFaqsSession(): array
    {
        if (!session()->has('admin_faqs_list')) {
            session(['admin_faqs_list' => $this->getDefaultFaqs()]);
        }
        return session('admin_faqs_list');
    }

    public function index()
    {
        $admin = [
            'admin_id'  => 1,
            'full_name' => 'Admin',
            'initial'   => 'A',
        ];

        $faqs       = $this->getFaqsSession();
        $categories = $this->getCategories();

        // Statistik sesuai kartu atas
        $stats = [
            'total'      => 24,
            'published'  => 20,
            'draft'      => 4,
            'categories' => count($categories),
        ];

        return view('admin.faq.index', compact(
            'admin',
            'faqs',
            'categories',
            'stats'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question'      => ['required', 'string', 'max:255'],
            'answer'        => ['required', 'string'],
            'category'      => ['required', 'string', 'max:100'],
            'display_order' => ['nullable', 'integer', 'min:1'],
            'is_active'     => ['required', 'boolean'],
        ]);

        $faqs = $this->getFaqsSession();
        $isActive = (bool) $validated['is_active'];

        $faqs[] = [
            'faq_id'        => rand(100, 999),
            'admin_id'      => 1,
            'question'      => $validated['question'],
            'answer'        => $validated['answer'],
            'category'      => $validated['category'],
            'display_order' => (int) ($validated['display_order'] ?? (count($faqs) + 1)),
            'is_active'     => $isActive,
            'status_label'  => $isActive ? 'Dipublikasikan' : 'Draf',
            'updated_date'  => Carbon::now('Asia/Jakarta')->translatedFormat('d M Y'),
            'updated_by'    => 'Oleh Admin',
        ];

        usort($faqs, fn($a, $b) => $a['display_order'] <=> $b['display_order']);
        session(['admin_faqs_list' => $faqs]);

        return redirect()
            ->route('admin.faq.index')
            ->with('success', 'FAQ baru berhasil ditambahkan.');
    }

    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'question'      => ['required', 'string', 'max:255'],
            'answer'        => ['required', 'string'],
            'category'      => ['required', 'string', 'max:100'],
            'display_order' => ['required', 'integer', 'min:1'],
            'is_active'     => ['required', 'boolean'],
        ]);

        $faqs = $this->getFaqsSession();
        $isActive = (bool) $validated['is_active'];

        foreach ($faqs as &$item) {
            if ($item['faq_id'] === $id) {
                $item['question']      = $validated['question'];
                $item['answer']        = $validated['answer'];
                $item['category']      = $validated['category'];
                $item['display_order'] = (int) $validated['display_order'];
                $item['is_active']     = $isActive;
                $item['status_label']  = $isActive ? 'Dipublikasikan' : 'Draf';
                $item['updated_date']  = Carbon::now('Asia/Jakarta')->translatedFormat('d M Y');
                break;
            }
        }
        unset($item);

        usort($faqs, fn($a, $b) => $a['display_order'] <=> $b['display_order']);
        session(['admin_faqs_list' => $faqs]);

        return redirect()
            ->route('admin.faq.index')
            ->with('success', 'Data FAQ berhasil diperbarui.');
    }

    public function destroy(int $id)
    {
        $faqs = $this->getFaqsSession();
        $faqs = array_values(array_filter($faqs, fn($f) => $f['faq_id'] !== $id));
        session(['admin_faqs_list' => $faqs]);

        return redirect()
            ->route('admin.faq.index')
            ->with('success', 'Data FAQ berhasil dihapus.');
    }
}