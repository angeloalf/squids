<!-- categories list by keyword -->
<h1><?=$keywordName?></h1>

<table class="w3-table-all">
    <tr>
        <th>Categorias</th>
        <th class="w3-right">Artigos</th>
    </tr>  
      <?php
      // create intances
      $content = new Content();
      
      foreach ($categoriesList as $category) {
          ?>
        <tr>
            <td><a href="<?=BASE_URL?><?=$keywordAlias?>/<?=$category['category_alias']?>"><?=$category['category_name'];?></a></td>
            <td class="w3-right"><?=$content->countAllContentByCategoryId($category['id']);?></td>
        </tr>
    <?php } ?>
</table>

