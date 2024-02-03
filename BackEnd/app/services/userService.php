<?php
namespace Services;

use Repositories\UserRepository;
use Exception;

class UserService
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function signup($user)
    {
        if (!$this->isValidEmail($user->email))
            return false;

        $existingUser = $this->userRepository->getUserByEmail($user->email);

        if ($existingUser)
            return false;

        $user->password = password_hash($user->password, PASSWORD_DEFAULT);
        return $this->userRepository->create($user);
    }

    public function checkEmailPassword($email, $password)
    {
        $user = $this->userRepository->getUserByEmail($email);

        if (!$user)
            return false;

        // verify if the password matches the hash in the database
        $result = $this->verifyPassword($password, $user->password);

        if (!$result)
            return false;

        // do not pass the password hash to the caller 
        // instead pass the one provided by the user
        $user->password = $password;

        return $user;
    }

    function verifyPassword($input, $hash)
    {
        return password_verify($input, $hash);
    }

    public function update($user)
    {
        $userToUpdate = $this->userRepository->getUserByEmail($user->email);

        $passwordsAreEqual = $this->verifyPassword($user->password, $userToUpdate->password);

        if ($userToUpdate->username === $user->username && $passwordsAreEqual)
            return false;

        $user->password = password_hash($user->password, PASSWORD_DEFAULT);
        return $this->userRepository->update($user);
    }

    public function getOne($id)
    {
        return $this->userRepository->getOne($id);
    }

    public function isValidEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

}