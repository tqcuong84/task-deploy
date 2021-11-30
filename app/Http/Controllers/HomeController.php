<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $info = session('user_login');
        if(isset($info['id']) && $info['id']){
            return redirect()->route('dashboard');
        }
        $action = isset($_POST['action'])?trim($_POST['action']):"";
        $email = isset($_POST['email'])?trim($_POST['email']):"";
        $password = isset($_POST['password'])?trim($_POST['password']):"";
        $error = "";
        $is_signin = false;
        if($action == "signin"){
            if(empty($email)){
                $error = "Please enter your e-mail";
            } else if(empty($password)){
                $error = "Please enter password";
            }
            if(empty($error)){
                $user_model = new User();
                $data_user = $user_model->signin($email, $password);
                if(isset($data_user['id']) && $data_user['id']){
                    $is_signin = true;
                    session(['user_login' => $data_user]);
                } else {
                    $error = "E-mail or password invalid";
                }
            }
        }
        if($is_signin === true){
            return redirect()->route('dashboard');
        }
        $info = [
            'email' => $email,
            'error' => $error
        ];
        return view('index', compact('info'));
    }

    public function signup(){
        $info = session('user_login');
        if(isset($info['id']) && $info['id']){
            return redirect()->route('dashboard');
        }
        $action = isset($_POST['action'])?trim($_POST['action']):"";
        $email = isset($_POST['email'])?trim($_POST['email']):"";
        $name = isset($_POST['name'])?trim($_POST['name']):"";
        $password = isset($_POST['password'])?trim($_POST['password']):"";
        $error = "";
        $is_success = false;
        if($action == "signup"){
            $user_model = new User();
            if(empty($name)){
                $error = "Please enter your name";
            } else if(empty($email)){
                $error = "Please enter your e-mail";
            } else if(empty($password)){
                $error = "Please enter password";
            } else {
                $data_user = $user_model->getByemail($email);
                if(isset($data_user['id']) && $data_user['id']){
                    $error = "E-mail address is already in use";
                }
            }
            if(empty($error)){
                $data_user = $user_model->signup([
                    "email" => $email,
                    "name" => $name,
                    "password" => $password
                ]);
                session(['user_login' => $data_user]);
                $is_success = true;
            }
        }
        if($is_success === true){
            return redirect()->route('dashboard');
        }
        $info = [
            'email' => $email,
            'name' => $name,
            'error' => $error
        ];
        return view('signup', compact('info'));
    }

    public function signout(Request $request){
        $request->session()->flush();
        return redirect()->route('signin');
    }
}
