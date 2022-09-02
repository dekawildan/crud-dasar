<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CrudModel;
use DB;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //kodingan utama
        $lihatbuku=DB::select('CALL tampil_buku()');
        //$lihatbuku=DB::table('buku')->get();

        return view('index', compact('lihatbuku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //perintah simpan
        $judul=$request->judul_buku;
        $tgl_terbit=$request->tgl_terbit;
        $jml_stok=$request->jumlah;
        $simpan=DB::insert("CALL tambah_buku('$judul','$tgl_terbit','$jml_stok')");
        if($simpan) {
            return redirect('pesan')->with('pesan','Data telah ditambahkan');
        } else {
            return redirect('pesan')->with('pesan','Data Gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function caridata(Request $request)
    {
        $cari=$request->caridata;
        $lihatbuku=DB::select("CALL cari_buku('%$cari%')");
        return view('index', compact('lihatbuku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $idbuku=$request->id_buku;
        $judul=$request->judul_buku;
        $tgl_terbit=$request->tgl_terbit;
        $jml_stok=$request->jumlah;
        $update=DB::update("CALL update_buku('$idbuku','$judul','$tgl_terbit','$jml_stok')");
        if($update) {
            return redirect('pesan')->with('pesan','Data berhasil diedit');
        } else {
            return redirect('pesan')->with('pesan','Data Gagal diedit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //$idbuku=$request->id_buku;
        $hapus=DB::delete("CALL hapus_buku('$id')");
        if($hapus) {
            return redirect('pesan')->with('pesan','Data berhasil dihapus');
        } else {
            return redirect('pesan')->with('pesan','Data Gagal dihapus');
        }
    }
}
