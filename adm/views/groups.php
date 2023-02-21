<div class="w3-row-padding w3-container">
    <div  class="pageTitle ">Edição Grupos</div>
     <?php 
    if ($id) {       
        ?>
        <!-- set groups (update) -->
        <form action="<?=BASE_URL ?>/groups" class="w3-container" method='POST' enctype="multipart/form-data">
            <div class="w3-section">
              <label><b>Categoria</b></label>
              <input type="hidden" value="<?php echo $id ?>" name='id'>
              <input class="w3-border" type="text" value="<?php echo $groupName; ?>" name="name" required>              
              <input class="w3-border" type="file" name="groupImage">              
              <button type="submit">EDITAR GRUPO</button>
              <a class="w3-border w3-btn w3-light-grey w3-padding-small" href="<?=BASE_URL?>/groups">Cancelar</a>    
            </div>
         </form>        
        <?php
    } else {
        ?>
    <!-- Add group (insert) -->
    <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green w3-large">[+] Novo Grupo</button>    
    <!-- category add modal -->
    <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

          <div class="w3-center"><br>
            <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
            <h3> Novo Grupo</h3>
          </div>

          <!-- Add new category -->  
          <form action="<?=BASE_URL ?>/groups" class="w3-container" method='POST' enctype="multipart/form-data">
            <div class="w3-section">
              <label><b>Categoria</b></label>        
              <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nome do grupo" name="name" required>              
              <input class="w3-input w3-border w3-margin-bottom" type="file" name="groupImage">
              <input class="w3-button w3-block w3-green w3-section w3-padding" type="submit" value="ENVIAR">                       
            </div>
          </form>

          <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
            <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-right w3-red">Cancelar</button>        
          </div>
        </div>                
    </div>
        <?php         
    }    
    ?> 
    <!-- table of categories --> 
<div class="w3-container cagoriesTable">
  <table class="w3-table w3-striped w3-border">
      <tr>
          <th>Categorias</th>
          <th>Ações</th>
          <th>Image</th> 
          <th>Categorias</th> 
      </tr> 
    <tr>
    <?php 
        foreach ($groupList as $row) {            
            ?> <td> <?php echo $row['name']; ?> </td>
            <td>
                <a href ='<?=BASE_URL;?>/groups?id=<?=$row['id'];?>'">Editar</a>                 
            </td>           
            <td>
               <?php echo $row['image'] ?>
            </td>
            <td>
               <?php echo $row['categories'] ?>
            </td>
    </tr>
        <?php } ?>
  </table>
</div>
<br/><br/>    

