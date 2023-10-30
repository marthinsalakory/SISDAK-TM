<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\Pengaturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaturanController extends Controller
{
    public function index()
    {
        return view('pengaturan.index', [
            'p' => Pengaturan::find(1)
        ]);
    }

    public function update(Pengaturan $pengaturan, Request $request)
    {
        $pengaturan = $pengaturan->find(1);
        $pengaturan->k1 = $request->k1;
        $pengaturan->k2 = $request->k2;
        $pengaturan->k3 = $request->k3;
        $pengaturan->k4 = $request->k4;
        $pengaturan->k5 = $request->k5;
        $pengaturan->k6 = $request->k6;
        $pengaturan->k7 = $request->k7;
        $pengaturan->k8 = $request->k8;
        $pengaturan->k9 = $request->k9;
        $pengaturan->k10 = $request->k10;
        $pengaturan->k11 = $request->k11;
        $pengaturan->k12 = $request->k12;
        $pengaturan->k13 = $request->k13;
        $pengaturan->k14 = $request->k14;
        $pengaturan->k15 = $request->k15;
        $pengaturan->k16 = $request->k16;
        $pengaturan->k17 = $request->k17;
        $pengaturan->k18 = $request->k18;
        $pengaturan->k19 = $request->k19;
        $pengaturan->k20 = $request->k20;
        $pengaturan->k21 = $request->k21;
        $pengaturan->k22 = $request->k22;
        $pengaturan->k23 = $request->k23;
        $pengaturan->k24 = $request->k24;
        $pengaturan->k25 = $request->k25;
        $pengaturan->k26 = $request->k26;

        $pengaturan->save();

        return redirect()->route('pengaturan')->with('success', 'Pengaturan telah disimpan');
    }
}
