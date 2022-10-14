<?php require_once '../config/config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'component/_header.php' ?>
</head>

<body>
  <!-- nav-bar  -->
  <?php require_once 'component/_navbar.php' ?>
  <!-- End nav-bar  -->

  <!-- web Section  -->
  <section id="web" class="web container">
    <div class="web-info pr-2">
      <h1 class="web-info-heading">
        RUSSEL STREET <br />
        MEDICAL CENTRE
      </h1>
      <p class="web-info-subheading">
        We are open from Monday to Friday – 8.30am to 6.00pm Saturday – 9.00am
        to 12.00pm
      </p>
      <a href="#about" type="button" class="web-info-button">ABOUT US</a>
    </div>
    <div class="web-img">
      <div class="slider">
        <div class="slide active">
          <img src="<?= $config['base_url']; ?>/assets/img/img1.jpg" alt="">
        </div>
        <div class="slide">
          <img src="<?= $config['base_url']; ?>/assets/img/aboutus.png" alt="">
        </div>
        <div class="slide">
          <img src="<?= $config['base_url']; ?>/assets/img/slider1.jpeg" alt="">
        </div>
        <div class="slide">
          <img src="<?= $config['base_url']; ?>/assets/img/slider2.jpg" alt="">
        </div>
        <div class="slide">
          <img src="<?= $config['base_url']; ?>/assets/img/slider3.jpg" alt="">
        </div>
        <div class="slide">
          <img src="<?= $config['base_url']; ?>/assets/img/slider4.png" alt="">
        </div>
        <div class="navigation">
          <i class="fas fa-chevron-left prev-btn"></i>
          <i class="fas fa-chevron-right next-btn"></i>
        </div>
      </div>
    </div>
  </section>
  <!-- End web Section  -->

  <!-- About section  -->
  <section id="about" class="about container">
    <div class="about-info">
      <h1 class="about-info-heading">About Us</h1>
      <p class="about-info-desc pt-1">
        Russel Street Medical opened in 2020 and is located in Melbourne’s CBD
        at 340 Russel Street Melbourne, just opposite The Old Melbourne Jail
        and within walking distance of Melbourne Central Train Station.
      </p>
      <p class="about-info-desc pt-1">
        We strive to help all of our patients with a focus on preventative
        health care, a view to managing chronic health conditions with a
        holistic approach, and with access to a wide range of specialist care
        providers when needed.
      </p>
      <p class="about-info-desc pt-1">
        Under partnerships, we are able to offer RMIT students & staff
        discounted rates.
      </p>
      <table class="dt-table mt-3">
        <tr>
          <th>Consultation</th>
          <th>Normal Fee</th>
          <th>RMIT Member Fee</th>
          <th>Medicare Rebate</th>
        </tr>
        <tr>
          <td>Standard</td>
          <td id="td1">$85</td>
          <td>$60.50</td>
          <td>$39.75</td>
        </tr>
        <tr>
          <td>Long or Complex</td>
          <td id="td1">$130.00</td>
          <td>$91.00</td>
          <td>$76.95</td>
        </tr>
        <tr></tr>
      </table>
    </div>
    <div class="about-img">
      <div class="about-img-wrapper">
        <img src="<?= $config['base_url']; ?>/assets/img/aboutus.png" alt="" />
      </div>
    </div>
  </section>
  <!-- End About section  -->

  <!-- Service Section  -->
  <section id="services" class="services container">
    <div class="services-header">
      <h1 class="services-header-heading">WHO WE ARE</h1>
      <p class="services-header-desc">
        There Are Russel Street Medical Centre Staff Profile
      </p>
    </div>
    <div class="services-info">
      <div class="service">
        <div class="service-card">
          <div class="service-front">
            <i class="fas fa-user-md"></i>
            <h1 class="service-front-heading">Dr. Abigale Laurentis</h1>
          </div>
          <div class="service-back">
            <h1 class="service-back-heading">Dr. Abigale Laurentis</h1>
            <img src="<?= $config['base_url']; ?>/assets/img/staff1.jpeg" width="200px" class="service-back-desc" alt="foto" />
            <p class="service-back-desc">
              Abigale Laurentis completed her medical degree at the University
              of Queensland in 2013, where she also obtained a Bachelor of
              Science in Biomedicine. Over her training and practice, Abigale
              has worked in a variety of clinical settings including
              specialities at Latrobe Health
            </p>
          </div>
        </div>
      </div>
      <div class="service">
        <div class="service-card">
          <div class="service-front">
            <i class="fas fa-user-md"></i>
            <h1 class="service-front-heading">Dr. Stephen Hill</h1>
          </div>
          <div class="service-back">
            <h1 class="service-back-heading">Dr. Stephen Hill</h1>
            <img src="<?= $config['base_url']; ?>/assets/img/staff2.jpeg" width="200px" class="service-back-desc" alt="foto" />
            <p class="service-back-desc">
              Stephen Hill graduated from Auckland University in New Zealand
              in 2014, and obtained his Fellowship from the Royal Australian
              College of General Practitioners in 2017. Over his training and
              practice, Stephen worked in internal medicine at the Royal
              Children's Hospital Melbourne before transitioning to General
              Practice.
            </p>
          </div>
        </div>
      </div>
      <div class="service">
        <div class="service-card">
          <div class="service-front">
            <i class="fas fa-user-md"></i>
            <h1 class="service-front-heading">Ms Kiyoko Tsu</h1>
          </div>
          <div class="service-back">
            <h1 class="service-back-heading">Ms Kiyoko Tsu</h1>
            <img src="<?= $config['base_url']; ?>/assets/img/staff3.jpeg" width="200px" class="service-back-desc" alt="foto" />
            <p class="service-back-desc">
              Kiyoko Tsu completed her Bachelor of Nursing at the Yong Loo Lin
              School of Medicine in Singapor e in 2019. She is an accredited
              Nurse Immuniser and has worked in various hospitals within
              metropolitan Melbourne.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Service Section  -->

  <!-- Hire Section  -->
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3330.1122528246683!2d149.578659115229!3d-33.420317680782574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b11e433671adf0f%3A0x7a978f57ca5f1f49!2sRussell%20Street%20Medical%20Centre!5e0!3m2!1sid!2sid!4v1665217622498!5m2!1sid!2sid" width="100%" height="450" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  <section id="contact" class="contact container">
    <h1 class="contact-heading">Want To Booking Services?</h1>
    <a href="booking.php" type="button" class="contact-button">Booking Now!!</a>
  </section>
  <!-- End contact Section  -->
  <?php require_once 'component/_footer.php' ?>
</body>

</html>