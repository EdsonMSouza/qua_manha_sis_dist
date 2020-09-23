<?php
include("Bot.php");
$bot = new Bot();

$questions = [
    "qual o seu nome" => "Meu nome é " . $bot->getName(),
    "bom dia" => "Bom dia, seja bem vindo/vinda",
    "boa tarde" => "Boa tarde, seja bem vindo/vinda",
    "boa noite" => "Boa noite, seja bem vindo/vinda",
    "o que é linux" => "É um sistema operacional desenvolvido por Linus Torvald"
];

# verifica se foi enviada um a mensagem via GET
if (isset($_GET['msg'])) {
    # tratando a entrada
    $msg = strtolower($_GET['msg']);

    $bot->hears($msg, function (Bot $botty) {
        global $msg;
        global $questions;
        $generics = ['oi', 'oie', 'ola', 'hello', 'posso perguntar?'];

        # verificar a existência
        if (in_array($msg, $generics)) {
            $botty->reply('Olá. Em que posso ajudar?');
        } elseif ($botty->ask($msg, $questions) == "") {
            $botty->reply('Desculpe, não entendi.');
        } else {
            $botty->reply($botty->ask($msg, $questions));
        }
    });
}
