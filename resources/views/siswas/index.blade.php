<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa - SantriKoding.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3 class="text-center my-4">Data Siswa PKL</h3>
                <hr>
            </div>
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <a href="{{ route('siswas.create') }}" class="btn btn-md btn-success mb-3">TAMBAH SISWA</a>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">FOTO</th>
                            <th scope="col">NAMA</th>
                            <th scope="col">NIS</th>
                            <th scope="col">STATUS LAPOR PKL</th>
                            <th scope="col" style="width: 20%">AKSI</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($siswas as $item)
                            <tr>
                                <td class="text-center">
                                    @if ($item->foto)
                                        <img src="{{ asset('storage/siswas/' . $item->foto) }}" 
                                         alt="Foto {{ $item->nama }}" 
                                         class="rounded" style="width: 150px">
                                @else
                                 <span class="text-muted">Tidak ada foto</span>
                                @endif
                                </td>

                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->nis }}</td>
                                <td>
                                    @if($item->status_lapor_pkl)
                                        <span class="badge bg-success">Sudah Lapor</span>
                                    @else
                                        <span class="badge bg-danger">Belum Lapor</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');" 
                                          action="{{ route('siswas.destroy', $item->id) }}" method="POST">
                                        <a href="{{ route('siswas.show', $item->id) }}" class="btn btn-sm btn-dark">DETAIL</a>
                                        <a href="{{ route('siswas.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">
                                    <div class="alert alert-danger mb-0">
                                        Data siswa belum ada.
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $siswas->links() }}
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    //message with sweetalert
    @if(session('success'))
    Swal.fire({
        icon: "success",
        title: "BERHASIL",
        text: "{{ session('success') }}",
        showConfirmButton: false,
        timer: 2000
    });
    @elseif(session('error'))
    Swal.fire({
        icon: "error",
        title: "GAGAL!",
        text: "{{ session('error') }}",
        showConfirmButton: false,
        timer: 2000
    });
    @endif
</script>

</body>
</html>
