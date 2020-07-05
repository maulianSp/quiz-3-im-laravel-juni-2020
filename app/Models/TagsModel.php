<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class TagsModel{
    //simpan data ke tabel tags
    public static function save_tags($data){
        $tags = $data['tags'];
        $id = DB::getPdo()->lastInsertId();
        foreach(explode(',',$tags) as $row){
            $new_tags[] = DB::table('tags')->insert(
                [
                    'tag' => $row,
                    'articles_id' => $id
                ]
            );
        }
        
        return $new_tags;
    }

    //simpan ulang data ke tabel tags berdasarkan id
    public static function update_tags($id, $data){
        $tags = $data['tags'];
        foreach(explode(',',$tags) as $row){
            $new_tags[] = DB::table('tags')->insert(
                [
                    'tag' => $row,
                    'articles_id' => $id
                ]
            );
        }
        
        return $new_tags;
    }

    //menampilkan tags berdasarkan id artikel
    public static function show($id){
        $result = DB::table('tags')
        ->join('articles','tags.articles_id','=','articles.id')
        ->where('articles.id',$id)
        ->select('tags.*')
        ->get();
        return $result;
    }
    
    //hapus data tags berdasarkan artikel
    public static function destroy_tags($id){
        $delete_tags = DB::table('tags')
        ->where('articles_id',$id)
        ->delete();

        return $delete_tags;
    }
}
