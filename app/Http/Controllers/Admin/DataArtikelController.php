<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DataArtikelController extends Controller
{
    private function getCategories(): array
    {
        return ['Seminar', 'Workshop', 'Sosialisasi', 'Pelatihan', 'Edukasi'];
    }

    private function getDefaultArticles(): array
    {
        return [
            [
                'article_id'     => 1,
                'admin_id'       => 1,
                'title'          => 'Seminar Perlindungan Hukum di Era Digital',
                'summary'        => 'Diskusi perlindungan data dan hak masyarakat digital.',
                'category'       => 'Seminar',
                'status'         => 'Dipublikasikan',
                'author_name'    => 'Admin',
                'article_image'  => null,
                'article_body'   => '<p>Perkembangan teknologi digital membawa tantangan baru dalam perlindungan data pribadi dan privasi masyarakat. Melalui seminar ini, tim advokat membahas langkah preventif serta hak-hak warga negara sesuai UU Perlindungan Data Pribadi.</p>',
                'published_date' => '10 Nov 2026',
                'updated_note'   => 'Oleh Admin',
            ],
            [
                'article_id'     => 2,
                'admin_id'       => 1,
                'title'          => 'Workshop Penyusunan Kontrak Bisnis',
                'summary'        => 'Pelatihan menyusun perjanjian bisnis yang aman.',
                'category'       => 'Workshop',
                'status'         => 'Dipublikasikan',
                'author_name'    => 'Admin',
                'article_image'  => null,
                'article_body'   => '<p>Workshop praktis bagi pelaku UMKM dan perusahaan rintisan untuk memahami struktur perjanjian kerja sama, klausul wanprestasi, hingga mekanisme penyelesaian sengketa.</p>',
                'published_date' => '09 Nov 2026',
                'updated_note'   => 'Oleh Admin',
            ],
            [
                'article_id'     => 3,
                'admin_id'       => 1,
                'title'          => 'Sosialisasi Bantuan Hukum bagi Masyarakat',
                'summary'        => 'Edukasi akses bantuan hukum dan layanan konsultasi.',
                'category'       => 'Sosialisasi',
                'status'         => 'Dipublikasikan',
                'author_name'    => 'Admin',
                'article_image'  => null,
                'article_body'   => '<p>Kegiatan sosialisasi langsung kepada masyarakat mengenai prosedur pengajuan konsultasi hukum gratis serta syarat pendampingan perkara di kantor hukum.</p>',
                'published_date' => '08 Nov 2026',
                'updated_note'   => 'Oleh Admin',
            ],
            [
                'article_id'     => 4,
                'admin_id'       => 1,
                'title'          => 'Pelatihan Mediasi dan Penyelesaian Sengketa',
                'summary'        => 'Teknik negosiasi untuk penyelesaian sengketa.',
                'category'       => 'Pelatihan',
                'status'         => 'Draf',
                'author_name'    => 'Admin',
                'article_image'  => null,
                'article_body'   => '<p>Draf materi pelatihan negosiasi dan mediasi non-litigasi untuk mempercepat tercapainya kesepakatan damai yang saling menguntungkan kedua belah pihak.</p>',
                'published_date' => '10 Nov 2026',
                'updated_note'   => 'Oleh Admin',
            ],
            [
                'article_id'     => 5,
                'admin_id'       => 1,
                'title'          => 'Mengenal Hak Hukum dalam Hubungan Kerja',
                'summary'        => 'Panduan hak dan kewajiban pekerja serta perusahaan.',
                'category'       => 'Edukasi',
                'status'         => 'Terjadwal',
                'author_name'    => 'Admin',
                'article_image'  => null,
                'article_body'   => '<p>Artikel edukasi komprehensif mengenai perjanjian kerja PKWT dan PKWTT, hak cuti, pesangon, serta prosedur penyelesaian perselisihan hubungan industrial.</p>',
                'published_date' => '10 Nov 2026',
                'updated_note'   => 'Tayang 12 Nov 2026',
            ],
        ];
    }

    private function getArticlesSession(): array
    {
        if (!session()->has('admin_articles_list')) {
            session(['admin_articles_list' => $this->getDefaultArticles()]);
        }
        return session('admin_articles_list');
    }

    public function index()
    {
        $admin = [
            'admin_id'  => 1,
            'full_name' => 'Admin',
            'initial'   => 'A',
        ];

        $articles   = $this->getArticlesSession();
        $categories = $this->getCategories();

        // Statistik sesuai kartu atas
        $stats = [
            'total'     => 32,
            'published' => 24,
            'draft'     => 5,
            'scheduled' => 3,
        ];

        return view('admin.artikel.index', compact(
            'admin',
            'articles',
            'categories',
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

        $categories = $this->getCategories();

        return view('admin.artikel.create', compact('admin', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'          => ['required', 'string', 'max:255'],
            'summary'        => ['nullable', 'string', 'max:160'],
            'article_body'   => ['required', 'string'],
            'category'       => ['required', 'string', 'max:100'],
            'author_name'    => ['nullable', 'string', 'max:100'],
            'publish_mode'   => ['required', 'string', 'in:now,schedule'],
            'scheduled_date' => ['nullable', 'date'],
            'action_type'    => ['required', 'string', 'in:draft,publish'],
        ]);

        $author = $validated['author_name'] ?: 'Admin';
        $todayFormatted = Carbon::now('Asia/Jakarta')->translatedFormat('d M Y');

        if ($validated['action_type'] === 'draft') {
            $status = 'Draf';
            $note   = "Oleh {$author}";
        } elseif ($validated['publish_mode'] === 'schedule' && !empty($validated['scheduled_date'])) {
            $status = 'Terjadwal';
            $schedFormatted = Carbon::parse($validated['scheduled_date'])->translatedFormat('d M Y');
            $note   = "Tayang {$schedFormatted}";
        } else {
            $status = 'Dipublikasikan';
            $note   = "Oleh {$author}";
        }

        $articles = $this->getArticlesSession();

        array_unshift($articles, [
            'article_id'     => rand(100, 999),
            'admin_id'       => 1,
            'title'          => $validated['title'],
            'summary'        => $validated['summary'] ?: strip_tags(substr($validated['article_body'], 0, 120)),
            'category'       => $validated['category'],
            'status'         => $status,
            'author_name'    => $author,
            'article_image'  => null,
            'article_body'   => $validated['article_body'],
            'published_date' => $todayFormatted,
            'updated_note'   => $note,
        ]);

        session(['admin_articles_list' => $articles]);

        $msg = $status === 'Draf'
            ? "Artikel \"{$validated['title']}\" berhasil disimpan sebagai draf."
            : "Artikel \"{$validated['title']}\" berhasil disimpan ({$status}).";

        return redirect()
            ->route('admin.artikel.index')
            ->with('success', $msg);
    }

    public function destroy(int $id)
    {
        $articles = $this->getArticlesSession();
        $articles = array_values(array_filter($articles, fn($a) => $a['article_id'] !== $id));
        session(['admin_articles_list' => $articles]);

        return redirect()
            ->route('admin.artikel.index')
            ->with('success', 'Artikel kegiatan berhasil dihapus.');
    }
}