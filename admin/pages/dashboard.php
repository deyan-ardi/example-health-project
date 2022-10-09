<?php
include('../services/generateDateFormatService.php');

use services\generateDateFormatService;

$date = new generateDateFormatService;
?>
<main>
    <h1>Dashboard</h1>
    <div class="informations">
        <div class="admin">
            <div class="middle">
                <div class="center">
                    <?php
                    $welcome = '<h3 class="text-capitalize" style="padding-left:12px;">Hello, ' . $_SESSION['username'] . '</h3>';
                    echo $welcome;
                    ?>
                </div>
            </div>
        </div>
        <div class="admin">
            <div class="middle">
                <div class="left">
                    <?php
                    $file_to_read = fopen("../database/users.txt", "r");
                    $total = 0;
                    if ($file_to_read !== FALSE) {
                        while (($data = fgetcsv($file_to_read, 100, ',')) !== FALSE) {
                            $total++;
                        }
                        echo '<h3 style="padding-left:12px;">' . $total . ' Administratos</h3>';
                        fclose($file_to_read);
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="booking">
            <div class="middle">
                <div class="left">
                    <h3>Total Booking</h3>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <h2>Recent Services Booking</h2>
    <div class="recent-order" style="margin-top:0.5rem;">
        <table>
            <thead>
                <tr class="text-right">
                    <th>ID</th>
                    <th>Patient</th>
                    <th>Reason</th>
                    <th>Booking Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $file_to_read = fopen("../database/users.txt", "r");
                if ($file_to_read !== FALSE) {
                    while (($data = fgetcsv($file_to_read, 100, ',')) !== FALSE) {
                        echo "<tr>";
                        for ($i = 0; $i < count($data); $i++) {
                            if ($i == 3) {
                                echo "<td class='text-right'>" . $date->format($data[$i]) . "</td>";
                            } else {
                                echo "<td class='text-right'>" . $data[$i] . "</td>";
                            }
                        }
                        echo "</tr>\n";
                    }
                    fclose($file_to_read);
                }
                ?>
            </tbody>
        </table>
    </div>
</main>
<div class="right">
    <div class="top">
        <button id="menu-btn">
            <span class="material-icons-sharp">
                menu
            </span>
        </button>
    </div>
    <div class="add-new">
        <h2>Recent Activity</h2>
        <div class="item online">
            <div class="icon">
                <span class="material-icons-sharp">
                    shopping_cart
                </span>
            </div>
            <div class="right">
                <div class="info">
                    <h3>ONLINE ORDERS</h3>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
            </div>
        </div>
        <div class="item offline">
            <div class="icon">
                <span class="material-icons-sharp">
                    local_mall
                </span>
            </div>
            <div class="right">
                <div class="info">
                    <h3>OFFLINE ORDERS</h3>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
            </div>
        </div>
        <div class="item person">
            <div class="icon">
                <span class="material-icons-sharp">
                    person
                </span>
            </div>
            <div class="right">
                <div class="info">
                    <h3>NEW CUSTOMERS</h3>
                    <small class="text-muted">Last 24 Hours</small>
                </div>
            </div>
        </div>
    </div>
</div>
</div>