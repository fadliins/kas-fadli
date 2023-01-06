<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanKas;
use App\Models\KasKeluar;
use App\Models\KasMasuk;
use App\Models\User;

class LaporanKasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.admin.laporanKas',[
            'laporan' => LaporanKas::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLaporanKasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LaporanKas  $laporanKas
     * @return \Illuminate\Http\Response
     */
    public function show(LaporanKas $laporanKas)
    {
        $kasMasukData = KasMasuk::where('user_id', request('user_id'))->get();
        $kasKeluarData = KasKeluar::where('user_id', request('user_id'))->get();
        $userData = User::where('_id', request('user_id'))->get();
        $laporanData = LaporanKas::where('user_id', request('user_id'))->get();
        return view('dashboard.admin.member',[
            'user' => $userData,
            'kasMasuk' => $kasMasukData,
            'kasKeluar' => $kasKeluarData,
            'laporan' => $laporanData
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LaporanKas  $laporanKas
     * @return \Illuminate\Http\Response
     */
    public function edit(LaporanKas $laporanKas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLaporanKasRequest  $request
     * @param  \App\Models\LaporanKas  $laporanKas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LaporanKas $laporanKas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LaporanKas  $laporanKas
     * @return \Illuminate\Http\Response
     */
    public function destroy(LaporanKas $laporanKas)
    {
        //
    }
}
