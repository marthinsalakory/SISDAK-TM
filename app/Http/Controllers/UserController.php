<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function all(User $user, $role_id = null)
    {
        if ($role_id == 1) {
            $user = $user->where('role_id', 1);
        } elseif ($role_id == 2) {
            $user = $user->where('role_id', 2);
        } elseif ($role_id == 3) {
            $user = $user->where('role_id', 3);
        }

        return view('user.all', [
            'title' => 'Users',
            'users' => $user->get(),
            'role_id' => $role_id,
        ]);
    }

    public function insert(int $role_id = null)
    {
        return view('user.insert', [
            'title' => 'User',
            'role_id' => $role_id,
        ]);
    }

    public function store(Request $request, User $user, $role_id = null)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->id = $request->username;
        $user->nama = $request->nama;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role_id = $request->role_id;
        $user->save();

        return redirect()->route('user', $role_id)->with('success', 'Add user success!');
    }

    public function edit(User $user, $id)
    {
        $user = $user->find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        return view('user.edit', [
            'title' => 'User',
            'user' => $user,
            'role_id' => $user->role_id,
        ]);
    }

    public function update(Request $request, User $user, $id)
    {
        $user = $user->find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }

        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
        ]);

        $user->nama = $request->nama;
        $user->save();

        return redirect()->back()->with('success', 'Update user success!');
    }

    public function resetPassword($id)
    {
        if ($user = User::find($id)) {
            $user->password = Hash::make($user->username);
            $user->save();
        } else {
            return redirect()->back()->with('error', 'User not found');
        }

        // Lakukan logika reset password di sini

        return redirect()->back()->with('success', 'Password reset success!');
    }

    public function delete($id)
    {
        if ($user = User::find($id)) {
            if ($user->id == Auth::user()->id) return redirect()->back()->with('error', 'Tidak dapat hapus akun milik sendiri');
            $user->delete();
        } else {
            return redirect()->back()->with('error', 'User not found');
        }

        // Lakukan logika reset password di sini

        return redirect()->back()->with('success', 'Delete user success!');
    }

    public function profile(User $user, $id)
    {
        if (Auth::user()->role_id == 1) {
            $user = $user->find($id);
        } else {
            $user = $user->find(Auth::user()->id);
        }

        if ($user == null) return redirect()->back()->with('error', 'Pengguna tidak ditemukan');

        return view('user.profile', [
            'user' => $user
        ]);
    }

    public function profile_update(User $user, Request $request, $id)
    {
        if (Auth::user()->role_id == 1) {
            $user = $user->find($id);
        } else {
            $user = $user->find(Auth::user()->id);
        }

        if ($user == null) return redirect()->back()->with('error', 'Pengguna tidak ditemukan');

        if ($request->has('nama')) {
            $request->validate([
                'nama' => ['required', 'string', 'max:255'],
            ]);

            $user->nama = $request->nama;
            $user->save();

            return redirect()->back()->with('success', 'Berhasil mengubah nama');
        } else {
            $request->validate([
                'old_password' => ['required', 'string', 'max:255'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);

            if (!Hash::check($request->old_password, $user->password)) {
                return redirect()->back()->withErrors(['old_password' => 'Password lama salah']);
            }

            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->back()->with('success', 'Berhasil mengubah password');
        }
    }
}
