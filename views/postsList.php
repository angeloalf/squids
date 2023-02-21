<!-- post list by category -->
<h1><?=$categoryName?></h1>

<table>
    <tr>
        <th>Título</th>
        <th>Acessos</th>
    </tr>  
      <?php
      foreach ($posts as $article) {
          ?>
        <tr>
            <td><a href="<?=BASE_URL?>post/article/<?=$categoryAlias?>/<?=$article['title_alias']?>"><?=$article['title'];?></a></td>
            <td><?=$article['views'];?></td>
        </tr>
    <?php } ?>  
</table>
