<?php
# Classe responsável pela gestão do Bot (Robô)

class Bot
{
    private $name = "Chatbot";

    public function getName()
    {
        return $this->name;
    }

    public function hears($message, callable $call)
    {
        $call(new Bot());
        return $message;
    }

    public function reply($response)
    {
        print($response);
    }

    public function ask($question, array $questionDictionary)
    {
        $question = trim($question); # retira os espaços do início e do fim
        foreach ($questionDictionary as $questions => $value) {
            if ($question == $questions) {
                return $value;
            }
        }
    }
}
