<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;
use App\Member;
use Validator;

class WelcomeController extends Controller
{

	public function __invoke()
	{
		$film = Film::with('komentar.member')->latest()->take(5)->get();
		$film->loadCount('yangsuka', 'yangtidaksuka');
		return view('welcome', [
			'filmTerbaru'	=> $film,
		]);
	}

	public function masukForm()
	{
		return view('masuk', [
			'is_masuk'	=> true,
			'title'		=> 'Masuk',
		]);
	}

	public function masuk(Request $request)
	{
		$request->validate([
			'email'		=> 'required|email|exists:member',
			'password'	=> 'required',
		]);
		$member = Member::where('email', $request->email)->first();
		if(!\Hash::check($request->password, $member->password)){
			$validator = Validator::make($request->all(), []);
			$validator->errors()->add('password', 'Password tidak sesuai');
			return redirect()->back()->withInput()->withErrors($validator);
		}
		\Auth::guard('member')->login($member);
		return redirect('/');
	}

	public function daftarForm()
	{
		return view('masuk', [
			'is_masuk'	=> false,
			'title'		=> 'Daftar',
		]);
	}

	public function daftar(Request $request)
	{
		$request->validate([
			'nama'				=> 'required',
			'kota_lahir'		=> 'required',
			'tanggal_lahir'		=> 'required|date_format:Y-m-d',
			'alamat'			=> 'required',
			'email'				=> 'required|email|unique:member',
			'password'			=> 'required|string|min:5',
		]);
		$member = Member::create([
			'nama'				=> $request->nama,
			'kota_lahir'		=> $request->kota_lahir,
			'tanggal_lahir'		=> $request->tanggal_lahir,
			'alamat'			=> $request->alamat,
			'email'				=> $request->email,
			'password'			=> bcrypt($request->password),
		]);
		\Auth::guard('member')->login($member);
		return redirect('/');
	}

	public function keluar()
	{
		\Auth::guard('member')->logout();
		return redirect()->back();
	}

}
