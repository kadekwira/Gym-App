<?php

namespace App\Http\Controllers;

use App\Models\TrialDay;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTrialDayRequest;

class FreeTrialController extends Controller
{
    public function index(){
        return view('user.freetrial');
    }

    public function store(StoreTrialDayRequest $request)
    {
        try {
            TrialDay::create($request->validated());
            return redirect()->route('freetrial.index')->with('success', 'Data Berhasil Disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data.']);
        }
    }
}
