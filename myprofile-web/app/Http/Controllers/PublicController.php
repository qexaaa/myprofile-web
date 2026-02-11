<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Portofolio;
use App\Models\Skill;
use App\Models\Certificate;

class PublicController extends Controller
{
    /**
     * Home / Landing Page
     */
    public function home(Request $request)
    {
        $data = [
            'profile'      => Profile::first(),
            'skills'       => Skill::orderBy('level', 'desc')->get(),
            
            // pagination khusus HOME
            'portfolios'   => Portofolio::latest()
                                ->paginate(3, ['*'], 'portfolio_page'),

            'certificates' => Certificate::latest()
                                ->paginate(4, ['*'], 'certificate_page'),
        ];

        // JIKA AJAX → KIRIM PARTIAL SAJA
        if ($request->ajax()) {
            if ($request->has('portfolio_page')) {
                return view('public.partials.home-portfolios', $data);
            }

            if ($request->has('certificate_page')) {
                return view('public.partials.home-certificates', $data);
            }
        }

        // NORMAL LOAD
        return view('public.home', $data);

    }

    /**
     * Halaman Portfolio
     */
    public function portofolio()
    {
        $portfolios = Portofolio::latest()->paginate(6);
        return view('public.portofolio', compact('portfolios'));
    }

    public function portofolioDetail($id)
    {
        $portfolio = Portofolio::findOrFail($id);
        return view('public.portofolio_detail', compact('portfolio'));
    }

    /**
     * Halaman Certificate
     */
    public function certificates()
    {
        $certificates = Certificate::latest()->paginate(8);
        return view('public.certificates', compact('certificates'));
    }

    /**
     * Halaman Contact
     */
    public function contact()
    {
        return view('public.contact', [
            'profile' => Profile::first()
        ]);
    }

}
