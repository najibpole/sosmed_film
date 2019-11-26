<?php

namespace App\Http\Controllers\Admin;

use App\Member;
use App\KategoriMember;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Member::all();
        return view('admin.member.index', [
            'active'        => 'member.index',
            'title'         => 'Member',
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
        return view('admin.member.tambah', [
            'active'        => 'member.index',
            'title'         => 'Tambah Member',
            'kategori'      => KategoriMember::orderBy('nama')->get(),
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
            $gambar = $gambar->store('public/member');
        }
        Member::create([
            'nama'                  => $request->nama,
            'author'                => $request->author,
            'tahun'                 => $request->tahun,
            'gambar'                => $gambar,
            'deskripsi'             => $request->deskripsi,
            'kategori_member_id'      => $request->kategori,
        ]);
        return redirect()->back()->with('success_msg', 'Member berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('admin.member.ubah', [
            'active'        => 'member.index',
            'title'         => 'Ubah Member',
            'd'             => $member,
            'kategori'      => KategoriMember::orderBy('nama')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
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
            'kategori_member_id'      => $request->kategori,
        ];
        if($gambar){
            $gambar = $gambar->store('public/member');
            $data['gambar'] = $gambar;
        }
        $member->update($data);
        return redirect()->back()->with('success_msg', 'Member berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        if(file_exists(storage_path('app\\'.$member->gambar))){
            \Storage::delete($member->gambar);
        }
        $member->delete();
        return redirect()->back()->with('success_msg', 'Member berhasil dihapus');
    }
}
