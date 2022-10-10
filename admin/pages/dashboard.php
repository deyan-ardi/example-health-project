<?php
include('../services/generateDateFormatService.php');

use services\generateDateFormatService;

$date = new generateDateFormatService;
?>
<main>
	<h1>Dashboard</h1>
	<div class="informations">
		<div class="greeting">
			<div class="middle">
            <div class="item">
					<div class="icon">
						<span class="material-icons-sharp">
                            waving_hand
						</span>
					</div>
					<div class="right">
						<div class="info">
							<h2 class="text-capitalize">
                                <?php
                                echo $_SESSION['username'];
                                ?>
                            </h2>
                            <small class="text-muted">RSMC </small>
						</div>
					</div>
				</div>
				<div class="center">

				</div>
			</div>
		</div>
		<div class="admin">
			<div class="middle">
            <div class="item">
					<div class="icon">
						<span class="material-icons-sharp">
                            manage_accounts
						</span>
					</div>
					<div class="right">
						<div class="info">
                        <?php
                        $file_to_read = fopen("../database/users.txt", "r");
                        $total = 0;
                        if ($file_to_read !== FALSE) {
                            while (($data = fgetcsv($file_to_read, 100, ',')) !== FALSE) {
                                $total++;
                            }
                            echo '<h2>' . $total . '</h2>';
                            echo '<small class="text-muted">ADMINISTRATORS</small>';
                            fclose($file_to_read);
                        }
                        ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="booking">
			<div class="middle">
				<div class="item">
					<div class="icon">
						<span class="material-icons-sharp">
                            receipt_long
						</span>
					</div>
					<div class="right">
						<div class="info">
							<h2>14</h2>
                            <small class="text-muted">BOOKING LISTS</small>
						</div>
					</div>
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