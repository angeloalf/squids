<!-- posts list or trahs post list -->
<?= $trash == 'yes' ? '<h1>Artigos - '.$title.'</h1>' :  '<h1>Artigos - '.$title.'</h1>';?>

<button class="w3-btn w3-green w3-large" onclick="location.href='<?=BASE_URL?>/post/add'">Novo Artigo (+)</button>
<button class="w3-btn w3-light-gray w3-large w3-border" onclick="location.href='<?=BASE_URL?>/categories'">Categorias (+)</button>
<br/><br/>
 <div class="w3-dropdown-hover">
  <button class="w3-light-gray w3-button">Por Categoria</button>
  <div class="w3-dropdown-content w3-bar-block w3-border"> 
        <?php
        // create instances
        $c = new Categories();
        foreach ($keyWord as $key) {
            $categories = $c->getCategotyByKeyWord($key['key_word_name']);            
            if ($categories) {
                foreach ($categories as $category) {
                    ?><a style="width:300px;" class="w3-bar-item w3-button" href="<?=BASE_URL?>/post?cat=<?=$category['id']?>" ><?=$category['category_name']?></a><?php
                }
           ?><div style="margin-top: -20px; margin-bottom: -20px;"><hr/></div><?php     
            }    
        }   
        ?>
            
            <a style="width:300px; margin-top: -20px" class="w3-bar-item w3-button" href="<?=BASE_URL?>/post">Todas Categorias</a>
  </div>
</div> 

 <div class="w3-light-gray w3-dropdown-hover">
  <button class="w3-button">Por Estado</button>
  <div class="w3-dropdown-content w3-bar-block w3-border">
    <a href="<?=BASE_URL?>/post?pub=published" class="w3-bar-item w3-button">Publicado</a>
    <a href="<?=BASE_URL?>/post?pub=wating"" class="w3-bar-item w3-button">Não Publicado</a> 
    <a href="<?=BASE_URL?>/post?trash=yes" class="w3-bar-item w3-button">Lixeira</a>  
  </div>
</div>
<div class="w3-dropdown-hover w3-right">
  <button >Itens por página</button>
  <div class="w3-dropdown-content w3-bar-block w3-border">
    <a href="<?=BASE_URL?>/post/setPostPage/5" class="w3-bar-item w3-button">5</a>
    <a href="<?=BASE_URL?>/post/setPostPage/10" class="w3-bar-item w3-button">10</a>
    <a href="<?=BASE_URL?>/post/setPostPage/20" class="w3-bar-item w3-button">20</a>
    <a href="<?=BASE_URL?>/post/setPostPage/30" class="w3-bar-item w3-button">30</a>
    <a href="<?=BASE_URL?>/post/setPostPage/50" class="w3-bar-item w3-button">50</a>
    <a href="<?=BASE_URL?>/post/setPostPage/9999" class="w3-bar-item w3-button">Tudo</a> 
  </div>
  <input style="width: 35px; text-align:center" type="text" placeholder="<?=$nPosts?>">
</div>
<br/><br/>
<table class="w3-table-all">
    <thead>
        <tr class="w3-light-grey">        
            <th>Título</th>
            <th class="w3-center">Ação</th>
            <th class="w3-center">Estado</th>
            <th class="w3-center">Autor</th>
            <th class="w3-center">Data Criação</th>
            <th class="w3-center">Visualizações</th>
        </tr>    
     </thead>        
    <?php 
    foreach ($postList as $post) {
        $cat = new Categories();
        
        // get trash button type 
        if ($post['trash'] == 'no') {
           $title = "Enviar para a lixeira";
           $icon = "&#xf2ed";
           $fontSize = "15px";
        } else {
           $title = "Voltar para posts ativos"; 
           $icon ="&#xf35b";
           $fontSize = "20px";
        }
       ?>
    <tr>
        <td>
        <a href="<?=BASE_URL?>/post/edit/<?=$post['id']?>/<?=$post['title_alias']?>"><?=$post['title'];?></a>        
        <div style="margin-top: 0px; margin-bottom: 3px;">
            <span style="font-size: 10px"><?=$cat->getKeyWordById($post['category_id'])?> | <?=$cat->getCategoryNameById($post['category_id'])?></span>
        </div>
        </td>        
        <td class="w3-center">
            <a style="cursor:pointer" title='<?=$title?>' onclick="trash('<?=$post['id']?>','<?=$post['title_alias']?>','<?=$post['trash']?>')">
                <i style='font-size:<?=$fontSize?>' class='far'><?=$icon?>;</i></a>
        </td>
        <td class="w3-center"><?= $post['state']=="published" ? "publicado" : "não publicado";?></td>
        <td class="w3-center"><?=$post['author'];?></td>
        <td class="w3-center"><?=$post['created'];?></td>
        <td class="w3-center"><?=$post['views'];?></td>
    </tr>
    <?php
    }
    ?>        
</table>
<br/><br/>
<?php
// PAGES NAVEGATION ***************************************************    
    if ($amountPages >1) {
        
        ?>
        <div style="margin-bottom: 30px;" class="w3-center w3-bar">
            <a href="<?=$link?>&p=<?=$minus?>" class="w3-button w3-light-grey" href=""><h5>&#10094; </h5></a>
            <span style="font-size: 15px; vertical-align: -3px;font-weight: bold;"><?=$page." / ".$amountPages; ?></span>
            <a href="<?=$link?>&p=<?=$plus?>" class="w3-button w3-light-gray" href=""><h5>&#10095; </h5></a>
        </div>
        <?php 
    }
    // end pagination **********************************************************      
?>
<script>
    // trash post page function
    function trash(id, alias, trash) {
        const link = '<?=BASE_URL?>/post/trash/'+id+'/'+alias
      if (trash == 'no') {
          if (confirm("Confirma enviar o artigo para a lixeira?") == true) {
              window.location.href=link 
          }
      } else {
          window.location.href=link 
      }
    }   
</script>

