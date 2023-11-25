<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = MataKuliah::all();
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
        $data = $request->validate(['nama_mk' => 'required', 'sks' => 'required|numeric', 'stmt' => 'required|numeric']);
        $mk = MataKuliah::create($data);
        return response([
            'status' => true,
            'message' => 'OK',
            'data' => $mk,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mk = MataKuliah::find($id);
        return response([
            'status' => true,
            'message' => 'OK',
            'data' => $mk,
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
        $data = $request->validate(['nama_mk' => 'required', 'sks' => 'required|numeric', 'stmt' => 'required|numeric']);
        $mk = MataKuliah::find($id)->update($data);
        return response([
            'status' => true,
            'message' => 'OK',
            'data' => $mk,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        MataKuliah::find($id)->delete();
        return response([
            'status' => true,
            'message' => 'OK',
        ]);
    }
}
