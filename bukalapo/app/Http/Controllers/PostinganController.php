<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Postingan;
use File;

class PostinganController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        $no = 0;
        $postingan = Postingan::all();
        return view('admin.postingan.index', compact('postingan','no'));
    }

    public function create(){
        return view('admin.postingan.create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'nama_postingan'=>'required',
            'gambar'=>'required|image|mimes:png,jpg,jpeg'
        ]);

        $postingan = New Postingan;
        $postingan->nama_postingan = $request->nama_postingan;
        $postingan->seo_postingan = Str::slug($request->nama_postingan);
        
        $gambar = $request->gambar;
        $namafile = time().'.'.$gambar->getClientOriginalExtension();
        $gambar->move('images/', $namafile);

        $postingan->gambar = $namafile;
        $postingan->save();
        return redirect('/postingan')->with('pesan','Data postingan berhasil disimpan');
    }

    public function destroy($id){
        $postingan = Postingan::find($id);
        $namafile = $postingan->gambar;
        File::delete('images/'.$namafile);
        $postingan->delete();
        return redirect('/postingan')->with('pesan','Data Postingan berhasil dihapus');
    }

    public function edit($id){
        $postingan = Postingan::find($id);
        return view('admin.postingan.edit', compact('postingan'));
    }

    public function update(Request $request, $id){
        $postingan = Postingan::find($id);
        if ($request->has('gambar')){
            $postingan->nama_postingan = $request->nama_postingan;
            $postingan->seo_postingan = Str::slug($request->nama_postingan);

            $gambar = $request->gambar;
            $namafile = time().'.'.$gambar->getClientOriginalExtension();
            $gambar->move('images/', $namafile);
            $postingan->gambar = $namafile;
        }
        else{
            $postingan->nama_postingan = $request->nama_postingan;
            $postingan->seo_postingan = Str::slug($request->nama_postingan);
        }
        $postingan->update();
        return redirect('/postingan')->with('pesan','Data postingan berhasil diupdate');
    }
}
