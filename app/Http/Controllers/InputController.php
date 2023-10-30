<?php

namespace App\Http\Controllers;

use App\Models\InputA;
use App\Models\InputB;
use App\Models\InputC;
use App\Models\InputD;
use App\Models\InputE;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class InputController extends Controller
{
    public function index(User $user, InputA $inputA, $id)
    {
        if (Auth::user()->role_id == 1) {
            $user = $user->find($id);
            if ($user == null) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
            if ($user->role_id != 2) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
        } elseif (Auth::user()->role_id == 2) {
            if ($id != Auth::user()->id) return redirect()->back()->with('error', 'Akses ditolak');
            $user = $user->find($id);
        }

        if ($inputA->find($user->id) == null) {
            $inputA->id = $user->id;
            $inputA->save();
        }

        return view('input.A', [
            'user' => $user,
            'role_id' => $user->role_id,
            'inputA' => $inputA->find($user->id)
        ]);
    }


    public function A(User $user, InputA $inputA, $id)
    {
        if (Auth::user()->role_id == 1) {
            $user = $user->find($id);
            if ($user == null) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
            if ($user->role_id != 2) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
        } elseif (Auth::user()->role_id == 2) {
            if ($id != Auth::user()->id) return redirect()->back()->with('error', 'Akses ditolak');
            $user = $user->find($id);
        }

        if ($inputA->find($user->id) == null) {
            $inputA->id = $user->id;
            $inputA->save();
        }

        return view('input.A', [
            'user' => $user,
            'role_id' => $user->role_id,
            'inputA' => $inputA->find($user->id)
        ]);
    }

    public function storeA(Request $request, InputA $inputA, $id)
    {
        // Cek sudah ada di database
        if (Auth::user()->role_id == 1) {
            if ($inputA->find($id)) {
                $inputA = $inputA->find($id);
            }
        } else {
            if ($inputA->find(Auth::user()->id)) {
                $inputA = $inputA->find(Auth::user()->id);
            }
        }

        // Rules Defauld Validate
        $rules = [
            'pendidikan_pasca_sarjana' => 'required|string',
            'prodi_s2' => 'nullable|string',
            'ijasah_s2' => 'nullable|mimes:pdf',
            'prodi_s3' => 'nullable|string',
            'ijasah_s3' => 'nullable|mimes:pdf',
            'bidang_keahlian' => 'required|string',
            'kesesuaian_bidang_keahlian' => 'nullable|string',
            'jabatan_akademik' => 'nullable|string',
            'sk_jabatan_akademik' => 'nullable|mimes:pdf',
            'nomor_sertifikat_pendidikan_profesional' => 'nullable|string',
            'sertifikat_pendidikan_profesional' => 'nullable|mimes:pdf',
            'kesesuaian_matakuliah_diampu' => 'nullable|string',
        ];

        // Validasi pendidikan pasca sarjana
        $pendidikan_pasca_sarjana = $request->pendidikan_pasca_sarjana;
        if ($pendidikan_pasca_sarjana == 's2') {
            $rules['prodi_s2'] = 'required|string';
            $inputA->prodi_s2 =  $request->prodi_s2;
            if ($request->hasFile('ijasah_s2')) {
                if ($inputA->find($id)) {
                    Storage::delete('public/' . $inputA->ijasah_s2);
                }
                $request->file('ijasah_s2')->store('public');
                $inputA->ijasah_s2 =  $request->file('ijasah_s2')->hashName();
            }
            $inputA->prodi_s3 = null;
            $inputA->ijasah_s3 = null;
        } elseif ($pendidikan_pasca_sarjana == 's3') {
            $rules['prodi_s2'] = 'required|string';
            $rules['prodi_s3'] = 'required|string';
            $inputA->prodi_s2 =  $request->prodi_s2;
            if ($request->hasFile('ijasah_s2')) {
                if ($inputA->find($id)) {
                    Storage::delete('public/' . $inputA->ijasah_s2);
                }
                $request->file('ijasah_s2')->store('public');
                $inputA->ijasah_s2 =  $request->file('ijasah_s2')->hashName();
            }
            $inputA->prodi_s3 =  $request->prodi_s3;
            if ($request->hasFile('ijasah_s3')) {
                if ($inputA->find($id)) {
                    Storage::delete('public/' . $inputA->ijasah_s3);
                }
                $request->file('ijasah_s3')->store('public');
                $inputA->ijasah_s3 =  $request->file('ijasah_s3')->hashName();
            }
            $inputA->ijasah_s3 =  $request->ijasah_s3;
        } else {
            $inputA->prodi_s2 = null;
            $inputA->ijasah_s2 = null;
            $inputA->prodi_s3 = null;
            $inputA->ijasah_s3 = null;
        }

        // Jalankan validasi
        $request->validate($rules);

        $inputA->pendidikan_pasca_sarjana =  $request->pendidikan_pasca_sarjana;
        $inputA->bidang_keahlian =  $request->bidang_keahlian;
        $inputA->kesesuaian_bidang_keahlian =  $request->kesesuaian_bidang_keahlian;
        $inputA->jabatan_akademik =  $request->jabatan_akademik;
        if ($request->hasFile('sk_jabatan_akademik')) {
            if ($inputA->find($id)) {
                Storage::delete('public/' . $inputA->sk_jabatan_akademik);
            }
            $request->file('sk_jabatan_akademik')->store('public');
            $inputA->sk_jabatan_akademik =  $request->file('sk_jabatan_akademik')->hashName();
        }
        $inputA->nomor_sertifikat_pendidikan_profesional =  $request->nomor_sertifikat_pendidikan_profesional;
        if ($request->hasFile('sertifikat_pendidikan_profesional')) {
            if ($inputA->find($id)) {
                Storage::delete('public/' . $inputA->sertifikat_pendidikan_profesional);
            }
            $request->file('sertifikat_pendidikan_profesional')->store('public');
            $inputA->sertifikat_pendidikan_profesional =  $request->file('sertifikat_pendidikan_profesional')->hashName();
        }

        if (empty($request->matakuliah_diampu)) {
            $inputA->matakuliah_diampu =  [];
        } else {
            $inputA->matakuliah_diampu =  json_encode($request->matakuliah_diampu);
        }
        $inputA->kesesuaian_matakuliah_diampu =  $request->kesesuaian_matakuliah_diampu;

        if (empty($request->matakuliah_diampu_pada_prodi_lain)) {
            $inputA->matakuliah_diampu_pada_prodi_lain =  [];
        } else {
            $inputA->matakuliah_diampu_pada_prodi_lain =  json_encode($request->matakuliah_diampu_pada_prodi_lain);
        }
        $inputA->save();

        return redirect()->back()->with('success', 'Berhasil menyimpan perubahan');
    }

    public function B(User $user, InputB $inputB, $id)
    {
        if (Auth::user()->role_id == 1) {
            $user = $user->find($id);
            if ($user == null) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
            if ($user->role_id != 2) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
        } else {
            if ($id != Auth::user()->id) return redirect()->back()->with('error', 'Akses ditolak');
            $user = $user->find($id);
        }

        if ($inputB->where('user_id', $user->id)->count() == null) {
            $inputB->user_id = $user->id;
            $inputB->save();
        }

        return view('input.B', [
            'user' => $user,
            'id' => $id,
            'role_id' => $user->role_id,
            'inputB' => $inputB->where('user_id', $user->id)->get()
        ]);
    }

    public function addB(User $user, InputB $inputB, $id)
    {
        if (Auth::user()->role_id == 1) {
            $user = $user->find($id);
            if ($user == null) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
            if ($user->role_id != 2) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
        } else {
            if ($id != Auth::user()->id) return redirect()->back()->with('error', 'Akses ditolak');
            $user = $user->find($id);
        }

        $inputB->user_id = $user->id;
        $inputB->save();
        return redirect()->back();
    }

    public function deleteB(User $user, InputB $inputB, $id, $inputb_id)
    {

        $inputB = $inputB->find($inputb_id);
        if (!$inputB) {
            return redirect()->back()->with('error', 'Input tidak ditemukan');
        }

        $id = $inputB->user_id;
        if (Auth::user()->role_id == 1) {
            $user = $user->find($id);
            if ($user == null) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
            if ($user->role_id != 2) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
        } else {
            if ($id != Auth::user()->id) return redirect()->back()->with('error', 'Akses ditolak');
            $user = $user->find($id);
        }

        Storage::delete('public' . $inputB->file);
        $inputB->delete();
        return redirect()->back()->with('success', 'Success delete data');
    }

    public function storeB(User $user, Request $request, InputB $inputB, $id)
    {
        if (Auth::user()->role_id == 1) {
            $user = $user->find($id);
            if ($user == null) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
            if ($user->role_id != 2) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
        } else {
            if ($id != Auth::user()->id) return redirect()->back()->with('error', 'Akses ditolak');
            $user = $user->find($id);
        }

        $request->validate([
            'id' => 'required:string',
            'file' => 'nullable|mimes:pdf',
            'sumber_pembiayaan' => 'required:string',
            'judul_penelitian' => 'required:string',
            'tahun' => 'required:string',
        ]);

        $inputB = $inputB->find($request->id);
        if (!$inputB) {
            return redirect()->back()->with('error', 'Error input');
        }

        if ($request->hasFile('file')) {
            if ($inputB->find($id)) {
                Storage::delete('public/' . $inputB->file);
            }
            $request->file('file')->store('public');
            $inputB->file =  $request->file('file')->hashName();
        }
        $inputB->sumber_pembiayaan = $request->sumber_pembiayaan;
        $inputB->judul_penelitian = $request->judul_penelitian;
        $inputB->tahun = $request->tahun;
        $inputB->save();

        return redirect()->back()->with('success', 'Berhasil menyimpan perbuahan');
    }

    public function C(User $user, InputC $inputC, $id)
    {
        if (Auth::user()->role_id == 1) {
            $user = $user->find($id);
            if ($user == null) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
            if ($user->role_id != 2) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
        } else {
            if ($id != Auth::user()->id) return redirect()->back()->with('error', 'Akses ditolak');
            $user = $user->find($id);
        }

        if ($inputC->where('user_id', $user->id)->count() == null) {
            $inputC->user_id = $user->id;
            $inputC->save();
        }

        return view('input.C', [
            'user' => $user,
            'id' => $id,
            'role_id' => $user->role_id,
            'inputC' => $inputC->where('user_id', $user->id)->get()
        ]);
    }

    public function addC(User $user, InputC $inputC, $id)
    {
        if (Auth::user()->role_id == 1) {
            $user = $user->find($id);
            if ($user == null) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
            if ($user->role_id != 2) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
        } else {
            if ($id != Auth::user()->id) return redirect()->back()->with('error', 'Akses ditolak');
            $user = $user->find($id);
        }

        $inputC->user_id = $user->id;
        $inputC->save();
        return redirect()->back();
    }

    public function deleteC(User $user, InputC $inputC, $id, $inputc_id)
    {

        $inputC = $inputC->find($inputc_id);
        if (!$inputC) {
            return redirect()->back()->with('error', 'Input tidak ditemukan');
        }

        $id = $inputC->user_id;
        if (Auth::user()->role_id == 1) {
            $user = $user->find($id);
            if ($user == null) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
            if ($user->role_id != 2) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
        } else {
            if ($id != Auth::user()->id) return redirect()->back()->with('error', 'Akses ditolak');
            $user = $user->find($id);
        }

        Storage::delete('public' . $inputC->file);
        $inputC->delete();
        return redirect()->back()->with('success', 'Success delete data');
    }

    public function storeC(User $user, Request $request, InputC $inputC, $id)
    {
        if (Auth::user()->role_id == 1) {
            $user = $user->find($id);
            if ($user == null) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
            if ($user->role_id != 2) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
        } else {
            if ($id != Auth::user()->id) return redirect()->back()->with('error', 'Akses ditolak');
            $user = $user->find($id);
        }

        $request->validate([
            'id' => 'required:string',
            'file' => 'nullable|mimes:pdf',
            'sumber_pembiayaan' => 'required:string',
            'judul_penelitian' => 'required:string',
            'tahun' => 'required:string',
        ]);

        $inputC = $inputC->find($request->id);
        if (!$inputC) {
            return redirect()->back()->with('error', 'Error input');
        }

        $inputC->sumber_pembiayaan = $request->sumber_pembiayaan;
        if ($request->hasFile('file')) {
            if ($inputC->find($id)) {
                Storage::delete('public/' . $inputC->file);
            }
            $request->file('file')->store('public');
            $inputC->file =  $request->file('file')->hashName();
        }
        $inputC->judul_penelitian = $request->judul_penelitian;
        $inputC->tahun = $request->tahun;
        $inputC->save();

        return redirect()->back()->with('success', 'Berhasil menyimpan perbuahan');
    }

    public function D(User $user, InputD $inputD, $id)
    {
        if (Auth::user()->role_id == 1) {
            $user = $user->find($id);
            if ($user == null) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
            if ($user->role_id != 2) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
        } else {
            if ($id != Auth::user()->id) return redirect()->back()->with('error', 'Akses ditolak');
            $user = $user->find($id);
        }

        if ($inputD->where('user_id', $user->id)->count() == null) {
            $inputD->user_id = $user->id;
            $inputD->save();
        }

        return view('input.D', [
            'user' => $user,
            'id' => $id,
            'role_id' => $user->role_id,
            'inputD' => $inputD->where('user_id', $user->id)->get()
        ]);
    }

    public function addD(User $user, InputD $inputD, $id)
    {
        if (Auth::user()->role_id == 1) {
            $user = $user->find($id);
            if ($user == null) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
            if ($user->role_id != 2) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
        } else {
            if ($id != Auth::user()->id) return redirect()->back()->with('error', 'Akses ditolak');
            $user = $user->find($id);
        }

        $inputD->user_id = $user->id;
        $inputD->save();
        return redirect()->back();
    }

    public function deleteD(User $user, InputD $inputD, $id, $inputd_id)
    {

        $inputD = $inputD->find($inputd_id);
        if (!$inputD) {
            return redirect()->back()->with('error', 'Input tidak ditemukan');
        }

        $id = $inputD->user_id;
        if (Auth::user()->role_id == 1) {
            $user = $user->find($id);
            if ($user == null) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
            if ($user->role_id != 2) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
        } else {
            if ($id != Auth::user()->id) return redirect()->back()->with('error', 'Akses ditolak');
            $user = $user->find($id);
        }

        Storage::delete('public' . $inputD->file);
        $inputD->delete();
        return redirect()->back()->with('success', 'Success delete data');
    }

    public function storeD(User $user, Request $request, InputD $inputD, $id)
    {
        if (Auth::user()->role_id == 1) {
            $user = $user->find($id);
            if ($user == null) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
            if ($user->role_id != 2) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
        } else {
            if ($id != Auth::user()->id) return redirect()->back()->with('error', 'Akses ditolak');
            $user = $user->find($id);
        }

        $request->validate([
            'id' => 'required:string',
            'file' => 'nullable|mimes:pdf',
            'judul_penelitian' => 'required:string',
            'media_publikasi' => 'required:string',
            'tahun' => 'required:string',
            'link_publikasi_ilmiah' => 'required:string',
        ]);

        $inputD = $inputD->find($request->id);
        if (!$inputD) {
            return redirect()->back()->with('error', 'Error input');
        }

        if ($request->hasFile('file')) {
            if ($inputD->find($id)) {
                Storage::delete('public/' . $inputD->file);
            }
            $request->file('file')->store('public');
            $inputD->file =  $request->file('file')->hashName();
        }
        $inputD->media_publikasi = $request->media_publikasi;
        $inputD->judul_penelitian = $request->judul_penelitian;
        $inputD->tahun = $request->tahun;
        $inputD->link_publikasi_ilmiah = $request->link_publikasi_ilmiah;
        $inputD->save();

        return redirect()->back()->with('success', 'Berhasil menyimpan perbuahan');
    }

    public function E(User $user, InputE $inputE, $id)
    {
        if (Auth::user()->role_id == 1) {
            $user = $user->find($id);
            if ($user == null) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
            if ($user->role_id != 2) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
        } else {
            if ($id != Auth::user()->id) return redirect()->back()->with('error', 'Akses ditolak');
            $user = $user->find($id);
        }

        if ($inputE->where('user_id', $user->id)->count() == null) {
            $inputE->user_id = $user->id;
            $inputE->save();
        }

        return view('input.E', [
            'user' => $user,
            'id' => $id,
            'role_id' => $user->role_id,
            'inputE' => $inputE->where('user_id', $user->id)->get()
        ]);
    }

    public function addE(User $user, InputE $inputE, $id)
    {
        if (Auth::user()->role_id == 1) {
            $user = $user->find($id);
            if ($user == null) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
            if ($user->role_id != 2) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
        } else {
            if ($id != Auth::user()->id) return redirect()->back()->with('error', 'Akses ditolak');
            $user = $user->find($id);
        }

        $inputE->user_id = $user->id;
        $inputE->save();
        return redirect()->back();
    }

    public function deleteE(User $user, InputE $inputE, $id, $inpute_id)
    {

        $inputE = $inputE->find($inpute_id);
        if (!$inputE) {
            return redirect()->back()->with('error', 'Input tidak ditemukan');
        }

        $id = $inputE->user_id;
        if (Auth::user()->role_id == 1) {
            $user = $user->find($id);
            if ($user == null) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
            if ($user->role_id != 2) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
        } else {
            if ($id != Auth::user()->id) return redirect()->back()->with('error', 'Akses ditolak');
            $user = $user->find($id);
        }

        Storage::delete('public' . $inputE->file);
        $inputE->delete();
        return redirect()->back()->with('success', 'Success delete data');
    }

    public function storeE(User $user, Request $request, InputE $inputE, $id)
    {
        if (Auth::user()->role_id == 1) {
            $user = $user->find($id);
            if ($user == null) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
            if ($user->role_id != 2) return redirect()->back()->with('error', 'Dosen tidak ditemukan');
        } else {
            if ($id != Auth::user()->id) return redirect()->back()->with('error', 'Akses ditolak');
            $user = $user->find($id);
        }

        $request->validate([
            'id' => 'required:string',
            'file' => 'nullable|mimes:pdf',
            'judul_artikel' => 'required:string',
            'jumlah_sitasi' => 'required:string',
            'dosen_peneliti' => 'required:string',
        ]);

        $inputE = $inputE->find($request->id);
        if (!$inputE) {
            return redirect()->back()->with('error', 'Error input');
        }

        if ($request->hasFile('file')) {
            if ($inputE->find($id)) {
                Storage::delete('public/' . $inputE->file);
            }
            $request->file('file')->store('public');
            $inputE->file =  $request->file('file')->hashName();
        }
        $inputE->dosen_peneliti = $request->dosen_peneliti;
        $inputE->judul_artikel = $request->judul_artikel;
        $inputE->jumlah_sitasi = $request->jumlah_sitasi;
        $inputE->link_artikel = $request->link_artikel;
        $inputE->save();

        return redirect()->back()->with('success', 'Berhasil menyimpan perbuahan');
    }
}
