<?php

namespace App\Controllers;

use App\Model\User;

class IndexController
{
    public function index()
    {
        $user = new User();
        $data = $user->findAll();



        $cars = array('Mustang', 'ferrari');
        include_once('../App/Views/index/index.phtml');
    }

    public function contact()
    {
        $cars = array('435345435', '5345345345');
        include_once('../App/Views/index/contact.phtml');
    }

    public function create()
    {
        if(isset($_POST["name"])) {
            $user = new User();
            $user->setName($_POST["name"]);
            $user->setMail($_POST["mail"]);
            $user->setPassword($_POST["password"]);
            $obtem = $user->insert();
            $cars = array('Mustang', 'ferrari');
            include_once('../App/Views/index/index.phtml');
        }
        include_once('../App/Views/index/create.phtml');

    }

    public function update()
    {
        if(isset($_GET["id"])) {
            $user = new User();

            $data = $user->findUnit($_GET["id"]);

            if(count($data)>0 && isset($_POST["name"])){
                $user = new User();
                $user->setName($_POST["name"]);
                $user->setMail($_POST["mail"]);
                $user->setPassword($_POST["password"]);
                $user->update($_GET["id"]);
                header('Location:/');
            }
            include_once('../App/Views/index/update.phtml');
        }

    }

    public function delete()
    {
        var_dump($_GET["id"]);
        include_once('../App/Views/index/index.phtml');

    }
}

