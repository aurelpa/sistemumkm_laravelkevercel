<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Umkm::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_usaha', 'like', "%{$search}%")
                  ->orWhere('nama_pemilik', 'like', "%{$search}%")
                  ->orWhere('jenis_usaha', 'like', "%{$search}%");
            });
        }

        $umkm = $query->latest()->paginate(10)->withQueryString();

        return view('umkm.index', compact('umkm'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('umkm.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_usaha'     => 'required|string|max:255',
            'nama_pemilik'   => 'required|string|max:255',
            'jenis_usaha'    => 'required|string|max:255',
            'alamat'         => 'required|string',
            'nomor_telepon'  => 'required|regex:/^[0-9]+$/|min:8|max:15',
            'email'          => 'required|email|unique:umkm,email',
            'tahun_berdiri'  => 'required|integer|min:1900|max:' . date('Y'),
            'jumlah_karyawan'=> 'required|integer|min:1',
            'deskripsi_usaha'=> 'nullable|string',
        ], [
            'nama_usaha.required'      => 'Nama usaha wajib diisi.',
            'nama_pemilik.required'    => 'Nama pemilik wajib diisi.',
            'jenis_usaha.required'     => 'Jenis usaha wajib diisi.',
            'alamat.required'          => 'Alamat wajib diisi.',
            'nomor_telepon.required'   => 'Nomor telepon wajib diisi.',
            'nomor_telepon.regex'      => 'Nomor telepon hanya boleh berisi angka.',
            'nomor_telepon.min'        => 'Nomor telepon minimal 8 digit.',
            'nomor_telepon.max'        => 'Nomor telepon maksimal 15 digit.',
            'email.required'           => 'Email wajib diisi.',
            'email.email'              => 'Format email tidak valid.',
            'email.unique'             => 'Email sudah terdaftar.',
            'tahun_berdiri.required'   => 'Tahun berdiri wajib diisi.',
            'tahun_berdiri.integer'    => 'Tahun berdiri harus berupa angka.',
            'tahun_berdiri.min'        => 'Tahun berdiri tidak valid.',
            'tahun_berdiri.max'        => 'Tahun berdiri tidak boleh melebihi tahun sekarang.',
            'jumlah_karyawan.required' => 'Jumlah karyawan wajib diisi.',
            'jumlah_karyawan.integer'  => 'Jumlah karyawan harus berupa angka.',
            'jumlah_karyawan.min'      => 'Jumlah karyawan minimal 1.',
        ]);

        Umkm::create($validated);

        return redirect()->route('umkm.index')
            ->with('success', 'Data UMKM berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Umkm $umkm)
    {
        return view('umkm.show', compact('umkm'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Umkm $umkm)
    {
        return view('umkm.edit', compact('umkm'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Umkm $umkm)
    {
        $validated = $request->validate([
            'nama_usaha'     => 'required|string|max:255',
            'nama_pemilik'   => 'required|string|max:255',
            'jenis_usaha'    => 'required|string|max:255',
            'alamat'         => 'required|string',
            'nomor_telepon'  => 'required|regex:/^[0-9]+$/|min:8|max:15',
            'email'          => 'required|email|unique:umkm,email,' . $umkm->id,
            'tahun_berdiri'  => 'required|integer|min:1900|max:' . date('Y'),
            'jumlah_karyawan'=> 'required|integer|min:1',
            'deskripsi_usaha'=> 'nullable|string',
        ], [
            'nama_usaha.required'      => 'Nama usaha wajib diisi.',
            'nama_pemilik.required'    => 'Nama pemilik wajib diisi.',
            'jenis_usaha.required'     => 'Jenis usaha wajib diisi.',
            'alamat.required'          => 'Alamat wajib diisi.',
            'nomor_telepon.required'   => 'Nomor telepon wajib diisi.',
            'nomor_telepon.regex'      => 'Nomor telepon hanya boleh berisi angka.',
            'nomor_telepon.min'        => 'Nomor telepon minimal 8 digit.',
            'nomor_telepon.max'        => 'Nomor telepon maksimal 15 digit.',
            'email.required'           => 'Email wajib diisi.',
            'email.email'              => 'Format email tidak valid.',
            'email.unique'             => 'Email sudah digunakan oleh data lain.',
            'tahun_berdiri.required'   => 'Tahun berdiri wajib diisi.',
            'tahun_berdiri.integer'    => 'Tahun berdiri harus berupa angka.',
            'jumlah_karyawan.required' => 'Jumlah karyawan wajib diisi.',
            'jumlah_karyawan.integer'  => 'Jumlah karyawan harus berupa angka.',
            'jumlah_karyawan.min'      => 'Jumlah karyawan minimal 1.',
        ]);

        $umkm->update($validated);

        return redirect()->route('umkm.index')
            ->with('success', 'Data UMKM berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Umkm $umkm)
    {
        $umkm->delete();

        return redirect()->route('umkm.index')
            ->with('success', 'Data UMKM berhasil dihapus!');
    }
}
