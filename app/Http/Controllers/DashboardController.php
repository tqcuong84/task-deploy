<?php

namespace App\Http\Controllers;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
class DashboardController extends Controller
{
    public function index(){
        $info = session('user_login');
        return view('dashboard', compact('info'));
    }
}
