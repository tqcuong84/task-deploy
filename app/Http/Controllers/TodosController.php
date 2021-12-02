<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TodosController extends Controller
{
    public function index(){
        $totos_model = new Todos();
        $lists = $totos_model->lists();
        return view('todolist', ['lists' => $lists]);
    }
    public function add(){
        $todo = isset($_POST['todo'])?trim($_POST['todo']):'';
        if(empty($todo)){
            return Redirect::back()->withErrors(['msg' => 'Please enter todo']);
        }
        $totos_model = new Todos();
        $totos_model->add([
            'title' => $todo
        ]);
        return Redirect::back();
    }
    public function delete($id){
        if($id){
            $totos_model = new Todos();
            $totos_model->remove($id);
        }
        return Redirect::back();
    }
}
