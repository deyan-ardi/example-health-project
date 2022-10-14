    <?php require_once '../config/config.php'; ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="<?= $config['base_url']; ?>/assets/css/admin/style.css">
    <link rel="shortcut icon" href="<?= $config['base_url']; ?>/assets/img/logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?= $config['base_url']; ?>/asset/css/admin/bootstrap.min.css">
    <?php
    if (isset($_REQUEST['page'])) {
        if ($_REQUEST['page'] == 'dashboard') {
            $title = "DASHBOARD";
        } else {
            $title = 'ADMINISTRATOR';
        }
    } else {
        $title = "";
    }
    ?>