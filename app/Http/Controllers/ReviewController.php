<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviewgym = Review::all();

        $user = User::all()->keyBy('id');

        return view('admin.dataReview.index', compact('reviewgym', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();

        return view('admin.dataReview.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'rating' => 'required',
            'comment' => 'required',
        ]);

        $input = $request->all();

        Review::create($input);

        return redirect()->route('reviewGym')->with('message', 'Data Berhasil Di Simpan');
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
    public function edit(Review $reviewgym)
    {
        $user = User::all()->keyBy('id');

        return view('admin.dataReview.edit', compact('reviewgym', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $reviewgym)
    {
        $request->validate([
            'user_id' => 'required',
            'rating' => 'required',
            'comment' => 'required',
        ]);

        $input = $request->all();

        $reviewgym->update($input);

        return redirect()->route('reviewGym')->with('message', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($reviewgym)
    {
        Review::find($reviewgym)->delete();

        return redirect()->route('reviewGym')->with('message', 'Data Berhasil Di Hapus');
    }
}
