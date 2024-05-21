<!-- article -->
<?php
// create article edition button - when logged
if (isset($_SESSION['rlogin'])) {
   ?>
<a href="<?=BASE_URL?>/adm/post/edit/<?=$articleData['id']?>/<?=$articleData['title_alias']?>" class="w3-right w3-btn w3-blue content-editionButtom" target="_blank">Editar</a>
<?php
}
?>

<!-- header post link bar -->
<div class="content-linkBar">
    <a href="<?=BASE_URL?>">Início</a>
     /
     <a href="<?=BASE_URL.$keyWordAlias?>"><?=$keyWord?></a>
     /
     <a href="<?=BASE_URL.$keyWordAlias?>/<?=$categoryAlias?>"><?=$category?></a>
     /
     <?=$title?>   
</div>

<!-- author name and access -->
<div class="content-line"></div>
<div class="content-authorContainer">
    <img src="<?=BASE_URL?>templates/default/assets/images/users/angeloalf.jpg" />
    <span> <?=$articleData['author']?> | <?=date('d/m/Y', strtotime($articleData['published']))?></span>
    <span class="w3-right content-access">Acessos: <?=$articleData['views']+1?></span>
</div>
<div class="content-lineBottom"></div>

<!-- title -->
<div class="content-title">
  <h1><?=$articleData['title']?></h1>  
</div>

<!-- all content -->
<?=html_entity_decode($articleData['content'])?>

