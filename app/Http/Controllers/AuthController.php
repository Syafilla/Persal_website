<?php


namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function index()
    {
        return view('log.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nia' => ['required'],
            'password' => ['required'],
        ]);
        $user = \App\Models\User::where('nia', $request->nia)->first();
        if ($user && $user->is_active == false) {
            return back()->with('loginError', 'Akun belum aktif. Silakan Register terlebih dahulu.');
        }
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->user()->hak_akses === 'admin') {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/anggota/dashboard');
            }
        }

        return back()->with('loginError', 'NIA atau Password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
    public function profile()
    {
        $user = Auth::user(); 

        if ($user->hak_akses == 'admin') {
            return view('admin.profile', compact('user'));
        }
        return view('anggota.profile', compact('user'));
    }
    
    public function ubahPassword(Request $request)
    {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:6|confirmed',
        ],
        [
            'password_lama.required' => 'Password lama wajib diisi',
            'password_baru.required' => 'Password baru wajib diisi',
            'password_baru.min' => 'Password baru minimal 6 karakter',
            'password_baru.confirmed' => 'Konfirmasi password tidak sesuai',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->password_lama, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Password lama salah'
            ], 422);
        }

        if (Hash::check($request->password_baru, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Password baru tidak boleh sama dengan password lama'
            ], 422);
        }

        $user->password = Hash::make($request->password_baru);
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Password berhasil diubah'
        ]);
    }

    public function registerPage()
    {
         return view('log.register');
    }
    public function checkNIARegister(Request $request)
    {
            $request->validate([
                'nia' => 'required'
            ]);

            $user = \App\Models\User::where('nia', $request->nia)->first();

            if (!$user) {
                return response()->json([
                    'status' => false,
                    'message' => 'NIA tidak ditemukan. Silakan hubungi admin.'
                ]);
            }

            if ($user->is_active == true) {
                return response()->json([
                    'status' => false,
                    'message' => 'Akun Anda sudah aktif, silakan login.'
                ]);
            }

            return response()->json([
                'status' => true,
                'data' => [
                    'name' => $user->name,
                    'tahun_masuk' => $user->tahun_masuk
                ]
            ]);
    }
    public function registerSubmit(Request $request)
    {
        $request->validate([
            'nia'      => 'required',
            'email'    => 'required|email|unique:users,email',
            'alamat' => 'required|string|max:255',
            'pendidikan' => 'required',
            'password' => 'required|min:6'
        ]);

        $user = \App\Models\User::where('nia', $request->nia)->firstOrFail();

        if ($user->is_active == true) {
            return back()->with('error', 'Akun sudah aktif.');
        }

        $user->update([
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'pendidikan' => $request->pendidikan,
            'alamat' => $request->alamat,
            'is_active'=> true
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }
    public function findNia(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $user = User::where('name', 'LIKE', '%' . $request->name . '%')->first();

        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data anggota tidak ditemukan'
            ]);
        }

        return response()->json([
            'status' => 'success',
            'data' => [
                'nia' => $user->nia,
                'tahun_masuk' => $user->tahun_masuk
            ]
        ]);
    }


}

