<?php

// Permite acesso de qualquer origem (requisição) CORS
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 8640000');
}

// Controle e Acesso para os cabeçalhos recebidos durante a requisição
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
}

# Configura o cabeçalho para requisições JSON
header("Content-Type: application/json; charset=utf-8");

# recupera as informações enviadas via serviço
$json = file_get_contents("php://input");

# decodifica os dados enviados no formato JSON para um objeto PHP
$obj = json_decode($json);

# tratar algum erro de requisição
# O nome do operador "=>" é: arrow
if ($obj === null && json_last_error() !== JSON_ERROR_NONE) {
    print(json_encode(["data" => "Invalid data"]));
    die(); # para o processo 
}

# Incluindo/importando o arquivo do Modelo do Usuário
include("class/UserModel.php");

# criar um novo usuário - objeto UserModel()
# formato do payload:
# {"type":"new", "name":"Edson Melo", "user":"edson.melo", "password":"edson123"}

switch ($obj->type) {
    case 'new':
        try {
            $user = new UserModel();

            # verificar se os dados foram enviados corretamente
            if (empty($obj->name) == true || empty($obj->user) == true || empty($obj->password) == true) {
                print(json_encode(["data" => "Invalid data"]));
                die();
            }

            # verifica se o usuário já existe (igual NULL não retornou nada)
            $result = $user->userExists($obj->user);
            if ($result != null) {
                print(json_encode(["data" => "User [" . $obj->user . "] exists"]));
                die();
            }

            # chama o método que insere no banco
            $result = $user->new($obj->name, $obj->user, $obj->password);

            # verifica o retorno do método
            if ($result != null) {
                print(json_encode(["data" => "User created successfully"]));
            } else {
                print(json_encode(["data" => "User creation failed"]));
            }
        } catch (Exception $ex) {
            print(json_encode(["data" => $ex->getMessage()]));
        }
        break;

    case 'login':
        try {
            $login = new UserModel();
            if (empty($obj->user) == true || empty($obj->password) == true) {
                print(json_encode(["data" => "Invalid data"]));
                die();
            }
            $result = $login->login($obj->user, $obj->password);

            # verifica se foi retornado algum dado
            if ($result != null) {
                print(json_encode($result)); # retorna os dados de login
            } else {
                print(json_encode(["data" => "User not found"]));
            }
        } catch (Exception $ex) {
            print(json_encode(["data" => $ex->getMessage()]));
        }
        break;

    default:
        print(json_encode(["data" => "Invalid data"]));
        break;
}
