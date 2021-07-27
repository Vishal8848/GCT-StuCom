<?php

    # Database Init : Do not mess with this part
    include 'dbops.php';

    if(!$DB_init)   die('Connection Failed : ' . $DB_Error);

    $ConnectionCount = DB_connectionCount();

    # Close Database Connection
    mysqli_close($DB_Connect);

?>

<!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="Author" content="Vishal Pranav">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Page Title -->
        <title> GCT Student Community </title>
        <link rel="icon" href="assets/logo.png" type="image/x-icon">

        <!-- Bootstrap v5.0.2 -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap-lux.min.css">

        <!-- Font Awesome v5.15.3 -->
        <link rel="stylesheet" href="font-awesome/css/all.min.css">

        <!-- jQuery v3.6.0 (npm) -->
        <script src="jquery/dist/jquery.min.js"></script>

    </head>

    <body>

        <?php  include 'landing.php' ?>

        <!-- Bootstrap v5.0.2 JS -->
        <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>

</html>