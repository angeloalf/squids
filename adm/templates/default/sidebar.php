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
                <span class="w3-bar-item w3-text-white w3-gray sidebar-block-title">Categorias</span>                
                <a href="<?php echo BASE_URL; ?>/categories" class="w3-bar-item w3-button">Categorias</a>
            </div>
        </div>        
        <!-- Artigos -->
        <div class="w3-container">
            <div class="w3-bar-block w3-border w3-light-gray sidebar-block">
                <span class="w3-bar-item w3-text-white w3-gray sidebar-block-title">Artigos</span>
                <a class="w3-bar-item w3-button" href="<?=BASE_URL;?>/post/add">Criar novo artigo</a>
                <a class="w3-bar-item w3-button" href="<?=BASE_URL;?>/post">Artigos</a>             
                <div class='w3-border-bottom'></div>
                <a class="w3-bar-item w3-button" href="<?=BASE_URL;?>/post?trash=yes">Lixeira</a>
            </div>
            
        </div>
        
        
      <?php } else {echo '<p>Acesso com login';} ?>    
       
        
    </div>
        
    
</aside>        
        
 


