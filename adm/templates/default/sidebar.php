<!-- sidebar -->
<div class="w3-row">
<aside>
    <div class="w3-col m2 sidebar">
    <?php 
      if(isset($_SESSION['rlogin']) && !empty($_SESSION['rlogin'])) {
    ?>            
        <!-- Data entry -->
        <div class="w3-container">
            <div class="w3-bar-block w3-border w3-light-gray sidebar-block">
                <span class="w3-bar-item w3-gray sidebar-block-title">Adicionar / Editar Dados</span>                
                <a href="<?php echo BASE_URL; ?>/categories" class="w3-bar-item w3-button">Categorias</a>
                <a href="<?php echo BASE_URL; ?>artistList?music=yes" class="w3-bar-item w3-button">Musicas</a>
                <a href="<?php echo BASE_URL; ?>artistList?members=yes"" class="w3-bar-item w3-button">Membros</a>
                <a href="<?php echo BASE_URL; ?>artistList?rate=yes" class="w3-bar-item w3-button">Albums Rate</a>
                <a href="<?php echo BASE_URL; ?>genreDataEdit" class="w3-bar-item w3-button">Gêneros Musicais</a>
                <a href="<?php echo BASE_URL; ?>genreDescription" class="w3-bar-item w3-button">Descrição Gêneros</a>
                <a href="<?php echo BASE_URL; ?>countryData" class="w3-bar-item w3-button">Países</a>
            </div>
        </div>        
        <!-- Artigos -->
        <div class="w3-container">
            <div class="w3-bar-block w3-border w3-light-gray sidebar-block">
                <span class="w3-bar-item w3-gray sidebar-block-title">Artigos</span>
                <a class="w3-bar-item w3-button" href="<?=BASE_URL;?>/post/add">Criar novo artigo</a>
                <a class="w3-bar-item w3-button" href="<?=BASE_URL;?>/post">Artigos</a>
                <a href="<?php echo BASE_URL; ?>/categories" class="w3-bar-item w3-button">Categorias</a>                
                <div class='w3-border-bottom'></div>
                <a class="w3-bar-item w3-button" href="<?=BASE_URL;?>/post?trash=yes">Lixeira</a>
            </div>
            
        </div>
        
        
      <?php } else {echo '<p>Acesso com login';} ?>    
       
        
    </div>
        
    
</aside>        
        
 


