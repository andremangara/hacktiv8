<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Postingan;
use App\Models\Kategori;

class PortofolioController extends Controller
{
    public function index(): View
    {
        //get posts
        $posts = Postingan::latest()->paginate(100);
        $kategoris = Kategori::all();

        //render view with posts
        return view('portofolio', compact('posts', 'kategoris'));
    }

    public function create(Request $request)
    {
        //create post
        Postingan::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'kategori' => $request->kategori,
            'image' => $request->image
        ]);

        return redirect('/portofolio')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function update(Request $request, $id)
    {
        $post = Postingan::find($id);
        $post->update([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'kategori' => $request->kategori,
            'image' => $request->image
        ]);
        return redirect('/portofolio')->with(['success' => 'Data Berhasil update!']);
    }

    public function destroy(Request $request)
    {
        $post = Postingan::find($request->id);
        $post->delete();
        return redirect('/portofolio')->with(['success' => 'Data Berhasil delete!']);
    }
}
