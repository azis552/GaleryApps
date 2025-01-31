<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $valiation = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'judul' => 'required',
            'deskripsi' => 'required',
            'status' => 'required',
            'album_id' => 'required',
        ]);

        $foto = $request->file('foto');
        $nama_foto = time() . '.' . $foto->getClientOriginalExtension();
        $foto_upload = $foto->move(public_path('/storage/images'), $nama_foto);

        if ($foto_upload) {
            $valiation['foto'] = $nama_foto;
            $valiation['users_id'] = Auth::user()->id;
            $fotoSimpan = Foto::create($valiation);

            if ($fotoSimpan) {
                return redirect()->route('beranda.index')->with('success', 'Foto berhasil ditambahkan');
            } else {
                return redirect()->route('beranda.index')->with('error', 'Foto gagal ditambahkan');
            }
        } else {
            return redirect()->route('beranda.index')->with('error', 'Foto gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
