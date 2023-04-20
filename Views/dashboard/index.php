<?php
  include "dashboard-header-aside.php";
?>
        <section class="section" style="color: #333">
          <h2 class="dashboard-title">Dashboard</h2>
          <div class="dashboard-content">
            <div class="content-handler">
              <div class="statistic-handler">
                <div class="statistic">
                  <div class="rate positive">
                    <i class="fas fa-arrow-up"></i>60.5%
                  </div>
                  <div class="customer statistic-block">
                    <div class="customer-icon statistic-icon">
                      <i class="fas fa-user"></i>
                    </div>
                    <div>
                      <h4 class="customer-heading statistic-heading">
                        Clients
                      </h4>
                      <strong class="customer-count statistic-count"
                        >1028</strong
                      >
                    </div>
                  </div>
                </div>
                <div class="statistic">
                  <div class="rate negative">
                    <i class="fas fa-arrow-down"></i>30.3%
                  </div>
                  <div class="visit statistic-block">
                    <div class="visit-icon statistic-icon">
                      <i class="fas fa-chart-line"></i>
                    </div>
                    <div>
                      <h4 class="visit-heading statistic-heading">Visite</h4>
                      <strong class="visit-count statistic-count">400</strong>
                    </div>
                  </div>
                </div>
              </div>
              <div class="customers-handler">
                <a href="#user" class="customer-profile">
                  <div class="profile-picture hover-effect">
                    <img
                      src="https://ui8-core.herokuapp.com/img/content/avatar.jpg"
                      alt=""
                    />
                  </div>
                  <span>Albert</span>
                </a>
                <a href="#user" class="customer-profile">
                  <div class="profile-picture hover-effect">
                    <img
                      src="https://ui8-core.herokuapp.com/img/content/avatar-1.jpg"
                      alt=""
                    />
                  </div>
                  <span>Mohammed</span>
                </a>
                <a href="#user" class="customer-profile">
                  <div class="profile-picture hover-effect">
                    <img
                      src="https://ui8-core.herokuapp.com/img/content/avatar-2.jpg"
                      alt=""
                    />
                  </div>
                  <span>Lamarti</span>
                </a>
                <a href="#customers" class="icon-handler">
                  <div class="profile-icon hover-effect">
                    <i class="fas fa-arrow-right"></i>
                  </div>
                  <span class="see-all">Voir Tout</span>
                </a>
              </div>
              <div class="product-view">
                <canvas class="product-canvas"></canvas>
              </div>
            </div>
            <div class="popular-product">
              <h3 class="popular-product-heading">Immobilier Populaire</h3>
              <ul class="popular-products">
                <li>
                  <img
                    src="https://laforain-immobilier.com/3311-large_default/marrakech-splendide-maison-d-hotes.jpg"
                    alt="prod"
                    width="100"
                  />
                  <div>
                    <h4 class="product-heading">SPLENDIDE MAISON D'H�TES</h4>
                    <span class="disponibility available">disponible</span>
                  </div>
                </li>
                <li>
                  <img
                    src="https://laforain-immobilier.com/3311-large_default/marrakech-splendide-maison-d-hotes.jpg"
                    alt="prod"
                    width="100"
                  />
                  <div>
                    <h4 class="product-heading">SPLENDIDE MAISON D'H�TES</h4>
                    <span class="disponibility unavailable"
                      >non disponible</span
                    >
                  </div>
                </li>
                <li>
                  <img
                    src="https://laforain-immobilier.com/3311-large_default/marrakech-splendide-maison-d-hotes.jpg"
                    alt="prod"
                    width="100"
                  />
                  <div>
                    <h4 class="product-heading">SPLENDIDE MAISON D'H�TES</h4>
                    <span class="disponibility available">disponible</span>
                  </div>
                </li>
                <li>
                  <img
                    src="https://laforain-immobilier.com/3311-large_default/marrakech-splendide-maison-d-hotes.jpg"
                    alt="prod"
                    width="100"
                  />
                  <div>
                    <h4 class="product-heading">SPLENDIDE MAISON D'H�TES</h4>
                    <span class="disponibility unavailable"
                      >non disponible</span
                    >
                  </div>
                </li>
                <li>
                  <img
                    src="https://laforain-immobilier.com/3311-large_default/marrakech-splendide-maison-d-hotes.jpg"
                    alt="prod"
                    width="100"
                  />
                  <div>
                    <h4 class="product-heading">SPLENDIDE MAISON D'H�TES</h4>
                    <span class="disponibility available">disponible</span>
                  </div>
                </li>
                <li>
                  <img
                    src="https://laforain-immobilier.com/3311-large_default/marrakech-splendide-maison-d-hotes.jpg"
                    alt="prod"
                    width="100"
                  />
                  <div>
                    <h4 class="product-heading">SPLENDIDE MAISON D'H�TES</h4>
                    <span class="disponibility available">disponible</span>
                  </div>
                </li>
                <li>
                  <img
                    src="https://laforain-immobilier.com/3311-large_default/marrakech-splendide-maison-d-hotes.jpg"
                    alt="prod"
                    width="100"
                  />
                  <div>
                    <h4 class="product-heading">SPLENDIDE MAISON D'H�TES</h4>
                    <span class="disponibility available">disponible</span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </section>
      <?php include "dashboard-footer.php"; ?>
