<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\NilaiMahasiswa;
use App\Models\User;
use Illuminate\Http\Request;

class NilaiMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        return response([
            'status' => true,
            'message' => 'OK',
            'data' => $this->getNilaiMahasiswa($request->user()),
        ]);
    }

    private function getNilaiMahasiswa(?User $user, ?string $id = null)
    {
        $mhs_nim = $user->access_value ?? null;
        $data = NilaiMahasiswa::with(['mata_kuliah'])
            ->with('user', function ($user) {
                return $user->with('role')->get();
            })
            ->with('mahasiswa', function ($mahasiswa) {
                return $mahasiswa->with(['prodi', 'kelas'])->get();
            });

        if ($mhs_nim) {
            return $data->where('mhs_nim', $mhs_nim)->get();
        }

        if ($id) {
            return $data->where('id', $id)->first();
        }

        return $data->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->user();
        $data = $request->validate([
            'mhs_nim' => 'required|exists:mahasiswa,nim',
            'id_mk' => 'required|exists:mata_kuliah,id',
            'nilai_uts' => 'required|numeric',
            'nilai_tugas' => 'required|numeric',
            'nilai_uas' => 'required|numeric',
            'presensi' => 'required|numeric',
        ]);
        $data['id_user'] = $user->id;
        return response([
            'status' => true,
            'message' => 'OK',
            'data' => NilaiMahasiswa::create($data),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        return response([
            'status' => true,
            'message' => 'OK',
            'data' => $this->getNilaiMahasiswa($request->user(), $id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'nilai_uts' => 'required|numeric',
            'nilai_tugas' => 'required|numeric',
            'nilai_uas' => 'required|numeric',
            'presensi' => 'required|numeric',
        ]);
        $nilai = NilaiMahasiswa::findOrfail($id);
        $nilai->update($data);
        return response([
            'status' => true,
            'message' => 'OK',
            'data' => $nilai,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return response([
            'status' => true,
            'message' => 'OK',
            'data' => NilaiMahasiswa::find($id)->delete(),
        ]);
    }
}
