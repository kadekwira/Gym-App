<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Kelas;
use App\Models\ClassBooking;
use Illuminate\Http\Request;
use App\Models\KategoriClass;
use App\Notifications\GymClassBookingNotification;

class ClassController extends Controller
{
    public function index()
    {   
        $currentTime = Carbon::now()->setTimezone('Asia/Makassar');

        // Ambil semua kelas yang statusnya 'active'
        $classes = Kelas::where('status', 'open')->get();
        $kategoriClass = KategoriClass::all();
        foreach ($classes as $class) {
            $class->bookings_count = $class->bookings()->count(); 
            if (auth()->check()) {
                $class->user_has_booked = $class->bookings()->where('user_id', auth()->id())->exists();
            }
            if ($currentTime->greaterThan($class->schedule)) {
                $class->status = 'Closed';
            } else {
                $remainingCapacity = $class->capacity - $class->bookings_count;
                $class->status = ($remainingCapacity > 0) ? 'Open' : 'Closed';
            }
        }
        return view('user.class',compact('classes','kategoriClass'));
    }

    public function booking(Request $request,string $id){
        $user = User::findOrFail($request->user_id);
        $currentTime = Carbon::now()->setTimezone('Asia/Makassar');
        ClassBooking::create([
            "class_id"=>$id,
            "user_id"=>$request->user_id,
            "booking_date"=>$currentTime,
            "status"=>"open"
       ]);

       return redirect()->route('class.index')->with('success', 'Book Class Success.');
    }
}
