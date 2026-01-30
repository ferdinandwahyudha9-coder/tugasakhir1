<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BerandaController extends Controller
{
    public function beranda()
    {
        Log::info('=== BERANDA PAGE ACCESSED ===', [
            'ip' => request()->ip(),
            'timestamp' => now()
        ]);
        return view('beranda');
    }
}
