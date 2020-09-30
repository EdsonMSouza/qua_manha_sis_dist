<?php
include "Bot.php";
$bot = new Bot;
/*
$questions = [
    "php" => "É uma linguagem de programação Server Side",
    "linux" => "É um sistema operacional desenvolvido por Linus Torvald",
    "dns" => "O DNS (Domain Name System) é um sistema de gestão de nomes para computadores",
    "chatbot" => "É um programa de computador que tenta simular um ser humano na conversação com as pessoas",
    "qual seu nome" => "Meu nome é " . $bot->getName(),
];
*/
# Carregando de um arquivo JSON


$obj = json_decode(file_get_contents('regras.json'), True);
$questions = array();

foreach ($obj as $values) {
    foreach ($values as $key => $value) {
        $questions[$key] = $value;
    }
}


if (isset($_GET['msg'])) {
    $msg = strtolower($_GET['msg']);
    $bot->hears($msg, function (Bot $botty) {
        global $msg;
        global $questions;
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
