<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Kelas;
use App\Models\Trainer;
use App\Models\TrialDay;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\KategoriClass;
use App\Models\ActivityMember;
use App\Models\MembershipType;

class DashboardController extends Controller
{
    public function dashboardadmin()
    {   
        $admin =  Admin::count();
        $member =  User::where('status','active')->count();
        $trainer =  Trainer::count();
        $class =  Kelas::count();
        $act = ActivityMember::with('user')->take(3)->get();


        // Menghitung jumlah member baru per bulan
        $months = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        $userCounts = [];
        foreach ($months as $month) {
            $count = User::whereMonth('membership_start', date('m', strtotime($month)))
                        ->whereYear('membership_start', date('Y', strtotime($month)))
                        ->count();
            $userCounts[] = $count;
        }


      
        // Menghitung jumlah trial per bulan
        $trialCounts = [];
        foreach ($months as $month) {
            $count = TrialDay::whereMonth('date_trial', date('m', strtotime($month)))
                        ->whereYear('date_trial', date('Y', strtotime($month)))
                        ->count();
            $trialCounts[] = $count;
        }        
    


        $membershipTypes = MembershipType::all();

        // Inisialisasi array untuk menyimpan jumlah user per jenis membership
        $membershipData = [];
        $membershipLabels = [];

        foreach ($membershipTypes as $type) {
            // Hitung jumlah user untuk setiap jenis membership
            $count = User::where('membership_type_id', $type->id)->count();
            $membershipData[] = $count;
            $membershipLabels[] = $type->title;
        }


        $transactions = Transaction::selectRaw('MONTH(date_time) as month, SUM(total) as total')
        ->groupBy('month')
        ->pluck('total', 'month')
        ->toArray();

        // Initialize transactions data for each month
        $transactionData = array_fill(0, 12, 0);
        foreach ($transactions as $month => $total) {
            $transactionData[$month - 1] = $total;
        }

        return view('admin.dashboardAdmin',compact('admin','member','trainer','class','userCounts','trialCounts','membershipData','membershipLabels','transactionData','act'));
    }

    public function dashboard(){
        $kategori = MembershipType::all();
        $trainer = Trainer::all()->count();
        $member = User::all()->count();
        $kelas = Kelas::all()->count();
        $kategoriClass = KategoriClass::all();
        return view('user.index',compact('kategori','trainer','member','kelas','kategoriClass'));
    }
}
