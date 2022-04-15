<?php

namespace App\Http\Controllers;

use App\Models\LaporanKas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $admin = auth()->user()->admin;
        if($admin == 0){
            return view('dashboard.member.index');
        }else{
            return view('dashboard.admin.index',([
                'laporan' => LaporanKas::all()
            ]));
        }
    }
}
