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
    <?php include('component/_header.php') ?>
    <title>RUSSEL STREET MEDICAL CENTRE - ADMINISTRATOR</title>
</head>

<body>
    <div class="wrapper">
    <?php include('component/_sidebar.php') ?>
    <?php
        if (isset($_REQUEST['page'])) {
                switch ($_REQUEST['page']) {
                        case 'dashboard':
                                include 'pages/dashboard.php';
                                break;
                        case 'manage_admin':
                                include 'pages/manage_admin.php';
                                break;
                        default:
                                break;
                }
        } else {
            include('pages/manage_admin.php') ;
        }
        ?>
    </div>

    <?php include('component/_footer.php') ?>
</body>

</html>