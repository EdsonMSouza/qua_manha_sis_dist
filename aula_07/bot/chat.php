<?php
include "Bot.php";
$bot = new Bot;

include "Cep.php";

#$questions = [
#    "php" => "É uma linguagem de programação server side.",
#    "linux" => "É um sistema operacional criado por Linus Torvald.",
#    "qual o seu nome" => "Meu nome é " . $bot->getName()
#];

// carregando dados de um arquivo json
$obj = json_decode(file_get_contents('regras.json'), True);
$questions = array();
foreach ($obj as $values) {
    foreach ($values as $key => $value) {
        $questions[$key] = $value;
    }
}

# recebe uma mensagem enviada pelo usuário
if (isset($_GET['msg'])) {
    $msg = strtolower($_GET['msg']);
    $bot->hears($msg, function (Bot $botty) {
        global $msg;
        global $questions;

        # trabalhando com o cep e expressões regulares
        if (preg_match('/cep/', $msg) == 1) {
            preg_match('/\d{5}.{0,1}\d{3}/', $msg, $matches);

            $cep = new Cep($matches[0]);
            $data = $cep->getAddress();

            $tmp  = $data['address'] . '<br>';
            $tmp .= $data['district'] . '<br>';
            $tmp .= $data['city'] . '/' . $data['state'] . '<br>';

            # vamos calcular a distância aproximada
            $distancia = $cep->getDistance(-23.5448068, -46.4827709, $data['lat'], $data['lng']);

            if ($distancia > 30) {
                $tmp = "Infelizmente não entregamos neste endereço.";
                $tmp .= "Nossa raio de entrega é de até 30Km e você está a " . $distancia . ' km';
            } else {
                $tmp .= 'Que legal, você está a ' . $distancia . ' km.<br>Sua entrega chegará em ';
                $tmp .= 'aproximadamente <strong>';
                $tmp .= round((($distancia * 1.61) / 50) * 60 + 15) . '</strong> minutos';
            }
            $botty->reply($tmp);
            die();
        }

        $generics = ['oi', 'oie', 'ola', 'olá', 'bom dia', 'boa tarde', 'boa noite'];
        if (in_array($msg, $generics)) {
            $botty->reply('Olá. Em que posso ajudar?');
        } elseif ($botty->ask($msg, $questions) == "") {
            $botty->reply("Desculpe, não entendi.");
        } else {
            $botty->reply($botty->ask($msg, $questions));
        }
    });
}
