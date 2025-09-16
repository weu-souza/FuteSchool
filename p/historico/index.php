<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Criar time</title>
    <?php include '../../global/php/head.php'; ?>
</head>

<body>
    <?php include '../../global/php/header/header.php'; ?>
    <main>
        <section class="casual">
            <div class="titulo-container">
                <h3 class="subititulo cinza-escuro-text">Casual</h3>
            </div>
            <div class="card-partidas">
                <div class="card-top">
                    <p class="navegacao cinza-escuro-text">data</p>
                    <button class="paragrafo cinza-escuro-text btn-inscricao btn-copiar" onclick="copiar(1)"><i class="fa-solid  fa-link"></i> link de Inscrição</button>
                    <p class="navegacao cinza-escuro-text"><i class="fa-solid fa-futbol"></i> 14</p>
                </div>
                <a href="/p/time?id=1" class="card-time">
                    <div class="image-container"><img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="avatar" width="50"></div>
                    <table class="tabela">
                        <thead>
                            <tr>
                                <th class="titulo-tabela preto-text">Nome</th>
                                <th class="titulo-tabela preto-text">Gols</th>
                                <th class="titulo-tabela preto-text">Defesa</th>
                                <th class="titulo-tabela preto-text">Jogadores</th>
                                <th class="titulo-tabela preto-text">Falta</th>
                                <th class="titulo-tabela preto-text">Título</th>
                                <th class="titulo-tabela preto-text">Cartões</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="paragrafo cinza-escuro-text">Bola na quadra</td>
                                <td class="paragrafo cinza-escuro-text">9</td>
                                <td class="paragrafo cinza-escuro-text">10</td>
                                <td class="paragrafo cinza-escuro-text">5</td>
                                <td class="paragrafo cinza-escuro-text">0</td>
                                <td class="paragrafo cinza-escuro-text">Vencedor</td>
                                <td class="cartoes">
                                    <span class="cartao-amarelo paragrafo preto-text">0</span>
                                    <span class="cartao-vermelho paragrafo cinza-claro-text">0</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </a>
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