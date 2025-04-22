<?php
require_once "inc/init.inc.php"; // Inclusion du fichier d'initialisation
require_once "inc/functions.inc.php";
$info = "";
$allAdverts = showAllAdvert();




require_once "inc/header.inc.php"; // Inclusion du header

?>
<section id="portfolio" class="portfolio section">

<!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
    <span>Nos annonces</span>
    <h2>Nos annonces</h2>
    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
    </div>
<?php
echo $info;
?>
    
    <div class="container">
    <p class="fw-bold text-center mb-4"><?= count($allAdverts) ?> annonces trouvées</p>

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
        <?php
            foreach ($allAdverts as $advert):
                if (!empty($advert["reservation_message"])) {
            ?>
            <!-- muted card -->
            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="<?= RACINE_SITE . "assets/img/images/" . $advert['photo'] ?>" style="height:25rem ; object-fit: cover;" class="img-fluid gris" alt="image studio">
              <div class="portfolio-info">
                <h4><?= htmlspecialchars(html_entity_decode(strtoupper($advert['title']))) ?> </h4>
                <a href="#" title="voir plus" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="#" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                <div class="bg-success-subtle w-75">
                <p><span class="text-muted text-center p-2 fw-bold z-3">Réservé !</span></p>
                </div>
              </div>
            </div>
            <?php
                } else {
                ?>
                <!-- non muted card -->
            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product min-vh-75">
              <img src="<?= RACINE_SITE . "assets/img/images/" . $advert['photo'] ?>" class="img-fluid" style="height:25rem ; object-fit: cover;" alt="image annonce">
              <div class="portfolio-info">
                <h4><?= htmlspecialchars(html_entity_decode(strtoupper($advert['title']))) ?> </h4>
                <p><span class="fw-bolder">Description:</span> <?= substr($advert['description'], 0, 90) . '...' ?><</p>
                <a href="<?= RACINE_SITE . "assets/img/images/" . $advert['photo'] ?>" title="<?= htmlspecialchars(html_entity_decode(strtoupper($advert['title']))) ?> " data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="<?= RACINE_SITE ?>annonceDetails.php?id_advert=<?= $advert['id_advert'] ?>" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div>
            <!-- End Portfolio Item -->

            <?php
                }
            endforeach;
            ?>

          </div>
          <!-- End Portfolio Container -->

        </div>

      </div>








</section>

<?php
require_once "inc/footer.inc.php";