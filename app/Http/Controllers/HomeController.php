<?php

namespace App\Http\Controllers;

use App\Models\Concerts;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        //get the Concerts with gallery
        $items = Concerts::with(['galleries'])->get();

        //return view with items
        return view('pages.home', [
            'items' => $items,
            'testimonies' => []
        ]);
    }
}
