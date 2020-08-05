<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PresentationController extends Controller
{
    public function index()
    {
        // Todo: add dynamic content
        return response()->view("index");
    }
}
