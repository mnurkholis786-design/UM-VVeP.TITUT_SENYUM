<?php

namespace App\Http\Controllers\Auth;

use App\Models\Notification;
use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'kosong',
            'is_privileged' => 0,
        ]);
        

// TAMBAHKAN KODE INI (Notifikasi ke Admin):
$adminUsers = User::where('role', 'Admin')->get();
foreach ($adminUsers as $admin) {
    Notification::create([
        'user_id' => $admin->id,
        'title'   => 'Registrasi Pengguna Baru',
        'message' => 'Pengguna baru <span class="font-semibold text-blue-600">' . e($user->name) . '</span> (' . e($user->email) . ') telah mendaftar dan menunggu pengaturan role.',
        'type'    => 'warning',
        'url'     => route('account.edit', $user->id),
        'is_read' => false,
    ]);
}

        event(new Registered($user));

        

        return redirect()->route('login')
                    ->with('status', 'Registrasi berhasil! Akun Anda sedang menunggu penetapan Role/Divisi oleh Administrator.');
     }
}
