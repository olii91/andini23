<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class pengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduan = pengaduan::all();
        return view('pengaduan.index')->with('pengaduan',$pengaduan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengaduan.create');
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
            'Tgl_pengaduan' => ['required', 'string', 'unique:users'],
            'Name' => ['required', 'string', 'max:255'],
            'Isi_laporan' => ['required', 'string', 'Isi_laporan', 'max:255','unique:users'],
            'Tgl_tanggapan'=>['required','numeric'],
            'Tanggapan'=>['required','numeric'],
            'Nama_petugas'=>['required','numeric'],
       ]);
        try{
            $pengaduan = new pengaduan;
            $pengaduan->Tgl_pengaduan = $request->Tgl_pengaduan;
            $pengaduan->Name= $request->Name;
            $pengaduan->Isi_laporan = $request->Isi_laporan;
            $pengaduan->Tgl_tanggapan=$request->Tgl_tanggapan;
            $pengaduan->Tanggapan=$request->Tanggapan;
            $pengaduan->Nama_petugas=$request->telpon;
            $pengaduan->save();
       }
        catch(\Exception $e ){
            return redirect()->back()->withErrors(['Pengaduan gagal disimpan']);
       }
        return redirect('pengaduan')->with('status','Pengaduan Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengaduan =  Pengaduan::find($id);
        return view('pengaduan.edit')->with('pengaduan',$pengaduan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
