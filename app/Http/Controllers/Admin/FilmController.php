<?php

namespace App\Http\Controllers\Admin;

use App\Film;
use App\KategoriFilm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Film::all();
        return view('admin.film.index', [
            'active'        => 'film.index',
            'title'         => 'Film',
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
        return view('admin.film.tambah', [
            'active'        => 'film.index',
            'title'         => 'Tambah Film',
            'kategori'      => KategoriFilm::orderBy('nama')->get(),
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
            'nama'                  => 'required',
            'author'                => 'required',
            'tahun'                 => 'required|numeric|min:1800|date_format:Y',
            'gambar'                => 'required|filled|mimes:jpeg,png',
            'deskripsi'             => 'required',
            'kategori'              => 'required|numeric|min:1',
        ]);
        $gambar = $request->file('gambar');
        if($gambar){
            $gambar = $gambar->store('public/film');
        }
        Film::create([
            'nama'                  => $request->nama,
            'author'                => $request->author,
            'tahun'                 => $request->tahun,
            'gambar'                => $gambar,
            'deskripsi'             => $request->deskripsi,
            'kategori_film_id'      => $request->kategori,
        ]);
        return redirect()->back()->with('success_msg', 'Film berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        return view('admin.film.ubah', [
            'active'        => 'film.index',
            'title'         => 'Ubah Film',
            'd'             => $film,
            'kategori'      => KategoriFilm::orderBy('nama')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
        $request->validate([
            'nama'                  => 'required',
            'author'                => 'required',
            'tahun'                 => 'required|numeric|min:1800|date_format:Y',
            'gambar'                => 'nullable|mimes:jpeg,png',
            'deskripsi'             => 'required',
            'kategori'              => 'required|numeric|min:1',
        ]);
        $gambar = $request->file('gambar');
        $data = [
            'nama'                  => $request->nama,
            'author'                => $request->author,
            'tahun'                 => $request->tahun,
            'deskripsi'             => $request->deskripsi,
            'kategori_film_id'      => $request->kategori,
        ];
        if($gambar){
            $gambar = $gambar->store('public/film');
            $data['gambar'] = $gambar;
        }
        $film->update($data);
        return redirect()->back()->with('success_msg', 'Film berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        if(file_exists(storage_path('app\\'.$film->gambar))){
            \Storage::delete($film->gambar);
        }
        $film->delete();
        return redirect()->back()->with('success_msg', 'Film berhasil dihapus');
    }
}
