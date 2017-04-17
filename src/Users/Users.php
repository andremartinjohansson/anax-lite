<?php

namespace QuasaR\Users;

class Users implements \Anax\Common\AppInjectableInterface, \Anax\Common\ConfigureInterface
{
    use \Anax\Common\AppInjectableTrait;
    use \Anax\Common\ConfigureTrait;

    public function getHash($user)
    {
        $stmt = $this->app->db->executeFetchAll("SELECT password FROM Users WHERE name='$user'")[0];
        return $stmt->password;
    }

    public function exists($user)
    {
        $stmt = $this->app->db->executeFetchAll("SELECT name FROM Users WHERE name='$user'");
        if ($stmt) {
            return !$stmt[0]->name ? false : true;
        } else {
            return false;
        }
    }

    public function addUser($user, $pass, $role = "user")
    {
        $this->app->db->stmt = $this->app->db->pdo->prepare("INSERT INTO Users (name, password, role) VALUES ('$user', '$pass', '$role')");
        $this->app->db->stmt->execute();
    }

    public function changePassword($user, $pass)
    {
        $this->app->db->stmt = $this->app->db->pdo->prepare("UPDATE Users SET password='$pass' WHERE name='$user'");
        $this->app->db->stmt->execute();
    }

    public function updateUser($user, $pass, $newUser, $role)
    {
        if ($pass) {
            $cryptPass = password_hash($pass, PASSWORD_DEFAULT);
            $this->app->db->stmt = $this->app->db->pdo->prepare("UPDATE Users SET name='$newUser', password='$cryptPass', role='$role' WHERE name='$user'");
        } else {
            $this->app->db->stmt = $this->app->db->pdo->prepare("UPDATE Users SET name='$newUser', role='$role' WHERE name='$user'");
        }
        $this->app->db->stmt->execute();
    }

    public function deleteUser($user)
    {
        $this->app->db->stmt = $this->app->db->pdo->prepare("DELETE FROM Users WHERE name='$user'");
        $this->app->db->stmt->execute();
    }
}
