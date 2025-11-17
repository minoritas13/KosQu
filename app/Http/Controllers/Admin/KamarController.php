<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kamar;
use Illuminate\Support\Facades\Auth;

class KamarController extends Controller
{
    public function index()
    {
        $kamars = Kamar::latest()->get();
        return view('admin.kamar.index', compact('kamars'));
    }

    public function create()
    {
        return view('admin.kamar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_kamar' => 'required|string|unique:kamar,nomor_kamar',
            'tipe_kamar' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'status' => 'required|in:tersedia,terisi,perbaikan',
            'deskripsi' => 'nullable|string',
        ]);

        Kamar::create([
            'id' => \Str::uuid(),
            'admin_id' => Auth::id(),
            'nomor_kamar' => $request->nomor_kamar,
            'tipe_kamar' => $request->tipe_kamar,
            'harga' => $request->harga,
            'status' => $request->status,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.kamar.index')
            ->with('success', 'Kamar berhasil ditambahkan!');
    }

    public function edit(Kamar $kamar)
    {
        return view('admin.kamar.edit', compact('kamar'));
    }

    public function update(Request $request, Kamar $kamar)
    {
        $request->validate([
            'nomor_kamar' => 'required|string|unique:kamar,nomor_kamar,' . $kamar->id,
            'tipe_kamar' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'status' => 'required|in:tersedia,terisi,perbaikan',
            'deskripsi' => 'nullable|string',
        ]);

        $kamar->update([
            'nomor_kamar' => $request->nomor_kamar,
            'tipe_kamar' => $request->tipe_kamar,
            'harga' => $request->harga,
            'status' => $request->status,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.kamar.index')
            ->with('success', 'Kamar berhasil diupdate!');
    }

    public function destroy(Kamar $kamar)
    {
        $kamar->delete();
        return redirect()->route('admin.kamar.index')
            ->with('success', 'Kamar berhasil dihapus!');
    }
}
