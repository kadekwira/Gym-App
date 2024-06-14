<?php

namespace App\Http\Controllers;

use App\Models\InformationGym;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function index()
    {
        $informationgym = InformationGym::all();

        return view('admin.informationGym.index', compact('informationgym'));
    }

    public function create()
    {
        return view('admin.informationGym.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gym_name' => 'required',
            'gym_location' => 'required',
            'open_operational' => 'required',
            'close_operational' => 'required',
            'operational_time' => 'required',
        ]);

        $input = $request->all();

        InformationGym::create($input);

        return redirect()->route('informationGym')->with('message', 'Data Berhasil Di Simpan');
    }

    public function edit(InformationGym $informationgym)
    {
        return view('admin.informationGym.edit', compact('informationgym'));
    }

    public function update(Request $request, InformationGym $informationgym)
    {
        $request->validate([
            'gym_name' => 'required',
            'gym_location' => 'required',
            'open_operational' => 'required',
            'close_operational' => 'required',
            'operational_time' => 'required',
        ]);

        $input = $request->all();

        $informationgym->update($input);

        return redirect()->route('informationGym')->with('message', 'Data Berhasil Di Update');
    }

    public function destroy($informationgym)
    {
        InformationGym::find($informationgym)->delete();

        return redirect()->route('informationGym')->with('message', 'Data Berhasil Di Hapus');
    }
}
