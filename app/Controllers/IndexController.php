<?php

class IndexController extends Controller{

    public function index(){
        $this->view('index/index', ['user' => 'a' ]);
    }
}