<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Todos extends Model
{
    protected $table = 'todos';

    public function lists(){
        $lists = DB::table($this->table)->get();
        return $lists;
    }

    public function add($data){
        DB::table($this->table)->insert([
            "title" => isset($data['title'])?addslashes($data['title']):''
        ]);
    }

    public function remove($id){
        DB::table($this->table)->where('id',$id)->delete();
    }
}
