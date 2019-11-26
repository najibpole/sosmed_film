<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\KategoriFilm;
use Illuminate\Http\Request;

class KategoriFilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = KategoriFilm::all();
        return view('admin.kategori-film.index', [
            'active'        => 'kategori-film.index',
            'title'         => 'Kategori Film',
            'data'          => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori-film.tambah', [
            'active'        => 'kategori-film.index',
            'title'         => 'Tambah Kategori Film',
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
        KategoriFilm::create([
            'nama'      => $request->nama_kategori_film,
        ]);
        return redirect()->back()->with('success_msg', 'Kategori Film berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KategoriFilm  $kategoriFilm
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriFilm $kategoriFilm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KategoriFilm  $kategoriFilm
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriFilm $kategoriFilm)
    {
        return view('admin.kategori-film.ubah', [
            'active'        => 'kategori-film.index',
            'title'         => 'Ubah Kategori Film',
            'd'             => $kategoriFilm,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KategoriFilm  $kategoriFilm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KategoriFilm $kategoriFilm)
    {
        $request->validate([
            'nama_kategori_film'        => 'required',
        ]);
        $kategoriFilm->update([
            'nama'      => $request->nama_kategori_film,
        ]);
        return redirect()->back()->with('success_msg', 'Kategori Film berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KategoriFilm  $kategoriFilm
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriFilm $kategoriFilm)
    {
        $kategoriFilm->delete();
        return redirect()->back()->with('success_msg', 'Kategori Film berhasil dihapus');
    }
}
