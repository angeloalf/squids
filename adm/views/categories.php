<div class="w3-row-padding w3-container">
    <div  class="pageTitle ">Edição Categorias</div>

    
    <!-- Add category (insert) -->
    <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green w3-large">[+] Nova Categoria</button>
    
    <!-- category add modal -->
    <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

          <div class="w3-center"><br>
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
            <h3> Nova Categoria</h3>
          </div>

          <!-- Add new category -->  
          <form action="<?=BASE_URL ?>/categories" class="w3-container" method='POST' enctype="multipart/form-data">
            <div class="w3-section">
              <label><b>Categoria</b></label>        
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nome da categoria" name="category_name" required>
              <input class="w3-button w3-block w3-green w3-section w3-padding" type="submit" value="ENVIAR">                       
            </div>
          </form>

          <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
            <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-right w3-red">Cancelar</button>        
          </div>
        </div>                
    </div>

    <!-- table of categories --> 
<div class="w3-container cagoriesTable">
  <table class="w3-table w3-striped w3-border">
      <tr>
          <th>Categorias</th>
          <th>Ações</th>
          <th>Artigos</th>
      </tr> 
    <tr>
    <?php 
        foreach ($categoriesList as $row) {            
            ?> <td> <?php echo $row['category_name']; ?> </td>
            <td>
                <a href ='<?=BASE_URL;?>/categories?id=<?=$row['id'];?>'">Editar</a>
                 | 
                 <a href="<?=BASE_URL;?>/categories?id=<?=$row['id'];?>&del=yes"  onclick="return confirm('Tem certeza que deseja excluir esta categoria?')"> Excluir </a>
            </td>
            <td>
               <?php echo $row['brands'] ?>
            </td>
    </tr>
        <?php } ?>
  </table>
</div>        
    
    
    
<br/><br/>

