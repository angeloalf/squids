<!-- post list by category -->
<h1><?=$categoryName?></h1>

<table class="w3-table-all">
    <tr>
        <th>Título</th>
        <th class="w3-right">Acessos</th>
    </tr>  
      <?php
      foreach ($posts as $article) {
          ?>
        <tr>
            <td><a href="<?=BASE_URL?><?=$keywordAlias?>/<?=$categoryAlias?>/<?=$article['title_alias']?>"><?=$article['title'];?></a></td>
            <td class="w3-right"><?=$article['views'];?></td>
        </tr>
    <?php } ?>
</table>
