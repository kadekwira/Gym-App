<?php

namespace App\Http\Controllers;

use App\Models\ActivityMember;
use BaconQrCode\Encoder\QrCode;
use SimpleSoftwareIO\QrCode\Facades\QrCode as QrCodeFacade;

use Illuminate\Http\Request;

class ActivityMemberController extends Controller
{
    public function index()
    {
        return view('admin.activityMember.index');
    }

    public function create()
    {
        return view('admin.activityMember.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'scans' => 'required|array',
            'scans.*.user_id' => 'required|string',
            'scans.*.date' => 'required|date',
            'scans.*.check_in' => 'required|date_format:H:i:s',
            'scans.*.check_out' => 'nullable|date_format:H:i:s',
        ]);

        foreach ($request->input('scans') as $scanData) {
            $scan = new ActivityMember();
            $scan->user_id = $scanData['user_id'];
            $scan->date = $scanData['date'];
            $scan->check_in = $scanData['check_in'];
            $scan->check_out = $scanData['check_out'];
            $scan->save();
        }

        return redirect()->route('activityMember')->with('message', 'Data Berhasil Di Simpan');
    }

    public function edit()
    {
        return view('admin.activityMember.edit');
    }
}
