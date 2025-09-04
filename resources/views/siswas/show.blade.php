<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body text-center">
                        @if($siswa->foto)
                                        <img src="{{ asset('storage/siswas/' . $siswa->foto) }}" 
                                         alt="Foto {{ $siswa->nama }}" 
                                         class="rounded" style="width: 150px">
                        @else
                            <img src="https://via.placeholder.com/300x300?text=No+Image" 
                                 class="rounded img-fluid" 
                                 alt="No Image">
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h3 class="mb-3">{{ $siswa->nama }}</h3>
                        <table class="table table-striped">
                            <tr>
                                <th>NIS</th>
                                <td>{{ $siswa->nis }}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{ $siswa->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $siswa->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Kontak</th>
                                <td>{{ $siswa->kontak }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $siswa->email }}</td>
                            </tr>
                            <tr>
                                <th>Status Lapor PKL</th>
                                <td>
                                    @if($siswa->status_lapor_pkl)
                                        <span class="badge bg-success">Sudah Lapor</span>
                                    @else
                                        <span class="badge bg-danger">Belum Lapor</span>
                                    @endif
                                </td>
                            </tr>
                        </table>

                        <a href="{{ route('siswas.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                        <a href="{{ route('siswas.edit', $siswa->id) }}" class="btn btn-warning mt-3">Edit</a>
                        <form action="{{ route('siswas.destroy', $siswa->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mt-3" 
                                    onclick="return confirm('Yakin ingin menghapus data siswa ini?')">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
