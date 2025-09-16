<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Time</title>
    <?php include '../../global/php/head.php'; ?>
</head>

<body>
    <?php include '../../global/php/header/header.php'; ?>
    <main>
        <section class="top-container">
            <div class="title">
                <h3 class="subititulo cinza-escuro-text">Nome Time</h3>
            </div>
            <div class="container-pessoas">
                <!-- aqui vem o get de arbitro -->
                <div class="jogador-card">
                    <div class="jogador-title">
                        <h3 class="navegacao cinza-escuro-text">Arbitro</h3>
                    </div>
                    <div class="jogador-meio">
                        <div class="image-jogador-container">
                            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="avatar" width="50">
                        </div>
                        <div class="texto-container">
                            <p class="paragrafo cinza-escuro-text">Nome</p>
                            <p class="paragrafo cinza-escuro-text">Posição</p>
                        </div>
                    </div>
                </div>
                <!-- aqui vem o get de capitão -->
                <div class="jogador-card">
                    <div class="jogador-title">
                        <h3 class="navegacao cinza-escuro-text">Capitão</h3>
                    </div>
                    <div class="jogador-meio">
                        <div class="image-jogador-container">
                            <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="avatar" width="50">
                        </div>
                        <div class="texto-container">
                            <p class="paragrafo cinza-escuro-text">Nome</p>
                            <p class="paragrafo cinza-escuro-text">Posição</p>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <section class="jogadores-container">
            <div class="container-pessoas">
                <!-- aqui vem o get de jogador que mas fez gols -->
                <div class="jogador-card">
                    <div class="jogador-title">
                        <h3 class="navegacao cinza-escuro-text">Artilheiro</h3>
                    </div>
                    <div class="jogador-meio">
                        <div class="imagem-best-container">
                            <div class="image-best-player">
                                <i class="fa-solid fa-crown"></i>
                                <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="avatar" width="50">
                            </div>
                        </div>
                        <div class="texto-container">
                            <p class="paragrafo cinza-escuro-text">Nome</p>
                            <p class="paragrafo cinza-escuro-text">Posição</p>
                        </div>
                    </div>
                </div>
                <!-- aqui vem o get de goleiro que mais defendeu -->
                <div class="jogador-card">
                    <div class="jogador-title">
                        <h3 class="navegacao cinza-escuro-text">Goleiro menos vazado</h3>
                    </div>
                    <div class="jogador-meio">
                        <div class="imagem-best-container">
                            <div class="image-best-player">
                                <i class="fa-solid fa-crown"></i>
                                <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="avatar" width="50">
                            </div>
                        </div>
                        <div class="texto-container">
                            <p class="paragrafo cinza-escuro-text">Nome</p>
                            <p class="paragrafo cinza-escuro-text">Posição</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- aqui vem o get de jogadores no time -->
            <div class="card-jogador">
                <div class="image-container"><img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="avatar" width="50"></div>
                <table class="tabela">
                    <thead>
                        <tr>
                            <th class="titulo-tabela preto-text">Nome</th>
                            <th class="titulo-tabela preto-text">Gols</th>
                            <th class="titulo-tabela preto-text">Defesa</th>
                            <th class="titulo-tabela preto-text">Numero</th>
                            <th class="titulo-tabela preto-text">Falta</th>
                            <th class="titulo-tabela preto-text">Posição</th>
                            <th class="titulo-tabela preto-text">Cartões</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="paragrafo cinza-escuro-text">Rafael henrrique</td>
                            <td class="paragrafo cinza-escuro-text">9</td>
                            <td class="paragrafo cinza-escuro-text">10</td>
                            <td class="paragrafo cinza-escuro-text">5</td>
                            <td class="paragrafo cinza-escuro-text">0</td>
                            <td class="paragrafo cinza-escuro-text">Atacante</td>
                            <td class="cartoes">
                                <span class="cartao-amarelo paragrafo preto-text">0</span>
                                <span class="cartao-vermelho paragrafo cinza-claro-text">0</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <!-- aqui vem o get de gols nessa partida -->
        <section class="gols-container">
            <div class="title">
                <h3 class="subititulo cinza-escuro-text"> Gols</h3>
                <p class="subititulo cinza-escuro-text">9</p>
            </div>
            <div class="gol-card-container">
                <!-- fazer o get de gols aqui -->
                <div class="gol-card">
                    <div class="gol-title">
                        <p class="navegacao cinza-escuro-text">Gols</p>
                    </div>
                    <div class="gol-meio-container">
                        <div>
                            <p class="subititulo cinza-escuro-text">01</p>
                        </div>
                        <div class="tempo-container">
                            <p class="paragrafo cinza-escuro-text">primeiro tempo</p>
                            <p class="paragrafo cinza-escuro-text">05:00</p>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </main>
</body>

</html>