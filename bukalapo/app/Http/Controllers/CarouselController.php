<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\carousel;
use App\Postingan;
use File;
use Image;
use Auth;

class CarouselController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $batas = 4;
        $carousel = Carousel::orderBy('id','desc')->paginate($batas);
        $no = $batas * ($carousel->currentPage() - 1);
        $jumlah_carousel = Carousel::count();
        return view('admin.carousel.index', compact('carousel', 'no', 'jumlah_carousel'));
    }

    public function create(){
        $postingan = Postingan::all();
        return view('admin.carousel.create', compact('postingan'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'nama_carousel'=>'required',
            'gambar_carousel'=>'required|image|mimes:png,jpg,jpeg',
            'tanggal'=>'required|date',
            'id_postingan' => 'required',
            'keterangan_carousel'=>'required'
        ]);

        $carousel = New Carousel;
        $carousel->nama_carousel = $request->nama_carousel;
        $carousel->seo_carousel = Str::slug($request->nama_carousel);
        $carousel->id_postingan = $request->id_postingan;
        $carousel->tanggal = $request->tanggal;
        $carousel->keterangan_carousel = $request->keterangan_carousel;

        $gambar_carousel = $request->gambar_carousel;
        $namafile = time().'.'.$gambar_carousel->getClientOriginalExtension();

        Image::make($gambar_carousel)->resize(180,130)->save('thumb/'.$namafile);
        $gambar_carousel->move('images/',$namafile);

        $carousel->gambar_carousel = $namafile;
        $carousel->save();
        return redirect('/carousel')->with('pesan','Data carousel berhasil disimpan');
    }

    public function destroy($id){
        $carousel = Carousel::find($id);
        $namafile = $carousel->gambar_carousel;
        File::delete('images/'.$namafile);
        File::delete('thumb/'.$namafile);
        $carousel->delete();
        return redirect('/carousel')->with('pesan','Data carousel berhasil dihapus');
    }

    public function edit($id){
        $postingan = Postingan::all();
        $carousel = Carousel::find($id);
        return view('admin.carousel.edit', compact('postingan','carousel'));
    }

    public function update(Request $request, $id){
        $carousel = Carousel::find($id);
        if($request->has('gambar_carousel')){
            $carousel->nama_carousel = $request->nama_carousel;
            $carousel->seo_carousel = Str::slug($request->nama_carousel);
            $carousel->id_postingan = $request->id_postingan;
            $carousel->tanggal = $request->tanggal;
            $carousel->keterangan_carousel = $request->keterangan_carousel;

            $gambar_carousel= $request->gambar_carousel;
            $namafile = time().'.'.$gambar_carousel->getClientOriginalExtension();

            Image::make($gambar_carousel)->resize(180,130)->save('thumb/'.$namafile);
            $gambar_carousel->move('images/', $namafile);

            $carousel->gambar_carousel = $namafile;
        }
        else{
            $carousel->nama_carousel = $request->nama_carousel;
            $carousel->seo_carousel = Str::slug($request->nama_carousel);
            $carousel->id_postingan = $request->id_postingan;
            $carousel->tanggal = $request->tanggal;
            $carousel->keterangan_carousel = $request->keterangan_carousel;
        }
        $carousel->update();
        return redirect('/carousel')->with('pesan', 'Data carousel berhasil dihapus');
    }
}
