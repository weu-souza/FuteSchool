<!DOCTYPE html>
<html lang="en">

<head>
     <?php include '../../global/php/head.php'; ?>
     <title>Home</title>
</head>

<body>
     <?php include '../../global/php/header/header.php'; ?>
     <main class="home-container">
          <section class="hero-container">
               <div class="hero">
                    <h3 class="hero-title titulo cinza-claro-text">Bem-vindo <?= $_SESSION['usuario'] ?? "ao Futeschool"; ?>!</h3>
                    <div class="hero-description">
                         <p class=" paragrafo cinza-claro-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ac orci et ipsum pharetra cursus non nec urna. Nullam pulvinar, enim at laoreet consequat, lectus lorem bibendum nisi, ut vehicula lectus ex a nulla. Donec tincidunt lorem ut libero fermentum, ac vestibulum erat sagittis. Suspendisse potenti. In non mauris neque. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.

                              Sed sit amet quam vitae magna iaculis aliquam vitae sed risus. Nam scelerisque varius eros, at volutpat nisl vestibulum ut. Praesent viverra, libero a pretium ullamcorper, nisi nunc mattis ex, a varius risus augue eget erat. Aliquam erat volutpat. Integer feugiat odio sit amet magna sollicitudin, nec interdum elit suscipit. Etiam facilisis tristique urna, in luctus tortor commodo vel. Vestibulum vehicula ipsum nec cursus finibus.

                              Curabitur sodales, justo et rutrum vehicula, augue nunc tincidunt velit, nec gravida nibh lorem at velit. Suspendisse ac leo metus. Phasellus sed magna vel felis luctus feugiat. Donec eget est nisi. Maecenas convallis, lorem eget viverra condimentum, ipsum mauris fringilla metus, eget facilisis mauris purus ut est. Vivamus a metus quis nisl imperdiet condimentum.</p>
                    </div>
                    <div class="button-container">
                         <div class="line1"></div>
                         <a href="/p/criar-partida/" class="button-full subititulo cinza-claro-text">Criar partida</a>
                         <div class="line2"></div>
                    </div>
               </div>
          </section>
          <section class="carrossel-section">
               <div class="carrossel-area">


                    <div class="title-carrossel-container">
                         <h3 class="subititulo cinza-escuro-text">Nossos Times</h3>
                    </div>
                    <div class="carrossel-container">
                         <button class="carrossel-left"><i class="fa-solid fa-square-caret-left"></i></button>
                         <div class="carrossel-images">
                              <?php
                              $carrosselArr = [
                                   [
                                        "timeFoto" => "/global/imagens/time_placeholder/corintians-image.png",
                                        "timeText" => "TIME1"
                                   ],
                                   [
                                        "timeFoto" => "/global/imagens/time_placeholder/flamengo.png",
                                        "timeText" => "TIME2"
                                   ],
                                   [
                                        "timeFoto" => "/global/imagens/time_placeholder/placeholder_user.jpg",
                                        "timeText" => "TIME3"
                                   ],
                                   [
                                        "timeFoto" => "/global/imagens/time_placeholder/soccer_slogan.jpeg",
                                        "timeText" => "TIME4"
                                   ],
                                   [
                                        "timeFoto" => "/global/imagens/time_placeholder/são_paulo.jpg",
                                        "timeText" => "TIME5"
                                   ],
                                   [
                                        "timeFoto" => "/global/imagens/time_placeholder/flamengo.png",
                                        "timeText" => "TIME2"
                                   ],
                                   [
                                        "timeFoto" => "/global/imagens/time_placeholder/placeholder_user.jpg",
                                        "timeText" => "TIME3"
                                   ],
                                   [
                                        "timeFoto" => "/global/imagens/time_placeholder/soccer_slogan.jpeg",
                                        "timeText" => "TIME4"
                                   ],
                                   [
                                        "timeFoto" => "/global/imagens/time_placeholder/são_paulo.jpg",
                                        "timeText" => "TIME5"
                                   ],
                                   [
                                        "timeFoto" => "/global/imagens/time_placeholder/flamengo.png",
                                        "timeText" => "TIME2"
                                   ],
                                   [
                                        "timeFoto" => "/global/imagens/time_placeholder/placeholder_user.jpg",
                                        "timeText" => "TIME3"
                                   ],
                                   [
                                        "timeFoto" => "/global/imagens/time_placeholder/soccer_slogan.jpeg",
                                        "timeText" => "TIME4"
                                   ],
                                   [
                                        "timeFoto" => "/global/imagens/time_placeholder/são_paulo.jpg",
                                        "timeText" => "TIME5"
                                   ],
                              ];
                              foreach ($carrosselArr as $item) {
                              ?>
                                   <div class="imagens">
                                        <img src="<?php echo $item['timeFoto']; ?>" alt="imagem carrossel">
                                        <p class="subititulo cinza-escuro-text"><?php echo $item['timeText']; ?></p>
                                   </div>
                              <?php
                              }
                              ?>
                         </div>
                         <button class="carrossel-right"><i class="fa-solid fa-square-caret-right"></i></button>
                    </div>
               </div>
          </section>
          <section class="contato-section">
               <div class="contato-container">
                    <div class="contato-title">
                         <h3 class="subititulo cinza-claro-text">Contato</h3>
                         <p class="paragrafo cinza-claro-text">Algum problema no site? nos envie um email</p>
                    </div>
                    <form class="formulario-contato" action="">
                         <textarea class="subititulo cinza-escuro-text" name="mensagem" id=""></textarea>
                         <button class="button-full button-form-contato subititulo">ENVIAR</button>
                    </form>
               </div>
          </section>
     </main>
     <script src="js/carrossel.js"></script>
</body>

</html>