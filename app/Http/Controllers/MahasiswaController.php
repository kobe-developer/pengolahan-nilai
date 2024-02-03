<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = Mahasiswa::with(['kelas', 'prodi'])->paginate(100);
        return response([
            'status' => true,
            'message' => 'Data mahasiswa',
            'data' => $data,
        ]);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'nim' => 'required|max:10',
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required|email',
            'nomor_hp'=>'required|max:20',
            'id_kelas' => 'required|exists:kelas,id',
            'id_prodi' => 'required|exists:prodi,id',
            'tahun_masuk' => 'required|date_format:Y'
        ]);
        $created = Mahasiswa::create($data);
        return response(['status' => true, 'message' => 'Create mahasiswa', 'data' => $created]);
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
        $data = $request->validate([
            'nim' => 'required|max:10',
            'nama' => 'required',
            'id_kelas' => 'required|exists:kelas,id',
            'id_prodi' => 'required|exists:prodi,id',
            'tahun_masuk' => 'required|date_format:Y'
        ]);
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->update($data);
        return response(['status' => true, 'message' => 'Update berhasil', 'data' => $mahasiswa]);
    }
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();
        return response(['status' => true, 'message' => 'Mahasiswa dihapus']);
    }
}
