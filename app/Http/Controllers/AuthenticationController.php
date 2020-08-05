<?php

namespace App\Http\Controllers;

use App\Http\Requests\Authentication\LoginRequest;
use App\Http\Requests\Authentication\RegistrationRequest;
use App\University;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    /**
     * @return Response
     */
    public function gate(): Response
    {
        return response()->view("authentication.gate", ["universities" => University::all()]);
    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only(["email", "password"]);

        if (Auth::attempt($credentials))
        {
            return redirect()->to(session("url.intended") ?? route("index"));
        }

        return back()->withErrors(["Invalid credentials"]);
    }

    /**
     * @param RegistrationRequest $request
     * @return RedirectResponse
     */
    public function register(RegistrationRequest $request): RedirectResponse
    {
        $user = new User($request->only("name", "email", "password", "university_id"));
        $user->save();

        Auth::login($user);

        return redirect()->route("index");
    }

    /**
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route("index");
    }
}
