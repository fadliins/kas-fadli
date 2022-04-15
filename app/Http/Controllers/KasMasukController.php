<?php

namespace App\Http\Controllers;

use App\Models\KasKeluar;
use App\Models\KasMasuk;
use App\Models\LaporanKas;
use Illuminate\Http\Request;


class KasMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->updateKas();
        return view('dashboard.member.kasMasuk', [
            'kasmasuk' => KasMasuk::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('dashboard.member.kasMasuk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validateData = $request->validate([
            'uang_masuk' => ['required','numeric','digits_between:3,10']
        ]);

        $validateData['user_id'] = auth()->user()->id;
        
        KasMasuk::create($validateData);

        return redirect('dashboard/member/kas-masuk')->with('success', 'Data Berhasil Di input!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KasMasuk  $kasMasuk
     * @return \Illuminate\Http\Response
     */
    public function show(KasMasuk $kasMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KasMasuk  $kasMasuk
     * @return \Illuminate\Http\Response
     */
    public function edit(KasMasuk $kasMasuk)
    {
        return view('dashboard.member.kasMasuk.edit', [
            'kasmasuk' => $kasMasuk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KasMasuk  $kasMasuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KasMasuk $kasMasuk)
    {
        $validateData = $request->validate([
            'uang_masuk' => ['required','numeric','digits_between:3,10']
        ]);

        $validateData['user_id'] = auth()->user()->id;
        
        KasMasuk::where('id', $kasMasuk->id)
                        ->update($validateData);

        return redirect('dashboard/member/kas-masuk')->with('success', 'Data Berhasil Di Edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KasMasuk  $kasMasuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(KasMasuk $kasMasuk)
    {
        KasMasuk::destroy($kasMasuk -> id);

        return redirect('dashboard/member/kas-masuk')->with('success', 'Data Berhasil Di hapus!');
    }
    public function updateKas(){
        $laporanKas = LaporanKas::where('user_id', auth()->user()->id)->first();
        $kasMasukCheck = KasMasuk::where('user_id', auth()->user()->id)->first();
        $kasKeluarCheck = KasKeluar::where('user_id', auth()->user()->id)->first();
        if($kasMasukCheck === null || $kasKeluarCheck === null){
            return 0;
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
