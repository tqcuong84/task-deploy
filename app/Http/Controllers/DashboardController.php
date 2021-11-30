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
        $path = base_path('.env.example');
        if (file_exists($path)) {
            $final_env_content = str_replace('LARAVEL_DB', 'task-app2', file_get_contents($path));
            $final_env_content = str_replace('LARAVEL_USER_DB', 'root', $final_env_content);
            $final_env_content = str_replace('LARAVEL_PWD_DB', 'root', $final_env_content);
            file_put_contents(base_path('.env.copy'), $final_env_content);
        }

        $process = new Process(['/var/www/task-app1/deploy.sh']);
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        return redirect()->away("http://alt.plantactic.io");
    }
}
