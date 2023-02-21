<!-- header -->
<header>
    <nav class="w3-bar w3-dark-grey">
        <a href="<?=BASE_URL;?>/home" class="w3-bar-item w3-button w3-padding-16 w3-mobile"><i class='fas fa-home'></i> PAINEL DE CONTROLE</a>
        <a href="../../../../" target="_blank" class="w3-bar-item w3-button w3-padding-16 w3-mobile">Squids <i class='fas fa-external-link-alt'></i></a>
        
        <?php 
        if (!empty($_SESSION['rlogin'])) { 
            $a = new Administrators();
            ?>
        <a href="<?=BASE_URL;?>/sair" class="w3-bar-item w3-button w3-padding-16 w3-mobile w3-right">Sair</a>
        <a class="we-bar-item w3-button w3-padding-16 w3-mobile w3-right">Olá <?php echo $a->getName($_SESSION['rlogin']) ?></a>
            <?php            
        } else {
            ?>
        <a href="<?=BASE_URL;?>/login" class="w3-bar-item w3-button w3-padding-16 w3-mobile w3-right">Login</a>
            <?php
        }
        ?>      
    </nav>    
</header>

        

