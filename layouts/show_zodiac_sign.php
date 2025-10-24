<?php include 'header.php'; ?>

<body class="bg-light">

    <div class="container mt-5">
        <h2 class="text-center mb-4">Seu Signo</h2>

        <?php
        if (isset($_POST['data_nascimento']) && !empty($_POST['data_nascimento'])) {

            $data_nascimento = $_POST['data_nascimento'];

            
            if (strtotime($data_nascimento)) {

                
                $signos = simplexml_load_file("signos.xml");

                // Extrai o dia e o mês da data
                $data = explode('-', $data_nascimento);
                $ano = $data[0];
                $mes = $data[1];
                $dia = $data[2];

               
                $signo_encontrado = null;

                foreach ($signos->signo as $signo) {
                    $dataInicio = explode('/', (string)$signo->dataInicio);
                    $dataFim = explode('/', (string)$signo->dataFim);

                    $diaInicio = (int)$dataInicio[0];
                    $mesInicio = (int)$dataInicio[1];
                    $diaFim = (int)$dataFim[0];
                    $mesFim = (int)$dataFim[1];

                    if (
                        ($mes == $mesInicio && $dia >= $diaInicio) ||
                        ($mes == $mesFim && $dia <= $diaFim)
                    ) {
                        $signo_encontrado = $signo;
                        break;
                    }
                }

            
                if ($signo_encontrado) {
                    echo "<div class='card shadow p-4 text-center'>
                            <h4 class='text-primary'>{$signo_encontrado->signoNome}</h4>
                            <p class='mt-3'>{$signo_encontrado->descricao}</p>
                          </div>";
                } else {
                    echo "<div class='alert alert-danger text-center'>Não foi possível identificar seu signo. Verifique a data inserida.</div>";
                }

            } else {
                echo "<div class='alert alert-danger text-center'>Data inválida. Por favor, insira uma data válida.</div>";
            }

        } else {
            echo "<div class='alert alert-warning text-center'>Por favor, informe sua data de nascimento.</div>";
        }
        ?>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">



</body>
</html>