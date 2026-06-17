@extends('layouts.app')

@section('title', 'Data UMKM')
@section('page-title', 'Data UMKM')
@section('page-subtitle', 'Kelola seluruh data UMKM terdaftar')

@section('content')

    {{-- Header --}}
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <div>
            <h4 class="section-title">Daftar UMKM</h4>
            <p class="section-subtitle">Total {{ $umkm->total() }} data ditemukan</p>
        </div>
        <a href="{{ route('umkm.create') }}" class="btn btn-primary" id="btn-tambah-umkm">
            <i class="bi bi-plus-lg me-2"></i>Tambah UMKM
        </a>
    </div>

    {{-- Search & Filter --}}
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('umkm.index') }}" method="GET" id="form-search">
                <div class="row g-3 align-items-end">
                    <div class="col-md-8">
                        <label class="form-label">Cari Data</label>
                        <div class="search-wrapper">
                            <i class="bi bi-search"></i>
                            <input
                                type="text"
                                name="search"
                                class="form-control"
                                placeholder="Cari nama usaha, pemilik, atau jenis usaha..."
                                value="{{ request('search') }}"
                                id="input-search"
                            >
                        </div>
                    </div>
                    <div class="col-md-4 d-flex gap-2">
                        <button type="submit" class="btn btn-primary flex-fill" id="btn-search">
                            <i class="bi bi-search me-1"></i> Cari
                        </button>
                        @if(request('search'))
                            <a href="{{ route('umkm.index') }}" class="btn btn-outline-secondary" id="btn-reset">
                                <i class="bi bi-x-lg"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Table --}}
    <div class="card">
        <div class="card-body p-0">
            @if($umkm->count() > 0)
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th width="50">No</th>
                                <th>Nama Usaha</th>
                                <th>Pemilik</th>
                                <th>Jenis Usaha</th>
                                <th>No. Telepon</th>
                                <th>Tahun Berdiri</th>
                                <th>Karyawan</th>
                                <th width="130">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($umkm as $index => $item)
                            <tr>
                                <td style="color:#94a3b8;">
                                    {{ $umkm->firstItem() + $index }}
                                </td>
                                <td>
                                    <div style="font-weight:400;color:black;">{{ $item->nama_usaha }}</div>
                                </td>
                                <td>{{ $item->nama_pemilik }}</td>
                                <td><span class="badge-jenis">{{ $item->jenis_usaha }}</span></td>
                                <td>
                                    <i class="bi bi-telephone me-1" style="color:#94a3b8;"></i>
                                    {{ $item->nomor_telepon }}
                                </td>
                                <td>{{ $item->tahun_berdiri }}</td>
                                <td>
                                    <span style="font-weight:600;color:#34d399;">{{ number_format($item->jumlah_karyawan) }}</span>
                                    <span style="font-size:0.75rem;color:#94a3b8;"> org</span>
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('umkm.show', $item) }}" class="btn btn-action btn-view" title="Lihat Detail" id="btn-show-{{ $item->id }}">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('umkm.edit', $item) }}" class="btn btn-action btn-edit" title="Edit" id="btn-edit-{{ $item->id }}">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <button
                                            class="btn btn-action btn-delete"
                                            title="Hapus"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteModal"
                                            data-id="{{ $item->id }}"
                                            data-name="{{ $item->nama_usaha }}"
                                            id="btn-delete-{{ $item->id }}"
                                        >
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if($umkm->hasPages())
                <div class="d-flex align-items-center justify-content-between px-4 py-3" style="border-top:1px solid rgba(255,255,255,0.08);">
                    <small style="color:#94a3b8;">
                        Menampilkan {{ $umkm->firstItem() }}–{{ $umkm->lastItem() }} dari {{ $umkm->total() }} data
                    </small>
                    {{ $umkm->links() }}
                </div>
                @endif

            @else
                <div class="empty-state">
                    <div class="empty-state-icon"><i class="bi bi-building-slash"></i></div>
                    @if(request('search'))
                        <h6 style="color:#cbd5e1;">Tidak ada hasil untuk "<strong>{{ request('search') }}</strong>"</h6>
                        <p style="color:#94a3b8;font-size:0.83rem;">Coba kata kunci yang berbeda.</p>
                        <a href="{{ route('umkm.index') }}" class="btn btn-outline-primary btn-sm mt-2">Reset Pencarian</a>
                    @else
                        <h6 style="color:#cbd5e1;">Belum ada data UMKM</h6>
                        <p style="color:#94a3b8;font-size:0.83rem;">Mulai tambahkan data UMKM pertama Anda.</p>
                        <a href="{{ route('umkm.create') }}" class="btn btn-primary btn-sm mt-2">
                            <i class="bi bi-plus me-1"></i>Tambah UMKM
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>

@endsection

@push('styles')
<style>
    .pagination {
        margin-bottom: 0;
    }
</style>
@endpush
