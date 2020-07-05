<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\ArtikelModel;
use App\Models\TagsModel;

class ArtikelController extends Controller
{
    //menampilkan data di index
    public function index(){
        $result = ArtikelModel::get_all();
        return view('article.index', compact('result'));
    }

    //form tambah artikel
    public function create(){
        return view('article.create');
    }

    //proses insert data artikel & tags
    public function store(Request $request){
        $result_article = ArtikelModel::save($request->all());
        $result_tags = TagsModel::save_tags($request->all());
        return redirect('/artikel')->with('alert', 'Berhasil Menambahkan Artikel');
    }

    // menampilkan detail artikel
    public function show($id){
        $article = ArtikelModel::find_id($id);
        $tags = TagsModel::show($id);
        return view('article.show', compact('article','tags'));
    }

    //menampilkan form edit
    public function edit($id){
        $article = ArtikelModel::find_id($id);
        $tags = TagsModel::show($id);
        foreach ($tags as $result) {
            $resultstr[] = $result->tag;
        }
        return view('article.edit',compact('article','resultstr'));   
    }

    //proses edit artikel
    public function update($id, Request $request){
        $question = ArtikelModel::update($id, $request->all());
        $delete_tags = TagsModel::destroy_tags($id);
        $result_tags = TagsModel::update_tags($id, $request->all());
        return redirect('/artikel')->with('alert', 'Berhasil Mengubah Artikel');
    }

    //menghapus data artikel dan tags
    public function destroy($id){
        $delete_article = ArtikelModel::destroy($id);
        $delete_tags = TagsModel::destroy_tags($id);
        return redirect('/artikel')->with('alert', 'Berhasil Menghapus Artikel');
    }
}
