@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Ringkasan data UMKM terdaftar')

@section('content')

    {{-- Stat Cards --}}
    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="stat-card primary">
                <div class="stat-icon primary">
                    <i class="bi bi-building"></i>
                </div>
                <div class="stat-value">{{ number_format($totalUmkm) }}</div>
                <div class="stat-label">Total UMKM Terdaftar</div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card success">
                <div class="stat-icon success">
                    <i class="bi bi-tags"></i>
                </div>
                <div class="stat-value">{{ $byJenisUsaha->count() }}</div>
                <div class="stat-label">Jenis Usaha</div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card warning">
                <div class="stat-icon warning">
                    <i class="bi bi-people"></i>
                </div>
                <div class="stat-value">{{ $latestUmkm->sum('jumlah_karyawan') }}</div>
                <div class="stat-label">Total Karyawan (5 Terbaru)</div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="stat-card info">
                <div class="stat-icon info">
                    <i class="bi bi-calendar-plus"></i>
                </div>
                <div class="stat-value">{{ $latestUmkm->count() }}</div>
                <div class="stat-label">Data Terbaru Ditampilkan</div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        {{-- Latest UMKM --}}
        <div class="col-xl-8">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="mb-0 fw-700" style="color:white;font-weight:700;">
                            <i class="bi bi-clock-history me-2 text-primary"></i>UMKM Terbaru
                        </h6>
                        <small style="color:#94a3b8;">5 data UMKM paling baru</small>
                    </div>
                    <a href="{{ route('umkm.index') }}" class="btn btn-outline-primary btn-sm">
                        Lihat Semua <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
                <div class="card-body p-0">
                    @if($latestUmkm->count() > 0)
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Nama Usaha</th>
                                        <th>Pemilik</th>
                                        <th>Jenis Usaha</th>
                                        <th>Karyawan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($latestUmkm as $item)
                                    <tr>
                                        <td>
                                            <div style="font-weight:400;color:white;">{{ $item->nama_usaha }}</div>
                                        </td>
                                        <td>{{ $item->nama_pemilik }}</td>
                                        <td><span class="badge-jenis">{{ $item->jenis_usaha }}</span></td>
                                        <td>
                                            <span style="font-weight:600;color:#34d399;">{{ $item->jumlah_karyawan }}</span>
                                            <span style="font-size:0.75rem;color:#94a3b8;"> orang</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('umkm.show', $item) }}" class="btn btn-action btn-view">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="empty-state">
                            <div class="empty-state-icon"><i class="bi bi-inbox"></i></div>
                            <p style="color:#94a3b8;">Belum ada data UMKM terdaftar.</p>
                            <a href="{{ route('umkm.create') }}" class="btn btn-primary btn-sm mt-2">
                                <i class="bi bi-plus me-1"></i>Tambah UMKM
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Jenis Usaha Distribution --}}
        <div class="col-xl-4">
            <div class="card h-100">
                <div class="card-header">
                    <h6 class="mb-0" style="color:white;font-weight:700;">
                        <i class="bi bi-pie-chart-fill me-2 text-warning"></i>Distribusi Jenis Usaha
                    </h6>
                    <small style="color:#94a3b8;">Berdasarkan kategori usaha</small>
                </div>
                <div class="card-body">
                    @if($byJenisUsaha->count() > 0)
                        @foreach($byJenisUsaha as $item)
                        @php
                            $percent = $totalUmkm > 0 ? round(($item->total / $totalUmkm) * 100) : 0;
                            $colors = ['#4f46e5','#10b981','#f59e0b','#0ea5e9','#ef4444','#8b5cf6','#ec4899'];
                            $color = $colors[$loop->index % count($colors)];
                        @endphp
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span style="font-size:0.82rem;font-weight:600;color:#cbd5e1;">{{ $item->jenis_usaha }}</span>
                                <span style="font-size:0.82rem;color:#94a3b8;">{{ $item->total }} ({{ $percent }}%)</span>
                            </div>
                            <div style="height:6px;background:rgba(255,255,255,0.08);border-radius:10px;overflow:hidden;">
                                <div style="height:100%;width:{{ $percent }}%;background:{{ $color }};border-radius:10px;transition:width 0.5s ease;"></div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="empty-state py-4">
                            <div class="empty-state-icon" style="font-size:2.5rem;"><i class="bi bi-bar-chart"></i></div>
                            <p style="color:#94a3b8;font-size:0.83rem;">Tidak ada data untuk ditampilkan.</p>
                        </div>
                    @endif

                    @if($totalUmkm > 0)
                    <div class="mt-3 pt-3" style="border-top:1px solid rgba(255,255,255,0.08);">
                        <a href="{{ route('umkm.create') }}" class="btn btn-primary w-100">
                            <i class="bi bi-plus-circle me-2"></i>Tambah Data UMKM
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
