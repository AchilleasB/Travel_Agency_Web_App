<?php
namespace Controllers;

use Exception;
use \Firebase\JWT\JWT;
use Services\UserService;
use Models\User;

class UserController extends Controller
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function signup()
    {
        $user = $this->createObjectFromPostedJson(User::class);

        if ($this->userService->signup($user))
            $this->respond($user);
        else
            $this->respondWithError(400, "Invalid credentials");
    }

    public function login()
    {
        // read user data from request body
        $postedUser = $this->createObjectFromPostedJson(User::class);

        // get user from db
        $user = $this->userService->checkEmailPassword($postedUser->email, $postedUser->password);

        // if the method returned false, the username and/or password were incorrect
        if (!$user) {
            $this->respondWithError(401, "Invalid credentials");
            return;
        }

        // generate jwt
        $tokenResponse = $this->generateJwt($user);

        $this->respond($tokenResponse);
    }

    public function update()
    {
        $token = $this->checkForJwt();
        if (!$token)
            return;

        $user = $this->createObjectFromPostedJson(User::class);

        $updatedUser = $this->userService->update($user);

        if ($updatedUser) {
            $updatedUser->password = '';
            $this->respond($updatedUser);
        } else {
            $this->respondWithError(400, "No changes were made");
        }
    }

    public function getOne($id)
    {
        // $token = $this->checkForJwt();
        // if (!$token)
        //     return;

        $user = $this->userService->getOne($id);
        if ($user)
            $this->respond($user);
        else
            $this->respondWithError(404, "User not found");
    }
}