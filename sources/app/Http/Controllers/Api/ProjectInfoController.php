<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProjectInfoController extends Controller
{
    public function __invoke()
    {
        $this->authorize('superAdmin');

        $file = file_get_contents('https://raw.githubusercontent.com/appworld-hu/chatbots/refs/heads/master/sources/composer.json');
        $latestVersion = json_decode($file)->version;

        return new JsonResponse([
            'COMPANIES_ENABLED' => PROMPTCHAT_COMPANIES_ENABLED,
            'WHITE_LABEL_ENABLED' => PROMPTCHAT_WHITE_LABEL_ENABLED,
            'PLAN_NAME' => PROMPTCHAT_PLAN_NAME,
            'PLAN_VALID_TILL' => PROMPTCHAT_PLAN_VALID_TILL,
            'CURRENT_PROJECT_VERSION' => json_decode(file_get_contents('../composer.json'))->version,
            'LATEST_PROJECT_VERSION'=> $latestVersion
        ]);
    }
}