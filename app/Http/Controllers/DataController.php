<?php

namespace App\Http\Controllers;

use App\Models\InputA;
use App\Models\InputB;
use App\Models\InputC;
use App\Models\InputD;
use App\Models\InputE;
use App\Models\User;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function A(InputA $inputA, User $user)
    {
        return view('data.A', [
            'collection' => $inputA->get()
        ]);
    }

    public function B(InputB $inputB, User $user)
    {
        return view('data.B', [
            'collection' => $inputB
        ]);
    }

    public function linkB(InputB $InputB, User $user, $pembiayaan = null, $tahun = null)
    {
        if ($tahun == null) {
            $collection = $InputB->where('sumber_pembiayaan', $pembiayaan)->get();
        } else {
            $collection = $InputB->where('sumber_pembiayaan', $pembiayaan)->where('tahun', $tahun)->get();
        }
        return view('link.B', [
            'collection' => $collection,
            'pembiayaan' => $pembiayaan,
            'tahun' => $tahun,
        ]);
    }

    public function C(InputC $InputC, User $user)
    {
        return view('data.C', [
            'collection' => $InputC
        ]);
    }

    public function linkC(InputC $InputC, User $user, $pembiayaan = null, $tahun = null)
    {
        if ($tahun == null) {
            $collection = $InputC->where('sumber_pembiayaan', $pembiayaan)->get();
        } else {
            $collection = $InputC->where('sumber_pembiayaan', $pembiayaan)->where('tahun', $tahun)->get();
        }
        return view('link.C', [
            'collection' => $collection,
            'pembiayaan' => $pembiayaan,
            'tahun' => $tahun,
        ]);
    }

    public function D(InputD $InputD, User $user)
    {
        return view('data.D', [
            'collection' => $InputD
        ]);
    }

    public function linkD(InputD $InputD, User $user, $media = null, $tahun = null)
    {
        if ($tahun == null) {
            $collection = $InputD->where('media_publikasi', $media)->get();
        } else {
            $collection = $InputD->where('media_publikasi', $media)->where('tahun', $tahun)->get();
        }
        return view('link.D', [
            'collection' => $collection,
            'media' => $media,
            'tahun' => $tahun,
        ]);
    }

    public function E(InputE $InputE, User $user)
    {
        return view('data.E', [
            'collection' => $InputE->get()
        ]);
    }
}
