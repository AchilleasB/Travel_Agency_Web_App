<?php
namespace Repositories;

use PDO;
use PDOException;
use Repositories\Repository;
use Models\User;

class UserRepository extends Repository
{
    public function create($user)
    {
        try {
            $stmt = $this->connection->prepare("INSERT into users (username, email, password) VALUES (:username, :email, :password)");
            $stmt->bindParam(':username', $user->username);
            $stmt->bindParam(':email', $user->email);
            $stmt->bindParam(':password', $user->password);
            $stmt->execute();
            $user->id = $this->connection->lastInsertId();
            return $user;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    function getUserByEmail($email)
    {
        try {
            $stmt = $this->connection->prepare("SELECT id, username, email, password FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, User::class);
            $user = $stmt->fetch();

            return $user;
        } catch (PDOException $e) {
            echo $e;
        }
    }

}