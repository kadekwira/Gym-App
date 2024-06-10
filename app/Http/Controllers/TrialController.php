<?php

namespace App\Http\Controllers;

use App\Models\TrialDay;
use Illuminate\Http\Request;

class TrialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = TrialDay::all();
        return view('admin.dataTrial.index', compact(['datas']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dataTrial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       TrialDay::create([
            "full_name"=>$request->full_name,
            "email"=>$request->email,
            "phone"=>$request->phone,
            "date_trial"=>$request->date_trial,
            "start_trial"=>$request->start_trial,
            "end_trial"=>$request->end_trial,
       ]);

       return redirect(route('data-trial.index'))->with('success','Data Berhasil Di Simpan');
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
