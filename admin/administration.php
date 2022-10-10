<?php
require_once '../controller/tools.php';

session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $login = (new Tools())->logout();
    $store = (new Tools())->storeUser();
    die;
}

if (!isset($_SESSION['user'])) {
	header("Location: ../admin/login.php");
}

?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <?php require_once 'component/_header.php' ?>
    <title>RUSSEL STREET MEDICAL CENTRE - <?= $title ?></title>
</head>

<body>
    <div class="wrapper">
    <?php require_once 'component/_sidebar.php' ?>
    <?php
        if (isset($_REQUEST['page'])) {
                switch ($_REQUEST['page']) {
                        case 'dashboard':
                                require_once 'pages/dashboard.php';
                                break;
                        case 'manage_admin':
                                require_once 'pages/manage_admin.php';
                                break;
                        default:
                                break;
                }
        } else {
            require_once 'pages/dashboard.php'  ;
        }
        ?>
    </div>

    <?php require_once 'component/_footer.php'  ?>
</body>

</html>