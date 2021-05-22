<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class ConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function clear()
    {
        Artisan::call('route:clear');
        return redirect()->back();
    }
}
