<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class ArtikelModel{
    //menampilkan semua data berdasarakan insert terakhir
    public static function get_all(){
        $result = DB::table('articles')->orderBy('id','desc')->get();
        return $result;
    }

    //simpan data ke tabel articles
    public static function save($data){
        $slug_result = str_slug($data['title'], "-");
        $new_data = DB::table('articles')->insert(
            [
                'title' => $data['title'],
                'content' => $data['content'],
                'slug' => $slug_result,
                'users_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        );
        return $new_data;
    }

    //mencari id berdasarkan id artikel
    public static function find_id($id){
        $result = DB::table('articles')->where('id',$id)->first();
        return $result;
    }

    //proses mengedit data artikel
    public static function update($id,$request){
        $update_data = DB::table('articles')
        ->where('id',$id)
        ->update(
            [
                'title' => $request['title'],
                'content' => $request['content'],
                'updated_at' => now()
            ]
        );
        return $update_data;
    }

    //hapus data artikel
    public static function destroy($id){
        $delete_data = DB::table('articles')
        ->where('id',$id)
        ->delete();

        return $delete_data;
    }
}
