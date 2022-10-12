<?php
require_once('../services/generateDateFormatService.php');

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
								fclose($file_to_read);
							}
							?>
							<small class="text-muted">ADMINISTRATORS</small>
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
						<?php
							$file_to_read = fopen("../database/appointments.txt", "r");
							$total = 0;
							if ($file_to_read !== FALSE) {
								while (($data = fgetcsv($file_to_read, 100, ',')) !== FALSE) {
									$total++;
								}
								echo '<h2>' . $total . '</h2>';
								fclose($file_to_read);
							}
							?>
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
					<th>Patient Id</th>
					<th>Pantient's Name</th>
					<th>Booking Date</th>
					<th>Booking Time</th>
					<th>Reason</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$file_to_read = fopen("../database/appointments.txt", "r");
				if ($file_to_read !== FALSE) {
					while (($data = fgetcsv($file_to_read, 100, ',')) !== FALSE) {
						echo "<tr>";
								echo "<td class='text-right'>" . $data[1] . "</td>";
								echo "<td class='text-right'>" . $data[2] . " ".$data[3]. "</td>";
								echo "<td class='text-right'>" . $date->format($data[4]) . "</td>";
								echo "<td class='text-right'>" . str_replace(";", "<br>", $data[5]) . "</td>";
								echo "<td class='text-right'>" . $data[6] . "</td>";
						}
						echo "</tr>\n";
					}
					fclose($file_to_read);
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
		<h2>Recent Activity & Update</h2>
		<div class="item online">
			<div class="icon">
				<span class="material-icons-sharp">
					login
				</span>
			</div>
			<div class="right">
				<div class="info">
					<h3>
						<?php
						if (isset($_SESSION['logged_in'])) {
							echo $_SESSION['logged_in'];
						}
						?>
					</h3>
					<small class="text-muted">LOGGED IN</small>
				</div>
			</div>
		</div>
		<div class="item offline">
			<div class="icon">
				<span class="material-icons-sharp">
					person_add
				</span>
			</div>
			<div class="right">
				<div class="info">
					<h3 class="text-capitalize">
					<?php
						if (isset($_COOKIE['new_data'])) {
							echo $_COOKIE['new_data']. " has been added";
						}
						else{
							echo "no new data";
						}
					?>
					</h3>
					<small class="text-muted">Last 24 Hours</small>
				</div>
			</div>
		</div>
		<div class="item person">
			<div class="icon">
				<span class="material-icons-sharp">
					post_add
				</span>
			</div>
			<div class="right">
				<div class="info">
					<h3>NEW BOOKING</h3>
					<small class="text-muted">Last 24 Hours</small>
				</div>
			</div>
		</div>
	</div>
</div>