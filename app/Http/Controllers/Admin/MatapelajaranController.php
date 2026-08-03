<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mata_pelajaran;
use Illuminate\Http\Request;

class MatapelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mata_pelajarans = Mata_pelajaran::all();
        $title = "Pelajaran Table";
        return view('admin.mata_pelajaran', compact('title', 'mata_pelajarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelajaran' => 'required'
        ]);
        Mata_pelajaran::create($request->all());
        return redirect()->back()->with('success', 'Mata pelajaran created successfulyl');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $request->validate([
            'nama_pelajaran' => 'required'
        ]);
        $mata_pelajaran = Mata_pelajaran::findOrFail($id);
        $mata_pelajaran->update($request->all());
        return redirect()->back()->with('success', 'Mata pelajaran updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mata_pelajaran = Mata_pelajaran::findOrFail($id);
        $mata_pelajaran->delete();
        return redirect()->back()->with('success', 'Mata pelajaran deleted successfully');
    }
}
