<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Exception;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Jurusan::all();
        return view('jurusan.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        try {
            Jurusan::create([
                'name' => $request->name,
            ]);
        } catch (Exception $e) {
            return redirect()->route('jurusan.create')->with('error', 'Gagal menambahkan jurusan: ' . $e->getMessage());
        }

        return redirect()->route('jurusan.index');
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
        $jurusan = Jurusan::findOrFail($id);
        return view('jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        try {
            $jurusan = Jurusan::findOrFail($id);
            $jurusan->name = $request->name;
            $jurusan->save();
            return redirect()->route('jurusan.index');
        } catch (Exception $e) {
            return redirect()->route('jurusan.edit', $id)->with('error', 'Gagal mengupdate jurusan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Jurusan::destroy($id);
            return redirect()->route('jurusan.index');
        } catch (Exception $e) {
            return redirect()->route('jurusan.edit', $id)->with('error', 'Gagal menghapus jurusan: ' . $e->getMessage());
        }
    }
}
