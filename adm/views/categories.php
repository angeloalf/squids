<div class="w3-row-padding w3-container">
    <div  class="pageTitle ">Edição Categorias</div>
     
    <!-- Add category (insert) -->
    <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green w3-large">[+] Nova Categoria</button>
</div>
<!-- LIST ALL CATEGORIES -->
    <!-- table of categories --> 
<div class="w3-container cagoriesTable">
  <table class="w3-table w3-striped w3-border">
      <tr>
          <th>Categorias</th>
          <th>Grupo</th>
          <th>Ações</th>
          <th>Artigos</th>
      </tr> 
    <tr>                
    <?php 
         foreach ($categoriesList as $row) {            
            ?> 
            <td> <?php echo $row['category_name']; ?> </td>
            <td> <?php echo $row['key_word']; ?> </td>
            <td>
                <a class="w3-button" href='<?=BASE_URL?>/categories/edit/<?=$row['id']?>'>Editar</a>
                 | 
                 <a href="<?=BASE_URL;?>/categories?id=<?=$row['id'];?>&del=yes" class="w3-button"  onclick="return confirm('Tem certeza que deseja excluir esta categoria?')"> Excluir </a>
            </td>
            <td>
               <?php echo $row['brands'] ?>
            </td>
    </tr>
        <?php } ?>
  </table>
</div>        
         
<br/><br/>

<!-- ************************************************************************************************************************************************* -->
<?php
// edit mode
if($id) {
   ?><body onload="openEdit()"></body><?php                        
}

// modal list create
Modal::modalAddCategory($keyWord);
Modal::modalEditCategory($keyWord,$id); 
?>

 <script>
    function openEdit() {
        document.getElementById('id02').style.display='block' 
    }          
 </script>

