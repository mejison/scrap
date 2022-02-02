<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnityController extends Controller
{
    public function get() {
        $page_title = 'Compaign';
        $page_description = 'Some description for the page';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
		
        $action = 'unity-search';

        return view('unity.index', compact('page_title', 'page_description','action','logo','logoText'));
    }
}
