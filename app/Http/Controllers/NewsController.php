<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Oracle;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class NewsController extends Controller
{
    public function oracle()
    {
        $data = new Oracle;
        return $data;
    }

    public function uploadFile(Request $request,$oke)
    {
            $result ='';
            $file = $request->file($oke);
            $name = $file->getClientOriginalName();

            $extension = explode('.',$name);
            $extension = strtolower(end($extension));

            $key = rand().'-'.$oke;
            $tmp_file_name = "{$key}.{$extension}";
            $tmp_file_path = "news/";
            $file->move($tmp_file_path,$tmp_file_name);

            $result = 'news'.'/'.$tmp_file_name;
        return $result;
    }

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

        $foto = $this->uploadFile($request,'image');
        $image_name = $foto;
        $upload = $this->oracle()->upFileOracle($image_name);

        DB::table('news')->insert([
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi,
            'image'=>$upload['message'],
            'created_at' =>now()
        ]);

        return redirect('admin/news');
    }

    public function show()
    {
        $news = DB::table('news')->orderby('id', 'desc')->get();
            return view('pages.Berita.berita', ['news'=>$news]
        );
    }

    public function detail($id)
    {
        $news = DB::table('news')->where('id', $id)->first();
        return view('pages.Berita.detailBerita', ['news'=>$news]);
    }

    public function edit($id)
    {
        $news = DB::table('news')->where('id', $id)->first();
        return view('pages.admin.news.editNews', ['news'=>$news]);
    }

    public function update(Request $request, $id)
    {
        $judul = $request->judul;
        $deskripsi = $request->deskripsi;

        if($request->file('image')!=null)
        {
            $foto = $this->uploadFile($request,'image');
            $file_name = $foto;
            $upOracle = $this->oracle()->upFileOracle($file_name);
        }else
        {
            $foto = $request->image;
        }

        DB::table('news')->where('id', $id)
                            ->update(['judul' => $judul, 'deskripsi' => $deskripsi, 'image' => $upOracle['message']]) ;

        Alert::success('Berhasil', 'Berita diupdate');
        return redirect()->route('news.index');
    }

    public function destroy($id)
    {
        DB::table('news')->where('id', $id)->delete();
        Alert::success('Berhasil', 'Berita terhapus');
        return redirect()->route('news.index');
    }

}
