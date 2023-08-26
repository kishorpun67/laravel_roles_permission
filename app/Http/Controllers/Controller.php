<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use  ValidatesRequests;
    use AuthorizesRequests {authorize as protected baseAuthorize;}

    public function authorize($ability, $arguments= array()) {
        if(auth()->check()) {
            \Auth::shouldUse('web');
        }
        // $this->baseAuthorize($ability, $arguments);
    }
}
