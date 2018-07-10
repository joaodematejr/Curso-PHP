<?php

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;

class User extends Model
{

    const SESSION = "User";

    protected $fields = [
        "iduser", "idperson", "deslogin", "despassword", "inadmin", "dtergister",
    ];

    public static function login($login, $password): User
    {

        $db = new Sql();

        $results = $db->select("SELECT * FROM tb_users WHERE deslogin = :LOGIN", array(
            ":LOGIN" => $login,
        ));

        if (count($results) === 0) {
            throw new \Exception("Não foi possível fazer login.");
        }

        $data = $results[0];

        if (password_verify($password, $data["despassword"])) {

            $user = new User();
            $user->setData($data);

            $_SESSION[User::SESSION] = $user->getValues();

            return $user;

        } else {

            throw new \Exception("Não foi possível fazer login.");

        }

    }

    public static function logout()
    {

        $_SESSION[User::SESSION] = null;

    }

    public static function verifyLogin($inadmin = true)
    {

        if (
            !isset($_SESSION[User::SESSION])
            ||
            !$_SESSION[User::SESSION]
            ||
            !(int) $_SESSION[User::SESSION]["iduser"] > 0
            ||
            (bool) $_SESSION[User::SESSION]["iduser"] !== $inadmin
        ) {

            header("Location: /Curso-PHP/Ecommerce/index.php/admin/login");
            exit;

        }

    }

}
