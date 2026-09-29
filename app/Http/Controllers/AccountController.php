<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AccountController extends Controller
{
    // Page provisoire : le vrai compte client sera construit en Phase 10.
    public function index(Request $request): View
    {
        return view('pages.account', ['user' => $request->user()]);
    }
}