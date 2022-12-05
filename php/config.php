<?php

$connection = mysqli_connect("localhost", "root", "", "uiu_psp");
if ($connection) {
    echo "connected";
} else {
    echo "error";
}

?>