<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $dataCuti = User::with('pengajuan')->find(Auth::user()->id);

        $data = [
            'dataCuti' => $dataCuti
        ];

        return view('pages.dashboard', $data);
    }
}
