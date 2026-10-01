<?php

namespace App\Http\Controllers\Features\File_Access;

use App\Http\Controllers\Controller;
use App\Models\ArchiveFile;
use App\Models\BudgetSubmission;
use App\Models\DigitalArchive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchiveFileAccessController extends Controller
{
    function stream_digital_archive($id, $index = 0)
    {
        $file_digital_arsip = DigitalArchive::findOrFail($id);

        $files = $file_digital_arsip->file_path_archive ?? [];

        // Dukung format lama (string tunggal) & format baru (array)
        if (!is_array($files)) {
            $files = $files ? [$files] : [];
        }

        if (!isset($files[$index])) {
            abort(404, 'File tidak ditemukan.');
        }

        $path = Storage::disk('private')->path($files[$index]);

        return response()->file($path);
    }

    function download_digital_archive($id, $index = 0)
    {
        $file_digital_arsip = DigitalArchive::findOrFail($id);

        $files = $file_digital_arsip->file_path_archive ?? [];

        if (!is_array($files)) {
            $files = $files ? [$files] : [];
        }

        if (!isset($files[$index])) {
            abort(404, 'File tidak ditemukan.');
        }

        $path = Storage::disk('private')->path($files[$index]);
        $fileName = basename($files[$index]);

        return response()->download($path, $fileName);
    }

    function stream_archive($id)
    {
        $file_arsip = ArchiveFile::findOrFail($id);

        $path = Storage::disk('private')->path($file_arsip->file_path);

        return response()->file($path);
    }

    function download_archive($id)
    {
        $file_arsip = ArchiveFile::findOrFail($id);

        $path = Storage::disk('private')->path($file_arsip->file_path);

        $fileName = basename($file_arsip->file_path);

        return response()->download($path, $fileName);
    }
}