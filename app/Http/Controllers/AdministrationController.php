<?php

namespace App\Http\Controllers;

use App\University;
use App\User;
use Illuminate\Http\Response;

class AdministrationController extends Controller
{
    public function index(): Response
    {
        return response()->view("administration.index", [
            "universities" => University::count(),
            "users" => User::count(),
        ]);
    }
}
