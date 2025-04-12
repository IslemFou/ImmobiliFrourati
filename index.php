<?php

require_once "inc/init.inc.php"; // Inclusion du fichier d'initialisation
require_once "inc/functions.inc.php";
$info = "";

//show Afficher les 15 dernières annonces dans l’ordre antéchronologique (plus récente en premier)
// maj de l'annonce

$LimitedAdverts = showLimitedAdverts();
$message = "Les 15 dernières annonces (";


require_once "inc/header.inc.php"; // Inclusion du header

?>

<?php
echo $info;
?>
    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="fade-up">
            <h1>Investir dans l'immobilier</h1>
            <p>Nous vous accompagnons dans votre projet immobilier</p>
            <div class="d-flex">
              <a href="#about" class="btn-get-started">Get Started</a>
              <a href="#" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="100">
            <img src="assets/img/hero2-img.png" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section>
    <!-- /Hero Section -->

 

    <!-- Stats Section -->
    <section id="stats" class="stats section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
              <p>Clients</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
              <p>Projects</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
              <p>Hours Of Support</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
              <p>Workers</p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section>
    <!-- /Stats Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <span>Nos appartement Haute-standing</span>
        <h2>Nos appartement Haute-standing</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div>
      <!-- End Section Title -->

      <div class="container">
      <h2 class="fw-bolder fs-4 mx-5 text-center"><?= $message . count(showLimitedAdverts()) ?>)</h2>

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <!-- <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">App</li>
            <li data-filter=".filter-product">Product</li>
            <li data-filter=".filter-branding">Branding</li>
            <li data-filter=".filter-books">Books</li>
          </ul>End Portfolio Filters -->

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
        <?php
            foreach ($LimitedAdverts as $advertLimit) :
                if (!empty($advertLimit["reservation_message"])) {
            ?>
            <!-- muted card -->
            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product position-relative min-vh-75">
            <p class="text-muted text-center position-absolute top-5 start-50 translate-middle p-2 bg-warning-subtle fw-bold rounded-3 z-3">Réservé !</p>
              <img src="<?= RACINE_SITE . "assets/img/images/" . $advertLimit['photo'] ?>" class="img-fluid gris" alt="image studio">
              <div class="portfolio-info">
                <h4><?= htmlspecialchars(html_entity_decode(strtoupper($advertLimit['title']))) ?> </h4>
                <p><span class="fw-bolder">Description:</span> <?= substr($advertLimit['description'], 0, 90) . '...' ?><</p>
                <a href="#" title="" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="#" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
              </div>
            </div>
            <?php
                } else {
                ?>
                <!-- non muted card -->
            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product min-vh-75">
              <img src="<?= RACINE_SITE . "assets/img/images/" . $advertLimit['photo'] ?>" class="img-fluid" alt="image annonce">
              <div class="portfolio-info">
                <h4><?= htmlspecialchars(html_entity_decode(strtoupper($advertLimit['title']))) ?> </h4>
                <p><span class="fw-bolder">Description:</span> <?= substr($advertLimit['description'], 0, 90) . '...' ?><</p>
                <a href="<?= RACINE_SITE . "assets/img/images/" . $advertLimit['photo'] ?>" title="<?= htmlspecialchars(html_entity_decode(strtoupper($advertLimit['title']))) ?> " data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                <a href="annonceDetails.php?id_advert=<?= $advertLimit['id_advert'] ?>" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
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
    <!-- /Portfolio Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <span>Section Title</span>
        <h2>Contact</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-5">

            <div class="info-wrap">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Address</h3>
                  <p>10 rue de terrage 75010 Paris</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Call Us</h3>
                  <p>+1 5589 55488 55</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email Us</h3>
                  <p>info@example.com</p>
                </div>
              </div><!-- End Info Item -->
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.0025465613835!2d2.3635622!3d48.877227999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e74a2784d1d%3A0x6c5637ce204ee2fe!2s10%20Rue%20du%20Terrage%2C%2075010%20Paris!5e0!3m2!1sfr!2sfr!4v1744478787207!5m2!1sfr!2sfr" width="100%" height="270px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>

          <div class="col-lg-7">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <label for="name-field" class="pb-2">Your Name</label>
                  <input type="text" name="name" id="name-field" class="form-control" required="">
                </div>

                <div class="col-md-6">
                  <label for="email-field" class="pb-2">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="subject-field" class="pb-2">Subject</label>
                  <input type="text" class="form-control" name="subject" id="subject-field" required="">
                </div>

                <div class="col-md-12">
                  <label for="message-field" class="pb-2">Message</label>
                  <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section>
    <!-- /Contact Section -->

    <?php
require_once "inc/footer.inc.php";