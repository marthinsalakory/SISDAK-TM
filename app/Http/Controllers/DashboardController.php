<?php

namespace App\Http\Controllers;

use App\Models\InputA;
use App\Models\InputB;
use App\Models\InputC;
use App\Models\InputD;
use App\Models\InputE;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(User $user, InputA $inputA, InputB $inputB, InputC $inputC, InputD $inputD, InputE $inputE)
    {
        return view('dashboard', [
            'user' => $user,
            'NDTPS' => $this->NDTPS(),
            'scorePendidikanPascaSarjana' => $this->scorePendidikanPascaSarjana(),
            'scoreJabatanAkademik' => $this->scoreJabatanAkademik(),
            'scorePenelitianDTPS' => $this->scorePenelitianDTPS(),
            'scorePenelitianDTPS0' => $this->scorePenelitianDTPS('TS'),
            'scorePenelitianDTPS1' => $this->scorePenelitianDTPS('TS-1'),
            'scorePenelitianDTPS2' => $this->scorePenelitianDTPS('TS-2'),
            'scorePKMDTPS' => $this->scorePKMDTPS(),
            'scorePKMDTPS0' => $this->scorePKMDTPS('TS'),
            'scorePKMDTPS1' => $this->scorePKMDTPS('TS-1'),
            'scorePKMDTPS2' => $this->scorePKMDTPS('TS-2'),
            'scorePublikasiIlmiah' => $this->scorePublikasiIlmiah(),
            'scorePublikasiIlmiah0' => $this->scorePublikasiIlmiah('TS'),
            'scorePublikasiIlmiah1' => $this->scorePublikasiIlmiah('TS-1'),
            'scorePublikasiIlmiah2' => $this->scorePublikasiIlmiah('TS-2'),
            'scoreKaryaIlmiahDTPS' => $this->scoreKaryaIlmiahDTPS(),
            'inputA' => $inputA,
            'inputB' => $inputB,
            'inputC' => $inputC,
            'inputD' => $inputD,
            'inputE' => $inputE,
        ]);
    }

    private function NDTPS()
    {
        return User::count();
    }

    private function scorePendidikanPascaSarjana()
    {
        $NDS3 = InputA::where('pendidikan_pasca_sarjana', 's3')->count();
        $NDTPS = $this->NDTPS();
        $PDS3 = ($NDS3 / $NDTPS);

        if ($PDS3 >= 50) {
            $skor = 4;
        } else {
            $skor = 2 + (4 * $PDS3);
        }

        return $skor;
    }

    private function scoreJabatanAkademik()
    {
        $NDGB = InputA::where('jabatan_akademik', 'Guru Besar')->count();
        $NDLK = InputA::where('jabatan_akademik', 'Lektor Kepala')->count();
        $NDL = InputA::where('jabatan_akademik', 'Lektor')->count();
        $NDTPS = $this->NDTPS();
        $PGBLKL = (($NDGB + $NDLK + $NDL) / $NDTPS);

        if ($PGBLKL >= 70) {
            $skor = 4;
        } else {
            $skor = 2 + ((20 * $PGBLKL) / 7);
        }
        return $skor;
    }

    private function scorePenelitianDTPS($tahun = null)
    {
        $a = 0.05;
        $b = 0.3;
        $c = 1;

        if ($tahun == null) {
            $NI = InputB::where('sumber_pembiayaan', 'Lembaga Luar Negeri')->count();
            $NN = InputB::where('sumber_pembiayaan', 'Lembaga Dalam Negeri (diluar PT)')->count();
            $NL = InputB::where('sumber_pembiayaan', 'Perguruan Tinggi Mandiri')->count();
        } else {
            $NI = InputB::where('sumber_pembiayaan', 'Lembaga Luar Negeri')->where('tahun', $tahun)->count();
            $NN = InputB::where('sumber_pembiayaan', 'Lembaga Dalam Negeri (diluar PT)')->where('tahun', $tahun)->count();
            $NL = InputB::where('sumber_pembiayaan', 'Perguruan Tinggi Mandiri')->where('tahun', $tahun)->count();
        }
        $NDTPS = $this->NDTPS();

        $RI = $NI / 3 / $NDTPS;
        $RN = $NN / 3 / $NDTPS;
        $RL = $NL / 3 / $NDTPS;

        $A = $RI / $a;
        $B = $RN / $b;
        $C = $RL / $c;

        if ($RI >= $a && $RN < $b) $RI = $a;
        if ($RI < $a && $RN >= $b) $RN = $b;
        if ($RL >= $c) $RL = $c;

        if ($RI > $a && $RN > $b) {
            $skor = 4;
        } elseif (0 < $NI && $NI <= $a || 0 < $NN && $NN <= $b || 0 < $NL && $NL <= $c) {
            $skor = 3.75 * (($A + $B + ($C / 2)) - ($A * $B) - (($A * $C) / 2) - (($B * $C) / 2) + (($A * $B * $C) / 2));
        } else {
            $skor = 0;
        }
        return $skor;
    }

    private function scorePKMDTPS($tahun = null)
    {
        $a = 0.05;
        $b = 0.3;
        $c = 1;

        if ($tahun == null) {
            $NI = InputC::where('sumber_pembiayaan', 'Lembaga Luar Negeri')->count();
            $NN = InputC::where('sumber_pembiayaan', 'Lembaga Dalam Negeri (diluar PT)')->count();
            $NL = InputC::where('sumber_pembiayaan', 'Perguruan Tinggi Mandiri')->count();
        } else {
            $NI = InputC::where('sumber_pembiayaan', 'Lembaga Luar Negeri')->where('tahun', $tahun)->count();
            $NN = InputC::where('sumber_pembiayaan', 'Lembaga Dalam Negeri (diluar PT)')->where('tahun', $tahun)->count();
            $NL = InputC::where('sumber_pembiayaan', 'Perguruan Tinggi Mandiri')->where('tahun', $tahun)->count();
        }
        $NDTPS = $this->NDTPS();

        $RI = $NI / 3 / $NDTPS;
        $RN = $NN / 3 / $NDTPS;
        $RL = $NL / 3 / $NDTPS;

        $A = $RI / $a;
        $B = $RN / $b;
        $C = $RL / $c;

        if ($RI >= $a && $RN < $b) $RI = $a;
        if ($RI < $a && $RN >= $b) $RN = $b;
        if ($RL >= $c) $RL = $c;

        if ($RI > $a && $RN > $b) {
            $skor = 4;
        } elseif (0 < $NI && $NI <= $a || 0 < $NN && $NN <= $b || 0 < $NL && $NL <= $c) {
            $skor = 3.75 * (($A + $B + ($C / 2)) - ($A * $B) - (($A * $C) / 2) - (($B * $C) / 2) + (($A * $B * $C) / 2));
        } else {
            $skor = 0;
        }
        return $skor;
    }

    private function scorePublikasiIlmiah($tahun = null)
    {
        $NDTPS = $this->NDTPS();
        if ($tahun == null) {
            $NA1 = InputD::where('media_publikasi', 'Jurnal Nasional Tidak Terakreditasi')->count();
            $NA2 = InputD::where('media_publikasi', 'Jurnal Nasional Terakreditasi')->count();
            $NA3 = InputD::where('media_publikasi', 'Jurnal Internasional')->count();
            $NA4 = InputD::where('media_publikasi', 'Jurnal Internasional Bereputasi')->count();
            $NB1 = InputD::where('media_publikasi', 'Seminar Wilayah/Lokal/Perguruan Tinggi')->count();
            $NB2 = InputD::where('media_publikasi', 'Seminar Nasional')->count();
            $NB3 = InputD::where('media_publikasi', 'Seminar Internasional')->count();
            $NC1 = InputD::where('media_publikasi', 'Tulisan Di Media Massa Wilayah')->count();
            $NC2 = InputD::where('media_publikasi', 'Tulisan Di Media Massa Nasional')->count();
            $NC3 = InputD::where('media_publikasi', 'Tulisan Di Media Massa Internasional')->count();
        } else {
            $NA1 = InputD::where('media_publikasi', 'Jurnal Nasional Tidak Terakreditasi')->where('tahun', $tahun)->count();
            $NA2 = InputD::where('media_publikasi', 'Jurnal Nasional Terakreditasi')->where('tahun', $tahun)->count();
            $NA3 = InputD::where('media_publikasi', 'Jurnal Internasional')->where('tahun', $tahun)->count();
            $NA4 = InputD::where('media_publikasi', 'Jurnal Internasional Bereputasi')->where('tahun', $tahun)->count();
            $NB1 = InputD::where('media_publikasi', 'Seminar Wilayah/Lokal/Perguruan Tinggi')->where('tahun', $tahun)->count();
            $NB2 = InputD::where('media_publikasi', 'Seminar Nasional')->where('tahun', $tahun)->count();
            $NB3 = InputD::where('media_publikasi', 'Seminar Internasional')->where('tahun', $tahun)->count();
            $NC1 = InputD::where('media_publikasi', 'Tulisan Di Media Massa Wilayah')->where('tahun', $tahun)->count();
            $NC2 = InputD::where('media_publikasi', 'Tulisan Di Media Massa Nasional')->where('tahun', $tahun)->count();
            $NC3 = InputD::where('media_publikasi', 'Tulisan Di Media Massa Internasional')->where('tahun', $tahun)->count();
        }
        $RI = $NA4 + $NB3 + $NC3;
        $RN = ($NA2 + $NA3 + $NB2 + $NC2) / $NDTPS;
        $RW = ($NA1 + $NB1 + $NC1) / $NDTPS;
        $a = 0.1;
        $b = 1;
        $c = 2;

        $A = $RI / $a;
        $B = $RN / $b;
        $C = $RW / $c;

        if ($RI >= $a && $RN < $b) {
            $skor = 4;
        } elseif (($RI > 0 && $RI <= $a) || ($RN > 0 && $RN <= $c)) {
            $skor = 3.75 * (($A + $B + ($C / 2)) - ($A * $B) - (($A * $C) / 2) - (($B * $C) / 2) + (($A * $B * $C) / 2));
        } else {
            $skor = 0;
        }
        return $skor;
    }

    private function scoreKaryaIlmiahDTPS()
    {
        $NDTPS = $this->NDTPS();
        $NAS = InputE::count();
        $RS  = $NAS / $NDTPS;

        if ($RS >= 0.5) {
            $skor = 4;
        } else {
            $skor = 2 + (4 * $RS);
        }
        return $skor;
    }
}
