<!-- header -->
<header>
    <!-- logo -->
    <div class="header">
        <div class="header-logo style-general">
            <a class="header-logo" href="<?= BASE_URL; ?>"><span class="logo"><img src="<?=BASE_URL?>templates/default/assets/images/logo/squids_logo3.png" />
                </span></a>  
        </div>  
    </div>
    
    <!-- navbar -->
    <nav class="w3-card">
        <div class="style-general">
            <a class="w3-btn w3-padding-large w3-hide-medium w3-hide-large" 
                                     href="javascript:void(0)" onclick="navFunction()" title="Alternar Menu de Navegação"><i class="fa fa-bars"></i></a>
            <a href='<?=BASE_URL; ?>' class='w3-btn w3-padding-large '><i class="fas fa-home"></i> Home</a> 
            <a href='<?=BASE_URL?>eletronica' class='w3-btn w3-padding-large w3-hide-small'><i class="fa fa-microchip"></i> Eletrônica</a>
            <a href='<?=BASE_URL?>robotica' class='w3-btn w3-padding-large w3-hide-small'><i class="fas fa-robot"></i> Robótica</a>
        </div>        
    </nav>
    
    <!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
    <nav id="navDemo" class="w3-bar-block w3-nav w3-hide w3-hide-large w3-hide-medium w3-top style-general" style="margin-top:157px;padding-bottom: 15px;">
      <a href='<?= BASE_URL;?>eletronica' class="w3-bar-item w3-button w3-padding-large " onclick="navFunction()"><i class="fa fa-microchip"></i> Eletônica</a>
      <a href='<?= BASE_URL; ?>topArtists' class="w3-bar-item w3-button w3-padding-large" onclick="navFunction()"><i class="fas fa-robot"></i> Robótica</a>
    </nav>           
</header>

