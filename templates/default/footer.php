<!-- footer -->
<footer><br><br>
    <div class="footer">
        <div class="w3-center">
            <div class="w3-container">
                <div class='w3-col m4 w3-center w3-text-white'>
                  <h4>Follow Us</h4>
                  <a class="w3-button w3-large w3-white" target="_blank" href="https://www.facebook.com/squids.arduino" target="_blank" rel="nofolow noopener" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                  <a class="w3-button w3-large w3-white" target="_blank" href="https://twitter.com/visualdicas" target="_blank" rel="nofolow noopener" title="Twitter"><i class="fab fa-twitter"></i></a>
                  <a class="w3-button w3-large w3-white" target="_blank" href="https://www.instagram.com/angeloalf007/" title="Instagram"><i class="fab fa-instagram"></i></a>
                  <a class="w3-button w3-large w3-white" target="_blank" href="https://br.pinterest.com/angeloalf/arduino/" title="Pinterest"><i class="fab fa-pinterest-p"></i></a>
                  <a class="w3-button w3-large w3-white w3-hide-small" target="_blank" href="https://www.linkedin.com/in/angelo-luis-ferreira-24377814/" title="Linkedin"><i class="fab fa-linkedin"></i></a>
                  <p class='powerFoot'>Powered by <a href="https://www.visualdicas.com.br" target="_blank">Visual Dicas</a></p>
                </div>

                <div style="margin-top: 55px" class='w3-col m4 w3-center w3-text-white'>
                    <div class="foterReserved">www.squids.com.br &#169; 2023 - <?php echo date('Y');   ?> - All rights reserved</div>
                    <div class="foterReserved__privacy">Termos de Uso | Termos de Privacidade</div>
                </div>

                <div style="margin-left: -0px;margin-top: 27px" class='w3-col m4 w3-center w3-text-white'>
                    <div>Squids</div>
                    <div>Support/Feedback</div>
                    <div>Sobre Squids</div>
                    <div>Por Angelo Luis Ferreira</div>                
                </div>
            </div>
            <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button> 
        </div>
    </div>
</footer>
    </body>
</html>

<script>
// ========================== BACK TO TOP BUTTON SCRIPT ==========================================================================================
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
// ==================================================================================================================================================
</script>
