<?php session_start(); ?>
<header>
    <div class="image_logo_container">
        <a href="/p/home"><img src="/global/imagens/icone_header.svg" alt="logo futeSchool"><a>

    </div>
    <nav>
        <ul class="links-container">
            <?php
            if (!empty($_SESSION['nome'])) {
                echo '<li><a class="links navegacao preto-text" href="/p/criar-partida/">CRIAR PARTIDA</a></a></li>';
                echo '<li><a class="links navegacao preto-text" href="/p/partida/">Partidas</a></a></li>';
                echo '<li><a class="links navegacao preto-text" href="/p/times/">meus Times</a></a></li>';
                echo '<li><a class="links navegacao preto-text" href="/p/historico/">Historico</a></a></li>';
            }
            ?>
            <?php echo !empty($_SESSION['nome']) ?
                '<li><a href="/login/php/logout.php"class="links navegacao preto-text">Sair</a></li>'
                : '<li ><a class="links navegacao preto-text" href="/">Login</a></li>'; ?>
        </ul>
    </nav>
</header>