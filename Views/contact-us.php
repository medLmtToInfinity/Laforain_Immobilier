<?php include "includes/products-header.php"; ?>

       <div class="container-form">

      <!-- code from codepen -->
       <div class="background">
  <div class="container">
    <div class="screen">
      <div class="screen-body">
        <div class="screen-body-item left">
          <div class="app-title">
            <span>CONTACT</span>
            <span>US</span>
          </div>
          <div class="infos">
            <h3>Informations</h3>
            <p>
              <span>LAFORAIN IMMOBILIER</span><br />
              27 rue Sergent Levet 40000 Marrakech Morocco <br />
              Appelez-nous : <br />
              <i class="fa-solid fa-phone"></i> +212(0) 643 451 784 <br />
              Écrivez-nous : <br />
              <i class="fa-solid fa-envelope"></i> laforain.immobilier@gmail.com
              <br />
            </p>
          </div>
        </div>
        <div class="screen-body-item">
          <div class="app-form">
            <div class="app-form-group">
            <form action="message.php" method="POST" class="">
              <div class="input-box">
                <input class="app-form-control"
                  type="text"
                  name="subject"
                  id="subject"
                  placeholder="Entrer le sujet ..."
                  required
                />
                <i class="fa-solid fa-paperclip"></i>
              </div>
              <div class="input-box">
                <input class="app-form-control"
                  type="email"
                  name="email"
                  id="email"
                  placeholder="Entrer votre email ..."
                  required
                />
                <i class="fa-solid fa-envelope"></i>
              </div>
              <div class="input-box">
                <label for="file" class="choose-file" style="color:#666"
                  >Choisir un document joint</label
                >
                <input class="app-form-control" type="file" name="file" id="file" />
                <i class="fa-solid fa-file"></i>
              </div>
              <div class="input-box">
                <textarea class="app-form-control"
                  name="message"
                  id="message"
                  cols="30"
                  rows="5"
                  style="resize: vertical"
                  placeholder="Ecrire votre message .."
                  required
                ></textarea>
              </div>
            <div class="app-form-group buttons">
              <button class="app-form-button" type="reset">RESET</button>
              <button class="app-form-button" type="submit">SEND</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>





        <!--<div class="infos-form">
          <div class="contact-form">
            <h2>Nous contacter</h2>
            <form action="" method="POST" class="">
              <div class="input-box">
                <label for="subject">Sujet :</label>
                <input
                  type="text"
                  name="subject"
                  id="subject"
                  placeholder="Entrer le sujet ..."
                  required
                />
                <i class="fa-solid fa-paperclip"></i>
              </div>
              <div class="input-box">
                <label for="email">Adresse e-mail :</label>
                <input
                  type="email"
                  name="email"
                  id="email"
                  placeholder="Entrer votre email ..."
                  required
                />
                <i class="fa-solid fa-envelope"></i>
              </div>
              <div class="input-box">
                <label for="file" class="choose-file"
                  >Choisir un document joint</label
                >
                <input type="file" name="file" id="file" />
                <i class="fa-solid fa-file"></i>
              </div>
              <div class="input-box">
                <label for="message">Message :</label>
                <textarea
                  name="message"
                  id="message"
                  cols="30"
                  rows="5"
                  placeholder="Ecrire votre message .."
                  required
                ></textarea>
              </div>
              <button type="submit" class="contact-form-btn">Envoyer</button>
            </form>
          </div>
          <img class="logo" src="images/LOGO WHITE.png" alt="">
          <div class="infos">
            <h3>Informations</h3>
            <p>
              <span>LAFORAIN IMMOBILIER</span><br />
              27 rue Sergent Levet 40000 Marrakech Morocco <br />
              Appelez-nous : <br />
              <i class="fa-solid fa-phone"></i> +212(0) 643 451 784 <br />
              Écrivez-nous : <br />
              <i class="fa-solid fa-envelope"></i> laforain.immobilier@gmail.com
              <br />
            </p>
          </div>
        </div>
        <div class="infos-bottom">
          <div>
            <span>LAFORAIN IMMOBILIER</span><br />
            27 rue Sergent Levet 40000 Marrakech Morocco <br />
          </div>
          <div>
            Appelez-nous : <br />
            <i class="fa-solid fa-phone"></i> +212(0) 643 451 784 <br />
          </div>
          <div>
            Écrivez-nous : <br />
            <i class="fa-solid fa-envelope"></i> laforain.immobilier@gmail.com
            <br />
          </div> 
        </div> -->
      </div>

      <!--                    footer                                 -->

      <footer class="footer-links">
        <div class="footer-container">
          <a href="#container">
            <img
              class="logo"
              src="./images/laforain_logo.png"
              width="150px"
              alt="logo-img"
          /></a>
          <div class="footer-center">
            <ul class="links">
              <li><a href="#">My account</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Terms and Conditions</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Contact us</a></li>
            </ul>
            <p class="copyright1">
              &copy;<span class="date">2020-2023</span> Laforain Immobilier
            </p>
          </div>
          <div class="footer-right">
            <span>Follow US</span>
            <ul class="social-media">
              <li>
                <a
                  href="https://web.facebook.com/annonceslaforainimmobilier"
                  target="_blank"
                  ><i class="fa-brands fa-facebook-f"></i
                ></a>
              </li>
              <li>
                <a href="https://twitter.com/LaforainI" target="_blank"
                  ><i class="fa-brands fa-twitter"></i
                ></a>
              </li>
              <li>
                <a
                  href="https://www.instagram.com/laforain.immobilier/?hl=fr"
                  target="_blank"
                  ><i class="fa-brands fa-instagram"></i
                ></a>
              </li>
              <li>
                <a href="https://www.pinterest.fr/business/hub" target="_blank"
                  ><i class="fa-brands fa-pinterest"></i
                ></a>
              </li>
            </ul>
          </div>
          <p class="copyright2">
            &copy;<span class="date">2020-2023</span> Laforain Immobilier
          </p>
        </div>
      </footer>
    </div>
    <script src="js/script.js"></script>
    <script src="js/boubker1.js"></script>
  </body>
</html>
