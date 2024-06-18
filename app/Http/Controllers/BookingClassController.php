<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Kelas;
use App\Models\ClassBooking;
use Illuminate\Http\Request;

class BookingClassController extends Controller
{
    public function index()
    {
        $currentTime = Carbon::now()->setTimezone('Asia/Makassar');

        // Ambil semua kelas yang statusnya 'active'
        $classes = Kelas::where('status', 'open')->get();

        foreach ($classes as $class) {
            $class->bookings_count = $class->bookings()->count(); 
            if ($currentTime->greaterThan($class->schedule)) {
                $class->status = 'Closed';
            } else {
                $remainingCapacity = $class->capacity - $class->bookings_count;
                $class->status = ($remainingCapacity > 0) ? 'Open' : 'Closed';
            }
        }

        return view('admin.bookClass.index', compact('classes'));
    }

    public function showMemberClass(string $id)
    {

        $currentTime = Carbon::now()->setTimezone('Asia/Makassar');
    
        $datas = ClassBooking::where('class_id', $id)->get();

        $class = Kelas::find($id);
        
        return view('admin.bookClass.show', compact('datas', 'currentTime', 'class'));
    }

    public function createMemberClass(string $id){
        $users = User::all();
        $class =  Kelas::findOrFail($id);
        return view('admin.bookClass.create',compact('users','class'));
    }

    public function store(Request $request){
       ClassBooking::create([
            "class_id"=>$request->class_id,
            "user_id"=>$request->user_id,
            "booking_date"=>$request->booking_date,
            "status"=>"open"
       ]);

       return redirect()->route('booking.index')->with('success', 'Data berhasil dibuat.');
    }
}
