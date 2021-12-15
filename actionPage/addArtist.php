<?php

require '../vendor/autoload.php';
include '../model/Getter.php';

if ( isset($_POST['name'],$_POST['age'])) {

    $movie = new Getter;
    $movie->addArtist(
        $_POST['name'],
        $_POST['age']);
}




header('location:../index.php');