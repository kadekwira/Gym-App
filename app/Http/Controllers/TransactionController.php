<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(){
        $transactions = Transaction::with('user')->get();
        return view('admin.Transaction.index',compact('transactions'));
    }
}
