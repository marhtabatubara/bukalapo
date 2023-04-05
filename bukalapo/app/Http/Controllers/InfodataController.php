<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\infodata;
use App\Postingan;
use File;
use Image;
use Auth;

class InfodataController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $batas = 4;
        $infodata = Infodata::orderBy('id','desc')->paginate($batas);
        $no = $batas * ($infodata->currentPage() - 1);
        $jumlah_infodata = Infodata::count();
        return view('admin.infodata.index', compact('infodata', 'no', 'jumlah_infodata'));
    }

    public function create(){
        $postingan = Postingan::all();
        return view('admin.infodata.create', compact('postingan'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'nama_infodata'=>'required',
            'gambar_infodata'=>'required|image|mimes:png,jpg,jpeg',
            'tanggal'=>'required|date',
            'id_postingan' => 'required',
            'keterangan_infodata'=>'required'
        ]);

        $infodata = New Infodata;
        $infodata->nama_infodata = $request->nama_infodata;
        $infodata->seo_infodata = Str::slug($request->nama_infodata);
        $infodata->id_postingan = $request->id_postingan;
        $infodata->tanggal = $request->tanggal;
        $infodata->keterangan_infodata = $request->keterangan_infodata;

        $gambar_infodata = $request->gambar_infodata;
        $namafile = time().'.'.$gambar_infodata->getClientOriginalExtension();

        Image::make($gambar_infodata)->resize(180,130)->save('thumb/'.$namafile);
        $gambar_infodata->move('images/',$namafile);

        $infodata->gambar_infodata = $namafile;
        $infodata->save();
        return redirect('/infodata')->with('pesan','Info data berhasil disimpan');
    }

    public function destroy($id){
        $infodata = Infodata::find($id);
        $namafile = $infodata->gambar_infodata;
        File::delete('images/'.$namafile);
        File::delete('thumb/'.$namafile);
        $infodata->delete();
        return redirect('/infodata')->with('pesan','Info data berhasil dihapus');
    }

    public function edit($id){
        $postingan = Postingan::all();
        $infodata = Infodata::find($id);
        return view('admin.infodata.edit', compact('postingan','infodata'));
    }

    public function update(Request $request, $id){
        $infodata = Infodata::find($id);
        if($request->has('gambar_infodata')){
            $infodata->nama_infodata = $request->nama_infodata;
            $infodata->seo_infodata = Str::slug($request->nama_infodata);
            $infodata->id_postingan = $request->id_postingan;
            $infodata->tanggal = $request->tanggal;
            $infodata->keterangan_infodata = $request->keterangan_infodata;

            $gambar_infodata= $request->gambar_infodata;
            $namafile = time().'.'.$gambar_infodata->getClientOriginalExtension();

            Image::make($gambar_infodata)->resize(180,130)->save('thumb/'.$namafile);
            $gambar_infodata->move('images/', $namafile);

            $infodata->gambar_infodata = $namafile;
        }
        else{
            $infodata->nama_infodata = $request->nama_infodata;
            $infodata->seo_infodata = Str::slug($request->nama_infodata);
            $infodata->id_postingan = $request->id_postingan;
            $infodata->tanggal = $request->tanggal;
            $infodata->keterangan_infodata = $request->keterangan_infodata;
        }
        $infodata->update();
        return redirect('/infodata')->with('pesan', 'Info data berhasil dihapus');
    }
}
