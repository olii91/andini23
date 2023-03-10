<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class masyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masyarakat = masyarakat::all();
        return view('masyarakat.index')->with('masyarakat',$masyarakat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masyarakat.create');
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
            'nik' => ['required', 'unique:masyarakats', 'numeric'],
            'name' => ['required'],
            'username' => ['required','unique:masyarakat'],
            'password' => ['required'],
            'tlpn' => ['required', 'numeric'],
            'level' => ['required','string'],
        ]);

        try {
            $masyarakat = new Masyarakat();
            $masyarakat->nik = $request->nik;
            $masyarakat->name = $request->name;
            $masyarakat->username = $request->username;
            $masyarakat->password = Hash::make($request->password);
            $masyarakat->tlpn = $request->tlpn;
            $user->level= $request->level;
            $user->save();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['Data Masyarakat gagal disimpan'])->withInput();
        }
        return redirect('masyarakat')->with('status', 'Data Masyarakat berhasil di simpan.');
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
        $masyarakat =  Masyarakat::find($id);
        return view('masyarakat.edit')->with('masyarakat',$masyarakat);
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
