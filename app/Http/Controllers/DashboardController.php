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

    public function deploy(){
        $process = new Process(['/home/plantactic/public_html/alt/run_artisan.sh']);
        $process->run();
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        return response()->json([
            'status' => true
        ]);
    }
}
