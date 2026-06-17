@extends('layouts.app')

@section('title', 'Tambah UMKM')
@section('page-title', 'Tambah UMKM')
@section('page-subtitle', 'Daftarkan data UMKM baru')

@section('content')

    <div class="d-flex align-items-center gap-3 mb-4">
        <a href="{{ route('umkm.index') }}" class="btn btn-action btn-view" title="Kembali" id="btn-back">
            <i class="bi bi-arrow-left"></i>
        </a>
        <div>
            <h4 class="section-title">Tambah Data UMKM</h4>
            <p class="section-subtitle">Isi formulir berikut untuk mendaftarkan UMKM baru</p>
        </div>
    </div>

    <form action="{{ route('umkm.store') }}" method="POST" id="form-tambah-umkm">
        @csrf

        <div class="row g-4">
            {{-- Informasi Usaha --}}
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="mb-0" style="color:white;font-weight:700;">
                            <i class="bi bi-building me-2 text-primary"></i>Informasi Usaha
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nama_usaha" class="form-label">Nama Usaha <span class="text-danger">*</span></label>
                                <input
                                    type="text"
                                    class="form-control @error('nama_usaha') is-invalid @enderror"
                                    id="nama_usaha"
                                    name="nama_usaha"
                                    value="{{ old('nama_usaha') }}"
                                    placeholder="Contoh: Warung Makan Sederhana"
                                    required
                                >
                                @error('nama_usaha')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="jenis_usaha" class="form-label">Jenis Usaha <span class="text-danger">*</span></label>
                                <select
                                    class="form-select @error('jenis_usaha') is-invalid @enderror"
                                    id="jenis_usaha"
                                    name="jenis_usaha"
                                    required
                                >
                                    <option value="" disabled {{ old('jenis_usaha') ? '' : 'selected' }}>-- Pilih Jenis Usaha --</option>
                                    @foreach(['Kuliner', 'Fashion', 'Kerajinan', 'Pertanian', 'Peternakan', 'Perdagangan', 'Jasa', 'Teknologi', 'Pendidikan', 'Kesehatan', 'Otomotif', 'Lainnya'] as $jenis)
                                        <option value="{{ $jenis }}" {{ old('jenis_usaha') == $jenis ? 'selected' : '' }}>{{ $jenis }}</option>
                                    @endforeach
                                </select>
                                @error('jenis_usaha')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="tahun_berdiri" class="form-label">Tahun Berdiri <span class="text-danger">*</span></label>
                                <input
                                    type="number"
                                    class="form-control @error('tahun_berdiri') is-invalid @enderror"
                                    id="tahun_berdiri"
                                    name="tahun_berdiri"
                                    value="{{ old('tahun_berdiri') }}"
                                    placeholder="Contoh: 2015"
                                    min="1900"
                                    max="{{ date('Y') }}"
                                    required
                                >
                                @error('tahun_berdiri')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="jumlah_karyawan" class="form-label">Jumlah Karyawan <span class="text-danger">*</span></label>
                                <input
                                    type="number"
                                    class="form-control @error('jumlah_karyawan') is-invalid @enderror"
                                    id="jumlah_karyawan"
                                    name="jumlah_karyawan"
                                    value="{{ old('jumlah_karyawan') }}"
                                    placeholder="Contoh: 5"
                                    min="1"
                                    required
                                >
                                @error('jumlah_karyawan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="alamat" class="form-label">Alamat Usaha <span class="text-danger">*</span></label>
                                <textarea
                                    class="form-control @error('alamat') is-invalid @enderror"
                                    id="alamat"
                                    name="alamat"
                                    rows="3"
                                    placeholder="Masukkan alamat lengkap usaha..."
                                    required
                                >{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="deskripsi_usaha" class="form-label">Deskripsi Usaha</label>
                                <textarea
                                    class="form-control @error('deskripsi_usaha') is-invalid @enderror"
                                    id="deskripsi_usaha"
                                    name="deskripsi_usaha"
                                    rows="4"
                                    placeholder="Deskripsikan usaha Anda (produk, layanan, keunggulan, dll)..."
                                >{{ old('deskripsi_usaha') }}</textarea>
                                @error('deskripsi_usaha')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Informasi Pemilik + Submit --}}
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="mb-0" style="color:white;font-weight:700;">
                            <i class="bi bi-person me-2 text-success"></i>Informasi Pemilik
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="nama_pemilik" class="form-label">Nama Pemilik <span class="text-danger">*</span></label>
                                <input
                                    type="text"
                                    class="form-control @error('nama_pemilik') is-invalid @enderror"
                                    id="nama_pemilik"
                                    name="nama_pemilik"
                                    value="{{ old('nama_pemilik') }}"
                                    placeholder="Nama lengkap pemilik"
                                    required
                                >
                                @error('nama_pemilik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="nomor_telepon" class="form-label">Nomor Telepon <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background:rgba(255,255,255,0.05);border-color:rgba(255,255,255,0.12);color:#94a3b8;">
                                        <i class="bi bi-telephone"></i>
                                    </span>
                                    <input
                                        type="text"
                                        class="form-control @error('nomor_telepon') is-invalid @enderror"
                                        id="nomor_telepon"
                                        name="nomor_telepon"
                                        value="{{ old('nomor_telepon') }}"
                                        placeholder="08xxxxxxxxxx"
                                        required
                                    >
                                    @error('nomor_telepon')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text" style="background:rgba(255,255,255,0.05);border-color:rgba(255,255,255,0.12);color:#94a3b8;">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <input
                                        type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        id="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        placeholder="contoh@email.com"
                                        required
                                    >
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="card">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary w-100 mb-2" id="btn-simpan">
                            <i class="bi bi-check-lg me-2"></i>Simpan Data
                        </button>
                        <a href="{{ route('umkm.index') }}" class="btn btn-outline-secondary w-100" id="btn-batal">
                            <i class="bi bi-x-lg me-2"></i>Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@push('scripts')
<script>
    // Only allow numbers in phone field
    document.getElementById('nomor_telepon').addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
</script>
@endpush
