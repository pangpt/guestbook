<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    //
    public function index() 
    {
        $title = 'Dashboard';
        $section = 'Main';

        //guest
        // dd(date('Y-m-d', strtotime('now')));
        $guest = Guest::whereDate('tanggal_kunjungan', date('Y-m-d', strtotime('now')));
        $guestMonth = Guest::whereYear('tanggal_kunjungan', Carbon::now()->year)->whereMonth('tanggal_kunjungan', Carbon::now()->month)->count();
        // dd($guestMonth);
        $guestMa = Guest::where('category_id', 1)->count();

        $total = $guest->count('id');
        // dd($total);
        //persen dari kemarin
        $guestyesterday = Guest::whereDate('tanggal_kunjungan', date('Y-m-d', strtotime('yesterday')));

        $totalyesterday = $guestyesterday->count('id');
        

        if ($totalyesterday == 0) {
            $percenttotal = 0;
        } else {
            $percenttotal = ($total-$totalyesterday)/$totalyesterday*100;
        }

        return view('backend.dashboard.index')->withTitle($title)->withSection($section)->withTotal($total)->withGuest($guest)->withPercenttotal($percenttotal)->withTotalMonth($guestMonth)->withGuestMa($guestMa);

    }

}
