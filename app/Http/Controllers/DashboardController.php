<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUmkm = Umkm::count();
        $byJenisUsaha = Umkm::selectRaw('jenis_usaha, COUNT(*) as total')
            ->groupBy('jenis_usaha')
            ->orderByDesc('total')
            ->get();
        $latestUmkm = Umkm::latest()->take(5)->get();

        return view('dashboard', compact('totalUmkm', 'byJenisUsaha', 'latestUmkm'));
    }
}
