<!-- categories list by keyword -->
<h1><?=$keywordName?></h1>

<table class="w3-table-all">
    <tr>
        <th>Categorias</th>
        <th>Artigos</th>
    </tr>  
      <?php
      foreach ($categoriesList as $category) {
          ?>
        <tr>
            <td><a href="<?=BASE_URL?><?=$keywordAlias?>/<?=$category['category_alias']?>"><?=$category['category_name'];?></a></td>
            <td><?=$category['brands'];?></td>
        </tr>
    <?php } ?>
</table>

