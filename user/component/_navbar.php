<?php include('../config/config.php'); ?>

<section id="nav-bar" class="container">
    <header class="nav-bar">
        <div class="brand">
            <a href="#web">
                <img src="../assets/img/logo-text-less.png" alt="Logo" width="80px" class="logo-image" />
            </a>
            <p class="logo-text">
                RUSSEL STREET <br />
                MEDICAL CENTRE
            </p>
        </div>
        <div class="nav-list">
            <div class="hamburger">
                <div class="bar"></div>
            </div>
            <ul>
                <li><a href="<?= $config['base_url']; ?>/user/index" class="<?= basename($_SERVER['SCRIPT_NAME']) == "index.php" ? "active" : "" ?>">Home</a></li>
                <li class="active"><a href="#about">About</a></li>
                <li><a href="#services">Who We Are</a></li>
                <li><a href="<?= $config['base_url']; ?>/user/booking" class="<?= basename($_SERVER['SCRIPT_NAME']) == "booking.php" ? "active" : "" ?>">Booking</a></li>
                <li><a href="<?= $config['base_url']; ?>/admin/login">Login</a></li>
            </ul>
        </div>
    </header>
</section>