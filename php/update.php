<?php

session_start();

if (isset($_SESSION['user_id'])) {
    if ($_POST['update_code'] === "upd-u-i") {
        echo $_POST['name'];
    }
}



?>