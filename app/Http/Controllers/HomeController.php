<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke() {
        return "Invoke";
    }
    public function index()
    {
        return "Adalberto";
    }
}
