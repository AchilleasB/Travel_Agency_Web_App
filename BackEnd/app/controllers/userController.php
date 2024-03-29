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

    public function generateJwt($user)
    {
        $secret_key = "YOUR_SECRET_KEY";

        $issuer = "THE_ISSUER"; // this can be the domain/servername that issues the token
        $audience = "THE_AUDIENCE"; // this can be the domain/servername that checks the token

        $issuedAt = time(); // issued at
        $notbefore = $issuedAt; //not valid before 
        $expire = $issuedAt + 600; // expiration time is set at +600 seconds (10 minutes)

        // JWT expiration times should be kept short (10-30 minutes)
        // A refresh token system should be implemented if we want clients to stay logged in for longer periods

        // note how these claims are 3 characters long to keep the JWT as small as possible
        $payload = array(
            "iss" => $issuer,
            "aud" => $audience,
            "iat" => $issuedAt,
            "nbf" => $notbefore,
            "exp" => $expire,
            "data" => array(
                "id" => $user->id,
                "username" => $user->username,
                "email" => $user->email
            )
        );

        $jwt = JWT::encode($payload, $secret_key, 'HS256');

        return
            array(
                "message" => "Successful login.",
                "jwt" => $jwt,
                "user_id" => $user->id,
                "username" => $user->username,
                "email" => $user->email,
                "expireAt" => $expire
            );
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