<?php

session_start();

require_once "vendor/autoload.php";

use \Hcode\Model\User;
use \Hcode\Page;
use \Hcode\PageAdmin;
use \Slim\Slim;

$app = new \Slim\Slim();
$app->config('debug', true);

$app->get('/', function () {

    $page = new Page();
    $page->setTpl("index");

});

$app->get('/admin', function () {
    User::verifyLogin();
    $page = new PageAdmin();
    $page->setTpl("index");

});

$app->get('/admin/login', function () {

    $page = new PageAdmin([
        "header" => false,
        "footer" => false,
    ]);

    $page->setTpl("login");

});
$app->post('/admin/login', function () {

    User::login($_POST["login"], $_POST["password"]);
    header("Location: /Curso-PHP/Ecommerce/index.php/admin");
    exit;

    $page->setTpl("login");

});
$app->get('/admin/logout', function () {

    User::logout();
    header("Location: /Curso-PHP/Ecommerce/index.php/admin/login");
    exit;

});

$app->run();
