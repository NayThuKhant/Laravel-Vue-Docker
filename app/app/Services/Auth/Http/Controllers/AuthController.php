<?php

namespace App\Services\Auth\Http\Controllers;

use App\Services\Auth\Features\LoginFeature;
use App\Services\Auth\Features\LogoutFeature;
use App\Services\Auth\Features\LogoutOfAllSessionsFeature;
use Lucid\Units\Controller;

class AuthController extends Controller
{
    /**
     * Login
     *
     * @group Api Auth
     * @unauthenticated
     *
     * @bodyParam identifier string required The email|username of the user.
     * @bodyParam password string required The password of the user.
     */
    public function login()
    {
        return $this->serve(LoginFeature::class);
    }

    /**
     * Logout
     *
     * @group Api Auth
     */
    public function logout()
    {
        return $this->serve(LogoutFeature::class);
    }

    /**
     * Logout of all sessions
     *
     * @group Api Auth
     */
    public function logoutOfAllSessions()
    {
        return $this->serve(LogoutOfAllSessionsFeature::class);
    }
}
