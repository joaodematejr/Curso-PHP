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
//PAGINA LISTAR TODOS OS USUARIOS NO SISTEMA;
$app->get('/admin/users', function () {
    User::verifyLogin();
    $users = User::listAll();
    $page = new PageAdmin();
    $page->setTpl("users", array(
        "users" => $users,
    ));

});
//PAGINA CRIAR
$app->get('/admin/users/create', function () {
    User::verifyLogin();
    $page = new PageAdmin();
    $page->setTpl("users-create");

});

//DELETAR USUARIO
$app->get("/admin/users/:iduser/delete", function ($iduser) {
    User::verifyLogin();
    $user = new User();
    $user->get((int) $iduser);
    $user->delete();
    header("Location:http://localhost/Curso-PHP/Ecommerce/index.php/admin/users");
    exit;

});

//EDITAR USUARIO
$app->get('/admin/users/:iduser', function ($iduser) {
    User::verifyLogin();
    $user = new User();
    $user->get((int) $iduser);
    $page = new PageAdmin();
    $page->setTpl("users-update", array(
        "user" => $user->getValues(),
    ));

});
//ADICIONAR NOVO USUARIO
$app->post("/admin/users/create", function () {
    User::verifyLogin();
    $user = new User();
    $_POST["inadmin"] = (isset($_POST["inadmin"])) ? 1 : 0;
    $user->setData($_POST);
    $user->save();
    header("Location:http://localhost/Curso-PHP/Ecommerce/index.php/admin/users");
    exit;

});

//ATUALIZAR USUARIO
$app->post("/admin/users/:iduser", function ($iduser) {
    User::verifyLogin();
    $user = new User();
    $_POST["inadmin"] = (isset($_POST["inadmin"])) ? 1 : 0;
    $user->get((int) $iduser);
    $user->setData($_POST);
    $user->update();
    header("Location:http://localhost/Curso-PHP/Ecommerce/index.php/admin/users");
    exit;

});

$app->run();
