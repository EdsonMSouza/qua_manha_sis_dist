<?php
// carregando dados de um arquivo json

$uri = 'https://api.postmon.com.br/v1/cep/';
$cep = '03590070';

$obj = json_decode(file_get_contents($uri . $cep), True);
#logradouro, cidade, estado, etc.

print($obj['logradouro'] . '<br>');
print($obj['bairro'] . '<br>');
print($obj['cidade']);

print('<pre>');
print_r($obj);
print('</pre>');
