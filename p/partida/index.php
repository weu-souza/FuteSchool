<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>partidas</title>
    <?php include '../../global/php/head.php'; ?>
</head>

<body>
    <?php include '../../global/php/header/header.php'; ?>
    <main>
        <section class="partida-card-container">
            <?php
            require '../../model/partida/getPartidas.php';
            if ($_SESSION['codigo_usuario']) {
                $partidas =   getPartidas($_SESSION['codigo_usuario']);
            }
           if($partidas == null){
                    echo '<h3 class="subititulo cinza-escuro-text">Nenhuma partida encontrada</h3>';
                
                }
                else{
                foreach ($partidas as $partida) {

            ?>
                    <div class="card-time-container">
                        <div class="card-top">
                            <button onclick="copiar('<?php echo $partida['codigo_partida'] ?>')" class="paragrafo cinza-escuro-text"> <i class="fa-solid fa-link"></i> Copiar</button>
                            <p class="paragrafo cinza-escuro-text"><?php echo $partida['data_partida'] ?></p>
                            <p class="paragrafo cinza-escuro-text"> <i class="fa-solid fa-futbol"></i> <?php echo $partida['tipo_competicao'] == "C" ? "Casual" : "Torneio" ?></p>
                        </div>
                        <div class="times-container">
                            <div class="time-card">
                                <div class="img-card-container"><img src="<?php echo $partida["foto_time_casa"] ?>" alt="foto time"></div>
                                <p class="paragrafo cinza-escuro-text"><?php echo $partida["nome_time_casa"] ?></p>
                            </div>
                            <div class="pontuacao titulo cinza-escuro-text">
                                <p><?php echo $partida["gols_casa"] ?></p>
                                <p>x</p>
                                <p><?php echo $partida["gols_visitante"] ?></p>
                            </div>
                            <div class="time-card">
                                <div class="img-card-container"><img src="<?php echo $partida["foto_time_visitante"] ?>" alt="foto time"></div>
                                <p class="paragrafo cinza-escuro-text"><?php echo $partida["nome_time_visitante"] ?></p>
                            </div>
                        </div>
                        <div class="card-bottom">
                            <div class="bolinha-container">
                                <?php echo $partida['partida_finalizada']
                                    ?
                                    '<div class="bolinha-offline "></div>
                                <p class="paragrafo inativo-text"> Finalizada</p>'
                                    :
                                    '<div class="bolinha-online "></div>
                                <p class="paragrafo ativo-text"> Iniciada</p>' ?>
                            </div>
                            <a href="/p/jogo?id=<?php echo $partida["codigo_partida"] ?>" class="paragrafo cinza-escuro-text">Acessar <i class="fa-solid fa-caret-right"></i></a>
                        </div>
                    </div>

            <?php }}
             ?>
        </section>

    </main>
</body>

<script>
    function copiar(name) {
        const root = window.location.origin;
        const url = `${root}/p/criar-time?partida=${encodeURIComponent(name)}`;

        navigator.clipboard.writeText(url)
            .then(() => {
                alert('Link copiado pra área de transferência!');
            })
            .catch(() => {
                alert('Falha ao copiar o link');
            });
    }
</script>

</html>