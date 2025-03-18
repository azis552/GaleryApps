<?php

namespace App\Http\Controllers;

use App\Models\AlbumFoto;
use Barryvdh\DomPDF\Facade\Pdf; // Pastikan ini sudah diimpor
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $album = AlbumFoto::where('users_id', Auth::user()->id)->get();
        return view('album', compact('album'));
    }

    public function download()
    {
        $album = AlbumFoto::where('users_id', Auth::user()->id)->get();

        $pdf = Pdf::loadView('albumdownload', compact('album')); // Panggil facade dengan benar
        
        return $pdf->download('album-fotos-' . date('Y-m-d') . '-'.Auth::user()->name.' .pdf');
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
        $validation = $request->validate([
            'album' => 'required',
            'deskripsi' => 'required',
        ]);
        $validation['users_id'] = Auth::user()->id;
        $album = AlbumFoto::create($validation);

        if ($album) {
            $url_sebelumnya = url()->previous();

            if(Str::contains($url_sebelumnya,'profile')) {
                return redirect()->route('profile')->with('success', 'Album berhasil ditambahkan');
            }else{
                return redirect()->route('beranda.index')->with('success', 'Album berhasil ditambahkan');
            }
        }else{
            return redirect()->route('beranda.index')->with('error', 'Album gagal ditambahkan');
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
