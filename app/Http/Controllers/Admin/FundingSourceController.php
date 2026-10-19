<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FundingSource;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FundingSourceController extends Controller
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
        return view('admin.setting_environment.funding-sources_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'funding_source_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('funding_sources', 'funding_source_name')->where(function ($query) use ($request) {
                    return $query->where('sub_category', $request->sub_category);
                }),
            ],
            'sub_category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ], [
            'funding_source_name.unique' => 'Sumber dana dengan kombinasi sub kategori tersebut sudah terdaftar.',
        ]);

        FundingSource::create($validated);

        return redirect()
            ->route('admin.envi')
            ->with('success', 'Sumber dana berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $fundingSource = FundingSource::findOrFail($id);
        // return view('funding-sources.show', compact('fundingSource'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $fundingSource = FundingSource::findOrFail($id);
        return view('admin.setting_environment.funding-sources_edit', compact('fundingSource'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $fundingSource = FundingSource::findOrFail($id);
        $validated = $request->validate([
            'funding_source_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('funding_sources', 'funding_source_name')
                    ->where(function ($query) use ($request) {
                        return $query->where('sub_category', $request->sub_category);
                    })
                    ->ignore($fundingSource->id),
            ],
            'sub_category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ], [
            'funding_source_name.unique' => 'Sumber dana dengan kombinasi sub kategori tersebut sudah terdaftar.',
        ]);

        $fundingSource->update($validated);

        return redirect()
            ->route('admin.envi')
            ->with('success', 'Sumber dana berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fundingSource = FundingSource::findOrFail($id);
        $fundingSource->delete();

        return redirect()
            ->route('admin.envi')
            ->with('success', 'Sumber dana berhasil dihapus');
    }
}
