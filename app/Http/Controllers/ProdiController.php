<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Prodi::all();
        return response([
            'status' => true,
            'message' => 'OK',
            'data' => $data,
        ]);
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
        $data = $request->validate(['jurusan' => 'required', 'fakultas' => 'required']);
        return response([
            'status' => true,
            'message' => 'OK',
            'data' => Prodi::create($data),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response([
            'status' => true,
            'message' => 'OK',
            'data' => Prodi::find($id),
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
        $data = $request->validate(['jurusan' => 'required', 'fakultas' => 'required']);
        $prodi = Prodi::find($id);
        $prodi->update($data);
        return response([
            'status' => true,
            'message' => 'OK',
            'data' => $prodi,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Prodi::find($id)->delete();
        return response([
            'status' => true,
            'message' => 'OK'
        ]);
    }
}
