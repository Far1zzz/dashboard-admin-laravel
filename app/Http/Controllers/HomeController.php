<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        try {
            $now = Carbon::now();
            $jml_tamu_kominfo = DB::table('kominfos')->whereDate('created_at', $now)->count();
            $jml_tamu_setda = DB::table('sekdas')->whereDate('created_at', $now)->count();
            $jml_tamu_bupati = DB::table('bupatis')->whereDate('created_at', $now)->count();
            $jml_tamu_wabup = DB::table('wabups')->whereDate('created_at', $now)->count();

            $role = auth()->user()->role;

            switch ($role) {
                case 'kominfo':
                    return view('tamu_kominfo.dash', compact('jml_tamu_kominfo'));
                case 'sekda':
                    return view('tamu_setda.dash', compact('jml_tamu_setda'));
                case 'bupati':
                    return view('tamu_bupati.dash', compact('jml_tamu_bupati'));
                case 'wabup':
                    return view('tamu_wabup.dash', compact('jml_tamu_wabup'));
                default:
                    return view('home');
            }
        } catch (\Exception $e) {
            // Handle the exception appropriately (e.g., log the error, show an error page)
            return view('error');
        }
    }
}
