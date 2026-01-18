<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Resultado</title>
    </head>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Verdana, Helvetica, sans-serif;
        }

        .resultado-feminino {
        background: linear-gradient(135deg, #FF69B4, #FFC0CB); /* rosa */
        color: #fff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(255, 105, 180, 0.5);
        margin-top: 20px;
        animation: fadeIn 1s ease;
    }

    .resultado-masculino {
        background: linear-gradient(135deg, #007BFF, #00BFFF); /* azul */
        color: #fff;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0, 123, 255, 0.5);
        margin-top: 20px;
        animation: fadeIn 1s ease;
    }

    .resultado-neutro {
        background: #f0f0f0;
        color: #333;
        padding: 25px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        margin-top: 20px;
        animation: fadeIn 1s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .resultado-feminino h2,
    .resultado-masculino h2,
    .resultado-neutro h2 {
        text-align: center;
        margin-bottom: 15px;
        font-size: 1.8rem;
    }

    .resultado-feminino p,
    .resultado-masculino p,
    .resultado-neutro p {
        font-size: 1.2rem;
        line-height: 1.6;
        text-align: center;
    }

    button{
        background: linear-gradient(135deg, #f48fb1, #64b5f6); /* rosa para azul */
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
        vertical-align: middle;
    }

    </style>
    <body>
        <?php
        $sexo = $_POST['sexo'] ?? null;
        $dor = $_POST['dor'] ?? null;
        $sintomas = $_POST['sintomas'] ?? [];
        $historico = $_POST['historico'] ?? null;
        $atividade = $_POST['atividade'] ?? null;
        $habitos = $_POST['habitos'] ?? [];
        $idade = $_POST['idade'] ?? null;
        $exames = $_POST['exames'] ?? null;
        $medico = $_POST['medico'] ?? null;

        $resultado = "";

        if ($sexo === "feminino") {
        if ($dor === "intensa" || 
            in_array("nodulo", $sintomas) || 
            in_array("sangue", $sintomas) || 
            in_array("alteracao", $sintomas) || 
            in_array("inversao_mamilo", $sintomas) || 
            in_array("inchaço", $sintomas) || 
            $historico === "sim") {
            
            $resultado = "⚠️ Procure imediatamente um mastologista ou hospital.";
        } else {
            $resultado = "✅ Continue fazendo seus exames de rotina e mantenha o acompanhamento médico.";
        }
        } elseif ($sexo === "masculino") {
            if ($dor === "intensa" || 
                in_array("dificuldade_urinar", $sintomas) || 
                in_array("dor_retoperineal", $sintomas) || 
                in_array("sangue_urina", $sintomas) || 
                in_array("impotencia", $sintomas) || 
                in_array("inchaço_testiculos", $sintomas) || 
                $historico === "sim") {
                
                $resultado = "⚠️ Procure um urologista para avaliação detalhada.";
            } else {
                $resultado = "✅ Faça exames preventivos regularmente e mantenha hábitos saudáveis.";
            }
        }


        if ($idade === "mais60") {
            $resultado .= "<br>🔵 Atenção: sua faixa etária exige exames regulares anuais.";
        } elseif ($idade === "40a60") {
            $resultado .= "<br>📌 Recomendação: exames preventivos a cada 2 anos.";
        }

        if (in_array("nenhum", $habitos)) {
            $resultado .= "<br> 🎉 Ótimo! Mantenha hábitos saudáveis.";
        } elseif (in_array("tabaco", $habitos) || in_array("alcool", $habitos)) {
            $resultado .= "<br> 🚭 Evite álcool e tabaco, pois aumentam o risco.";
        }

        if ($atividade === "nao") {
            $resultado .= "<br>🏃 Pratique atividade física para reduzir riscos.";
        }

        if ($exames === "nao") {
            $resultado .= "<br>🩺 Você ainda não realizou exames preventivos, agende o quanto antes.";
        } else {
            $resultado .= "<br>✅ Ótimo! Continue realizando exames regularmente.";
        }

        if ($medico === "nao") {
            $resultado .= "<br>📅 É importante ter acompanhamento médico regular.";
        } else {
            $resultado .= "<br>👨‍⚕️ Continue mantendo suas consultas médicas.";
        }

        if ($sexo === "feminino") {
            $classeResultado = "resultado-feminino";
        } elseif ($sexo === "masculino") {
            $classeResultado = "resultado-masculino";
        } else {
            $classeResultado = "resultado-neutro";
        }

        echo "<div class='$classeResultado'>";
        echo "<h2>Resultado do Quiz</h2>";
        echo "<p>$resultado</p>";
        echo "</div>";
    ?>
    <div class="button">
        <button onclick="window.location.href='auto-checape.html'">Voltar</button>
    </div>
    </body>
</html>