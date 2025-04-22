<?php
require_once "inc/init.inc.php"; // Inclusion du fichier d'initialisation
require_once "inc/functions.inc.php";
$info = "";

if (isset($_GET) && isset($_GET['id_advert']) && !empty($_GET['id_advert'])) {

  $idAdvert = htmlentities($_GET['id_advert']);

  if (is_numeric($idAdvert)) {

      // $film = showfilmViaId($idFilm);
      $advert = showAdvertViaId($_GET['id_advert']);

      if (!$advert) {

          header('location:index.php');
      }
  } else {

      header('location:index.php');
  }
}



if (isset($_POST['id_advert'])) {
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['reserver'])) {
  $reservation = $_POST['reserver'];
  $idAdvert = $_POST['id_advert'];
  //fonction reserv
  updateReservationMessage($idAdvert, $reservation);
  $info = alert('votre message a été bien enregistré', 'success');
  header("Refresh: 2; url=mesAnnonces.php");
}




require_once "inc/header.inc.php"; // Inclusion du header

?>

    <!-- Page Title -->
    <div class="page-title">
    <?php
    echo $info;
    ?>
      <div class="container d-lg-flex justify-content-between align-items-center">
        <h1 class="mb-2 mb-lg-0">Détail de l'annonce</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="<?= RACINE_SITE ?>index.php">Acceuil</a></li>
            <!-- <li class="current">Portfolio Details</li> -->
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Portfolio Details Section -->
    <section id="portfolio-details" class="portfolio-details section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper init-swiper">

              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  }
                }
              </script>

              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                  <img src="<?= RACINE_SITE . "assets/img/images/" . $advert['photo'] ?>" alt="image annonce">
                </div>

                <!-- <div class="swiper-slide">
                  <img src="" alt="image annonce">
                </div>

                <div class="swiper-slide">
                  <img src="" alt="image annonce">
                </div>

                <div class="swiper-slide">
                  <img src="" alt="image annonce">
                </div> -->

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info" data-aos="fade-up" data-aos-delay="200">
              <h3><?= html_entity_decode(strtoupper($advert['title'])) ?> </h3>

            
            <div class="portfolio-description" data-aos="fade-up" data-aos-delay="300">
              <p><i class="bi bi-geo-alt-fill"></i><?= html_entity_decode($advert['postal_code']) ?></p>
                  <p><i class="bi bi-geo"></i><?= html_entity_decode($advert['city']) ?></p>
                  <p>Type:<?= html_entity_decode($advert['type']) ?></p>
                  <p class="fw-bolder">Prix:<?= html_entity_decode($advert['price']) ?>€</p>
              
            <p class="">A propos :<?= html_entity_decode($advert['description']) ?></p>
            </div>
            <form action="#" method="POST">
                    <input type="hidden" name="id_advert" value="<?= $advert['id_advert'] ?>">
                    <label for="reserver">Votre message</label>
                    <textarea class="form-control" placeholder="votre message" name="reserver" id="reserver"></textarea>
                    <button type="submit" class="btn mt-3 text-white" style="background-color: #059652;">Réserver</button>
                </form>
                </div>
          </div>

        </div>

      </div>

    </section>
    <?php
require_once "inc/footer.inc.php";