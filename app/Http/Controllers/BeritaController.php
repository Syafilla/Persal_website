<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Comment;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BeritaController extends Controller
{
    public function indexPublic()
    {
        $berita = Berita::orderBy('created_at','desc')->paginate(8);
        $slider_berita = Berita::orderBy('created_at','desc')->limit(3)->get();
        $trending = Berita::orderBy('views','desc')->limit(5)->get();

        return view('public.berita.index', compact('berita','slider_berita','trending'));
    }

    public function detailPublic($slug)
    {
        $berita = Berita::where('slug',$slug)->firstOrFail();

        $berita->increment('views');

        $komentar = Comment::where('berita_id',$berita->id)
                    ->orderBy('created_at','DESC')
                    ->get();

        $lainnya  = Berita::where('id','!=',$berita->id)->latest()->limit(5)->get();
        $trending = Berita::orderBy('views','desc')->limit(5)->get();

        return view('public.berita.detail', compact(
            'berita','lainnya','komentar','trending'
        ));
    }

    public function indexAnggota()
    {
        $berita = Berita::orderBy('created_at','desc')->paginate(8);
        $slider_berita = Berita::orderBy('created_at','desc')->limit(3)->get();
        $trending = Berita::orderBy('views','desc')->limit(5)->get();

        return view('anggota.berita.index', compact('berita','slider_berita','trending'));
    }

    public function detailAnggota($slug)
    {
        $berita = Berita::where('slug',$slug)->firstOrFail();
        $berita->increment('views');

        $komentar = Comment::where('berita_id',$berita->id)->latest()->get();
        $lainnya  = Berita::where('id','!=',$berita->id)->latest()->limit(5)->get();

        return view('anggota.berita.detail', compact('berita','komentar','lainnya'));
    }

    public function index()
    {
        $berita = Berita::orderBy('created_at','desc')->paginate(10);
        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'=>'required',
            'kategori'=>'required',
            'isi'=>'required',
            'gambar'=>'required|image'
        ]);

        $file = $request->file('gambar');
        $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
        $file->move(public_path('post'), $filename);

        Berita::create([
            'judul' => $request->judul,
            'slug'  => Str::slug($request->judul) . '-' . time(),
            'kategori' => $request->kategori,
            'isi' => $request->isi,
            'gambar' => $filename,
            'penulis' => auth()->user()->name,
            'tanggal_publish' => Carbon::now(),
            'views' => 0
        ]);

        return redirect()->route('admin.berita')->with('success','Berita berhasil dipublish!');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);

        $komentar = Comment::where('berita_id', $id)
                    ->orderBy('created_at', 'DESC')
                    ->get();

        return view('admin.berita.edit', compact('berita', 'komentar'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $img = $berita->gambar;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $file->move(public_path('post'), $filename);
            $img = $filename;
        }

        $berita->update([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul) . '-' . time(),
            'kategori' => $request->kategori,
            'isi' => $request->isi,
            'gambar' => $img
        ]);

        return back()->with('success','Berita berhasil diperbarui');
    }

    public function delete($id)
    {
        Berita::findOrFail($id)->delete();
        return back()->with('success','Berita berhasil dihapus');
    }

    public function komentar(Request $r, $id)
    {
        if (Auth::check() && Auth::user()->hak_akses == 'admin') {
            return back()->with('error', 'Admin tidak dapat mengirim komentar sebagai public.');
        }

        $r->validate([
            'komentar' => 'required',
            'email' => (Auth::check() ? 'nullable|email' : 'required|email'),
            'nama'  => (Auth::check() ? 'nullable' : 'required')
        ]);

        $berita = Berita::findOrFail($id);

        if (Auth::check()) {
            $nama = Auth::user()->name;
            $email = Auth::user()->email;
            $user_id = Auth::id();
        } 
        else {
            $nama = $r->nama;
            $email = $r->email;
            $user_id = null;
        }

        $komen = Comment::create([
            'berita_id' => $id,
            'nama' => $nama,
            'email' => $email,
            'user_id' => $user_id,
            'komentar' => $r->komentar,
            'reply_to' => null
        ]);

        Notification::create([
            'tipe'        => 'komentar',
            'berita_id'   => $berita->id,
            'komentar_id' => $komen->id,
            'pesan'       => "$nama mengomentari berita: $berita->judul",
            'link'        => '#comment-' . $komen->id,
            'status'      => false
        ]);

        return back()->with('sukses', 'Komentar berhasil dikirim!');
    }

    public function balasKomentar(Request $r, $id)
    {
        $r->validate([
            'balasan' => 'required'
        ]);

        $komen = Comment::findOrFail($id);

        $komen->update([
            'balasan' => $r->balasan,
            'reply_to' => $id
        ]);

        return back()->with('scrollTo', $id);
    }

    public function notifyRead($id)
    {
        $notif = Notification::findOrFail($id);
        $notif->update(['status' => true]);

        if ($notif->berita_id) {
            return redirect()->route('admin.berita.edit', $notif->berita_id)
                             ->with('scrollTo', $notif->komentar_id);
        }

        return back()->with('error', 'Notifikasi tidak memiliki data berita.');
    }
}
