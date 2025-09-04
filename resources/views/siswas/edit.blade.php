<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Siswa - SantriKoding.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('siswas.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- FOTO -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">FOTO</label>
                                <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto">
                                @if($siswa->foto)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/siswas/' . $siswa->foto) }}" 
                                         alt="Foto {{ $siswa->nama }}" 
                                         class="rounded" style="width: 150px">
                                    </div>
                                @endif
                                @error('foto')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- NAMA -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">NAMA</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                                       name="nama" value="{{ old('nama', $siswa->nama) }}" placeholder="Masukkan Nama Siswa">
                                @error('nama')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- NIS -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">NIS</label>
                                <input type="text" class="form-control @error('nis') is-invalid @enderror" 
                                       name="nis" value="{{ old('nis', $siswa->nis) }}" placeholder="Masukkan NIS">
                                @error('nis')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- GENDER -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">GENDER</label>
                                <select class="form-control @error('gender') is-invalid @enderror" name="gender">
                                    <option value="L" {{ old('gender', $siswa->gender) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ old('gender', $siswa->gender) == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('gender')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- ALAMAT -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">ALAMAT</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" 
                                          name="alamat" rows="3" placeholder="Masukkan Alamat">{{ old('alamat', $siswa->alamat) }}</textarea>
                                @error('alamat')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- KONTAK -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">KONTAK</label>
                                <input type="text" class="form-control @error('kontak') is-invalid @enderror" 
                                       name="kontak" value="{{ old('kontak', $siswa->kontak) }}" placeholder="Masukkan Nomor Kontak">
                                @error('kontak')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- EMAIL -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">EMAIL</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       name="email" value="{{ old('email', $siswa->email) }}" placeholder="Masukkan Email">
                                @error('email')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- STATUS LAPOR PKL -->
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">STATUS LAPOR PKL</label>
                                <select class="form-control @error('status_lapor_pkl') is-invalid @enderror" name="status_lapor_pkl">
                                    <option value="1" {{ old('status_lapor_pkl', $siswa->status_lapor_pkl) == 1 ? 'selected' : '' }}>Sudah Lapor</option>
                                    <option value="0" {{ old('status_lapor_pkl', $siswa->status_lapor_pkl) == 0 ? 'selected' : '' }}>Belum Lapor</option>
                                </select>
                                @error('status_lapor_pkl')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">UPDATE</button>
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
