<?php

namespace App\Http\Controllers;


use App\Models\KasKeluar;
use App\Models\LaporanKas;
use App\Models\KasMasuk;
use Illuminate\Http\Request;

class KasKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->updateKas();
        return view('dashboard.member.kasKeluar', [
            'kaskeluar' => KasKeluar::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.member.kasKeluar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKasKeluarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'uang_keluar' => ['required','numeric','digits_between:3,10']
        ]);

        $validateData['user_id'] = auth()->user()->id;
        
        KasKeluar::create($validateData);

        return redirect('dashboard/member/kas-keluar')->with('success', 'Data Berhasil Di input!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KasKeluar  $kasKeluar
     * @return \Illuminate\Http\Response
     */
    public function show(KasKeluar $kasKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KasKeluar  $kasKeluar
     * @return \Illuminate\Http\Response
     */
    public function edit(KasKeluar $kasKeluar)
    {
        return view('dashboard.member.kasKeluar.edit', [
            'kaskeluar' => $kasKeluar
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKasKeluarRequest  $request
     * @param  \App\Models\KasKeluar  $kasKeluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KasKeluar $kasKeluar)
    {
        $validateData = $request->validate([
            'uang_keluar' => ['required','numeric','digits_between:3,10']
        ]);

        $validateData['user_id'] = auth()->user()->id;
        
        KasKeluar::where('id', $kasKeluar->id)
                        ->update($validateData);

        return redirect('dashboard/member/kas-keluar')->with('success', 'Data Berhasil Di Edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KasKeluar  $kasKeluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(KasKeluar $kasKeluar)
    {
        KasKeluar::destroy($kasKeluar -> id);

        return redirect('dashboard/member/kas-keluar')->with('success', 'Data Berhasil Di hapus!');
    }
    public function updateKas(){
        $laporanKas = LaporanKas::where('user_id', auth()->user()->id)->first();
        $kasMasukCheck = KasMasuk::where('user_id', auth()->user()->id)->first();
        $kasKeluarCheck = KasKeluar::where('user_id', auth()->user()->id)->first();
        if($kasMasukCheck === null || $kasKeluarCheck === null){
            return view('dashboard.member.kasMasuk', [
                'kasmasuk' => KasMasuk::where('user_id', auth()->user()->id)->get()
            ]); 
        }else{
            $kasMasukTotal = KasMasuk::where('user_id', auth()->user()->id)->sum('uang_masuk');
            $kasKeluarTotal = KasKeluar::where('user_id', auth()->user()->id)->sum('uang_keluar');
            $kasTotal = $kasMasukTotal - $kasKeluarTotal;
            if($kasTotal < 0){
                $status = 'Tidak Bagus';
            }else if($kasTotal > 0){
                $status = 'Bagus';
            }else{
                $status = 'Seimbang';
            }
            if($laporanKas === null){
                LaporanKas::create([
                    'user_id' => auth()->user()->id,
                    'total_kas' => $kasTotal,
                    'status' => $status
                ]);
            }else{
                LaporanKas::where('id', $laporanKas->id)
                            ->update([
                                'total_kas' => $kasTotal,
                                'status' => $status
                            ]);
            }
        }
    }
}
