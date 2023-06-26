<?php
    const DB_HOST = "localhost:3308";
    const DB_USER = "root";
    const DB_PASSWORD = "123";
    const DB_NAME = "login_db";

    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if ($link === false) {
        die("ERROR: помилка при підключенні до бази даних." . mysqli_connect_error());
    }
?>
