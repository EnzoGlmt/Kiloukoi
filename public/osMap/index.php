<?php
require('vendor/autoload.php');
$faker = Faker/Factory::create()
?><!DOCTYPE html>
<html>
    <head>
        <title>Title</title>
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
        <link rel="stylesheet" href="style.css">
    </head>
<body>

<h1 style="...">La Kiloukarte</h1>

<div cladd="container">

<div class="list">
    <?php for ($i = 0; $i < 30; $i++): ?>
        <div class="item js-marker" data-lat="<?= $faker->latitude(49.886, 49.800) ?>" data-lng="<?= $faker->longitude(1.129, 1.100) ?>" data-price>
        <img src="#" alt="#">
        <h4>Loués mon beau marteau</h4>
        <p>
            Ici la description de mon beau marteau
        </p>
    </div>
    <?php endfor; ?>
    </div>

    <div class="map" id="map"></div>

    </div>
    <script src="vendor.js"></script>
    <script src="app.js"></script>
    </body>
    </html>