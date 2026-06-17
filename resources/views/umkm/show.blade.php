@extends('layouts.app')

@section('title', 'Detail - ' . $umkm->nama_usaha)
@section('page-title', 'Detail UMKM')
@section('page-subtitle', $umkm->nama_usaha)

@section('content')

    {{-- Header Actions --}}
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('umkm.index') }}" class="btn btn-action btn-view" title="Kembali" id="btn-back">
                <i class="bi bi-arrow-left"></i>
            </a>
            <div>
                <h4 class="section-title">{{ $umkm->nama_usaha }}</h4>
                <p class="section-subtitle">
                    <span class="badge-jenis">{{ $umkm->jenis_usaha }}</span>
                    <span class="ms-2" style="color:#94a3b8;">ID #{{ str_pad($umkm->id, 5, '0', STR_PAD_LEFT) }}</span>
                </p>
            </div>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('umkm.edit', $umkm) }}" class="btn btn-edit btn-sm" id="btn-edit" style="padding:8px 16px;border-radius:8px;">
                <i class="bi bi-pencil me-2"></i>Edit
            </a>
            <button
                class="btn btn-delete btn-sm"
                id="btn-hapus"
                style="padding:8px 16px;border-radius:8px;"
                data-bs-toggle="modal"
                data-bs-target="#deleteModal"
                data-id="{{ $umkm->id }}"
                data-name="{{ $umkm->nama_usaha }}"
            >
                <i class="bi bi-trash me-2"></i>Hapus
            </button>
        </div>
    </div>

    <div class="row g-4">
        {{-- Main Detail Card --}}
        <div class="col-lg-8">

            {{-- Informasi Usaha --}}
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center gap-2">
                    <div style="width:32px;height:32px;background:rgba(79,70,229,0.2);border-radius:8px;display:flex;align-items:center;justify-content:center;">
                        <i class="bi bi-building" style="color:#818cf8;font-size:0.9rem;"></i>
                    </div>
                    <h6 class="mb-0" style="color:white;font-weight:700;">Informasi Usaha</h6>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="detail-label">Nama Usaha</div>
                            <div class="detail-value" style="font-size:1.05rem;font-weight:700;color:white;">{{ $umkm->nama_usaha }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-label">Jenis Usaha</div>
                            <div class="detail-value">
                                <span class="badge-jenis">{{ $umkm->jenis_usaha }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-label">Tahun Berdiri</div>
                            <div class="detail-value">
                                <i class="bi bi-calendar-event me-2" style="color:#94a3b8;"></i>
                                {{ $umkm->tahun_berdiri }}
                                <span style="font-size:0.78rem;color:#94a3b8;"> ({{ date('Y') - $umkm->tahun_berdiri }} tahun berdiri)</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-label">Jumlah Karyawan</div>
                            <div class="detail-value">
                                <i class="bi bi-people me-2" style="color:#94a3b8;"></i>
                                <span style="font-weight:700;color:#34d399;">{{ number_format($umkm->jumlah_karyawan) }}</span>
                                <span style="color:#94a3b8;"> orang</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="detail-label">Alamat Usaha</div>
                            <div class="detail-value">
                                <i class="bi bi-geo-alt me-2" style="color:#94a3b8;"></i>
                                {{ $umkm->alamat }}
                            </div>
                        </div>

                        @if($umkm->deskripsi_usaha)
                        <div class="col-12">
                            <hr class="detail-divider">
                            <div class="detail-label">Deskripsi Usaha</div>
                            <div style="background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.08);border-radius:10px;padding:16px;margin-top:8px;line-height:1.7;font-size:0.875rem;color:#cbd5e1;">
                                {{ $umkm->deskripsi_usaha }}
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Informasi Kontak --}}
            <div class="card">
                <div class="card-header d-flex align-items-center gap-2">
                    <div style="width:32px;height:32px;background:rgba(16,185,129,0.2);border-radius:8px;display:flex;align-items:center;justify-content:center;">
                        <i class="bi bi-person-lines-fill" style="color:#34d399;font-size:0.9rem;"></i>
                    </div>
                    <h6 class="mb-0" style="color:white;font-weight:700;">Informasi Pemilik & Kontak</h6>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="detail-label">Nama Pemilik</div>
                            <div class="detail-value" style="font-weight:600;color:white;">{{ $umkm->nama_pemilik }}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="detail-label">Nomor Telepon</div>
                            <div class="detail-value">
                                <a href="tel:{{ $umkm->nomor_telepon }}" style="color:#38bdf8;text-decoration:none;">
                                    <i class="bi bi-telephone me-1"></i>{{ $umkm->nomor_telepon }}
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="detail-label">Email</div>
                            <div class="detail-value">
                                <a href="mailto:{{ $umkm->email }}" style="color:#818cf8;text-decoration:none;">
                                    <i class="bi bi-envelope me-1"></i>{{ $umkm->email }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sidebar Detail --}}
        <div class="col-lg-4">

            {{-- Status Card --}}
            <div class="card mb-4" style="border-color:rgba(16,185,129,0.3);">
                <div class="card-body">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <div style="width:44px;height:44px;background:rgba(16,185,129,0.2);border-radius:10px;display:flex;align-items:center;justify-content:center;">
                            <i class="bi bi-check-circle-fill" style="color:#34d399;font-size:1.3rem;"></i>
                        </div>
                        <div>
                            <div style="font-weight:700;color:white;">Terdaftar Aktif</div>
                            <div style="font-size:0.78rem;color:#94a3b8;">Data valid & terverifikasi</div>
                        </div>
                    </div>

                    <hr style="border-color:rgba(255,255,255,0.08);margin:12px 0;">

                    <div class="mb-3">
                        <div class="detail-label">Tanggal Didaftarkan</div>
                        <div class="detail-value" style="font-size:0.875rem;">
                            {{ $umkm->created_at->format('d F Y') }}
                        </div>
                        <div style="font-size:0.75rem;color:#64748b;">{{ $umkm->created_at->diffForHumans() }}</div>
                    </div>

                    <div>
                        <div class="detail-label">Terakhir Diperbarui</div>
                        <div class="detail-value" style="font-size:0.875rem;">
                            {{ $umkm->updated_at->format('d F Y') }}
                        </div>
                        <div style="font-size:0.75rem;color:#64748b;">{{ $umkm->updated_at->diffForHumans() }}</div>
                    </div>
                </div>
            </div>

            {{-- Quick Stats --}}
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="mb-0" style="color:white;font-weight:700;font-size:0.85rem;">
                        <i class="bi bi-lightning-charge me-2 text-warning"></i>Info Cepat
                    </h6>
                </div>
                <div class="card-body p-0">
                    <div style="padding:14px 20px;border-bottom:1px solid rgba(255,255,255,0.06);">
                        <div class="d-flex justify-content-between align-items-center">
                            <span style="font-size:0.8rem;color:#94a3b8;">Umur Usaha</span>
                            <span style="font-weight:700;color:#818cf8;">{{ date('Y') - $umkm->tahun_berdiri }} Tahun</span>
                        </div>
                    </div>
                    <div style="padding:14px 20px;border-bottom:1px solid rgba(255,255,255,0.06);">
                        <div class="d-flex justify-content-between align-items-center">
                            <span style="font-size:0.8rem;color:#94a3b8;">Skala UMKM</span>
                            <span style="font-weight:700;color:#34d399;">
                                @if($umkm->jumlah_karyawan <= 4) Mikro
                                @elseif($umkm->jumlah_karyawan <= 19) Kecil
                                @elseif($umkm->jumlah_karyawan <= 99) Menengah
                                @else Besar
                                @endif
                            </span>
                        </div>
                    </div>
                    <div style="padding:14px 20px;">
                        <div class="d-flex justify-content-between align-items-center">
                            <span style="font-size:0.8rem;color:#94a3b8;">Kategori</span>
                            <span class="badge-jenis" style="font-size:0.72rem;">{{ $umkm->jenis_usaha }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Actions --}}
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('umkm.edit', $umkm) }}" class="btn btn-primary w-100 mb-2" id="btn-edit-sidebar">
                        <i class="bi bi-pencil me-2"></i>Edit Data
                    </a>
                    <a href="{{ route('umkm.index') }}" class="btn btn-outline-primary w-100 mb-2" id="btn-kembali-list">
                        <i class="bi bi-list-ul me-2"></i>Kembali ke Daftar
                    </a>
                    <button
                        class="btn btn-outline-danger w-100"
                        id="btn-hapus-sidebar"
                        data-bs-toggle="modal"
                        data-bs-target="#deleteModal"
                        data-id="{{ $umkm->id }}"
                        data-name="{{ $umkm->nama_usaha }}"
                    >
                        <i class="bi bi-trash me-2"></i>Hapus Data
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection
