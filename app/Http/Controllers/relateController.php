<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class relateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $userLevelId = auth()->user()->level_id; // Mendapatkan level_id dari pengguna yang sedang login

    if ($userLevelId == 1) {
        // Jika level_id pengguna adalah 1, tampilkan semua data
        $relates = Job::with('Relate', 'Jabatan')->get();
    } else {
        // Jika level_id pengguna bukan 1, tampilkan data sesuai dengan level_id pengguna dan relate_id
        $relates = Job::with('Relate', 'Jabatan')
        ->where('relate_id', $userLevelId)
        ->get();

    }

    return view('pages.relate.index', compact('relates'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jobs = Job::with('Jabatan','Relate')->findOrFail($id);
        return view('pages.relate.show', compact('jobs'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
