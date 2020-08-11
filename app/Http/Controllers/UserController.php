<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use App\University;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function index(): Response
    {

        return response()->view("administration.users.index", ["users" => User::with("university")->paginate(20)]);
    }

    public function create(): Response
    {
        return response()->view("administration.users.create", ["universities" => University::all()]);
    }

    public function store(CreateUserRequest $request): RedirectResponse
    {
        $user = new User($request->only("name", "email", "password", "university_id"));
        $user->save();

        return redirect()->route("administration.users.index");
    }

    public function show(User $user): Response
    {
        return response()->view("administration.users.show", ["user" => $user]);
    }

    public function edit(User $user): Response
    {
        return response()->view("administration.users.edit", ["user" => $user, "universities" => University::all()]);
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        return redirect()->route("administration.users.show", $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
