<?php

class App
{
    /*
    * Rota default caso não seja passado nenhum parâmetro
    */
    protected $controller = 'IndexController';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {

        /* 
        * Router básico que transforma uma URL /controller/metodo/parametros
        */
        $req = $this->parseUrl();

        if (isset($req[0])) {
            if (file_exists('../app/Controllers/' . ucfirst($req[0]) . 'Controller.php')) {
                $this->controller =  ucfirst($req[0]).'Controller';
                unset($req[0]);
            }
        }

        require_once '../app/Controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        if (isset($req[1])) {
            if (method_exists($this->controller, $req[1])) {
                $this->method = $req[1];
                unset($req[1]);
            }
        }
        $this->params = $req ? array_values($req) : [];

        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseUrl()
    {
        if (isset($_GET['req'])) {
            return $req = explode('/', filter_var(rtrim($_GET['req'], '/'), FILTER_SANITIZE_URL));
        }
    }
}
