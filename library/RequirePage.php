<?php

class RequirePage{
    static function requireModel($page){
        return require_once 'model/Model'.$page.'.php';
    }

    static function redirect($url){
        header("location: http://localhost:8888/marcosTP2_0712/$url");
    }

    // static function absolutPath($page){
    //     return 'localhost:8888/marcosTP2_0712/'.$page;
    // }
    //컴퓨터에 따라 다르니 확인할 수 있도록

    static function requireLibrary($page){
        return require_once 'library/'.$page.'.php';
    }
}