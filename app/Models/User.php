<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Model
{
    protected $table = 'users';

    public function getByemail($email) {
        $data_user = (array) DB::table($this->table)->where('email', addslashes($email))->first();
        if(isset($data_user['id']) && $data_user['id']){
            return [
                "id" => $data_user['id'],
                "email" => $data_user['email'],
                "name" => $data_user['name']
            ];
        }
        return null;
    }

    public function getById($id) {
        $data_user = (array) DB::table($this->table)->where('id', $id)->first();
        if(isset($data_user['id']) && $data_user['id']){
            return [
                "id" => $data_user['id'],
                "email" => $data_user['email'],
                "name" => $data_user['name']
            ];
        }
        return null;
    }


    public function signin($email, $password){
        $data_user = (array) DB::table($this->table)->where('email', addslashes($email))->first();
        if(isset($data_user['id']) && $data_user['id']){
            if(Hash::check($password, $data_user['password'])){
                return [
                    "id" => $data_user['id'],
                    "email" => $data_user['email'],
                    "name" => $data_user['name']
                ];
            }
        }
        return null;
    }

    public function signup($info){
        $email = isset($info['email'])?trim($info['email']):"";
        $name = isset($info['name'])?trim($info['name']):"";
        $password = isset($info['password'])?trim($info['password']):"";
        $id = DB::table($this->table)->insertGetId([
            'email' => $email,
            'name' => $name,
            'password' => Hash::make($password)
        ]);
        return $this->getById($id);
    }
}
