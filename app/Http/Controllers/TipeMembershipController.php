<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MembershipType;

class TipeMembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = MembershipType::all();
        return view('admin.tipeMembership.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tipeMembership.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration_member' => 'required|integer',
            'price_member' => 'required|numeric',
            'by' => 'required|string|max:255',
        ]);

        MembershipType::create($request->all());

        return redirect()->route('tipe-membership.index')
                         ->with('success', 'Membership Type created successfully.');
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
        $data = MembershipType::findOrFail($id);
        return view('admin.membershipType.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $membershipType = MembershipType::findOrFail($id);
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duration_member' => 'required|integer',
            'price_member' => 'required|numeric',
            'by' => 'required|string|max:255',
        ]);

        $membershipType->update($request->all());

        return redirect()->route('membership-types.index')
                         ->with('success', 'Membership Type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
