<?php

namespace App\Http\Controllers;

use App\Http\Requests\Universities\CreateUniversityRequest;
use App\University;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UniversityController extends Controller
{
    public function index(): Response
    {
        return response()->view("administration.universities.index", ["universities" => University::all()]);
    }

    public function show(University $university): Response
    {
        return response()->view("administration.universities.show", ["university" => $university, "users" => $university->users]);
    }

    public function create(): Response
    {
        return response()->view("administration.universities.create");
    }

    public function store(CreateUniversityRequest $request): RedirectResponse
    {
        $university = new University($request->only("name", "color", "logo_url"));
        $university->save();

        return redirect()->route("administration.universities.index");
    }

    public function edit(University $university): Response
    {
        return response()->view("administration.universities.create");
    }
}
