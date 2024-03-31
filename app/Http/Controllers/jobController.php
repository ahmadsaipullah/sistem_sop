<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\Level;
use App\Models\Cabang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class jobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userLevelId = auth()->user()->level_id; // Mendapatkan level_id dari pengguna yang sedang login

        if ($userLevelId == 1) {
            $jobs = Job::with('Relate', 'Jabatan')->get();

        } else {
            // Jika level_id pengguna bukan 1, tampilkan data sesuai dengan level_id pengguna dan jabatan_id
            $jobs = Job::with('Relate', 'Jabatan')
            ->where('jabatan_id', $userLevelId)
            ->get();

        }
        return view('pages.jobs.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $levels = Level::all();
        $cabangs = Cabang::all();
        return view('pages.jobs.create', compact('levels','cabangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tugas' => 'required|string',
            'detail_tugas' => 'required|string',
            'type' => 'required|string',
            'file_laporan' => 'nullable|mimes:pdf',
            'jabatan_id' => 'required|integer',
            'relate_id' => 'required|integer|different:jabatan_id',
            'cabang_id' => 'required|integer'
        ]);

        $data = $request->all();

        if ($request->hasFile('file_laporan')) {
            $data['file_laporan'] = $request->file('file_laporan')->store('asset/file_laporan', 'public');
        }

        $job = Job::create($data);

        if ($job) {
            toast('Data berhasil ditambah', 'success');
        } else {
            toast('Data Gagal Ditambahkan', 'error');
        }
        return redirect()->route('job.index');

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

        $levels = Level::all();
        $cabangs = Cabang::all();
        $jobs = Job::with('Jabatan','Relate')->findOrFail($id);
        return view('pages.jobs.edit', compact('levels','cabangs', 'jobs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $userLevelId = auth()->user()->level_id; // Mendapatkan level_id dari pengguna yang sedang login

        if ($userLevelId == 1) {
        $request->validate([
            'tugas' => 'required|string',
            'detail_tugas' => 'required|string',
            'type' => 'required|string',
            'file_laporan' => 'nullable|mimes:pdf',
            'jabatan_id' => 'required|integer',
            'relate_id' => 'required|integer|different:jabatan_id',
            'cabang_id' => 'required|integer'
        ]);

        $job = Job::findOrFail($id);
        $dataId = $job->find($job->id);
        $data = $request->all();
        if ($request->file_laporan) {
            Storage::delete('public/' . $dataId->file_laporan);
            $data['file_laporan'] = $request->file('file_laporan')->store('asset/file_laporan', 'public');
        }

        $dataId->update($data);

        if ($data) {
            toast('Data berhasil diupdate', 'success');
        } else {
            toast('Data Gagal Diupdate', 'error');
        }

    }else{

        $request->validate([

            'file_laporan' => 'nullable|mimes:pdf',

        ]);

        $job = Job::findOrFail($id);
        $dataId = $job->find($job->id);
        $data = $request->all();
        if ($request->file_laporan) {
            Storage::delete('public/' . $dataId->file_laporan);
            $data['file_laporan'] = $request->file('file_laporan')->store('asset/file_laporan', 'public');
        }

        $dataId->update($data);

        if ($data) {
            toast('Data berhasil diupdate', 'success');
        } else {
            toast('Data Gagal Diupdate', 'error');
        }
    }
        return redirect()->route('job.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $job = Job::findOrFail($id);
        Storage::delete('public/' . $job->file_laporan);
        $job->delete();
        if ($job) {
            toast('Data berhasil dihapus', 'success');
        } else {
            toast('Terjadi Kesalahan', 'error');
        }
        return redirect()->route('job.index');
    }
}
