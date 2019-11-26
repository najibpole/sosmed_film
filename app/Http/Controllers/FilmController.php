<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;
use App\Komentar;
use App\FilmDisuka;
use App\KategoriFilm;
use App\FilmTidakDisuka;

class FilmController extends Controller
{

	public function list()
	{
		$data = Film::withCount('yangsuka', 'yangtidaksuka')->latest()->paginate(10);
		return view('list-film', [
			'data'		=> $data,
		]);
	}

	public function sukai(Film $film)
	{
		$user_id = \Auth::guard('member')->id();
		FilmDisuka::updateOrCreate([
			'film_id'		=> $film->id,
			'member_id'		=> $user_id
		]);
		FilmTidakDisuka::where('film_id', $film->id)->where('member_id', $user_id)->delete();
		return redirect()->back();
	}

	public function tidaksukai(Film $film)
	{
		$user_id = \Auth::guard('member')->id();
		FilmTidakDisuka::updateOrCreate([
			'film_id'		=> $film->id,
			'member_id'		=> $user_id
		]);
		FilmDisuka::where('film_id', $film->id)->where('member_id', $user_id)->delete();
		return redirect()->back();
	}

	public function detail(Film $film)
	{
		$film->loadCount('yangsuka', 'yangtidaksuka')->load('komentar.member');
		return view('film-detail', [
			'd'		=> $film,
		]);
	}

	public function kirimKomentar(Film $film, Request $request)
	{
		$request->validate([
			'komentar'		=> 'required',
		]);
		Komentar::create([
			'film_id'		=> $film->id,
			'isi'			=> $request->komentar,
			'member_id'		=> \Auth::guard('member')->id(),
		]);
		return redirect()->back();
	}

	public function pencarian(Request $request)
	{
		$keyword = $request->query('keyword');
		$data = Film::withCount('yangsuka', 'yangtidaksuka')->where('nama', 'LIKE', '%'.$keyword.'%')->orWhere('deskripsi', 'LIKE', '%'.$keyword.'%')->latest()->paginate(10);
		return view('cari-film', [
			'data'		=> $data,
			'keyword'	=> $keyword,
		]);
	}

	public function kategori(KategoriFilm $kategori)
	{
		$data = Film::withCount('yangsuka', 'yangtidaksuka')->where('kategori_film_id', $kategori->id)->latest()->paginate(10);
		return view('list-film', [
			'data'		=> $data,
		]);
	}

}
