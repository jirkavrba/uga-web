<?php

namespace App\Http\Controllers;

use App\Http\Requests\Universities\CreateUniversityRequest;
use App\Http\Requests\Universities\DestroyUniversityRequest;
use App\Http\Requests\Universities\UpdateUniversityRequest;
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
        return response()->view("administration.universities.show", [
            "universities" => University::all(),
            "university" => $university,
            "users" => $university->users
        ]);
    }

    public function create(): Response
    {
        return response()->view("administration.universities.create");
    }

    public function edit(University $university): Response
    {
        return response()->view("administration.universities.edit", ["university" => $university]);
    }

    public function store(CreateUniversityRequest $request): RedirectResponse
    {
        $university = new University($request->only("name", "color", "logo_url"));
        $university->save();

        return redirect()->route("administration.universities.index");
    }


    public function update(University $university, UpdateUniversityRequest $request): RedirectResponse
    {
        $university->update($request->only("name", "color", "logo_url"));

        return redirect()->route("administration.universities.index");
    }

    public function destroy(University $university, DestroyUniversityRequest $request): RedirectResponse
    {
        // Transfer users to another university
        $university->users()->update(["university_id" => $request->input("university_id")]);
        $university->delete();

        return redirect()->route("administration.universities.index");
    }
}
