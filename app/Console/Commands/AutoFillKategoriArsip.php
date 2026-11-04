<?php

namespace App\Console\Commands;

use App\Models\DigitalArchive;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class AutoFillKategoriArsip extends Command
{
    protected $signature = 'arsip:autofill-kategori {--dry-run : Simulasi tanpa menyimpan ke database}';
    protected $description = 'Isi otomatis kolom kategori arsip yang masih kosong dari isi PDF';

    public function handle(): void
    {
        $dryRun = $this->option('dry-run');

        $archives = DigitalArchive::query()
            ->where(function ($q) {
                $q->whereNull('kategori')->orWhere('kategori', '');
            })
            ->get();

        $total    = $archives->count();
        $berhasil = 0;
        $gagal    = 0;

        $this->info("Ditemukan {$total} arsip dengan kategori kosong.");
        if ($dryRun) {
            $this->warn('MODE DRY-RUN: tidak ada perubahan yang disimpan.');
        }

        $bar = $this->output->createProgressBar($total);
        $bar->start();

        foreach ($archives as $archive) {
            try {
                // Panggil extractKuitansiDataFromPdf() — cachedKuitansiData di-reset dari dalam model
                $pdfData = $archive->extractKuitansiDataFromPdf();

                if (!empty($pdfData['kategori'])) {
                    if (!$dryRun) {
                        // Gunakan DB::table agar tidak ada kolom ekstra yang ikut tersimpan
                        DB::table('digital_archives')
                            ->where('id', $archive->id)
                            ->update(['kategori' => $pdfData['kategori']]);
                    }
                    $berhasil++;
                } else {
                    $gagal++;
                }
            } catch (\Throwable $e) {
                $gagal++;
            }

            $bar->advance();
        }

        $bar->finish();
        $this->newLine(2);

        $this->info("✅ Berhasil diisi: {$berhasil} arsip");
        $this->warn("⚠️  Tidak terdeteksi (PDF tidak ada / tidak terbaca): {$gagal} arsip");

        if (!$dryRun && $berhasil > 0) {
            $this->info('Semua kategori berhasil disimpan ke database!');
        }
    }
}
