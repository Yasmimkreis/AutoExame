<?php
    date_default_timezone_set('America/Sao_Paulo');
    $horaAtual = date("H");
    $mensagem = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nome = htmlspecialchars($_POST["nome"]);
        $email = htmlspecialchars($_POST["email"]);
        $senha = htmlspecialchars($_POST["senha"]);
        $mensagemCliente = htmlspecialchars($_POST["mensagem"]);

        $linha = "$nome | $email | $senha | $mensagemCliente\n";

        $salvo = file_put_contents("mensagens.txt", $linha, FILE_APPEND);

        if ($salvo) {
            if ($horaAtual >= 8 && $horaAtual < 18) {
                $mensagem = "Obrigada por sua mensagem, $nome!<br>Estamos disponíveis para te responder.";
            } else {
                $mensagem = "Recebemos sua mensagem, $nome!<br>Estamos fora do horário, mas responderemos assim que possível.";
            }
        } else {
            $mensagem = "Não conseguimos registrar sua mensagem.<br>Tente novamente mais tarde.";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Mensagem Recebida</title>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Verdana, Helvetica, sans-serif;
        }

        body {
            background-color: #fce4ec; /* rosa claro suave */
            color: #1565c0;
            text-align: center;
            padding: 50px;
        }

        h1 {
            color: #1565c0;
            margin-bottom: 20px;
            font-size: 2rem;
        }

        .mensagem {
            font-size: 22px;
            font-weight: bold;
            margin-top: 30px;
            background-color: #ffffff;
            color: #333; /* texto escuro para contraste */
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        button {
            background-color: #1976d2; /* azul sólido */
            color: #fff;
            border: none;
            padding: 12px 25px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
            display: block;
            margin: 20px auto;
            text-align: center;
        }

        button:hover {
            background-color: #1565c0;
            transform: scale(1.05);
        }

        a {
            display: inline-block;
            margin-top: 20px;
            background-color: #e91e63; /* rosa sólido */
            color: white;
            padding: 12px 25px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }

        a:hover {
            background-color: #c2185b;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <h1>Mensagem Recebida</h1>
    <p class="mensagem"><?php echo $mensagem; ?></p>
    <a href="contato.html">Voltar ao formulário</a>
</body>
</html>
