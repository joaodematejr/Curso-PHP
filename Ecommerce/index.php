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
//RECUPERAR SENHA
$app->get("/admin/forgot", function () {
    $page = new PageAdmin([
        "header" => false,
        "footer" => false,
    ]);

    $page->setTpl("forgot");
});
//MOSTRAR PAGINA COM MENSAGEM DE EMAIL ENVIADO COM SUCESSO
$app->post("/admin/forgot", function () {
    $user = User::getForgot($_POST["email"]);
    header("Location: http://localhost/Curso-PHP/Ecommerce/index.php/admin/forgot/sent");
    exit;
});
//MOSTRAR PAGINA COM MENSAGEM DE EMAIL ENVIADO COM SUCESSO
$app->get("/admin/forgot/sent", function () {
    $page = new PageAdmin([
        "header" => false,
        "footer" => false,
    ]);
    $page->setTpl("forgot-sent");
});
//PAGINA COM O INPUT PARA TROCAR A SENHA
$app->get("/admin/forgot/reset", function () {
    $user = User::validForgotDecrypt($_GET["code"]);
    $page = new PageAdmin([
        "header" => false,
        "footer" => false,
    ]);
    $page->setTpl("forgot-reset", array(
        "name" => $user["desperson"],
        "code" => $_GET["code"],
    ));
});
$app->post("/admin/forgot/reset", function () {
    $forgot = User::validForgotDecrypt($_POST["code"]);
    User::setForgotUsed($forgot["idrecovery"]);
    $user = new User();
    $user->get((int) $forgot["iduser"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT, [
        "cost" => 12,
    ]);
    $user->setPassword($password);

    $page = new PageAdmin([
        "header" => false,
        "footer" => false,
    ]);
    $page->setTpl("forgot-reset-success");
});
$app->run();
