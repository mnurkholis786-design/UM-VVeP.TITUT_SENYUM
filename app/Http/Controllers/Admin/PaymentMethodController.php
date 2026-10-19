<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.setting_environment.payment_methods_create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $validated = $request->validate([
        'payment_method_name' => [
            'required',
            'string',
            'max:255',
            // Cek apakah kombinasi nama DAN sub kategori sudah ada di DB
            Rule::unique('payment_methods', 'payment_method_name')->where(function ($query) use ($request) {
                return $query->where('sub_category', $request->sub_category);
            }),
        ],
        'sub_category' => 'required|string|max:255',
        'description' => 'nullable|string',
    ], [
        'payment_method_name.unique' => 'Metode pembayaran dengan sub kategori tersebut sudah terdaftar.',
        'sub_category.required' => 'Sub kategori wajib diisi.',
    ]);

    PaymentMethod::create($validated);

        return redirect()
            ->route('admin.envi')
            ->with('success', 'Metode pembayaran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        return view('admin.setting_environment.payment_methods_edit', compact('paymentMethod'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)
{
    $paymentMethod = PaymentMethod::findOrFail($id);
    $validated = $request->validate([
        'payment_method_name' => [
            'required',
            'string',
            'max:255',
            // Cek kombinasi unik, tetapi abaikan ID data yang sedang diedit
            Rule::unique('payment_methods', 'payment_method_name')
                ->where(function ($query) use ($request) {
                    return $query->where('sub_category', $request->sub_category);
                })
                ->ignore($paymentMethod->id),
        ],
        'sub_category' => 'required|string|max:255',
        'description' => 'nullable|string',
    ], [
        'payment_method_name.unique' => 'Metode pembayaran dengan sub kategori tersebut sudah terdaftar.',
        'sub_category.required' => 'Sub kategori wajib diisi.',
    ]);

    $paymentMethod->update($validated);

        return redirect()
            ->route('admin.envi')
            ->with('success', 'Metode pembayaran berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        $paymentMethod->delete();

        return redirect()
            ->route('admin.envi')
            ->with('success', 'Metode pembayaran berhasil dihapus');
    }
}
