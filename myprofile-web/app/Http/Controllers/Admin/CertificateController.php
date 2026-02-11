<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certificate;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::latest()->get();
        return view('admin.certificates.index', compact('certificates'));
    }

    public function create()
    {
        return view('admin.certificates.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'file'  => 'required|mimes:pdf,jpg,jpeg,png'
        ]);

        if ($request->hasFile('file')) {
            // SIMPAN KE storage/app/public/certificates
            $data['file'] = $request->file('file')
                                    ->store('certificates', 'public');
        }

        Certificate::create($data);

        return redirect()->route('admin.certificates.index')
                         ->with('success', 'Sertifikat berhasil ditambahkan');
    }

    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $data = $request->validate([
            'title' => 'required',
            'file'  => 'nullable|mimes:pdf,jpg,jpeg,png'
        ]);

        if ($request->hasFile('file')) {

            // HAPUS FILE LAMA
            if ($certificate->file) {
                Storage::disk('public')->delete($certificate->file);
            }

            // SIMPAN FILE BARU
            $data['file'] = $request->file('file')
                                    ->store('certificates', 'public');
        }

        $certificate->update($data);

        return redirect()->route('admin.certificates.index')
                         ->with('success', 'Sertifikat berhasil diperbarui');
    }

    public function destroy(Certificate $certificate)
    {
        if ($certificate->file) {
            Storage::disk('public')->delete($certificate->file);
        }

        $certificate->delete();

        return redirect()->route('admin.certificates.index')
                         ->with('success', 'Sertifikat berhasil dihapus');
    }
}
