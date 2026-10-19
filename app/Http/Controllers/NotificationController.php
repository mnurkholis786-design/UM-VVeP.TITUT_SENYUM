<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Tampilkan semua notifikasi user login
     */
     public function index(Request $request)
    {
        $query = Notification::where('user_id', Auth::id())
            ->orderByDesc('created_at');

        // 1. Filter Status Baca (Semua, Belum Dibaca, Sudah Dibaca)
        if ($request->filter === 'unread') {
            $query->where('is_read', false);
        } elseif ($request->filter === 'read') {
            $query->where('is_read', true);
        }

        // 2. Filter Kategori Aktivitas (Opsi 2)
        if ($request->filled('category')) {
            match ($request->category) {
                'register' => $query->where('title', 'Registrasi Pengguna Baru'),
                'submission' => $query->whereIn('title', ['Pengajuan Baru', 'Pengajuan Anggaran Baru', 'Pengajuan Diperbarui']),
                'verification' => $query->whereIn('title', ['Berkas Diverifikasi Keuangan', 'Pengajuan Siap Diverifikasi', 'Pengajuan Disetujui']),
                'return' => $query->whereIn('title', ['Pengajuan Dikembalikan', 'Dokumen Dikembalikan']),
                'archive' => $query->where('title', 'Arsip Digital Baru Tersimpan'),
                default => null,
            };
        }

        // 3. Filter Pencarian Kata Kunci (Opsi 3)
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('message', 'like', "%{$search}%");
            });
        }

        $notifications = $query->paginate(10)->withQueryString();

        return view('notifications.index', compact('notifications'));
    }
    /**
     * Tandai satu notifikasi sebagai sudah dibaca
     */
    public function markAsRead($id)
    {
        $notification = Notification::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $notification->update([
            'is_read' => true,
        ]);

        if ($notification->url) {
            return redirect($notification->url);
        }

        return back();
    }

    /**
     * Tandai semua notifikasi sebagai sudah dibaca
     */
    public function markAllAsRead()
    {
        Notification::where('user_id', Auth::id())
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return back();
    }

    public function destroy($id)
    {
        Notification::where('id', $id)
            ->where('user_id', Auth::id())
            ->delete();

        return back();
    }

    public function deleteRead()
    {
        Notification::where('user_id', Auth::id())
            ->where('is_read', true)
            ->delete();

        return back();
    }
}
