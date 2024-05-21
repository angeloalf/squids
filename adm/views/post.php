
<!-- tinyMCE ------------------------------
<script src="https://cdn.tiny.cloud/1/ojgy3b3npcy6e4jrz9av4tlird04kahh6hyc5rsntl7mi26m/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
-->
<h1>
    Artigos - Incluir/Editar
</h1>

<?php
if (isset($info)) {
    ?>
    <div class="w3-panel w3-green w3-display-container">
  <span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-green w3-xlarge w3-display-topright">x</span>
  <p><?=$info?></p>
</div>
<?php    
}
?>
<!-- post form to create and edit posts -->
<form method="POST" action="<?=$actionValue?>">
    <input style="width:700px;" type="text" name="title" placeholder="Título" width="300" autofocus spellcheck="true" value="<?=$titleValue?>" required>
    <select class="w3-btn w3-light-gray w3-small" name="category_id">
        <?php 
        foreach ($categories as $item) {
            ?>
            <option value="<?=$item['id']?>" <?=$item['id']==$categoryIdValue ? 'selected' : null?>><?=$item['category_name']?></option>               
        <?php           
        }
        ?>        
    </select>
    <select class="w3-btn w3-light-gray w3-small" name="state">        
        <option value="published" <?=$stateValue=='published'  ? 'selected' : null?>>Publicado</option>
        <option value="wating" <?=$stateValue=='wating' ? 'selected' : null?>>Não Publicado</option>
    </select>
    <br/><br/>
    <textarea name="content" spellcheck="true">
    <?=$contentValue;?>
   </textarea>
    <input id="seletor" name="seletor" hidden readonly" />
    <br/>    
    <button class="w3-btn w3-green" type="submit">Salvar</button>
    
    <button class="w3-btn w3-light-gray w3-border" onclick="setSeletorClose()">Salvar e Fechar</button>
    <button class="w3-btn w3-light-gray w3-border" onclick="setSeletorNew()">Salvar e Novo</button>
    <a style="margin-left: 15px;" class="w3-btn w3-red" onclick="location.href='<?=BASE_URL?>/post'">Cancelar</a>
</form>
<br/><br/>


 <!--    TynyMCE routine   -->
  <script>
    // tynymce configuration  
    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange export formatpainter image imagetools editimage linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tableofcontents tinycomments tinymcespellchecker emoticons charmap link unlink preview  importcss codesample',
      toolbar: 'undo redo | bold italic underline strikethrough | align codesample |  blocks fontfamily fontsize | numlist bullist | indent outdent | emoticons charmap | link unlink | image editimage | permanentpen table tableofcontents preview',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Angelo Luis Ferreira',
      content_css: '<?=BASE_URL?>/templates/default/assets/css/w3.css',
      language: "pt_Br",
      emoticons_database: 'emojiimages',
      automatic_uploads: true,
      images_upload_url: 'postAcceptor.php',
      images_upload_credentials: false,      
      a11y_advanced_options: true,
      image_title: true,
      image_dimensions: true,
      image_class_list: [
        {title: 'None', value: ''},
        {title: 'Responsive', value: 'img-responsive'}                   
       ],
      imagetools_toolbar: 'rotateleft rotateright | flipv fliph | editimage imageoptions',
      image_advtab: true,
      object_resizing: 'img',
      resize_img_proportional: true,     
    });
  </script>
  
<!-- functions for close and new buttons save -->
  <script>
    // save and close button  
    function setSeletorClose() {
          const myInput = document.querySelector("#seletor");
          myInput.value = "closed";
    }    
  </script>  
  <script>
    // save and new post button  
    function setSeletorNew() {
          const myInput = document.querySelector("#seletor");
          myInput.value = "new";
    }
    
  </script>


