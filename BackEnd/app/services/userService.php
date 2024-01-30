<?php
namespace Services;

use Repositories\UserRepository;

class UserService
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function signup($user){
        $user->password = password_hash($user->password, PASSWORD_DEFAULT);
        return $this->userRepository->create($user);
    }

    public function checkEmailPassword($email, $password){
        $user = $this->userRepository->getUserByEmail($email);

        // verify if the password matches the hash in the database
        $result = $this->verifyPassword($password, $user->password);

        if (!$result)
            return false;

        // do not pass the password hash to the caller
        $user->password = "";
        
        return $user;
    }

    function verifyPassword($input, $hash)
    {
        return password_verify($input, $hash);
    }

}