<?php

class Modal {
    
// MODAL ADD NEW CATEGORY 
    public static function modalAddCategory($keyWord) {
        ?>            
        <!-- category add modal -->
        <div id="id01" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
              <div class="w3-center"><br>
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                <h3> Nova Categoria</h3>
              </div>

              <!-- Add new category -->  
              <form action="<?=BASE_URL ?>/categories/new" class="w3-container" method='POST' enctype="multipart/form-data">
                <div class="w3-section">
                  <label><b>Categoria</b></label>        
                  <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Nome da categoria" name="category_name" required>
                  <select name="key" class="w3-select w3-border w3-padding">
                      <option value="" disabled selected>Grupo</option>
                  <?php
                    foreach($keyWord as $key) { ?>
                      <option value="<?=$key['key_word_name']?>"><?=$key['key_word_name']?></option>    
                   <?php
                    }          
                  ?> 
                  </select>

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
    
// MODAL EDIT CATEGORY 
    public static function modalEditCategory($keyWord,$id) {
        // create instances
        $c = new Categories();       
        ?>            
        <!-- category edit modal -->
        <div id="id02" class="w3-modal">
            
            <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
              <div class="w3-center"><br>
                <span onclick="document.getElementById('id02').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>
                <h3> Nova Categoria</h3>
              </div>

              <!-- Add new category -->  
              <form action="<?=BASE_URL ?>/categories/edit/<?=$id?>" class="w3-container" method='POST' enctype="multipart/form-data">
                <div class="w3-section">
                  <label><b>Categoria</b></label>        
                  <input class="w3-input w3-border w3-margin-bottom" type="text" value= '<?=$c->getCategoryNameById($id)?>' name="category_name" required>
                  <select name="key" class="w3-select w3-border w3-padding">
                      <option value="" disabled selected>Grupo</option>
                  <?php
                    foreach($keyWord as $key) { ?>
                      <option value="<?=$key['key_word_name']?>" <?=($c->getKeyWordById($id)) == $key['key_word_name']  ? 'selected' : null?>>
                            <?=$key['key_word_name']?>
                      </option>    
                   <?php
                    }          
                  ?> 
                  </select>

                  <input class="w3-button w3-block w3-green w3-section w3-padding" type="submit" value="ENVIAR">                       
                </div>
              </form>

              <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
                <button onclick="document.getElementById('id02').style.display='none'" type="button" class="w3-button w3-right w3-red">Cancelar</button>        
              </div>
            </div>                
        </div>
        <?php
    }    
    
    
    
    
} // end class

