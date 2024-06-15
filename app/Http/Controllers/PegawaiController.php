<?php

namespace App\Http\Controllers;

use App\Http\Requests\PegawaiStoreRequest;
use App\Http\Requests\PegawaiUpdateRequest;
use App\Models\Jabatan;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('pegawai', compact('pegawai'));
    }

    public function show(int $id)
    {
        return Pegawai::where('id', $id)->first();
    }

    public function store(PegawaiStoreRequest $request)
    {
        Pegawai::insert($request->except('_token'));
        return redirect()->route('index');
    }

    public function destroy($id)
    {
        Pegawai::where('id', $id)->delete();
        return redirect()->route('index');
    }

    public function update(PegawaiUpdateRequest $request)
    {
        Pegawai::where('id', $request->id)->update($request->except('_token', '_method', 'id'));
        return redirect()->route('index');
    }

    public function list_jabatan()
    {
        return Jabatan::all();
    }
}
