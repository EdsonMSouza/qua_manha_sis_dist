<?php

/**
 * Model para manipulação de dados dos usuários
 * 
 * @author Edson Melo de Souza
 * @date 2020-09
 * 
 */

# inclusão da classe de conexão com o banco de dados
include('PDOConnection.php');


class UserModel
{
    private static $pdo;

    /**
     * Método Construtor da classe UserModel
     */
    function __construct()
    {
        self::$pdo = \PDOConnection::connection();
    }

    /**
     * Insere um novo usuário
     * Uma ideia de implementação seria criptografar a senha
     */
    public function new($name, $user, $password)
    {
        try {
            # variável para armazenar a String SQL
            $sql = "INSERT INTO users (name, user, password) 
                    VALUES (:name, :user, :password)";

            $stmt = self::$pdo->prepare($sql);

            # atribuição dos valores informados para os parâmetros SQL
            $stmt->bindValue(":name", $name, \PDO::PARAM_STR);
            $stmt->bindValue(":user", $user, \PDO::PARAM_STR);
            $stmt->bindValue(":password", $password, \PDO::PARAM_STR);

            $stmt->execute();

            return true;
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    /**
     * Método para verificar se um usuário já existe, se sim, retorna TRUE
     */
    public function userExists($user)
    {
        try {
            $sql = "SELECT user FROM users 
                    WHERE user = :user";

            $stmt = self::$pdo->prepare($sql);
            $stmt->bindValue(":user", $user, \PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

    /**
     * Métodos para manipulação dos dados de login
     */
    public function login($user, $password)
    {
        try {
            $sql = "SELECT id, user, name FROM users 
                    WHERE user = :user AND password = :password";

            $stmt = self::$pdo->prepare($sql);

            $stmt->bindValue(":user", $user, \PDO::PARAM_STR);
            $stmt->bindValue(":password", $password, \PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }
}
