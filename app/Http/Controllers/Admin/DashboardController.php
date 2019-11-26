<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\KategoriFilm;
use App\Film;
use App\Member;
use App\Komentar;

class DashboardController extends Controller
{

	public function __invoke()
	{
		$memberBaru = Member::take(5)->latest()->get();
		$komentarBaru = Komentar::with('member')->take(5)->latest()->get();
		return view('admin.dashboard.index', [
			'active'		=> 'dashboard',
			'title'			=> 'Dashboard',
			'memberBaru'	=> $memberBaru,
			'komentarBaru'	=> $komentarBaru,
			'kategoriFilm'	=> KategoriFilm::count(),
			'film'			=> Film::count(),
			'member'		=> Member::count(),
			'komentar'		=> Komentar::count(),
		]);
	}

	public function profil()
	{
		return view('admin.profil', [
			'title'		=> 'Profil',
			'active'	=> '',
		]);
	}

	public function updateProfil(Request $request)
	{
		$request->validate([
			'email'			=> 'required|unique:users,email,'.\Auth::id(),
			'password'		=> 'nullable|min:5',
			'nama'			=> 'required',
		]);
		$data = [
			'nama'		=> $request->nama,
			'email'		=> $request->email,
		];
		if($request->password){
			$data['password'] = bcrypt($request->password);
		}
		\Auth::user()->update($data);
		return redirect()->back()->with('success_msg', 'Profil berhasil diperbarui');
	}

}
