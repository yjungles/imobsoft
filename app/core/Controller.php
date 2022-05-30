<?php

class Controller
{

    public function model($model)
    {
        require_once '../app/Models/' . ucfirst($model) . '.php';
        return new $model();
    }

    public function view($view, $data = [])
    {
        //monta um layout básico
        require_once '../app/Views/layout/header.php';
        require_once '../app/Views/' . $view . '.php';
        require_once '../app/Views/layout/footer.php';
    }
}
