<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\MembershipType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = User::with('membershipType')->get();
        return view('admin.dataMember.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipe = MembershipType::all();
        return view('admin.dataMember.create', compact('tipe'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberRequest $request)
    {

        try {
            $validated = $request->validated();
            $validated['password'] = Hash::make($validated['password']);

            User::create($validated);

            return redirect()->route('data-member.index')->with('success', 'Admin berhasil dibuat.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat membuat admin.']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $member = User::with('membershipType')->findOrFail($id);
        return response()->json($member);
    }

    public function showProfile()
    {
        $user = Auth::user();

        if ($user) {
            return view('user.profile', compact('user'));
        } else {
            return redirect()->route('login')->with('error', 'You need to log in first.');
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::findOrFail($id);
        $tipe = MembershipType::all();
        return view('admin.dataMember.edit', compact('tipe','data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberRequest $request, string $id)
    {
        try {
            $validated = $request->validated();

            if (!empty($validated['password'])) {
                $validated['password'] = Hash::make($validated['password']);
            } else {
                unset($validated['password']);
            }

            $user = User::findOrFail($id);
            $user->update($validated);

            return redirect()->route('data-member.index')->with('success', 'Member berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui member.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function checkMembership(){
        Artisan::call('membership:check');
        return redirect()->route('data-member.index')->with('success', 'Membership status checked successfully');
    }

    
}
