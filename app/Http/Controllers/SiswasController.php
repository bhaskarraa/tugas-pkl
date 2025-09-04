<?php

namespace App\Http\Controllers;

use App\Models\Siswa; 
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class SiswasController extends Controller
{
    /**
     * index
     */
    public function index(): View
    {
        $siswas = Siswa::latest()->paginate(10);
        return view('siswas.index', compact('siswas'));
    }

    /**
     * create
     */
    public function create(): View
    {
        return view('siswas.create');
    }

    /**
     * store
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama'              => 'required|string|max:100',
            'nis'               => 'required|string|max:20|unique:siswas',
            'gender'            => 'required|in:L,P',
            'alamat'            => 'required|string|max:255',
            'kontak'            => 'required|string|max:20',
            'email'             => 'required|email|unique:siswas',
            'foto'              => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'status_lapor_pkl'  => 'required|boolean'
        ]);

        $fotoName = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $foto->storeAs('siswas', $foto->hashName(), 'public'); // simpan di /storage/app/public/siswas
            $fotoName = $foto->hashName();
        }

        Siswa::create([
            'nama'              => $request->nama,
            'nis'               => $request->nis,
            'gender'            => $request->gender,
            'alamat'            => $request->alamat,
            'kontak'            => $request->kontak,
            'email'             => $request->email,
            'foto'              => $fotoName,
            'status_lapor_pkl'  => $request->status_lapor_pkl,
        ]);

        return redirect()->route('siswas.index')->with(['success' => 'Data Siswa Berhasil Disimpan!']);
    }

    /**
     * show
     */
    public function show(Siswa $siswa): View
    {
        return view('siswas.show', compact('siswa'));
    }

    /**
     * edit
     */
    public function edit(Siswa $siswa): View
    {
        return view('siswas.edit', compact('siswa'));
    }

    /**
     * update
     */
    public function update(Request $request, Siswa $siswa): RedirectResponse
    {
        $request->validate([
            'nama'              => 'required|string|max:100',
            'nis'               => 'required|string|max:20|unique:siswas,nis,' . $siswa->id,
            'gender'            => 'required|in:L,P',
            'alamat'            => 'required|string|max:255',
            'kontak'            => 'required|string|max:20',
            'email'             => 'required|email|unique:siswas,email,' . $siswa->id,
            'foto'              => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'status_lapor_pkl'  => 'required|boolean'
        ]);

        $fotoName = $siswa->foto; // default tetap foto lama

        if ($request->hasFile('foto')) {
            // hapus foto lama
            if ($siswa->foto && Storage::disk('public')->exists('siswas/' . $siswa->foto)) {
                Storage::disk('public')->delete('siswas/' . $siswa->foto);
            }
            $foto = $request->file('foto');
            $foto->storeAs('siswas', $foto->hashName(), 'public'); 
            $fotoName = $foto->hashName();
        }

        $siswa->update([
            'nama'              => $request->nama,
            'nis'               => $request->nis,
            'gender'            => $request->gender,
            'alamat'            => $request->alamat,
            'kontak'            => $request->kontak,
            'email'             => $request->email,
            'status_lapor_pkl'  => $request->status_lapor_pkl,
            'foto'              => $fotoName
        ]);

        return redirect()->route('siswas.index')->with(['success' => 'Data Siswa Berhasil Diupdate!']);
    }

    /**
     * destroy
     */
    public function destroy(Siswa $siswa): RedirectResponse
    {
        if ($siswa->foto && Storage::disk('public')->exists('siswas/' . $siswa->foto)) {
            Storage::disk('public')->delete('siswas/' . $siswa->foto);
        }

        $siswa->delete();

        return redirect()->route('siswas.index')->with(['success' => 'Data Siswa Berhasil Dihapus!']);
    }
}
