<?php

use controller\Appointments;

require_once '../config/config.php';
require_once '../controller/appointments.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $login = (new Appointments())->store();
  die;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php require_once 'component/_header.php' ?>
  <title>RUSSEL STREET MEDICAL CENTRE - BOOKING</title>
</head>

<body>
  <!-- nav-bar  -->
  <?php require_once 'component/_navbar.php'  ?>
  <!-- End nav-bar  -->


  <!-- web Section  -->
  <section id="booking-web" class="booking-web container">
    <div class="booking-web-info pr-2">
      <h1 class="booking-web-info-heading">
        BOOKING PAGE
      </h1>
      <p class="booking-web-info-subheading mt-3">
        We are open from Monday to Friday – 8.30am to 6.00pm Saturday – 9.00am
        to 12.00pm
      </p>
      <a href="index.php" type="button" class="booking-web-info-button">HOME</a>
    </div>
  </section>
  <!-- End web Section  -->

  <!-- Booking Page -->
  <section id="booking-form" class="booking-form container">
    <div class="booking-form-info">
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <h1 class="booking-form-info-heading">Booking Form</h1>
        <div class="booking-form-info-desc pt-1">
          <?php
          if (isset($_SESSION['notification'])) {
            echo $_SESSION['notification'];
            unset($_SESSION['notification']);
          }
          ?>
        </div>
        <div class="booking-form-info-desc pt-1">
          <label class="form-label" for="first_name">First Name</label>
          <input type="text" id="first_name" style="text-transform:capitalize; " name="first_name" value="<?php if (isset($_COOKIE["first_name"])) {
                                                                                                            echo $_COOKIE["first_name"];
                                                                                                          } ?>">
        </div>
        <div class="booking-form-info-desc pt-1">
          <label class="form-label" for="last_name">Last Name</label>
          <input type="text" id="last_name" style="text-transform:capitalize; " name="last_name" value="<?php if (isset($_COOKIE["last_name"])) {
                                                                                                          echo $_COOKIE["last_name"];
                                                                                                        } ?>">
        </div>
        <div class="booking-form-info-desc pt-1">
          <label class="form-label" for="date">Booking Date</label>
          <input type="date" name="date" min="<?= date('Y-m-d'); ?>" id="date" value="<?php if (isset($_COOKIE["date"])) {
                                                                                        echo $_COOKIE["date"];
                                                                                      } ?>">
        </div>
        <div class="booking-form-info-desc pt-1">
          <fieldset class="r-pill">
            <legend>
              <label class="form-label" for="booking_time">Booking Time</label>
            </legend>
            <div class="r-pill__group">
              <span class="r-pill__item">
                <input type="checkbox" id="booking_time" value="9am - 12pm" id="r1" name="time[]" <?php if (isset($_COOKIE["time"])) {
                                                                                                    if (strpos($_COOKIE["time"], '9am - 12pm')) {
                                                                                                      echo "checked";
                                                                                                    }
                                                                                                  }; ?>>
                <label for="r1">9am - 12pm</label>
              </span>

              <span class="r-pill__item">
                <input type="checkbox" id="booking_time" value="12pm - 3pm" id="r2" name="time[]" <?php if (isset($_COOKIE["time"])) {
                                                                                                    if (strpos($_COOKIE["time"], '12pm - 3pm')) {
                                                                                                      echo "checked";
                                                                                                    }
                                                                                                  }; ?>>
                <label for="r2">12pm - 3pm</label>
              </span>

              <span class="r-pill__item">
                <input type="checkbox" id="booking_time" value="3pm - 6pm" id="r3" name="time[]" <?php if (isset($_COOKIE["time"])) {
                                                                                                    if (strpos($_COOKIE["time"], '3pm - 6pm')) {
                                                                                                      echo "checked";
                                                                                                    }
                                                                                                  }; ?>>
                <label for="r3">3pm - 6pm</label>
              </span>
            </div>
          </fieldset>
        </div>
        <div class="booking-form-info-desc pt-1">
          <label class="form-label" for="reason">Appointnment Reason</label>
          <select name="reason" id="reason" onchange="selectReason(this.value)">
            <option value="">--Please Select--</option>
            <option value="Childhood Vaccination Shots" <?php
                                                        if (isset($_COOKIE["reason"])) {
                                                          if ($_COOKIE["reason"] == "childhood vaccination shots") {
                                                            echo "selected";
                                                          }
                                                        }
                                                        ?>>Childhood Vaccination Shots</option>
            <option value="Influenza Shot" <?php
                                            if (isset($_COOKIE["reason"])) {
                                              if ($_COOKIE["reason"] == "influenza shot") {
                                                echo "selected";
                                              }
                                            } ?>>Influenza Shot</option>
            <option value="Covid Booster Shot" <?php
                                                if (isset($_COOKIE["reason"])) {
                                                  if ($_COOKIE["reason"] == "covid booster shot") {
                                                    echo "selected";
                                                  }
                                                }
                                                ?>>Covid Booster Shot</option>
            <option value="Blood Test" <?php
                                        if (isset($_COOKIE["reason"])) {
                                          if ($_COOKIE["reason"] == "bood test") {
                                            echo "selected";
                                          }
                                        } ?>>Blood Test</option>
          </select>
          <p id="reason-desc"></p>
        </div>
        <button type="submit" class="booking-form-info-button" name="submit" value="Submit">Submit</button>
      </form>
    </div>
    <div class="booking-form-img">
      <div class="booking-form-img-wrapper">
        <img src="<?= $config['base_url']; ?>/assets/img/aboutus.png" alt="" />
      </div>
    </div>
  </section>
  <!-- End Booking Page -->
  <?php require_once 'component/_footer.php' ?>
  <?php require_once 'component/_customJs.php' ?>
</body>

</html>