<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    //

	public function change_lang($lang)
    {
        session()->put('lang', $lang);
        return redirect()->back();
    }







}
 