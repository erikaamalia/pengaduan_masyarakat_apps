<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use RealRashid\SweetAlert\Facades\Alert;

class NewsController extends Controller
{
    public function index()
    {
        if( Auth::user()->roles != 'ADMIN')
        {

        Alert::warning('Peringatan', 'Maaf Anda tidak punya akses');
        return back();
        }

        $news = DB::table('news')->orderby('id', 'desc')->paginate(5);
            return view('pages.admin.news.news', ['news'=>$news]
        );
    }

    public function create()
    {
        return view('pages.admin.news.createNews');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();

        DB::table('news')->insert([
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi,
            'image'=>$request->file('image')->store('assets/berita', 'public', $imageName),
            'created_at' =>now()
        ]);

        Alert::success('Berhasil', 'Berita baru ditambahkan');
        return redirect('admin/news');
    }

    public function show()
    {
        $news = DB::table('news')->orderby('id', 'desc')->get();
            return view('pages.Berita.berita', ['news'=>$news]
        );
    }

}
