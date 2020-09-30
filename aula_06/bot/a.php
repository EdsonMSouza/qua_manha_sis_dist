<?php
$obj = json_decode(file_get_contents('regras.json'), True);
$questions = array();

foreach ($obj as $values) {
    foreach ($values as $key => $value) {
        $questions[$key] = $value;
    }
}

print_r($questions);die();

/*
[
	{"Backup":"Fazer um back up significa fazer uma cópia de programas ou dados para evitar perda dos mesmos."},
	{"Browser":"navegador, é um aplicativo cuja função é navegar pelas páginas da internet. Ex: Firefox, Opera, Internet Explorer, etc..."},
	{"Bug":"inseto, na informática chamamos de um mal funcionamento do sistema, uma falha de desenvolvimento"},
	{"Copyright":"registrado, protegido por direitos autorais"},
	{"Download":"baixar dados da internet para si"},
	{"Data":"dados, informações"},
	{"Database":"banco de dados"},
	{"Features":"caracteristicas"},
	{"Home page":"página principal"},
	{"Join":"unir-se, juntar-se"},
	{"Keyboard":"teclado de computador"},
	{"Keyword":"palavra chave"},
	{"Upgrade":"melhorar, atualizar hardware, tornar a máquina mais potente"},
	{"Wireless":"sem fio"},
	{"Zoom in":"ampliar tamanho da tela"},
	{"Zoom out":"reduzir tamanho da tela"},
	{"Zip code":"código postal"}
]
*/