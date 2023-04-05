<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Postingan;
use App\Infodata;
use App\Carousel;

class GuestController extends Controller
{
    public function index(){
        $postingan = Postingan::all();
        return view('welcome', compact('postingan'));
    }

    public function indexinfodata(){
        $postingan = Postingan::all();
        $infodata = Infodata::all();
        return view('welcomeinfodata', compact('postingan','infodata'));
    }

    public function indexcarousel(){
        $postingan = Postingan::all();
        $carousel = Carousel::all();
        return view('welcomecarousel', compact('postingan','carousel'));
    }

    public function fotoartikel($title){
        $postingans = Postingan::where('seo_postingan', $title)->first();
        $artikels = $postingans->fotoartikels()->orderBy('id','desc')->paginate(6);
        return view('guest.artikel', compact('postingans','artikels'));
    }

    public function fotoinfodata($title){
        $postingans = Postingan::where('seo_postingan', $title)->first();
        $infodatas = $postingans->fotoinfodatas()->orderBy('id','desc')->paginate(6);
        return view('guest.infodata', compact('postingans','infodatas'));
    }

    public function fotocarousel($title){
        $postingans = Postingan::where('seo_postingan', $title)->first();
        $carousels = $postingans->fotocarousels()->orderBy('id','desc')->paginate(6);
        return view('guest.carousel', compact('postingans','carousels'));
    }
}
