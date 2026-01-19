<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Carbon\Carbon;


class AdminController extends Controller
{
   public function index()
    {
        $currentYear = date('Y');
        $lastYear = $currentYear - 1;
        
        $totalAnggota = User::count();

        $anggotaThisYear = User::where('tahun_masuk', $currentYear)->count();
        $anggotaLastYear = User::where('tahun_masuk', $lastYear)->count();

     
        if ($anggotaLastYear > 0) {
            $growthPercent = round(
                (($anggotaThisYear - $anggotaLastYear) / $anggotaLastYear) * 100,
                1
            );
        } else {
            $growthPercent = $anggotaThisYear > 0 ? 100 : 0;
        }

        $maxTarget = max($anggotaThisYear, $anggotaLastYear, 1);

       
        $anggotaMasukPercent = $totalAnggota > 0
            ? round(($anggotaThisYear / $totalAnggota) * 100, 1)
            : 0;

        $totalAlumni  = User::where('status', 'alumni')->count();
        $totalAktif   = User::where('status', 'aktif')->count();

        $persenAlumni = $totalAnggota > 0
            ? round(($totalAlumni / $totalAnggota) * 100, 1)
            : 0;

        
        $chartData = User::selectRaw('tahun_masuk, COUNT(*) as total')
            ->groupBy('tahun_masuk')
            ->orderBy('tahun_masuk', 'asc')
            ->get();

        $users = User::where('tahun_masuk', $currentYear)->get();
        $countAnggota = $users->count();

        $nama = session('nama');
        $role = session('role');

        return view('admin.dashboard', compact(
            'nama',
            'role',
            'users',
            'chartData',
            'anggotaThisYear',
            'anggotaLastYear',
            'growthPercent',          
            'anggotaMasukPercent',   
            'totalAnggota',
            'totalAlumni',
            'totalAktif',
            'persenAlumni',
            'currentYear',
            'lastYear',
            'countAnggota'
        ));
    }


        public function createUser()
    {
        return view('admin.anggota_create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'foto' => 'nullable|image|max:2048',
                'nia' => 'required|numeric|unique:users,nia',
                'username' => 'required|string|max:255|unique:users,name',
                'tempat_lahir' => 'required|string',
                'tanggal_lahir' => 'required|date',
                'nama_ayah' => 'required|string',
                'nama_ibu' => 'required|string',
                'tahun_masuk' => 'required|numeric',
                'jabatan' => 'required',
                'status' => 'required',
                'hak_akses' => 'required',
            ],
            [
                'nia.required' => 'NIA wajib diisi',
                'nia.unique' => 'NIA sudah terdaftar',
                'username.required' => 'Username wajib diisi',
                'username.unique' => 'Username sudah digunakan',
                'tempat_lahir.required' => 'Tempat lahir wajib diisi',
                'tanggal_lahir.required' => 'Tanggal lahir wajib diisi',
                'nama_ayah.required' => 'Nama ayah wajib diisi',
                'nama_ibu.required' => 'Nama ibu wajib diisi',
                'tahun_masuk.required' => 'Tahun masuk wajib diisi',
                'jabatan.required' => 'Jabatan wajib dipilih',
                'status.required' => 'Status wajib dipilih',
                'hak_akses.required' => 'Hak akses wajib dipilih',
                'foto.image' => 'File foto harus berupa gambar',
                'foto.max' => 'Ukuran foto maksimal 2MB',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $user = new User();
        $user->nia = $request->nia;
        $user->name = $request->username;
        $user->tempat_lahir = $request->tempat_lahir;
        $user->tanggal_lahir = $request->tanggal_lahir;
        $user->nama_ayah = $request->nama_ayah;
        $user->nama_ibu = $request->nama_ibu;
        $user->tahun_masuk = $request->tahun_masuk;
        $user->jabatan = $request->jabatan;
        $user->status = $request->status;
        $user->hak_akses = $request->hak_akses;
        $user->password = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $namaFoto = time().'_'.$foto->getClientOriginalName();
            $foto->move(public_path('foto_anggota'), $namaFoto);
            $user->foto = $namaFoto;
        }

        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Data anggota berhasil disimpan'
        ]);
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'foto' => 'nullable|image|max:2048',
            'nia' => 'required|numeric',
            'username' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'nama_ayah' => 'required|string',
            'nama_ibu' => 'required|string',
            'tahun_masuk' => 'required|numeric',
            'jabatan' => 'required',
            'pendidikan' => 'required', 
            'status' => 'required',
            'hak_akses' => 'required|string', 
            'password' => 'nullable|string|min:6',
        ]);
        $user->name = $request->username;
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']); 
        }
       
        if ($request->hasFile('foto')) {

           
            if ($user->foto && file_exists(public_path('foto_anggota/' . $user->foto))) {
                unlink(public_path('foto_anggota/' . $user->foto));
            }

            $file = $request->file('foto');
            $namaBaru = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('foto_anggota'), $namaBaru);

            $data['foto'] = $namaBaru;
        }
        $user->update($data);

        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        if ($user->foto && file_exists(public_path('foto_anggota/'.$user->foto))) {
            unlink(public_path('foto_anggota/'.$user->foto));
        }

        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data anggota berhasil dihapus'
        ]);
    }

    public function search(Request $request)
    {
        $query = $request->q;

        $data = User::where('username', 'like', "%$query%")
                    ->orWhere('nama', 'like', "%$query%")
                    ->get(['id', 'nama']);

        return response()->json($data);
    }
    public function checkNIA(Request $request)
    {
        $exists = User::where('nia', $request->nia)->exists();
        return response()->json(['exists' => $exists]);
    }

    public function checkUsername(Request $request)
    {
        $exists = User::where('name', $request->username)->exists();
        return response()->json(['exists' => $exists]);
    }
    public function growthCalc($year)
    {
        $now = User::where('tahun_masuk',$year)->count();
        $old = User::where('tahun_masuk',$year-1)->count();
        return ($old > 0) ? (($now-$old)/$old)*100 : 100;
    }

    public function listAnggota(Request $request)
    {
        $tahunFilter = $request->tahun ?? 'ALL';
        $search      = $request->search ?? null;

        $query = User::query();
        if($tahunFilter != 'ALL'){
            $query->where('tahun_masuk', $tahunFilter);
        }
        if($search){
            $query->where(function($q) use ($search){
                $q->where('name','like',"%$search%")
                ->orWhere('nia','like',"%$search%")
                ->orWhere('jabatan','like',"%$search%")
                ->orWhere('pendidikan','like',"%$search%");
            });
        }

        $users = $query->orderBy('name','asc')->paginate(10)->appends(request()->query());

        $tahunList = User::select('tahun_masuk')->distinct()->orderBy('tahun_masuk','desc')->get();

        return view('admin.data_anggota', compact('users','tahunList','tahunFilter','search'));
        
    }
    
    public function exportExcel()
    {
        return Excel::download(new UsersExport, 'data_users.xlsx');
    }

}


