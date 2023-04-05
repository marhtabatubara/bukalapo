<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Artikel;
use App\Postingan;
use File;
use Image;
use Auth;

class ArtikelController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $batas = 4;
        $artikel = Artikel::orderBy('id','desc')->paginate($batas);
        $no = $batas * ($artikel->currentPage() - 1);
        $jumlah_artikel = Artikel::count();
        return view('admin.artikel.index', compact('artikel', 'no', 'jumlah_artikel'));
    }

    public function create(){
        $postingan = Postingan::all();
        return view('admin.artikel.create', compact('postingan'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'nama_artikel'=>'required',
            'gambar_artikel'=>'required|image|mimes:png,jpg,jpeg',
            'tanggal'=>'required|date',
            'id_postingan' => 'required',
            'keterangan_artikel'=>'required'
        ]);

        $artikel = New Artikel;
        $artikel->nama_artikel = $request->nama_artikel;
        $artikel->seo_artikel = Str::slug($request->nama_artikel);
        $artikel->id_postingan = $request->id_postingan;
        $artikel->tanggal = $request->tanggal;
        $artikel->keterangan_artikel = $request->keterangan_artikel;
        $artikel->id_user = Auth::id();

        $gambar_artikel = $request->gambar_artikel;
        $namafile = time().'.'.$gambar_artikel->getClientOriginalExtension();

        Image::make($gambar_artikel)->resize(180,130)->save('thumb/'.$namafile);
        $gambar_artikel->move('images/',$namafile);

        $artikel->gambar_artikel = $namafile;
        $artikel->save();
        return redirect('/artikel')->with('pesan','Data artikel berhasil disimpan');
    }

    public function destroy($id){
        $artikel = Artikel::find($id);
        $namafile = $artikel->gambar_artikel;
        File::delete('images/'.$namafile);
        File::delete('thumb/'.$namafile);
        $artikel->delete();
        return redirect('/artikel')->with('pesan','Data artikel berhasil dihapus');
    }

    public function edit($id){
        $postingan = Postingan::all();
        $artikel = Artikel::find($id);
        return view('admin.artikel.edit', compact('postingan','artikel'));
    }

    public function update(Request $request, $id){
        $artikel = Artikel::find($id);
        if($request->has('gambar_artikel')){
            $artikel->nama_artikel = $request->nama_artikel;
            $artikel->seo_artikel = Str::slug($request->nama_artikel);
            $artikel->id_postingan = $request->id_postingan;
            $artikel->tanggal = $request->tanggal;
            $artikel->keterangan_artikel = $request->keterangan_artikel;

            $gambar_artikel= $request->gambar_artikel;
            $namafile = time().'.'.$gambar_artikel->getClientOriginalExtension();

            Image::make($gambar_artikel)->resize(180,130)->save('thumb/'.$namafile);
            $gambar_artikel->move('images/', $namafile);

            $artikel->gambar_artikel = $namafile;
        }
        else{
            $artikel->nama_artikel = $request->nama_artikel;
            $artikel->seo_artikel = Str::slug($request->nama_artikel);
            $artikel->id_postingan = $request->id_postingan;
            $artikel->tanggal = $request->tanggal;
            $artikel->keterangan_artikel = $request->keterangan_artikel;
        }
        $artikel->update();
        return redirect('/artikel')->with('pesan', 'Data artikel berhasil dihapus');
    }

}
