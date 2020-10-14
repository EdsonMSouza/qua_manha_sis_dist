<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de ChatBot</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <div class="chatbox">
            <div class="header">
                <h4>ChatBot Tecnologia</h4>
                <br>
                <p>Faça perguntas como: linux; php; dns; etc.</p>
            </div>

            <div class="body" id="chatbody">
                <div class="scroller"></div>
            </div>

            <form class="chat" method="post" autocomplete="off">
                <div>
                    <input type="text" name="chat" id="chat" placeholder="Mensagem...">
                </div>
                <div>
                    <input type="submit" value="Enviar" id="btn">
                </div>
            </form>

        </div>
    </div>
    <script src="app.js"></script>

    <script>
        divCpu = document.createElement("div");
        chatBody = document.querySelector(".scroller");
        divCpu.className = "bot visible";
        divCpu.innerHTML = "Bom dia, selecione as opções:<br><br>1 - Pedido<br>2 - Consultar Pedido";
        chatBody.append(divCpu);
    </script>

</body>

</html>