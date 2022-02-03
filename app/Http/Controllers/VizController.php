<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VizController extends Controller
{
    public function get() {
        $page_title = 'Viz Search';
        $page_description = 'Some description for the page';
        $logo = "images/logo.png";
        $logoText = "images/logo-text.png";
		
        $action = 'unity';

        return view('viz.index', compact('page_title', 'page_description','action','logo','logoText'));
    }
}
