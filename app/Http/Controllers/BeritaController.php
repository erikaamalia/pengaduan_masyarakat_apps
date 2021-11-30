<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Berita;
use RealRashid\SweetAlert\Facades\Alert;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( Auth::user()->roles != 'ADMIN')
        {

        Alert::warning('Peringatan', 'Maaf Anda tidak punya akses');
        return back();
        }

        $data = DB::table('berita')->get();
        return view('pages.admin.berita.index')->with(compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.berita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        'id' => 'required',
        'judul' => 'required',
        'headline' => 'required',
        'isi' => 'required',
        'tanggal' => 'required',
        'gambar' => 'required',
        // 'petugas_id' => 'required',
        ]);

        $berita = $request->all();

        $berita = Berita::create([
            'judul' => $request->judul,
            'headline' => $request->headline,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'gambar' => $request->gambar,
            // 'petugas_id' => Hash::make($request->password),
        ]);
        // echo "<pre>"; print_r($berita); die;


        // $berita = new Berita;
        // $berita->judul = $request->get('judul');
        // $berita->headline = $request->get('headline');
        // $berita->isi = $request->get('isi');
        // $berita->tanggal = $request->get('tanggal');
        // $berita->gambar = $request->get('gambar');
        // $berita->save();

        Alert::success('Berhasil', 'Berita baru ditambahkan');
        return redirect('admin/berita');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
