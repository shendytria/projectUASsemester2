<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserActivity;
use App\Models\UserFotoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\file;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();

        return view('admin.users', compact('data'));
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.editUser', compact('data'));
    }
    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        User::create([
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => $request->password,
            'jenis_user_id' => 2
        ]);

        $user = User::latest()->first();
        $userId = $user->id;

        UserActivity::create([
            'user_id' => $userId,
            'status' => 'SUCCESS',
            'deskripsi' => $request->username . 'membuat akun baru',
            'function' => __FUNCTION__,
            'method' => $request->method()
        ]);

        Session::flash('success', 'Akun Berhasil Dibuat');
        return redirect('/');
    }

    public function update(Request $request, $id)
    {

        if ($request->userPP != '') {
            $current = UserFotoModel::find($id);

            file::delete('fotoProfile/' . $current->foto);

            $file = $request->file('userPP');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('fotoProfile', $fileName);

            $tujuan_upload = 'fotoProfile';
            $file->move($tujuan_upload, $fileName);

            UserFotoModel::insert([
                'user_id' => Auth::id(),
                'foto' => $fileName
            ]);

            $current->nama_user = $request->nama_user;
            $current->username = $request->username;
            $current->email = $request->email;
            $current->no_hp = $request->no_hp;
            $current->wa = $request->wa;
            $current->status_user = $request->status_user;


            return redirect('dashboard');
        } else {

            $current = User::find($id);

            $current->nama_user = $request->nama_user;
            $current->username = $request->username;
            $current->email = $request->email;
            $current->no_hp = $request->no_hp;
            $current->wa = $request->wa;
            $current->status_user = $request->status_user;
            
            $current->save();
        }



        Session::flash('success', 'Berhasil Update Profile');
        if (Auth::user()->id_jenis_user == 'admin') {
            return redirect('users')->with('success', 'Profile berhasil diupdate');
        } else {
            return redirect()->back()->with('success', 'Profile berhasil diupdate');
        }

    }
    public function hapus($id){
        $data = User::find($id);
        $data->delete();

        return redirect()->back()->with('success', 'profile berhasil dihapus');
    }
}
