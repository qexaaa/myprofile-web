<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portofolio;
use App\Models\Skill;
use App\Models\Certificate;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'portfolioCount' => Portofolio::count(),
            'skillCount' => Skill::count(),
            'certificateCount' => Certificate::count(),
        ]);
    }
}
