<?php

namespace App\Http\Controllers;

use App\Models\TrialDay;
use App\Http\Requests\StoreTrialDayRequest;
use App\Http\Requests\UpdateTrialDayRequest;
use Illuminate\Http\Request;

class TrialController extends Controller
{
    public function index()
    {
        $datas = TrialDay::all();
        return view('admin.dataTrial.index', compact('datas'));
    }

    public function create()
    {
        return view('admin.dataTrial.create');
    }

    public function store(StoreTrialDayRequest $request)
    {
        try {
            TrialDay::create($request->validated());
            return redirect()->route('data-trial.index')->with('success', 'Data Berhasil Disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.']);
        }
    }

    public function show(string $id)
    {
        // Implementasi di sini jika diperlukan
    }

    public function edit(string $id)
    {
        $data = TrialDay::findOrFail($id);
        return view('admin.dataTrial.edit', compact('data'));
    }

    public function update(UpdateTrialDayRequest $request, string $id)
    {
        try {
            $trialday = TrialDay::findOrFail($id);
            $trialday->update($request->validated());
            return redirect()->route('data-trial.index')->with('success', 'Data Berhasil Diupdate');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat mengupdate data.']);
        }
    }

    public function destroy(string $id)
    {
        try {
            $trialday = TrialDay::findOrFail($id);
            $trialday->delete();
            return response()->json(['success' => 'Data berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan saat menghapus data'], 500);
        }
    }
}
