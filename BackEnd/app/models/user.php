<?php
namespace Models;
use Exception;

class User {
    public int $id;
    public string $username;
    public string $email;
    public string $password;
    public string $role;

    // role can be only 'admin' or 'customer'
    public function setRole($role){
        if($role == 'admin' || $role == 'customer'){
            $this->role = $role;
        } else {
            throw new Exception("Invalid role");
        }
    }
}
?>