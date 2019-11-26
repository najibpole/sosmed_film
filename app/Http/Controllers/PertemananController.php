<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
use App\Pertemanan;

class PertemananController extends Controller
{

	public function tambah(Member $member)
	{
		Pertemanan::create([
			'member_id'		=> \Auth::guard('member')->id(),
			'teman_id'		=> $member->id,
		]);
		return redirect()->route('meminta-pertemanan');
	}

	public function memintaPertemanan()
	{
		$data = Pertemanan::with('teman')->where('status', 'pending')->where('member_id', \Auth::guard('member')->id())->latest()->get();
		return view('meminta-pertemanan', [
			'data'			=> $data,
		]);
	}

	public function batalPertemanan(Member $teman)
	{
		$p = Pertemanan::where('member_id', \Auth::guard('member')->id())->where('teman_id', $teman->id)->first();
		if(is_null($p))
			abort(404);
		$p->delete();
		return redirect()->back();
	}

	public function permintaanPertemanan()
	{
		$data = Pertemanan::with('member')->where('status', 'pending')->where('teman_id', \Auth::guard('member')->id())->latest()->get();
		return view('permintaan-pertemanan', [
			'data'			=> $data,
		]);
	}

	public function tolakPertemanan(Member $teman)
	{
		$p = Pertemanan::where('teman_id', \Auth::guard('member')->id())->where('member_id', $teman->id)->first();
		if(is_null($p))
			abort(404);
		$p->delete();
		return redirect()->back();
	}

	public function terimaPertemanan(Member $teman)
	{
		$p = Pertemanan::where('teman_id', \Auth::guard('member')->id())->where('member_id', $teman->id)->first();
		if(is_null($p))
			abort(404);
		$p->update([
			'status'	=> 'terima',
		]);
		return redirect()->route('pertemanan');
	}

	public function daftarTeman()
	{
		$data = Pertemanan::with('teman', 'member')->where('status', 'terima')->where(function($q){
			$q->where('member_id', \Auth::guard('member')->id())
			->orWhere('teman_id', \Auth::guard('member')->id());
		})->latest()->get();
		if($data->count() > 0){
			$data->transform(function($item){
				if($item->teman_id == \Auth::guard('member')->id()){
					$item->nama_teman = $item->member->nama;
					$item->kota_lahir = $item->member->kota_lahir;
				}
				else{
					$item->nama_teman = $item->teman->nama;
					$item->kota_lahir = $item->teman->kota_lahir;
				}
				return $item;
			});
		}
		return view('daftar-teman', [
			'data'			=> $data,
		]);
	}

}
