 <!-- Footer Starts Here -->
 <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-3 footer-item">
          <i style="color:white" class="icon-flat-128x128-075-f-pad-128x128-f8f8f8 fa-3x"></i><h4>V.O.H∴ </h4>
         
          </div>
          <div class="col-md-3 footer-item">
            <h4>Links Úteis</h4>
            <ul class="menu-list">
              <li><a href="https://www.joselaerciodoegito.com/">José Laercio do Egito</a></li>
            </ul>
          </div>
          <div class="col-md-3 footer-item">
            <h4>Sites</h4>
            <ul class="menu-list">
              <li><a href="https://www.joselaerciodoegito.com/">José Laercio do Egito</a></li>
            </ul>
          </div>
          <div class="col-md-3 footer-item last-item">
            <h4>Contate-nos</h4>
            <div class="contact-form">
              <form id="contact footer-contact" action="" method="post">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="filled-button">Send Message</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </footer>
    
    <div class="sub-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p>Todos os direitos reservados &copy; 2020 V.O.H,.
          </div>
        </div>
      </div>
    </div>



    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>
    <!--Scripts JavaScript-->
    <?php wp_footer(); ?>