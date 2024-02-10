<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kelas = Kelas::all();
        if ($request->wantsJson()) {
            return response([
                'status' => true,
                'message' => 'Get kelas',
                'data' => $kelas,
            ]);
        }

        return view('user-interface.kelas.index', compact('kelas'));
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
        $data = $request->validate([
            'name' => 'required|max:10|unique:kelas,name'
        ]);
        return response([
            'status' => true,
            'message' => 'Ok',
            'data' => Kelas::create($data),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        return response([
            'status' => true,
            'message' => 'Ok',
            'data' => Kelas::find($id),
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
            'name' => 'required|max:10'
        ]);
        $kelas = Kelas::find($id);
        $kelas->update($data);
        return response([
            'status' => true,
            'message' => 'Ok',
            'data' => $kelas,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kelas::find($id)->delete();
        return response([
            'status' => true,
            'message' => 'Ok',
        ]);
    }
}
