<!-- posts list or trahs post list -->
<?= $trash == 'yes' ? '<h1>Lixeira</h1>' :  '<h1>Artigos</h1>';?>

<button class="w3-btn w3-green w3-large" onclick="location.href='<?=BASE_URL?>/post/add'">Novo Artigo (+)</button>
<button class="w3-btn w3-light-gray w3-large w3-border" onclick="location.href='<?=BASE_URL?>/categories'">Categorias (+)</button>
<br/><br/>
 <div class="w3-dropdown-hover">
  <button class="w3-light-gray w3-button">Categorias</button>
  <div class="w3-dropdown-content w3-bar-block w3-border">
        <?php 
        foreach ($categories as $category) {
            ?><a style="width:300px;" href="<?=BASE_URL?>/post?cat=<?=$category['id']?>" class="w3-bar-item w3-button"><?=$category['category_name']?></a><?php
        }
        ?>
  </div>
</div> 

 <div class="w3-light-gray w3-dropdown-hover">
  <button class="w3-button">Categorias</button>
  <div class="w3-dropdown-content w3-bar-block w3-border">
    <a href="#" class="w3-bar-item w3-button">Link 1</a>
    <a href="#" class="w3-bar-item w3-button">Link 2</a>
    <a href="#" class="w3-bar-item w3-button">Link 3</a>
  </div>
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
        <br/>
        <span style="font-size: 10px">Categoria: <?=$cat->getCategoryNameById($post['category_id'])?></span>
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

<script>
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

