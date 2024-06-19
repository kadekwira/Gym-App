<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\ActivityMember;

use BaconQrCode\Encoder\QrCode;
use SimpleSoftwareIO\QrCode\Facades\QrCode as QrCodeFacade;

class ActivityMemberController extends Controller
{
    public function index()
    {
        $datas = ActivityMember::with('user')->get();
        return view('admin.activityMember.index',compact('datas'));
    }

    public function create()
    {
        return view('admin.activityMember.create');
    }

    public function store(Request $request)
    {
        $scanDataArray = $request->all();
        $result = $scanDataArray[0];

        // Menggunakan Carbon untuk mendapatkan tanggal dan waktu saat ini
        $date = Carbon::now()->toDateString(); // Format 'date' sebagai YYYY-MM-DD
        $checkIn = Carbon::now()->toDateTimeString(); // Format 'check_in' sebagai YYYY-MM-DD HH:MM:SS
        
        try {
            // Menyimpan data ke dalam database menggunakan Eloquent
            ActivityMember::create([
                'user_id' => $result, // Menggunakan 'user_id' dari $result
                'date' => $date,
                'check_in' => $checkIn,
            ]);

            return response()->json(['success' => true, 'message' => 'Data berhasil disimpan']);
        } catch (\Exception $e) {
            // Mengembalikan respons jika terjadi kesalahan
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function edit()
    {
        return view('admin.activityMember.edit');
    }
}
