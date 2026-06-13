<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class LogController extends Controller
{
    public function logBasic(Request $request)
    {
        // Log::withContext(['request_id' => Str::uuid()->toString()]);
        Log::emergency('Emergency log', ['tag' => 'emergency']);
        Log::alert('Alert log');
        Log::critical('Critical log');
        Log::error('Error log');
        Log::warning('Warning log');
        Log::notice('Notice log');
        Log::info('Info log');
        Log::debug('Debug log');

        // Log::log('emergency', 'Emergency log', ['tag' => 'emergency']);
        // logger('Debug log');
        // logger()->error('Error log');
        // Log::channel('errorlog')->error('Laravel Log（channel）');
        // Log::stack(['slack', 'stderr'])->info('Laravel Log（multi-channel）');

        return 'ログはコンソール、またはログファイルから確認ください。';
    }

    public function trigger()
    {
        trigger_error('非推奨です!!', E_USER_DEPRECATED);
    }
}
