<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Galeri;
use App\Models\Kategori;

class GaleriController extends Controller
{
    public function index(){
        $kategori = Kategori::all();
        $galeri = Galeri::with('kategori')->latest()->get();
        return view('anggota.galeri', compact('kategori','galeri'));
    }

    public function indexlic(){
        $kategori = Kategori::all();
        $galeri = Galeri::with('kategori')->latest()->get();
        return view('public.galeri', compact('kategori','galeri'));
    }

    public function admin(){
        return view('admin.galeri', [
            'kategori'=>Kategori::all(),
            'galeri'=>Galeri::with('kategori')->latest()->get()
        ]);
    }

    public function storeKategori(Request $req){
        $req->validate(['nama_kategori'=>'required']);
        Kategori::create($req->all());
        return back()->with('success','Kategori berhasil ditambahkan');
    }

    public function storeFoto(Request $req){
        $req->validate([
            'kategori_id'=>'required',
            'angkatan'=>'required',
            'foto.*'=>'image|mimes:jpg,png,jpeg|max:4096',
        ]);

        
        if($req->hasFile('foto')){
            foreach($req->file('foto') as $file){
                $fileName = time().rand(1,1000).'.'.$file->extension();
                $file->move(public_path('galeri'), $fileName);

                Galeri::create([
                    'kategori_id'=>$req->kategori_id,
                    'foto'=>'galeri/'.$fileName,
                    'angkatan'=>$req->angkatan
                ]);
            }
        }

        return back()->with('success','Foto berhasil ditambahkan');
    }


    public function download($id){
        $file = Galeri::findOrFail($id)->foto;
        return response()->download(public_path($file));
    }



    public function hapusFoto($id){
        Galeri::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }



   public function hapusKategori($id){
        $kategori = Kategori::findOrFail($id);

        Galeri::where('kategori_id',$id)->delete();

        $kategori->delete();

        return response()->json(['success' => true]);
    }

    public function filterAjax($id = null){
        $data = Galeri::with('kategori');

        if($id){
            $data = $data->where('kategori_id', $id);
        }

        return response()->json($data->get());
    }
    public function updateFoto(Request $request, $id)
    {
        $foto = Galeri::findOrFail($id);

        $foto->update([
            'kategori_id' => $request->kategori_id,
            'angkatan' => $request->angkatan
        ]);

        return response()->json([
            'success' => true,
            'kategori' => $foto->kategori->nama_kategori,
            'angkatan' => $foto->angkatan
        ]);
    }


}

