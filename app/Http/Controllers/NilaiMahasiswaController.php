<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\MataKuliah;
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
        $data = $this->getNilaiMahasiswa($request->user());
        if ($request->wantsJson()) {
            return response([
                'status' => true,
                'message' => 'OK',
                'data' => $data
            ]);
        }
        return view('user-interface.nilai.index', compact('data'));
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
        $mahasiswa = Mahasiswa::all();
        $mata_kuliah = MataKuliah::all();
        return view('user-interface.nilai.create', compact('mahasiswa', 'mata_kuliah'));
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
        $created = NilaiMahasiswa::query()->where([
            'mhs_nim' => $data['mhs_nim'],
            'id_mk' => $data['id_mk'],
        ])->exists();

        if($request->wantsJson() && $created) {
            return response([
                'status' => true,
                'message' => 'Data mahasiswa ini sudah diinput',
                'data' => []
            ], 201);
        }

        if($created) {
            return back()->with('message', 'Data mahasiswa ini sudah diinput');
        }

        $data['id_user'] = $user->id;
        $nilai = NilaiMahasiswa::create($data);

        if($request->wantsJson()) {
            return response([
                'status' => true,
                'message' => 'OK',
                'data' => $nilai
            ]);
        }
        return redirect()->route('nilai.index')->with('message', 'Tambah data berhasil');
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
