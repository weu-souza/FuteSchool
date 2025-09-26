 <section class="card-jogador-controle">
     <div class="card-top">
         <div class="imagem-container">
             <div class="image-div"><img src="/global/imagens/time_placeholder/placeholder_user.jpg" alt="imagem jogador"></div>
             <p class="paragrafo"><?php echo $nome ?></p>
         </div>
         <div class="card-select">
             <select class="input-formulario paragrafo">
                 <option value="default">escolha um jogador</option>
             </select>
         </div>
     </div>

     <div class="cartão-container">
         <div class="cartao-amarelo amarelo">
             <div class="cartao-button-container titulo">
                 <button><i class="fa-solid fa-circle-minus"></i></button>
                 <p>2</p>
                 <button><i class="fa-solid fa-circle-plus"></i></button>
             </div>
         </div>
         <div class="cartao-vermelho inativo">
             <div class="cartao-button-container titulo">
                 <button><i class="fa-solid fa-circle-minus"></i></button>
                 <p>2</p>
                 <button><i class="fa-solid fa-circle-plus"></i></button>
             </div>
         </div>
     </div>
     <div class="button-card-jogador-container">
         <button class="button-full">marcar gol</button>
         <button class="button-full">marcar defesa</button>
     </div>
 </section>