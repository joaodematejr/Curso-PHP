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
    //FAZER LOGOUT NO SISTEMA
    public static function logout()
    {
        $_SESSION[User::SESSION] = null;
    }
    //LISTAR TODOS OS USUARIOS NO BANCO
    public static function listAll()
    {
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) ORDER BY b.desperson");
    }
    //RECUPERAR DADOS PASSANDO ID
    public function get($iduser)
    {
        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_users a INNER JOIN tb_persons b USING(idperson) WHERE a.iduser = :iduser;", array(
            ":iduser" => $iduser,
        ));

        $data = $results[0];

        $this->setData($data);
    }
    //SALVAR NO BANCO
    public function save()
    {
        $sql = new Sql();
        /*
        pdesperson VARCHAR(64),
        pdeslogin VARCHAR(64),
        pdespassword VARCHAR(256),
        pdesemail VARCHAR(128),
        pnrphone BIGINT,
        pinadmin TINYINT
         */
        $results = $sql->select("CALL sp_users_save(:desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)", array(
            ":desperson" => $this->getdesperson(),
            ":deslogin" => $this->getdeslogin(),
            ":despassword" => $this->getdespassword(),
            ":desemail" => $this->getdesemail(),
            ":nrphone" => $this->getnrphone(),
            ":inadmin" => $this->getinadmin(),
        ));

        $this->setData($results[0]);
    }
    public function update()
    {
        $sql = new Sql();
        /*
        pdesperson VARCHAR(64),
        pdeslogin VARCHAR(64),
        pdespassword VARCHAR(256),
        pdesemail VARCHAR(128),
        pnrphone BIGINT,
        pinadmin TINYINT
         */
        $results = $sql->select("CALL sp_usersupdate_save(:iduser, :desperson, :deslogin, :despassword, :desemail, :nrphone, :inadmin)",
            array(
                "iduser" => $this->getiduser(),
                ":desperson" => $this->getdesperson(),
                ":deslogin" => $this->getdeslogin(),
                ":despassword" => $this->getdespassword(),
                ":desemail" => $this->getdesemail(),
                ":nrphone" => $this->getnrphone(),
                ":inadmin" => $this->getinadmin(),
            ));

        $this->setData($results[0]);
    }
    //DELETAR
    public function delete()
    {
        $sql = new Sql();
        $sql->query("CALL sp_users_delete(:iduser)", array(
            ":iduser" => $this->getiduser(),
        ));
    }
}
