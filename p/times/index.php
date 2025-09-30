<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meus Times</title>
    <?php include '../../global/php/head.php'; ?>
</head>

<body>
    <?php include '../../global/php/header/header.php'; ?>
    <main class="page-container">
        <div class="top">
            <h3 class="subititulo cinza-escuro-text">Meus Times</h3>
        </div>
        <?php
        require_once '../../model/time/GetTimeByArbitroId.php';
        if(!isset($_SESSION['nome'])) {
            header('Location: /');
            exit();
        }
        require_once '../../model/time/GetTimeByArbitroId.php';
        $times = getTimeByArbitroId($_SESSION['codigo_usuario']);
        foreach ($times as $time)
        echo '<div class="time-card-container">
            <div onClick="irParaTime(' . $time['codigo_time'] . ')" class="time-card">
                <div  class="time-info">
                    <img src="' . $time['foto_time'] . '" alt="Foto do time">
                <h4 class="navegacao cinza-escuro-text">'. $time['nome_time'] . '</h4>
                </div>
                <div class="btn-container">
                   <button class="paragrafo cinza-escuro-text btn-inscricao btn-copiar" 
                    onclick="event.stopPropagation(); copiar(' . $time['codigo_time'] . ',' . $time['codigo_partida'] . ')">
                    <i class="fa-solid fa-link"></i> link de Inscrição</button> 
                </div>
            </div>
        </div>';
        ?>
    </main>

</body>
<script>
    function copiar(time, partida) {
        const root = window.location.origin;
        const url = `${root}/p/inscrever-time?partida=${encodeURIComponent(partida)}&time=${encodeURIComponent(time)}`;

        navigator.clipboard.writeText(url)
            .then(() => {
                alert('Link copiado pra área de transferência!');
            })
            .catch(() => {
                alert('Falha ao copiar o link');
            });
    }

   const irParaTime = (id) => {
        window.location.href = `/p/time?id=${id}`;
    }
</script>

</html>