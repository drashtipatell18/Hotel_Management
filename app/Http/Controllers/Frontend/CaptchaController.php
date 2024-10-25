<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Captcha;

class CaptchaController extends Controller
{
    public function reloadCaptcha()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }  
}
