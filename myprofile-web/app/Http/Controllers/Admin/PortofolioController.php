<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portofolio;
use Illuminate\Support\Facades\Storage;

class PortofolioController extends Controller
{
    public function index()
    {
        $portfolios = Portofolio::latest()->get();
        return view('admin.portofolios.index', compact('portfolios'));
    }

    public function create()
    {
        return view('admin.portofolios.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'        => 'required',
            'description'  => 'required',
            'github_link'  => 'nullable|url',
            'image'        => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {
            // SIMPAN KE storage/app/public/portfolios
            $data['image'] = $request->file('image')
                                     ->store('portfolios', 'public');
        }

        Portofolio::create($data);

        return redirect()->route('admin.portfolios.index')
                         ->with('success', 'Portofolio berhasil ditambahkan');
    }

    public function edit(Portofolio $portfolio)
    {
        return view('admin.portofolios.edit', compact('portfolio'));
    }

    public function update(Request $request, Portofolio $portfolio)
    {
        $data = $request->validate([
            'title'        => 'required',
            'description'  => 'required',
            'github_link'  => 'nullable|url',
            'image'        => 'nullable|image'
        ]);

        if ($request->hasFile('image')) {

            // HAPUS FILE LAMA (STORAGE)
            if ($portfolio->image) {
                Storage::disk('public')->delete($portfolio->image);
            }

            // SIMPAN FILE BARU
            $data['image'] = $request->file('image')
                                     ->store('portfolios', 'public');
        }

        $portfolio->update($data);

        return redirect()->route('admin.portfolios.index')
                         ->with('success', 'Portfolio berhasil diperbarui');
    }

    public function destroy(Portofolio $portfolio)
    {
        if ($portfolio->image) {
            Storage::disk('public')->delete($portfolio->image);
        }

        $portfolio->delete();

        return redirect()->route('admin.portfolios.index')
             ->with('success', 'Portofolio berhasil dihapus');
    }
}
