<?php
namespace Models;
use Exception;

class User {
    public int $id;
    public string $username;
    public string $email;
    public string $password;
    public string $role;

    public function setRole($role){
        $this->role = $role;
    }
}
?>