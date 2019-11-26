<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Komentar;
use App\Film;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $film_id = $request->query('film');
        $film = Film::orderBy('nama')->get();
        $data = [];
        if($film_id){
            $data = Komentar::where('film_id', $film_id)->latest()->get();
        }
        return view('admin.komentar.index', [
            'active'        => 'komentar.index',
            'title'         => 'Komentar',
            'data'          => $data,
            'film'          => $film,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.komentar.tambah', [
            'active'        => 'komentar.index',
            'title'         => 'Tambah Komentar',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori_film'        => 'required',
        ]);
        Komentar::create([
            'nama'      => $request->nama_kategori_film,
        ]);
        return redirect()->back()->with('success_msg', 'Komentar berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function show(Komentar $komentar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function edit(Komentar $komentar)
    {
        return view('admin.komentar.ubah', [
            'active'        => 'komentar.index',
            'title'         => 'Ubah Komentar',
            'd'             => $komentar,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Komentar $komentar)
    {
        $request->validate([
            'nama_kategori_film'        => 'required',
        ]);
        $komentar->update([
            'nama'      => $request->nama_kategori_film,
        ]);
        return redirect()->back()->with('success_msg', 'Komentar berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Komentar $komentar)
    {
        $komentar->delete();
        return redirect()->back()->with('success_msg', 'Komentar berhasil dihapus');
    }
}
