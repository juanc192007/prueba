<?php
ini_set('display_errors',1);
ini_set("log_errors",1);
ini_set("error_log","C:\xampp\htdocs\ElComercioDeCaliWeb\lib\controller\Api\php_error_log");
require_once "controller/routes.controller.php";
$index = new RoutesController();
$index->index();