<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index(Request $request)
    {
        $data = Dosen::with('prodi')->get();
        if ($request->wantsJson()) {
            return response([
                'status' => true,
                'message' => 'Ok.',
                'data' => $data
            ]);
        }
        return view('user-interface.dosen.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([]);
        $lecture = Dosen::query()->create($data);
        return response([
            'status' => true,
            'message' => 'Create Ok.',
            'data' => $lecture
        ]);
    }

    public function show($nip)
    {
        $lecture = Dosen::with(['mata_kuliah', 'prodi'])
            ->where('nip', $nip)
            ->get();
        return response([
            'status' => true,
            'message' => 'Ok.',
            'data' => $lecture
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([]);
        $lecture = Dosen::query()->findOrFail($id);
        $lecture->update($data);
        return response([
            'status' => true,
            'message' => 'Update Ok.',
            'data' => $lecture
        ]);
    }

    public function delete($id)
    {
        $lecture = Dosen::query()->findOrFail($id);
        $lecture->delete();
        return response([
            'status' => true,
            'message' => 'Delete Ok.',
        ]);
    }
}
