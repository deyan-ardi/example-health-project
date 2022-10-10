<?php
include('../services/generateDateFormatService.php');

use services\generateDateFormatService;

$date = new generateDateFormatService;
?>
<main>
    <h1>Manage Administrators</h1>
    <div class="recent-order">
        <table>
            <thead>
                <tr class="text-right">
                    <th>ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Created At</th>
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
                            } elseif($i == 1) {
                                echo "<td class='text-right text-capitalize'>" . $data[$i] . "</td>";
                            }
                            else{
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
        <h2>Add new</h2>
        <?php
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
        }
        ?>
        <div class="item online">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="needs-validation" name="save" novalidate="" autocomplete="off">
                <div class="right">
                    <label for="username">Username</label>
                    <input type="text" class="input text-capitalize" name="username" id="username" />

                    <label for="password">Password</label>
                    <input type="password" class="input" name="password" id="password" />

                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" class="input" name="confirm_password" id="confirm_password" />

                    <button class="button-two" type="submit" name="save">Add</button>

            </form>

        </div>
    </div>
</div>
</div>