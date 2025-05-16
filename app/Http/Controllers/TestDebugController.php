<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\Debugbar\Facade\Debugbar;

class TestDebugController extends Controller
{
    public function test()
    {
        Debugbar::info('test thử debugbar');
    }
}
