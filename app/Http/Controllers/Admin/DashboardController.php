<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Concerts;
use App\Models\Transaction;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // show the admin dashboard
        return view('pages.admin.dashboard', [
            'concerts' => Concerts::count(),
        ]);
    }
}
