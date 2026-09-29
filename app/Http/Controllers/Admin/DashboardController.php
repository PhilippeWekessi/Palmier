<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    // Page provisoire : le vrai dashboard sera construit en Phase 11.
    public function index(): View
    {
        return view('admin.dashboard');
    }
}