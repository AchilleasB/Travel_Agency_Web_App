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
        $user->setRole('customer');
        $createdUser = $this->userRepository->create($user);
        $createdUser->password = '';

        return $createdUser;
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
        $user->password = '';

        return $user;
    }

    function verifyPassword($input, $hash)
    {
        return password_verify($input, $hash);
    }

    public function update($user)
    {
        $userToUpdate = $this->userRepository->getUserByEmail($user->email);

        // Check if a new password is provided
        $isNewPasswordProvided = $user->password !== '';

        // Verify if passwords are equal
        $passwordsAreEqual = $this->verifyPassword($user->password, $userToUpdate->password);

        // If the username and password are the same, no update is needed
        if ($userToUpdate->username === $user->username && (!$isNewPasswordProvided || $passwordsAreEqual)) {
            return false;
        }

        // If a new password is provided, hash and update it
        // else retain the existing password
        if ($isNewPasswordProvided) {
            $user->password = password_hash($user->password, PASSWORD_DEFAULT);
        } else {
            $user->password = $userToUpdate->password;
        }

        return $this->userRepository->update($user);
    }

    public function getOne($id)
    {
        $user = $this->userRepository->getOne($id);
        $user->password = '';
        return $user;
    }

    public function isValidEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

}