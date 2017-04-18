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

    public function validateLogin($userName, $userPass)
    {
        if ($userName != null && $userPass != null) {
            if ($this->app->users->exists($userName)) {
                $hash = $this->app->users->getHash($userName);
                if (password_verify($userPass, $hash)) {
                    $this->app->session->set("name", $userName);
                    $sql = "SELECT * FROM Users WHERE name='$userName'";
                    $user = $this->app->db->executeFetchAll($sql)[0];
                    $this->app->session->set("role", $user->role);
                    $this->app->redirect("profile");
                } else {
                    $this->app->session->set("error", "invalid login");
                    $this->app->redirect("login");
                }
            } else {
                $this->app->session->set("error", "user not found");
                $this->app->redirect("login");
            }
        }
    }

    public function logout()
    {
        if ($this->app->session->has("name")) {
            $this->app->session->destroy();
        } else {
            $this->app->redirect("login");
        }

        $hasSession = session_status() == PHP_SESSION_ACTIVE;

        if (!$hasSession) {
            $this->app->session->set("success", "logout");
            $this->app->redirect("login");
        }
    }

    public function handleNewUser($userName, $userPass, $reUserPass)
    {
        if (!$this->app->users->exists($userName)) {
            if ($userPass != $reUserPass) {
                $this->app->session->set("error", "password mismatch");
                $this->app->redirect("register");
            } else {
                $cryptPass = password_hash($userPass, PASSWORD_DEFAULT);
                $this->app->users->addUser($userName, $cryptPass);
                $this->app->session->set("success", "user created");
                $this->app->session->set("temp", $userName);
                $this->app->redirect("register");
            }
        } else {
            $this->app->session->set("error", "already exists");
            $this->app->redirect("register");
        }
    }

    public function handlePasswordChange($oldPass, $newPass, $rePass)
    {
        $user = $this->app->session->get("name");
        $this->app->session->set("status", "Change password");
        if ($oldPass != null && $newPass != null && $rePass != null) {
            if (password_verify($oldPass, $this->app->users->getHash($user))) {
                if ($newPass == $rePass) {
                        $cryptPass = password_hash($newPass, PASSWORD_DEFAULT);
                        $this->app->users->changePassword($user, $cryptPass);
                        $this->app->session->set("status", "Password changed.");
                } else {
                    $this->app->session->set("status", "The passwords do not match.");
                }
            } else {
                $this->app->session->set("status", "Old password is incorrect.");
            }
        } else {
            $this->app->session->set("status", "All fields must be filled.");
        }
    }
}
