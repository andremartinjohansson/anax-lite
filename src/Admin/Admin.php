<?php

namespace QuasaR\Admin;

class Admin implements \Anax\Common\AppInjectableInterface, \Anax\Common\ConfigureInterface
{
    use \Anax\Common\AppInjectableTrait;
    use \Anax\Common\ConfigureTrait;

    public function add($username, $userPass, $userRole)
    {
        if (!$this->app->users->exists($username)) {
            $cryptPass = password_hash($userPass, PASSWORD_DEFAULT);
            $this->app->users->addUser($username, $cryptPass, $userRole);
            $this->app->session->set("success", "user created");
            $this->app->redirect("admin");
        } else {
            $this->app->session->set("error", "already exists");
            $this->app->redirect("admin");
        }
    }

    public function update($username, $password, $oldUser, $role)
    {
        if ($username != null && $oldUser != null) {
            if (!$this->app->users->exists($username) || $oldUser == $username) {
                $this->app->users->updateUser($oldUser, $password, $username, $role);
                $this->app->session->set("success", "user updated");
                $this->app->redirect("admin");
            } else {
                $this->app->session->set("error", "already exists");
                $this->app->redirect("admin");
            }
        }
    }

    public function delete($username)
    {
        if ($username != null) {
            if ($this->app->users->exists($username)) {
                $this->app->users->deleteUser($username);
                $this->app->session->set("success", "user deleted");
                $this->app->redirect("admin");
            } else {
                $this->app->session->set("error", "no such user");
                $this->app->redirect("admin");
            }
        }
    }
}
