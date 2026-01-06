<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

class ProjectVersionController extends Controller
{
    public function current()
    {
        return 'v'.\Config::get('app.version');
    }

    public function latest()
    {
        $file = file_get_contents('https://raw.githubusercontent.com/appworld-hu/chatbots/refs/heads/master/sources/composer.json');
        $version = json_decode($file)->version;

        return response()->json(compact('version'));
    }
}