<?php

namespace App\Http\Controllers;

use App\Models\ErrorLogModel;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {

        try {
            $request->validate([
                'email' => 'required',
                'password' => 'required|string|',
            ]);

            $data = [
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ];

            // iki fungsi e membuat error buatan dadi ben isok ditangkep karo try catch
            // try catch iku fungsi nggawe nangkep eror
            //  throw new \Exception('This is a test exception.');

            if (Auth::attempt($data)) {

                UserActivity::create([
                    'user_id' => Auth::id(),
                    'status' => 'SUCCESS',
                    'deskripsi' => 'melakukan login',
                ]);

                // jika kolom id_jenis_user = admin maka aakan diarahkan ke /users
                // jika id_jenis_user tidak sama dengan admin akan diarahkan ke /dashboard
                if (Auth::user()->id_jenis_user == 'admin') {
                    return redirect('/users');
                } else {
                    return redirect('/dashboard');
                }
            } else {
                Session::flash('error', 'Email atau password salah');
                return redirect('/');
            }

         // iki gawe nangkep error e 
        } catch (\Exception $e) {
            $data = [
                'id_user' => Auth::id() ?? NULL,
                'error_date' => now(),
                'controller' => Route::currentRouteAction(),
                'function' => __FUNCTION__,
                'error_line' => $e->getLine(),
                'error_message' => $e->getMessage(),
                'status' => 'ERROR',
                'param' => json_encode($request->all())
            ];
            // return $data;    
            ErrorLogModel::create($data);


            Session::flash('error', 'Terjadi kesalahan pada sistem. Silakan coba lagi nanti.');
            return redirect('/');
        }
    }

    public function logout(Request $request)
    {

        UserActivity::create([
            'user_id' => Auth::id(),
            'status' => 'SUCCESS',
            'deskripsi' => 'melakukan logout',
        ]);

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
