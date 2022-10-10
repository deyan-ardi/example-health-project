<?php
require_once "../config/config.php";
if (isset($_REQUEST['page'])) {
    if ($_REQUEST['page'] == 'dashboard') {
        $classDashboard = "active";
        $classAdmin = " ";
    } else {
        $classDashboard = " ";
        $classAdmin = "active";
    }
} else {
    $class = "";
}
?>
<aside>
    <div class="top">
        <div class="logo">
            <img src="../assets/img/logo-text-less.png" alt="logo" width="100">
            <h3>Russel Street Medical Centre</h3>
        </div>
        <div class="close" id="close-btn">
            <span class="material-icons-sharp">
                close
            </span>
        </div>
    </div>
    <div class="sidebar-grid">
        <a href="<?= $config['base_url']; ?>/admin/administration?page=dashboard" class="<?= $classDashboard ?>">
            <span class="material-icons-sharp">
                grid_view
            </span>
            <h3>Dashboard</h3>
        </a>
        <a href="<?= $config['base_url']; ?>/admin/administration?page=manage_admin" class="<?= $classAdmin ?>">
            <span class="material-icons-sharp">
                manage_accounts
            </span>
            <h3>Administrators</h3>
        </a>
        <a href="#">
            <span class="material-icons-sharp">
                logout
            </span>
            <?php
            $logout = '
			<form action=' . $_SERVER['PHP_SELF'] . ' method="post" accept-charset="utf-8" name="logout">
			<button name="logout" type="submit">
			<h3>Logout</h3>
			</button>
			</form>';
            echo $logout;
            ?>
		</a>
	</div>
</aside>