<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = Mahasiswa::all();
        return response([
            'status' => true,
            'message' => 'Data mahasiswa',
            'data' => $data,
        ]);
    }
    public function store(Request $request)
    {
        $data = Mahasiswa::create($request->all());
        return response(['status' => true, 'message' => 'Create mahasiswa', 'data' => $data]);
    }
    public function show($id)
    {
        $data = Mahasiswa::find($id);
        return response([
            'status' => true,
            'message' => 'Detail mahasiswa',
            'data' => $data,
        ]);
    }
    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->update($request->all());
        return response(['status' => true, 'message' => 'Update berhasil', 'data' => $mahasiswa]);
    }
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();
        return response(['status' => true, 'message' => 'Mahasiswa dihapus']);
    }
}
