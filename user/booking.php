<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('component/_header.php') ?>
  <title>RUSSEL STREET MEDICAL CENTRE - BOOKING</title>
</head>

<body>
  <!-- nav-bar  -->
  <?php include('component/_navbar.php') ?>
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
      <a href="index" type="button" class="booking-web-info-button">HOME</a>
    </div>
  </section>
  <!-- End web Section  -->

  <!-- Booking Page -->
  <section id="booking-form" class="booking-form container">
    <div class="booking-form-info">
      <form action="" method="POST">
        <h1 class="booking-form-info-heading">Booking Form</h1>
        <div class="booking-form-info-desc pt-1">
          <label class="form-label" for="pid">Patient ID</label>
          <input type="text" id="pid" name="pid">
        </div>
        <div class="booking-form-info-desc pt-1">
          <label class="form-label" for="date">Booking Date</label>
          <input type="date" name="date" min="<?= date('Y-m-d'); ?>" id="date">
        </div>
        <div class="booking-form-info-desc pt-1">
          <fieldset class="r-pill">
            <legend>
              <label class="form-label" for="booking_time">Booking Date</label>
            </legend>
            <div class="r-pill__group">
              <span class="r-pill__item">
                <input type="checkbox" id="booking_time" value="9am - 12pm" id="r1" name="time[]">
                <label for="r1">9am - 12pm</label>
              </span>

              <span class="r-pill__item">
                <input type="checkbox" id="booking_time" value="12pm - 3pm" id="r2" name="time[]">
                <label for="r2">12pm - 3pm</label>
              </span>

              <span class="r-pill__item">
                <input type="checkbox" id="booking_time" value="3pm - 6pm" id="r3" name="time[]">
                <label for="r3">3pm - 6pm</label>
              </span>
            </div>
          </fieldset>
        </div>
        <div class="booking-form-info-desc pt-1">
          <label class="form-label" for="reason">Appointnment Reason</label>
          <select name="reason" id="reason" onchange="selectReason(this.value)">
            <option value="">--Please Select--</option>
            <option value="Childhood Vaccination Shots">Childhood Vaccination Shots</option>
            <option value="Influenza Shot">Influenza Shot</option>
            <option value="Covid Booster Shot">Covid Booster Shot</option>
            <option value="Blood Test">Blood Test</option>
          </select>
          <p id="reason-desc"></p>
        </div>
        <button type="submit" class="booking-form-info-button" value="Submit">Submit</button>
      </form>
    </div>
    <div class="booking-form-img">
      <div class="booking-form-img-wrapper">
        <img src="../assets/img/aboutus.png" alt="" />
      </div>
    </div>
  </section>
  <!-- End Booking Page -->
  <?php include('component/_footer.php') ?>
  <?php include('component/_customJs.php') ?>
</body>

</html>