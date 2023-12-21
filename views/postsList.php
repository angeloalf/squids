<!-- post list by category -->
<h1><?=$categoryName?></h1>

<table class="w3-table-all">
    <tr>
        <th>Título</th>
        <th>Acessos</th>
    </tr>  
      <?php
      foreach ($posts as $article) {
          ?>
        <tr>
            <td><a href="<?=BASE_URL?><?=$keywordAlias?>/<?=$categoryAlias?>/<?=$article['title_alias']?>"><?=$article['title'];?></a></td>
            <td><?=$article['views'];?></td>
        </tr>
    <?php } ?>
</table>
