<!-- article -->

<!-- header post link bar -->
<div class="content-linkBar">
    <a href="<?=BASE_URL?>">Início</a>
     /
     <a href="<?=BASE_URL.$keyWordAlias?>"><?=$keyWord?></a>
     /
     <a href="<?=BASE_URL.$keyWordAlias?>/<?=$categoryAlias?>"><?=$category?></a>
     /
     <b><?=$title?></b>     
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

