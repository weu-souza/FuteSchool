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
            <div class="card-time-container">
                <div class="card-top">
                    <button onclick="copiar('Corintians')" class="paragrafo cinza-escuro-text"><i class="fa-solid  fa-link"></i> Copiar</button>
                    <p class="paragrafo cinza-escuro-text">data</p>
                    <p class="paragrafo cinza-escuro-text">casual</p>
                </div>
                <div class="times-container">
                    <div class="time-card">
                        <div class="img-card-container"><img src="/global/imagens/time_placeholder/corintians-image.png" alt="foto time"></div>
                        <p class="paragrafo cinza-escuro-text">time</p>
                    </div>
                    <div class="pontuacao titulo cinza-escuro-text">
                        <p>2</p>
                        <p>x</p>
                        <p>2</p>
                    </div>
                    <div class="time-card">
                        <div class="img-card-container"><img src="/global/imagens/time_placeholder/flamengo.png" alt="foto time"></div>
                        <p class="paragrafo cinza-escuro-text">time</p>
                    </div>
                </div>
                <div class="card-bottom">
                    <div class="bolinha-container">
                        <div class="bolinha-online "></div>
                        <p class="paragrafo ativo-text"> Iniciada</p>
                    </div>
                    <a href="/p/jogo?id=1" class="paragrafo cinza-escuro-text">Acessar <i class="fa-solid fa-caret-right"></i></a>
                </div>
            </div>

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