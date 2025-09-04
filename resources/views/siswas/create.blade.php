<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Siswa - Aplikasi PKL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('siswas.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Foto</label>
                                <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto">
                                @error('foto')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama Lengkap">
                                @error('nama')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">NIS</label>
                                <input type="text" class="form-control @error('nis') is-invalid @enderror" name="nis" value="{{ old('nis') }}" placeholder="Masukkan NIS">
                                @error('nis')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Gender</label>
                                <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                    <option value="">-- Pilih Gender --</option>
                                    <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('gender')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Alamat</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="3" placeholder="Masukkan Alamat">{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Kontak</label>
                                <input type="text" class="form-control @error('kontak') is-invalid @enderror" name="kontak" value="{{ old('kontak') }}" placeholder="Masukkan Nomor HP">
                                @error('kontak')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukkan Email">
                                @error('email')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">Status Lapor PKL</label>
                                <select name="status_lapor_pkl" class="form-control @error('status_lapor_pkl') is-invalid @enderror">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="1" {{ old('status_lapor_pkl') == '1' ? 'selected' : '' }}>Sudah</option>
                                    <option value="0" {{ old('status_lapor_pkl') == '0' ? 'selected' : '' }}>Belum</option>
                                </select>
                                @error('status_lapor_pkl')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
